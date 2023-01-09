<?php

namespace App\Http\Livewire\Admin\Applications;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendApplicationNotification;

class Show extends Component
{
    public $application;

    public function mount($language, Application $application)
    {
        $this->application = $application;
    }

    public function sendApplicationLink()
    {
        $url = config('app.url') . '/' . $this->application->lang . '/start?application_id=' . $this->application->uuid;
        Mail::to($this->application->email)->send(new SendApplicationNotification($url));
        session()->flash('flash.banner', 'An application email was successfully sent to ' . $this->application->email);
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('applications.show', ['application' => $this->application->id, 'language' => 'en']);
    }

    public function markPaid()
    {
        $this->application->update([
            'received_payment' => 1
        ]);
        return redirect()->route('applications.show', ['application' => $this->application->id, 'language' => 'en']);
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
