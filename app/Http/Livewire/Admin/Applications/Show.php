<?php

namespace App\Http\Livewire\Admin\Applications;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendApplicationNotification;

class Show extends Component
{
    public $application, $sendApplicationLinkModal, $email;

    public function mount($language, Application $application)
    {
        $this->application = $application;
        $this->email = $this->application->email;
    }

    public function sendApplicationLink()
    {
        $this->validate([
            'email' => 'required|email|email:dns'
        ]);

        if (!$this->application->lang) {
            $this->application->update(['lang' => 'en']);
        }

        $url = config('app.url') . '/' . $this->application->lang . '/start?application_id=' . $this->application->uuid;
        Mail::to($this->email)->send(new SendApplicationNotification($url));
        session()->flash('flash.banner', 'An application email was successfully sent to ' . $this->email);
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
