<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\listingController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

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

Route::redirect('/', '/en');

Route::group(['prefix' => '{lang}'], function () {

    Route::get('/', [listingController::class, 'index'])->name('index');

    Route::get('/listings/create', [listingController::class, 'create'])->middleware('auth')->name('listingsCreate');

    Route::post('/listings', [listingController::class, 'store'])->middleware('auth')->name('listingsStore');

    Route::get('/listings/{listing}/edit', [listingController::class, 'edit'])->middleware('auth')->name('listingsEdit');

    Route::put('/listings/{listing}', [listingController::class, 'update'])->middleware('auth')->name('listingsUpdate');

    Route::delete('/listings/{listing}', [listingController::class, 'destroy'])->middleware('auth')->name('listingsDestroy');

    Route::get('/listings/manage', [listingController::class, 'manage'])->name('manage');

    Route::get('/listings/{id}', [listingController::class, 'show'])->name('show');

    Route::get('/register', [userController::class, 'create'])->name('register')->middleware('guest');

    Route::post('/users', [userController::class, 'store'])->name('users')->middleware('guest');

    Route::post('/logout', [userController::class, 'logout'])->name('logout')->middleware('auth');

    Route::get('/users/login', [userController::class, 'login'])->name('login')->middleware('guest');

    Route::post('/users/authenticate', [userController::class, 'authenticate'])->name('authenticate')->middleware('guest');
});
