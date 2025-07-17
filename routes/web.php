<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Halaman Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Halaman Produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Keranjang
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('/clear-cart', function () {
    session()->forget('cart');
    return redirect()->route('home')->with('success', 'Cart berhasil dikosongkan');
});

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

