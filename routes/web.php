<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController; // Ensure this line is correct and the class exists in the specified namespace
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('home');
});

// Home and Static Pages
Route::get('/', [DashboardController::class, 'index'])->name('home');

// Authentication (Session-Based)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (For Authenticated Web Users)
Route::get('/admin-dashboard', [DashboardController::class, 'adminDashboard'])->middleware('auth')->name('admin.dashboard');
Route::get('/seller-dashboard', [DashboardController::class, 'sellerDashboard'])->middleware('auth')->name('seller.dashboard');
Route::get('/customer-dashboard', [DashboardController::class, 'customerDashboard'])->middleware('auth')->name('customer.dashboard');

// Product Management (For Admin and Seller)
Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index'); // List products
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // Show create form
    Route::post('/products', [ProductController::class, 'store'])->name('products.store'); // Save new product
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit'); // Show edit form
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update'); // Update product
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy'); // Delete product
});

// Categories and Brands (For Admin)
Route::middleware('auth')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
});