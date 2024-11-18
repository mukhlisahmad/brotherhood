<?php

use Illuminate\Support\Facades\Route;
// landingpage
Route::get('/', [App\Http\Controllers\Landingpage\HomeController::class, 'index'])->name('land.home-index');



// auth login
Route::get('/login', [App\Http\Controllers\AuthController::class, 'Authview'])->name('auth.auth-index');
