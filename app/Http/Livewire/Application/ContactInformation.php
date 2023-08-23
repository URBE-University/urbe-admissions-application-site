<?php

namespace App\Http\Livewire\Application;

use App\Mail\SendAdmissionsNewApplicationAlertEmail;
use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContactInformation extends Component
{

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

    public function save()
    {
        $uuid = Str::uuid();

        // Check the application doesn't exist
        if (Application::where('email', $this->email)->count() > 0) {
            $application = Application::where('email', $this->email)->first();
            return redirect()->route('application.continue', ['application' => $application->uuid, 'language' => app()->getLocale()]);
        }

        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'prev_name_q' => 'required',
            'email' => 'required|confirmed|email:dns',
            'phone' => 'required',
            'phone_code' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
        ]);

        try {
            $application = Application::create([
                'uuid' => $uuid,
                'step' => 2,
                'first_name' => ucfirst($this->first_name),
                'middle_name' => $this->middle_name,
                'last_name' => ucfirst($this->last_name),
                'prev_first_name' => ucfirst($this->prev_first_name),
                'prev_middle_name' => $this->prev_middle_name,
                'prev_last_name' => ucfirst($this->prev_last_name),
                'email' => $this->email,
                'phone_code' => $this->phone_code,
                'phone' => $this->phone,
                'street' => $this->street,
                'street_ext' => $this->street_ext,
                'city' => $this->city,
                'state' => $this->state,
                'zip' => $this->zip,
                'country' => $this->country,
                'lang' => app()->getLocale()
            ]);

            DB::table('application_log')->insert([
                'application_id' => $application->id,
                'description' => 'Contact information completed.'
            ]);
            Mail::to(config('internal.admissions.email'))->send(new SendAdmissionsNewApplicationAlertEmail());
        } catch (\Throwable $th) {
            Log::error($th);
        }

        return redirect()->to( '/' . app()->getLocale() . '/start?application_id=' . $uuid);
    }


    public function render()
    {
        return view('livewire.application.contact-information');
    }
}
