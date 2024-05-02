 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticate;


// Route for creating a new user
Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('users/store', [UsersController::class, 'store'])->name('users.store');

// Authentication routes
Route::get('login', [UsersController::class, 'showLoginForm'])->name('login');
Route::post('login', [UsersController::class, 'login']);
Route::post('logout', [UsersController::class, 'logout'])->name('logout');

// Registration routes
Route::get('register', [UsersController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [UsersController::class, 'register']);

// User management routes
Route::middleware([Authenticate::class])->group(function () {

    // User resource routes CRUD
    Route::resource('users', UsersController::class)->except(['create', 'store']);
});
