<?php

namespace App\Http\Livewire\Application;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ReviewApplication extends Component
{
    public $uuid, $application;

    public function mount()
    {
        if (! isset($this->uuid)) {
            return redirect()->to('/');
        }
        $this->application = Application::where('uuid', $this->uuid)->first();
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

    public function save()
    {
        try {
            $this->application->update([
                'step' => $this->application->step + 1,
            ]);
            DB::table('application_log')->insert([
                'application_id' => $this->application->id,
                'description' => 'Application review completed.'
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }
        return redirect()->to( '/' . app()->getLocale() . '/start?application_id=' . $this->uuid);
    }

    public function render()
    {
        return view('livewire.application.review-application');
    }
}
