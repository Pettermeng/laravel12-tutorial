<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'homePage']);
Route::get('/contact', [UserController::class, 'contactPage']);

Route::get('/about', [UserController::class, 'index']);
Route::post('/submit-data', [UserController::class, 'submitData']);

// User
Route::get('/register', [UserController::class, 'register']);
Route::post('/submit-register', [UserController::class, 'submitRegister']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/submit-login', [UserController::class, 'submitLogin']);

Route::get('/user', [UserController::class, 'listUser']);
Route::get('/user-detail/{id}', [UserController::class, 'userDetail']);

Route::get('/update/{id}', [UserController::class, 'userUpdate']);
Route::post('/submit-update', [UserController::class, 'submitUpdate']);

Route::get('/delete/{id}', [UserController::class, 'userDelete']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UserController::class, 'admin']);
});
