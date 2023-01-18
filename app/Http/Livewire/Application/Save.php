<?php

namespace App\Http\Livewire\Application;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendApplicationNotification;

class Save extends Component
{
    public $saveApplicationModal, $application, $application_email, $application_uuid, $collection;

    public function mount()
    {
        $this->collection = Application::findorfail($this->application);
        $this->application_email = $this->collection->email;
        $this->application_uuid = $this->collection->uuid;
    }

    public function save()
    {
        $this->collection->update([
            'lang' => App::getLocale(),
        ]);
        $url = config('app.url') . '/' . $this->collection->lang . '/start?application_id=' . $this->application_uuid;
        DB::table('application_log')->insert([
            'application_id' => $this->application->id,
            'description' => 'Application saved!'
        ]);
        Mail::to($this->application_email)->send(new SendApplicationNotification($url));
        return redirect()->route('application.saved', ['language' => app()->getLocale()]);
    }

    public function render()
    {
        return view('livewire.application.save');
    }
}
