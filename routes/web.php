<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'home'])->name('homepage');
Route::get('/products/index', [PublicController::class, 'products_index'])->name('products_index');
Route::get('/products/create', [PublicController::class, 'products_create'])->name('products_create');
Route::post('/product/submit', [PublicController::class, 'product_submit'])->name('post_submit');



Route::get('/products/{song}/edit', [PublicController::class, 'products_edit'])->name('products_edit');
Route::put('/products/{song}', [PublicController::class, 'products_update'])->name('products_update');
Route::delete('/products/{song}', [PublicController::class, 'products_delete'])->name('products_delete');
Route::get('/products/{song}', [PublicController::class, 'products_show'])->name('products_show');


