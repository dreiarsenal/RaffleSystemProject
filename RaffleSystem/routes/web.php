<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\WinnerController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Employee resource routes
Route::resource('employees', EmployeeController::class);

// Prize resource routes
Route::resource('prizes', PrizeController::class);

// Winner resource routes
Route::resource('winners', WinnerController::class);
