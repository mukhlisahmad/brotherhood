<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Landingpage\HomeController::class, 'index'])->name('land.home-index');
