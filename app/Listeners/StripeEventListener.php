<?php
namespace App\Listeners;

use App\Models\Application;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
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
     * Handle received Stripe webhooks.
     *
     * @param  \Laravel\Cashier\Events\WebhookReceived  $event
     * @return void
     */
    public function handle(WebhookReceived $event)
    {
        if ($event->payload['type'] === 'charge.succeeded') {
            // Handle the payment completed here.
            if ($event->payload['data']['object']['paid'] === true) {
                $application = Application::where('stripe_id', $event->payload['data']['object']['customer'])->first();
                $application->update(['received_payment' => 1]);
            }
        }
    }
}
