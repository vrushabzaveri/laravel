
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticate;


// Route for creating a new user
Route::get('users/create', [UsersController::class, 'create'])->name('users.create');


// Authentication routes
Route::get('login', [UsersController::class, 'showLoginForm'])->name('login');
Route::post('login', [UsersController::class, 'login']);
Route::post('logout', [UsersController::class, 'logout'])->name('logout');

// Registration routes
Route::get('register', [UsersController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [UsersController::class, 'register']);

// User management routes
Route::middleware([Authenticate::class])->group(function () {
    // View users page and edit user routes
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::get('users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');

    // User resource routes (CRUD)
    Route::resource('users', UsersController::class)->except(['create', 'store']);
});



