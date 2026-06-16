<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return '<h1>StarFlow works!</h1>>'; });
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::post('/products/{product}/view',ProductViewController::class);
Route::post('/checkout',CheckoutController::class);
