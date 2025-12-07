<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use App\Models\PreferredChannel;
use App\Models\PreferredChannelUser;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    public function create(PreferredChannel $channel)
    {
        $preferredChannelUser = $channel->preferredChannelUsers()->first()->load('eventTypes');
        return inertia('settings/EventType/CreateOrUpdate', [
            'eventTypes' => EventType::query()->get(),
            'preferredChannelUser' => $preferredChannelUser,
            'selectedEvenTypeIds' => $preferredChannelUser->eventTypes()->pluck('event_type_id')?->toArray(),
            'channelName' => $channel->name
        ]);
    }

    public function update(Request $request)
    {
        $preferredChannelUser = PreferredChannelUser::where('preferred_channel_users.id', $request->preferredChannelUserId)->first();
        $preferredChannelUser->eventTypes()->sync($request->eventTypes);
        return to_route('event-type.create', [$preferredChannelUser->preferredChannel->id]);
    }


}
