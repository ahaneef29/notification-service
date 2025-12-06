<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'rating' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'comment' => $this->faker->sentence(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'product_id' => Product::factory(),
        ];
    }
}
