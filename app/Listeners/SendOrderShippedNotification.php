<?php

namespace App\Listeners;


use App\Events\OrderShipped;
use App\Models\NotificationHistory;
use App\Notifications\OrderPlacedNotification;
use App\Notifications\OrderShippedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendOrderShippedNotification
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
    public function handle(OrderShipped $event): void
    {
        Log::info('Order Shipped:'.$event->user->name);

        NotificationHistory::query()->create([
            'message' => 'Order shipped successfully'
        ]);

        $event->user?->notify(new OrderShippedNotification());
    }
}
