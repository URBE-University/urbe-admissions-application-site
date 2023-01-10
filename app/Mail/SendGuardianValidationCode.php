<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

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
        $mdFile = "mail.send-guardian-validation-code";
        $subject = "Verification code - URBE University Admissions Application";
        if (app()->getLocale() == 'es') {
            $mdFile = "mail.send-guardian-validation-code-es";
            $subject = "Código de verificación - Aplicacion a URBE University";
        }
        return $this->markdown($mdFile)->subject($subject);
    }
}
