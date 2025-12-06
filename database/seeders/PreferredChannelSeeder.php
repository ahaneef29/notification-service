<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreferredChannelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('preferred_channels')
            ->insert([
                [
                    'name' => 'Email',
                    'channel_name' => 'email',
                ],
                [
                    'name' => 'SMS',
                    'channel_name' => 'sms',
                ],
            ]);
    }
}
