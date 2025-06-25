<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;

Route::get('/', [PropertyController::class, 'index'])->name('home');
Route::resource('properties', PropertyController::class)->only(['index', 'show']);

Route::prefix('admin')->group(function () {
    Route::get('properties/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('properties', [AdminController::class, 'store'])->name('admin.store');
});

Route::post('properties/{property}/bookings', [BookingController::class, 'store'])
    ->name('bookings.store');