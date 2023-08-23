<?php

namespace App\Listeners;

use App\Events\ApplicationCompleted;
use App\Mail\SendApplicantCompletionEmail;
use Illuminate\Support\Facades\Mail;

class SendEmailConfirmationToApplicant
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ApplicationCompleted $event)
    {
        Mail::to($event->application->email)->send(new SendApplicantCompletionEmail($event->application));
    }
}
