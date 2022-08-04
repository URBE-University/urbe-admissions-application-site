<?php

namespace App\Http\Livewire\Admin\Applications;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;

class Show extends Component
{
    public $application;

    public function mount(Application $application)
    {
        $this->application = $application;
    }

    public function downloadResume()
    {
        return ($this->application->resume_url) ? Storage::download('resumes/' . $this->application->resume_url) : null;
    }

    public function downloadTranscript()
    {
        return ($this->application->official_transcripts_url) ? Storage::download('transcripts/' . $this->application->official_transcripts_url) : null;
    }

    public function downloadDiploma()
    {
        return ($this->application->hs_bs_diploma_url) ? Storage::download('diplomas/' . $this->application->hs_bs_diploma_url) : null;
    }

    public function downloadId()
    {
        return ($this->application->id_url) ? Storage::download('ids/' . $this->application->id_url) : null;
    }

    public function render()
    {
        return view('livewire.admin.applications.show');
    }
}
