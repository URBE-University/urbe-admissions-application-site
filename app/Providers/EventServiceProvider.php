<?php

namespace App\Providers;

use App\Events\ApplicationCompleted;
use Illuminate\Support\Facades\Event;
use App\Listeners\StripeEventListener;
use Illuminate\Auth\Events\Registered;
use Laravel\Cashier\Events\WebhookReceived;
use App\Listeners\SendEmailConfirmationToApplicant;
use App\Listeners\SendEmailNofiticationToAdmissions;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ApplicationCompleted::class => [
            SendEmailConfirmationToApplicant::class,
            SendEmailNofiticationToAdmissions::class,
        ],
        WebhookReceived::class => [
            StripeEventListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
