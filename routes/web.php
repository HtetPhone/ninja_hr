<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Auth::routes(['register' => 'false']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index');
});
