<?php

use Illuminate\Support\Facades\Route;
// landingpage
Route::get('/', [App\Http\Controllers\Landingpage\HomeController::class, 'index'])->name('land.home-index');



// auth login
Route::get('/auth-signin', [App\Http\Controllers\AuthController::class, 'Authview'])->name('auth.auth-index');
Route::post('/auth-signin/post', [App\Http\Controllers\AuthController::class, 'AuthSignInPost'])->name('auth.auth-post');
Route::get('/auth-register', [App\Http\Controllers\AuthController::class, 'RegisterView'])->name('auth.register-index');
Route::post('/auth-register/post', [App\Http\Controllers\AuthController::class, 'AuthRegisterPost'])->name('auth.register-post');
Route::get('/auth-logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auth.auth-logout');

// user route
Route::get('/data-admin',[App\Http\Controllers\user\HomeController::class, 'index'])->name('user.user-index');
// product
Route::get('/data-product',[App\Http\Controllers\user\ProductController::class, 'index'])->name('product.product-index');
Route::get('/data-product/create',[App\Http\Controllers\user\ProductController::class, 'createProduct'])->name('product.product-create');
Route::get('/data-product/{code}/edit',[App\Http\Controllers\user\ProductController::class, 'editProduct'])->name('product.product-edit');
Route::post('/data-product/store',[App\Http\Controllers\user\ProductController::class, 'storeProduct'])->name('product.product-store');
Route::patch('/data-product/{code}/update',[App\Http\Controllers\user\ProductController::class, 'updateProduct'])->name('product.product-update');
Route::delete('/data-product/{code}/destroy',[App\Http\Controllers\user\ProductController::class, 'destroyProduct'])->name('product.product-destroy');

// websettings
Route::get('/system/setting',[App\Http\Controllers\WebSettingsController::class, 'index'])->name('system.setting-index');
Route::patch('/system/setting/update',[App\Http\Controllers\WebSettingsController::class, 'update'])->name('system.setting-update');

