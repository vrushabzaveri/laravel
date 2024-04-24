<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

// Route for displaying the registration form
// Route::get('/register', function () {
//     return view('view');
// })->name('register');


/*
Route::get('/', function() {
    return view('index');
});
*/
// first route define, then create layout using blade.php, use methods in controller  
Route::resource('users', UsersController::class);
//Route::get('/users', [UsersController::class, 'index'])->name('users.index');

?>
