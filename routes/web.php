<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalOptionsController;
use App\Http\Controllers\TransportationsController;
use App\Http\Controllers\TransportationsRouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('transportations', TransportationsController::class);
    Route::resource('merks', MerkController::class);
    Route::resource('rentalOptions', RentalOptionsController::class);
    Route::resource('members', MemberController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('transportationRoutes', TransportationsRouteController::class);
});

require __DIR__.'/auth.php';
