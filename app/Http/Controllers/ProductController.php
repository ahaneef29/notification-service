<?php

namespace App\Http\Controllers;

use App\Services\FaultyProductService;
use App\Services\OptimizedProductService;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function faultyProducts(FaultyProductService $faultyProductService)
    {
        DB::enableQueryLog();

        $start = microtime(true);
        $startMemory = memory_get_usage(true);

        $products = $faultyProductService->getProducts();

        $end = microtime(true);
        $timeInMs = ($end - $start) * 1000;

        $finalMemory = memory_get_usage(true);

        // Calculate memory consumed by the query
        $memoryConsumedBytes = $finalMemory - $startMemory;

        $memoryConsumedMB = $memoryConsumedBytes / (1024 * 1024);

        $queries = DB::getQueryLog();

        return response()->json([
            'products' => $products,
            'total_queries' => count($queries),
            'duration_millisecond' => round($timeInMs, 2),
            'memory_mb' => round($memoryConsumedMB, 2)
        ]);
    }

    public function optimizedProducts(OptimizedProductService $optimizedProductService)
    {
        DB::enableQueryLog();

        $start = microtime(true);
        $startMemory = memory_get_usage(true);

        $products = $optimizedProductService->getProducts();

        $end = microtime(true);
        $timeInMs = ($end - $start) * 1000;

        $finalMemory = memory_get_usage(true);

        // Calculate memory consumed by the query
        $memoryConsumedBytes = $finalMemory - $startMemory;

        $memoryConsumedMB = $memoryConsumedBytes / (1024 * 1024);

        $queries = DB::getQueryLog();

        return response()->json([
            'products' => $products,
            'total_queries' => count($queries),
            'duration_millisecond' => round($timeInMs, 2),
            'memory_mb' => round($memoryConsumedMB, 2)
        ]);
    }
}
