<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;


Auth::routes(['register' => 'false']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index');
});


Route::get('/users', [UsersController::class, 'index'])->name('users.index');