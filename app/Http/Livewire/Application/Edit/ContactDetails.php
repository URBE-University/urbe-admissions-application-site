<?php

namespace App\Http\Livewire\Application\Edit;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Log;

class ContactDetails extends Component
{
    public $editModal;
    public $uuid;

    public  $first_name,
            $middle_name,
            $last_name,
            $prev_name_q = 'no',
            $prev_first_name,
            $prev_middle_name,
            $prev_last_name,
            $email,
            $email_confirmation,
            $phone,
            $phone_code,
            $street,
            $street_ext,
            $city,
            $state,
            $zip,
            $country;

    public function mount()
    {
        $this->application = Application::where('uuid', $this->uuid)->first();

        $this->first_name = $this->application->first_name;
        $this->middle_name = $this->application->middle_name;
        $this->last_name = $this->application->last_name;
        $this->prev_first_name = $this->application->prev_first_name;
        $this->prev_middle_name = $this->application->prev_middle_name;
        $this->prev_last_name = $this->application->prev_last_name;
        $this->email = $this->application->email;
        $this->email_confirmation = $this->application->email_confirmation;
        $this->phone = $this->application->phone;
        $this->phone_code = $this->application->phone_code;
        $this->street = $this->application->street;
        $this->street_ext = $this->application->street_ext;
        $this->city = $this->application->city;
        $this->state = $this->application->state;
        $this->zip = $this->application->zip;
        $this->country = $this->application->country;
    }

    public function update()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'prev_name_q' => 'required',
            'email' => 'required|confirmed',
            'phone' => 'required',
            'phone_code' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
        ]);

        try {

            $this->application->update([
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'prev_first_name' => $this->prev_first_name,
                'prev_middle_name' => $this->prev_middle_name,
                'prev_last_name' => $this->prev_last_name,
                'email' => $this->email,
                'phone_code' => $this->phone_code,
                'phone' => $this->phone,
                'street' => $this->street,
                'street_ext' => $this->street_ext,
                'city' => $this->city,
                'state' => $this->state,
                'zip' => $this->zip,
                'country' => $this->country,
            ]);

        } catch (\Throwable $th) {
            Log::error($th);
        }

        return redirect()->to('/start?application_id=' . $this->application->uuid);
    }

    public function render()
    {
        return view('livewire.application.edit.contact-details');
    }
}
