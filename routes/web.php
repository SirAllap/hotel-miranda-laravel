<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;

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

Route::controller(RoomController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/rooms', 'rooms')->name('rooms');
});

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/room-details/{id}', [BookingController::class, 'show'])->name('room-details.show');

Route::post('/', [BookingController::class, 'store'])->name('room-details.store');

Route::get('/offers', [OfferController::class, 'offers'])->name('offers');

Route::match(['get', 'post'], '/contact', [ContactController::class, 'contact'])->name('contact');
