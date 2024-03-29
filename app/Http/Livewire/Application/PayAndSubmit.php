<?php

namespace App\Http\Livewire\Application;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\App;

class PayAndSubmit extends Component
{
    public $uuid, $application;

    public function mount()
    {
        if (! isset($this->uuid)) {
            return redirect()->to('/');
        }
        $this->application = Application::where('uuid', $this->uuid)->first();
    }

    /**
     * Submit application without payment
     */
    public function save()
    {
        return redirect()->route('application.completed', ['application' => $this->uuid, 'language' => app()->getLocale()]);
    }

    /**
     * Pay and submit application
     */
    public function pay()
    {
        $this->application->createOrGetStripeCustomer([
            'name' => $this->application->first_name . ' ' . $this->application->last_name,
            'email' => $this->application->email,
            'phone' => $this->application->phone,
        ]);

        return $this->application->checkout([config('internal.application.product') => 1], [
            'locale' => App::getLocale(),
            'success_url' => route('application.completed', ['language' => app()->getLocale(), 'application' => $this->uuid]),
            'cancel_url' => route('application.start', ['language' => app()->getLocale(), 'application_id=' . $this->uuid]),
        ]);
    }

    public function render()
    {
        return view('livewire.application.pay-and-submit');
    }
}
