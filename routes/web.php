<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

// Route to view users page
Route::get('users', function () {
    return view('users');
})->name('users');

Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');

// Authentication routes
Route::get('login', [UsersController::class, 'showLoginForm'])->name('login');
Route::post('login', [UsersController::class, 'login']);
Route::post('logout', [UsersController::class, 'logout'])->name('logout');
Route::resource('users', UsersController::class);

// Registration routes
Route::get('register', [UsersController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [UsersController::class, 'register']);

// User resource route (CRUD)
Route::resource('users', UsersController::class)->except(['create']);
