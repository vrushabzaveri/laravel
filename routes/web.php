<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

// Applied middleware auth to all routes 
//(except login, logout, register)
Route::group(['middleware' => 'auth'], function () {

    // Route to view users page
    Route::get('users', [UsersController::class, 'index'])->name('users');

    // Route to edit a user
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');

    // User resource route (CRUD) - exclude create (handled separately)
    Route::resource('users', UsersController::class)->except(['create']);

});

// Authentication and Registration routes (without middleware)
Route::get('login', [UsersController::class, 'showLoginForm'])->name('login');
Route::post('login', [UsersController::class, 'login']);
Route::post('logout', [UsersController::class, 'logout'])->name('logout');

Route::get('register', [UsersController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [UsersController::class, 'register']);

// User creation route 
Route::get('users/create', [UsersController::class, 'create'])->name('users.create');  // Create route
Route::post('users', [UsersController::class, 'store']);  // Store method for create
