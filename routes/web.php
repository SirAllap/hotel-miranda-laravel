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
    Route::get('/', 'show_all')->name('index');
    Route::get('/rooms', 'show_rooms_by_date')->name('rooms');
    Route::get('/room-details/{id}', 'show_one')->name('room-details');
    Route::post('/', [BookingController::class, 'store'])->name('room-details');
    Route::get('/offers', 'show_rooms_with_offer')->name('offers');
});

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'show')->name('contact');
    Route::post('/contact', 'store')->name('contact');
});
