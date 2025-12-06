<?php

namespace App\Http\Controllers;

use App\Events\OrderPlaced;
use App\Models\User;

class OrderController extends Controller
{
    public function store()
    {
        $user = User::query()->find(1);

        event(new OrderPlaced($user));

        return response()
            ->json([
                'message' => 'Order placed successfully'
            ]);
    }
}
