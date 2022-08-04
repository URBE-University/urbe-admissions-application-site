<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendApplicantValidationCode extends Mailable
{
    use Queueable, SerializesModels;

    public $applicant_code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($applicant_code)
    {
        $this->applicant_code = $applicant_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.send-applicant-validation-code');
    }
}
