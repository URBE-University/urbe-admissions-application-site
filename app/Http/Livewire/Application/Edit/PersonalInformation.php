<?php

namespace App\Http\Livewire\Application\Edit;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;

class PersonalInformation extends Component
{
    public $editModal, $application, $uuid, $ethnicity, $gender, $dob, $ssn, $us_resident, $dl_passport, $military, $military_civilian, $legal_guardian_name, $legal_guardian_email, $legal_guardian_relation;

    public function mount()
    {
        $this->application = Application::where('uuid', $this->uuid)->first();
        $this->dob = $this->application->dob;
        $this->ssn = Crypt::decryptString($this->application->ssn);
        $this->us_resident = ($this->application->us_resident == 1) ? 'yes' : 'no';
        $this->military = ($this->application->military == 1) ? 'yes' : 'no';
        $this->military_civilian = ($this->application->military_civilian == 1) ? 'yes' : 'no';
        $this->legal_guardian_name = $this->application->legal_guardian_name;
        $this->legal_guardian_email = $this->application->legal_guardian_email;
        $this->legal_guardian_relation = $this->application->legal_guardian_relation;
    }

    public function update()
    {
        $this->validate([
            'dob' => 'required|date',
            'ssn' => 'required',
            'us_resident' => 'required',
            'military' => 'required',
            'military_civilian' => 'required',
        ]);

        $encrypted_ssn = ($this->ssn) ? Crypt::encryptString($this->ssn) : null;
        $us_resident = ($this->us_resident === 'yes') ? 1 : 0;
        $military = ($this->military === 'yes') ? 1 : 0;
        $military_civilian = ($this->military_civilian === 'yes') ? 1 : 0;

        try {

            $this->application->update([
                'ethnicity' => $this->ethnicity,
                'gender' => $this->gender,
                'dob' => $this->dob,
                'legal_guardian_name' => $this->legal_guardian_name,
                'legal_guardian_email' => $this->legal_guardian_email,
                'legal_guardian_relation' => $this->legal_guardian_relation,
                'ssn' => $encrypted_ssn,
                'us_resident' => $us_resident,
                'dl_passport' => $this->dl_passport,
                'military' => $military,
                'military_civilian' => $military_civilian,
            ]);

        } catch (\Throwable $th) {
            Log::error($th);
        }
        return redirect()->to('/start?application_id=' . $this->uuid);
    }

    public function render()
    {
        return view('livewire.application.edit.personal-information');
    }
}
