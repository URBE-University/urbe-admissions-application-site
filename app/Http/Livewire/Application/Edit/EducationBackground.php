<?php

namespace App\Http\Livewire\Application\Edit;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Log;

class EducationBackground extends Component
{
    public $editModal, $uuid, $application;
    public $education_level, $hs_name, $hs_city, $hs_country, $hs_completion_date, $ps_school_q, $ps_school_name, $ps_school_city, $ps_school_country,
    $ps_school_completion_date, $degree_earned;

    public function mount()
    {
        $this->application = Application::where('uuid', $this->uuid)->first();
        $this->education_level = $this->application->education_level;
        $this->hs_name = $this->application->hs_name;
        $this->hs_city = $this->application->hs_city;
        $this->hs_country = $this->application->hs_country;
        $this->hs_completion_date = $this->application->hs_completion_date;
        $this->ps_school_q = ($this->application->ps_school_name) ? 'yes' : 'no';
        $this->ps_school_name = $this->application->ps_school_name;
        $this->ps_school_city = $this->application->ps_school_city;
        $this->ps_school_country = $this->application->ps_school_country;
        $this->ps_school_completion_date = $this->application->ps_school_completion_date;
        $this->degree_earned = $this->application->degree_earned;
    }

    public function update()
    {
        $this->validate([
            'education_level' => 'required',
            'hs_name' => 'required',
            'hs_city' => 'required',
            'hs_country' => 'required',
            'hs_completion_date' => 'required',
        ]);

        try {

            $this->application->update([
                'education_level' => $this->education_level,
                'hs_name' => $this->hs_name,
                'hs_city' => $this->hs_city,
                'hs_country' => $this->hs_country,
                'hs_completion_date' => $this->hs_completion_date,
                'ps_school_name' => $this->ps_school_name,
                'ps_school_city' => $this->ps_school_city,
                'ps_school_country' => $this->ps_school_country,
                'degree_earned' => $this->degree_earned,
            ]);

        } catch (\Throwable $th) {
            Log::error($th);
        }

        return redirect()->to('/start?application_id=' . $this->uuid);
    }


    public function render()
    {
        return view('livewire.application.edit.education-background');
    }
}
