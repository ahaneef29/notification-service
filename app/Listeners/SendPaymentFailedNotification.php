<?php

namespace App\Listeners;


use App\Events\OrderShipped;
use App\Events\PaymentFailed;
use App\Models\NotificationHistory;
use App\Notifications\OrderPlacedNotification;
use App\Notifications\OrderShippedNotification;
use App\Notifications\PaymentFailedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendPaymentFailedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PaymentFailed $event): void
    {
        Log::info('Payment Failed:'.$event->user->name);

        NotificationHistory::query()->create([
            'message' => 'Payment failed'
        ]);

        $event->user?->notify(new PaymentFailedNotification());
    }
}
