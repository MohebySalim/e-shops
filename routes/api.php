<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;

// Authentication (Token-Based for Mobile Apps)
Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('api.logout');

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('api.products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('api.products.show');

// Order Routes
Route::middleware('auth:api')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('api.orders.index'); // Fetch user orders
    Route::post('/orders', [OrderController::class, 'store'])->name('api.orders.store'); // Create an order
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('api.orders.show'); // View order details
});

// Cart Routes
Route::middleware('auth:api')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('api.cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('api.cart.store');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('api.cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('api.cart.destroy');
});

// Wishlist Routes
Route::middleware('auth:api')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('api.wishlist.index');
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('api.wishlist.store');
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('api.wishlist.destroy');
});

// Review Routes
Route::get('/products/{id}/reviews', [ReviewController::class, 'index'])->name('api.reviews.index');
Route::middleware('auth:api')->group(function () {
    Route::post('/reviews', [ReviewController::class, 'store'])->name('api.reviews.store');
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('api.reviews.update');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('api.reviews.destroy');
});

// Categories and Brands (Public API)
Route::get('/categories', [CategoryController::class, 'index'])->name('api.categories.index');
Route::get('/brands', [BrandController::class, 'index'])->name('api.brands.index');