<?php

namespace Database\Seeders;

use App\Models\EventType;
use App\Models\PreferredChannel;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EventTypeSeeder::class,
            PreferredChannelSeeder::class,
            ProductSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Haneef User',
            'email' => 'haneef@test.com',
            'password' => bcrypt('password'),
        ]);
    }
}
