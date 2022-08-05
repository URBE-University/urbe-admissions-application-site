<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Browsershot\Browsershot;
use App\Events\ApplicationCompleted;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public $form_step_text;

    public function index(Request $request)
    {

        if ($request->query('application_id') ) {

            if ( ! Application::where('uuid', $request->query('application_id'))->exists() ) {
                return redirect('/application-not-found');
            }

            $application = Application::where('uuid', $request->query('application_id'))->first();
            $step = ($request->has('edit_step')) ? $request->query('edit_step') : $application->step;

            switch ($step) {
                case '1':
                    $this->form_step_text = 'contact-information';
                    break;

                case '2':
                    $this->form_step_text = 'personal-information';
                    break;

                case '3':
                    $this->form_step_text = 'program-of-interest';
                    break;

                case '4':
                    $this->form_step_text = 'education-background';
                    break;

                case '5':
                    $this->form_step_text = 'work-history';
                    break;

                case '6':
                    $this->form_step_text = 'upload-documents';
                    break;

                case '7':
                    $this->form_step_text = 'review-application';
                    break;

                case '8':
                    $this->form_step_text = 'sign';
                    break;

                case '9':
                    $this->form_step_text = 'pay-and-submit';
                    break;

                default:
                    $this->form_step_text = 'contact-information';
                    break;
            }
        } else {
            $this->form_step_text = 'contact-information';
        }
        return view('web.application.application', [
            'form_step_text' => $this->form_step_text,
            'form_step_number' => $application->step ?? 1,
            'uuid' => $request->query('application_id') ?? null,
        ]);
    }

    public function not_found()
    {
        return view('web.application.not-found');
    }

    public function saved()
    {
        return view('web.application.saved');
    }

    /**
     * Process application completion
     */
    public function completed($application)
    {
        $application = Application::where('uuid', $application)->first();

        // Send completion confirmation to applicant and admissions
        event(new ApplicationCompleted($application));

        // Return completion view
        return view('web.application.completed', [
            'uuid' => $application->uuid,
        ]);
    }

    /**
     * Download completed application
     */
    public function download(Application $application)
    {
        $html = view('pdf.signed-application', ['application' => $application])->render();
        $pdf = BrowserShot::html($html)
            ->format('Letter')
            ->showBackground()
            ->margins(15, 15, 24, 15)
            ->pdf();
        header('Content-Type: application/pdf');
        echo $pdf;
    }
}
