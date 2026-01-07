<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'home'])->name('homepage');
Route::get('/products/index', [PublicController::class, 'products_index'])->name('products_index');
Route::get('/products/create', [PublicController::class, 'products_create'])->name('products_create');
Route::post('/product/submit', [PublicController::class, 'product_submit'])->name('post_submit');

