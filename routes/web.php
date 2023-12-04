<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RoomController::class, 'index'])->name('index');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/rooms', [RoomController::class, 'rooms'])->name('rooms');

Route::get('/offers', [OfferController::class, 'offers'])->name('offers');

Route::match(['get', 'post'], '/contact', [ContactController::class, 'contact'])->name('contact');
