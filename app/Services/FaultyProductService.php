<?php

namespace App\Services;

use App\Models\category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Collection;

class FaultyProductService
{
    public function getProducts(): Collection
    {
        $products = Product::all();
           /*
            * Mistakes
            * 1. Calling `all` method, which will cause a memory leak if the table is large.
            * 2. Not using eager loading or where clause.
            * 3. Not using pagination.
            * */

        foreach ($products as $product) {
            $product->category_name = Category::find($product->category_id)->name;
            /*
             * Mistake
             *  1. Loading category by id instead of using relationship.
             *  2. This will cause N+1 query problem.
             *  3. Creating a new product attribute `category_name`
             * */
            $product->review_count = Review::where('product_id', $product->id)->count();
            /*
             * Mistake
             *  1. Loading Review by product_id instead of using relationship and counting the result.
             *  2. This will cause N+1 query problem.
             *  3. Creating a new product attribute `review_count`
             * */
            $product->avg_rating = Review::where('product_id', $product->id)->avg('rating');
            /*
            * Mistake
            *  1. Loading Review by product_id instead of using relationship and averaging the result.
            *  2. This will cause N+1 query problem.
            *  3. Creating a new product attribute `avg_rating`
            * */
        }

        return $products;
    }
}
