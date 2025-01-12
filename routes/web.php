<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'login');

Route::view('/login', 'login')->name('login');

Route::view('/register', 'register');

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/hotel/{hotel}/rooms', [HotelController::class, 'showRooms'])->name('hotel.rooms')->middleware('auth');

Route::post('/room/{room}', [RoomController::class, 'bookRoom'])->name('book')->middleware('auth');

Route::resource('hotel', HotelController::class)->middleware('auth');

Route::resource('room', RoomController::class)->middleware('auth');
