<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Review::truncate();
        Product::truncate();
        Category::truncate();

        Product::factory()
            ->recycle(Category::factory()->count(10)->create())
            ->count(100)
            ->create();

        $products = Product::all();
        $reviewsNeeded = 1500;
        $perProduct = floor($reviewsNeeded / $products->count());
//        dd($perProduct);

        foreach ($products as $product) {
            Review::factory($perProduct)->create([
                'product_id' => $product->id,
            ]);
        }
    }
}
