<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

// Default homepage route
Route::get('/', [ProductController::class, 'index']);  // Products page as the homepage

// Product routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

// Cart routes
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'store']);
Route::put('/cart/update', [CartController::class, 'update']);
Route::delete('/cart/remove/{id}', [CartController::class, 'destroy']);

// Checkout routes
Route::get('/checkout', [OrderController::class, 'create']);
Route::post('/checkout', [OrderController::class, 'store']);

// Order routes
Route::get('/orders', [OrderController::class, 'index']); 

// Admin Routes for Products
Route::get('/admin/products', 'Admin\ProductController@index')->name('admin.products.index');
Route::get('/admin/products/create', 'Admin\ProductController@create')->name('admin.products.create');
Route::post('/admin/products', 'Admin\ProductController@store')->name('admin.products.store');
Route::get('/admin/products/{id}/edit', 'Admin\ProductController@edit')->name('admin.products.edit');
Route::put('/admin/products/{id}', 'Admin\ProductController@update')->name('admin.products.update');
Route::delete('/admin/products/{id}', 'Admin\ProductController@destroy')->name('admin.products.destroy');