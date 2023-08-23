<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendApplicationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mdFile = "mail.send-application-notification";
        $subject = "Your application has been saved - URBE University";
        if (app()->getLocale() == 'es') {
            $mdFile = "mail.send-application-notification-es";
            $subject = "Su aplicacion ha sido guardada - URBE University";
        }
        return $this->subject($subject)->markdown($mdFile);
    }
}
