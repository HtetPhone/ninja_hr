<?php

<<<<<<< HEAD
=======
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
>>>>>>> beforeJSValidate
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;


Auth::routes(['register' => 'false']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index');
});


<<<<<<< HEAD
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
=======
Route::controller(EmployeeController::class)->middleware(['auth'])->group(function() {
    Route::get('/employee', 'index')->name('employee.index');
    Route::get('/employee/search', 'search')->name('employee.search');
    Route::get('/employee/details/{employee:name}', 'details')->name('employee.details');
    Route::get('/employee/create', 'create')->name('employee.create');
    Route::post('/employee/create', 'store');
}); 
>>>>>>> beforeJSValidate
