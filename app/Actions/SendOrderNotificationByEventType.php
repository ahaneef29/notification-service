<?php

namespace App\Actions;

use App\Enums\EventTypeEnum;
use App\Events\OrderPlaced;
use App\Events\OrderShipped;
use App\Events\PaymentFailed;
use App\Models\User;

class SendOrderNotificationByEventType
{
    public function handle(User $user): void
    {
        $user->load(['preferredChannelUsers.eventTypes']);
        $user->preferredChannelUsers()->get()->each(function ($preferredChannelUser) use ($user) {
            $preferredChannelUser->eventTypes->each(function ($eventType) use ($user) {
                match ($eventType->value) {
                    EventTypeEnum::OrderPlaced->value => event(new OrderPlaced($user)),
                    EventTypeEnum::OrderShipped->value => event(new OrderShipped($user)),
                    EventTypeEnum::PaymentFailed->value => event(new PaymentFailed($user)),
                    default => null
                };
            });
        });
    }
}
