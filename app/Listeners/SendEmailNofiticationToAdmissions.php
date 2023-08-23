<?php

namespace App\Listeners;

use App\Events\ApplicationCompleted;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendAdmissionsNotificationEmail;

class SendEmailNofiticationToAdmissions
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
        Mail::to(config('internal.admissions.email'))->send(new SendAdmissionsNotificationEmail($event->application));
    }
}
