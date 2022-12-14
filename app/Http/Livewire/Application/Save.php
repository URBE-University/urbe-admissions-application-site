<?php

namespace App\Http\Livewire\Application;

use App\Mail\SendApplicationNotification;
use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;

class Save extends Component
{
    public $saveApplicationModal, $application;

    public function mount()
    {
        $this->application_email = Application::findorfail($this->application)->email;
        $this->application_uuid = Application::findorfail($this->application)->uuid;
    }

    public function save()
    {
        $url = config('app.url') . '/start?application_id=' . $this->application_uuid;
        Mail::to($this->application_email)->send(new SendApplicationNotification($url));
        return redirect()->route('application.saved');
    }

    public function render()
    {
        return view('livewire.application.save');
    }
}
