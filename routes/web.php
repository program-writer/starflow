<?php

use App\Http\Controllers\CompaniesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/companies', [CompaniesController::class, 'index']);
Route::get('/company/{id}', [CompaniesController::class, 'show']);
