<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::get('search', [ProductController::class, 'search'])->name('products.search');

Route::get('/', function () {
    return view('welcome');
});
