<?php

namespace App\Actions;

use App\Events\OrderPlaced;
use App\Models\User;

class SendOrderNotificationByEventType
{
    public function handle(User $user)
    {
        $user->load(['preferredChannelUsers.eventTypes']);
        dd($user->preferredChannelUsers()->get()->each(function ($preferredChannelUser) {
            dd($preferredChannelUser->eventTypes->each(function ($eventType) {
                dd($eventType);
            }));
        }));
        //event(new OrderPlaced($user));
    }
}
