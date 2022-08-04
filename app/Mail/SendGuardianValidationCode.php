<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendGuardianValidationCode extends Mailable
{
    use Queueable, SerializesModels;
    public $application, $guardian_code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($application, $guardian_code)
    {
        $this->application = $application;
        $this->guardian_code = $guardian_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.send-guardian-validation-code');
    }
}
