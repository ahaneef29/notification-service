<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('event_types')->truncate();

        DB::table('event_types')->insert([
            [
                'name' => 'Order Placed',
                'value' => 'order_placed',
            ],
            [
                'name' => 'Order Shipped',
                'value' => 'order_shipped',
            ],
            [
                'name' => 'Payment Failed',
                'value' => 'payment_failed',
            ]
        ]);
    }
}
