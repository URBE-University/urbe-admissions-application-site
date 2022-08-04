<?php

namespace App\Http\Livewire\Application;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendApplicantValidationCode;
use App\Mail\SendGuardianValidationCode;
use Carbon\Carbon;

class Sign extends Component
{
    public $uuid, $application, $acknowledgement, $name, $email, $code;

    public function mount()
    {
        if (! isset($this->uuid)) {
            return redirect()->to('/');
        }
        $this->application = Application::where('uuid', $this->uuid)->first();
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
                'applicant_verification' => Carbon::now(),
            ]);
            Mail::to($this->application->email)->send(new SendApplicantValidationCode($applicant_code));

            // Email validation code and link to guardian
            if ($this->application->legal_guardian_email && $this->application->legal_guardian_name) {
                $this->application->update([
                    'legal_guardian_verification_code' => $guardian_code,
                    'legal_guardian_verification_ip' => request()->getClientIp(),
                    'legal_guardian_verification' => Carbon::now(),
                ]);
                Mail::to($this->application->legal_guardian_email)->send(new SendGuardianValidationCode($this->application, $guardian_code));
            }

        } catch (\Throwable $th) {
            Log::error($th);
        }

        return redirect()->to('/start?application_id=' . $this->uuid);
    }

    public function sign()
    {
        $this->validate([
            'code' => ['required']
        ]);

        // Check if the code is valid
        if ($this->code === $this->application->applicant_verification_code) {
            try {
                $this->application->update([
                    'step' => $this->application->step + 1,
                    'applicant_signature' => Carbon::now(),
                    'applicant_signature_ip' => request()->getClientIp(),
                ]);
            } catch (\Throwable $th) {
                Log::error($th);
            }
            return redirect()->to('/start?application_id=' . $this->uuid);
        }
    }

    public function render()
    {
        return view('livewire.application.sign');
    }
}
