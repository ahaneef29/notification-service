<?php

namespace App\Http\Controllers;

use App\Actions\SendOrderNotificationByEventType;
use App\Events\OrderPlaced;
use App\Models\User;

class OrderController extends Controller
{
    public function store(SendOrderNotificationByEventType $sendOrderNotificationByEventType)
    {
        $user = User::query()->find(1);

        $sendOrderNotificationByEventType->handle($user);

        return response()
            ->json([
                'message' => 'Order Event Sent'
            ]);
    }
}
