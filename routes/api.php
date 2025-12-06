<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('test/order-placed', [OrderController::class, 'store']);
Route::get('products/faulty', [ProductController::class, 'faultyProducts']);
Route::get('products/optimized', [ProductController::class, 'optimizedProducts']);
