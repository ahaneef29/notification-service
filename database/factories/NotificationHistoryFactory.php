<?php

namespace Database\Factories;

use App\Models\NotificationHistory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class NotificationHistoryFactory extends Factory
{
    protected $model = NotificationHistory::class;

    public function definition(): array
    {
        return [
            'message' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
