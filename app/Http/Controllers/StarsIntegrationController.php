<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class StarsIntegrationController extends Controller
{
    public function sync(Application $application)
    {
        try {

            Http::get(config('internal.stars.url'), [
                'task' => 'endadd',
                'SelComp' => config('internal.stars.company'),
                'SelResponse' => 'P',
                'BNJJTX' => $application->first_name,                           // applicant first name
                'BNJKTX' => substr($application->first_name, 0, 1),             // applicant middle initial
                'BNJITX' => $application->last_name,                            // applicant last name
                'BNQ0NB' => $application->phone,                                // applicant phone number
                'LM5EM1' => $application->email,                                // applicant email
                'COMMENTS' => "This lead was automatically added using the application platform.",
                'BNC1CD' => $application->zip,                                  // zip code
                'BNC2CD' => $application->program_code ?? "PG",                 // department code
                'BNQ6NB' => $application->concentration_code ?? 999999999999,   // Program code
                'BNHXCD' => '100'                                               // Lead origin code
            ]);

            session()->flash('flash.banner', 'We have successfully sincronized the lead with Stars Campus.');
            session()->flash('flash.bannerStyle', 'success');

        } catch (\Throwable $th) {

            Log::error($th);
            session()->flash('flash.banner', 'There has been an issue and we could not register the lead in Stars Campus. Please contact support for assistance.');
            session()->flash('flash.bannerStyle', 'danger');

        }

        return redirect()->route('applications.show', ['application' => $application->id]);
    }
}
