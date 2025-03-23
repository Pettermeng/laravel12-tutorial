<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [UserController::class, 'homePage']);
Route::get('/contact', [UserController::class, 'contactPage']);

Route::get('/about', [UserController::class, 'index']);
Route::post('/submit-data', [UserController::class, 'submitData']);
