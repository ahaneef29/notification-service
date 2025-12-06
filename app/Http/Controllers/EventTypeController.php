<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use App\Models\PreferredChannel;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    public function create(PreferredChannel $channel)
    {
        return inertia('settings/EventType/Index', [
            'eventTypes' => EventType::query()->get(),
            'channelPivotId' => $channel->users->first()->pivot->id,
            'channelPivot' => $channel->name
        ]);
    }

    public function update(Request $request)
    {
        dd($request->all());
    }


}
