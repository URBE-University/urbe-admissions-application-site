<?php

namespace App\Http\Livewire\Application;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;

class PersonalInformation extends Component
{
    public $application, $uuid, $ethnicity, $gender, $dob, $ssn, $us_resident, $dl_passport, $military, $military_civilian, $legal_guardian_name, $legal_guardian_email, $legal_guardian_relation;

    public function mount()
    {
        if (! isset($this->uuid)) {
            return redirect()->to('/');
        }

        $this->application = Application::where('uuid', $this->uuid)->first();
    }

    public function save()
    {
        $this->validate([
            'ethnicity' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'us_resident' => 'required',
            'dl_passport' => 'required',
            'military' => 'required',
            'military_civilian' => 'required',
        ]);

        $encrypted_ssn = ($this->ssn) ? Crypt::encryptString($this->ssn) : null;
        $encrypted_dl_passport = ($this->dl_passport) ? Crypt::encryptString($this->dl_passport) : null;
        $us_resident = ($this->us_resident === 'yes') ? 1 : 0;
        $military = ($this->military === 'yes') ? 1 : 0;
        $military_civilian = ($this->military_civilian === 'yes') ? 1 : 0;

        try {

            $this->application->update([
                'step' => 3,
                'ethnicity' => $this->ethnicity,
                'gender' => $this->gender,
                'dob' => $this->dob,
                'legal_guardian_name' => $this->legal_guardian_name,
                'legal_guardian_email' => $this->legal_guardian_email,
                'legal_guardian_relation' => $this->legal_guardian_relation,
                'ssn' => $encrypted_ssn,
                'us_resident' => $us_resident,
                'dl_passport' => $encrypted_dl_passport,
                'military' => $military,
                'military_civilian' => $military_civilian,
                'lang' => app()->getLocale()
            ]);
            DB::table('application_log')->insert([
                'application_id' => $this->application->id,
                'description' => 'Personal information completed.'
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }
        return redirect()->to( '/' . app()->getLocale() . '/start?application_id=' . $this->uuid);
    }

    public function render()
    {
        return view('livewire.application.personal-information');
    }
}
