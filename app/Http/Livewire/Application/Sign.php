<?php

namespace App\Http\Livewire\Application;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendGuardianValidationCode;
use App\Mail\SendApplicantValidationCode;

class Sign extends Component
{
    public $uuid, $application, $acknowledgement, $name, $email, $code, $guardian;

    public function mount()
    {
        if (! isset($this->uuid)) {
            return redirect()->to('/');
        }
        $this->application = Application::where('uuid', $this->uuid)->first();
        $this->guardian = request('guardian') ?? null;
    }

    public function sendCode()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'acknowledgement' => 'required',
        ]);

        try {

            // Generate validation code for signer
            $applicant_code = Str::random(8);

            // Generate validation code for guardian
            $guardian_code = ($this->application->legal_guardian_name && $this->application->legal_guardian_email) ? Str::random(8) : null;

            // Email validation code to signer
            $this->application->update([
                'applicant_name' => $this->name,
                'applicant_email' => $this->email,
                'applicant_identification_method' => 'email',
                'applicant_acknowledgement' => Carbon::now(),
                'applicant_verification_code' => $applicant_code,
                'applicant_verification_ip' => request()->getClientIp(),
            ]);
            Mail::to($this->application->email)->send(new SendApplicantValidationCode($applicant_code));
            DB::table('application_log')->insert([
                'application_id' => $this->application->id,
                'description' => 'Sent signature validation code to applicant.'
            ]);

            // Email validation code and link to guardian
            if ($this->application->legal_guardian_email && $this->application->legal_guardian_name) {
                $this->application->update([
                    'legal_guardian_verification_code' => $guardian_code,
                    'legal_guardian_verification_ip' => request()->getClientIp(),
                    'legal_guardian_verification' => Carbon::now(),
                ]);
                Mail::to($this->application->legal_guardian_email)->send(new SendGuardianValidationCode($this->application, $guardian_code));
                DB::table('application_log')->insert([
                    'application_id' => $this->application->id,
                    'description' => 'Sent signature validation code to legal guardian.'
                ]);
            }

        } catch (\Throwable $th) {
            Log::error($th);
        }

        return redirect()->to( '/' . app()->getLocale() . '/start?application_id=' . $this->uuid);
    }

    public function sign()
    {
        // Legal Guardian Signature
        // Creates early return to redirect guardian to a different URL, once application has been digitally signed.
        if ( $this->guardian && $this->guardian === $this->application->legal_guardian_email ) {
            $this->validate([
                'code' => 'required|exists:applications,legal_guardian_verification_code'
            ]);
            if ($this->code === $this->application->legal_guardian_verification_code) {
                try {
                    $this->application->update([
                        'legal_guardian_verification' => Carbon::now(),
                        'legal_guardian_signature' => Carbon::now()->addSeconds(30),
                        'legal_guardian_signature_ip' => request()->getClientIp(),
                    ]);
                    DB::table('application_log')->insert([
                        'application_id' => $this->application->id,
                        'description' => 'Application signed by guardian.'
                    ]);
                } catch (\Throwable $th) {
                    Log::error($th);
                }
                // Early return with success code.
                return redirect()->to('/guardian-success');
            }
        }

        // Applicant Signature
        if (!$this->guardian) {
            $this->validate([
                'code' => 'required|exists:applications,applicant_verification_code'
            ]);
            if ($this->code === $this->application->applicant_verification_code) {
                try {
                    $this->application->update([
                        'step' => $this->application->step + 1,
                        'applicant_verification' => Carbon::now(),
                        'applicant_signature' => Carbon::now()->addMinute(),
                        'applicant_signature_ip' => request()->getClientIp(),
                    ]);
                    DB::table('application_log')->insert([
                        'application_id' => $this->application->id,
                        'description' => 'Application signed by applicant.'
                    ]);
                } catch (\Throwable $th) {
                    Log::error($th);
                }
            }
            return redirect()->to( '/' . app()->getLocale() . '/start?application_id=' . $this->uuid);
        }
    }

    public function render()
    {
        return view('livewire.application.sign');
    }
}
