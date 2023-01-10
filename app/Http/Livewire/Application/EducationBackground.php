<?php

namespace App\Http\Livewire\Application;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Log;

class EducationBackground extends Component
{
    public  $application, $uuid, $education_level,
            $hs_name, $hs_city, $hs_country, $hs_completion_date,
            $ps_school_q = "no", $ps_school_name, $ps_school_city, $ps_school_country,
            $ps_school_completion_date, $degree_earned;

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
            'education_level' => 'required',
            'hs_name' => 'required',
            'hs_city' => 'required',
            'hs_country' => 'required',
            'hs_completion_date' => 'required',
        ]);

        try {

            $this->application->update([
                'step' => 5,
                'education_level' => $this->education_level,
                'hs_name' => $this->hs_name,
                'hs_city' => $this->hs_city,
                'hs_country' => $this->hs_country,
                'hs_completion_date' => $this->hs_completion_date,
                'ps_school_name' => $this->ps_school_name,
                'ps_school_city' => $this->ps_school_city,
                'ps_school_country' => $this->ps_school_country,
                'degree_earned' => $this->degree_earned,
                'lang' => app()->getLocale()
            ]);

        } catch (\Throwable $th) {
            Log::error($th);
        }

        return redirect()->to( '/' . app()->getLocale() . '/start?application_id=' . $this->uuid);
    }

    public function render()
    {
        return view('livewire.application.education-background');
    }
}
