<?php

namespace App\Http\Livewire\Application;

use Livewire\Component;
use App\Models\Application;

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
        return redirect()->route('application.completed', ['application' => $this->uuid]);
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

        return $this->application->checkout(['price_1KVi81GdZW6fMUNzksyf7rG3' => 1], [
            'success_url' => route('application.completed', ['application' => $this->uuid]),
            'cancel_url' => route('application.start', ['application_id=' . $this->uuid]),
        ]);
    }

    public function render()
    {
        return view('livewire.application.pay-and-submit');
    }
}
