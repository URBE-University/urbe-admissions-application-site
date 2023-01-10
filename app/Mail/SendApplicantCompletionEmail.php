<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendApplicantCompletionEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mdFile = "mail.send-applicant-completion-email";
        $subject = "Your application has been submitted!";
        if (app()->getLocale() == 'es') {
            $mdFile = "mail.send-applicant-completion-email-es";
            $subject = "Su aplicacion ha sido guardada - URBE University";
        }
        return $this->subject($subject)->markdown($mdFile);
    }
}
