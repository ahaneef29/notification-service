<?php

namespace App\Services;

use App\Models\category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class OptimizedProductService
{
    public function getProducts(): Collection
    {
        return Cache::remember('products', 5, function () { // Using cache to avoid repeated queries
            return Product::query() // Using query builder
            ->with(['category', 'reviews']) // `with` method will eager load the relationship
            ->withCount('reviews') // Sub select a query with a count.
            ->withAvg('reviews', 'rating')
                ->get() // Get the result
                ->transform(function (Product $product) {  // Using a higher order function to transform the result
                    return [
                        'id' => $product->id,
                        'name' => $product->name,
                        'category_name' => $product->category?->name, // Loading category with relationship
                        'review_count' => $product->reviews?->count(), // Loading Review with counting the result
                        'avg_rating' => round($product->reviews->avg('rating'), 1), // Loading Review with averaging the result
                    ];
                });
        });
    }
}
