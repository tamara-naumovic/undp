<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


Route::get('/', function() {
    return view('index');
});

Route::get('/shop', [ProductController::class, 'index'])
    ->name('shop');
    
Route::get('/shop/{product}', [ProductController::class, 'show'])
    ->name('product');

Route::get('/cart', [CartController::class, 'cart'])
    ->name('add.to.cart');

Route::get('/add-to-cart/{product}', [CartController::class, 'addToCart'])
    ->name('add.to.cart');

Route::get('/delete-from-cart/{product}', [CartController::class, 'delete'])
    ->name('delete.from.cart');

Route::post('/update-from-cart', [CartController::class, 'update'])
    ->name('update.from.cart');



