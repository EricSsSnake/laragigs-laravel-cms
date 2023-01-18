<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\listingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [listingController::class, 'index']);

Route::get('/listings/create', [listingController::class, 'create'])->middleware('auth');

Route::post('/listings', [listingController::class, 'store'])->middleware('auth');

Route::get('/listings/{listing}/edit', [listingController::class, 'edit'])->middleware('auth');

Route::put('/listings/{listing}', [listingController::class, 'update'])->middleware('auth');

Route::delete('/listings/{listing}', [listingController::class, 'destroy'])->middleware('auth');

Route::get('/listings/manage', [listingController::class, 'manage']);

Route::get('/listings/{id}', [listingController::class, 'show']);

Route::get('/register', [userController::class, 'create'])->middleware('guest');

Route::post('/users', [userController::class, 'store'])->middleware('guest');

Route::post('/logout', [userController::class, 'logout'])->middleware('auth');

Route::get('/users/login', [userController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [userController::class, 'authenticate'])->middleware('guest');
