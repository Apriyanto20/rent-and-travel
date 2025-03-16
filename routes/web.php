<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalOptionsController;
use App\Http\Controllers\TransportationsController;
use App\Http\Controllers\TransportationsRouteController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
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
Route::get('/cek-nik', function (Request $request) {
    try {
        $nik = Request::get('nik'); // Gunakan input() atau query()

        if (!$nik) {
            return response()->json(['error' => 'NIK tidak boleh kosong'], 400);
        }

        $exists = DB::table('members')->where('nik', $nik)->exists();

        return response()->json(['exists' => $exists]);
    } catch (\Exception $e) {
        Log::error($e->getMessage()); // Log error ke Laravel Log
        return response()->json(['error' => 'Terjadi kesalahan server'], 500);
    }
});

Route::get('/cek-email', function (Request $request) {
    try {
        $email = Request::get('email'); // Gunakan input() atau query()

        if (!$email) {
            return response()->json(['error' => 'NIK tidak boleh kosong'], 400);
        }

        $exists = DB::table('members')->where('email', $email)->exists() ||
            DB::table('users')->where('email', $email)->exists();

        return response()->json(['exists' => $exists]);
    } catch (\Exception $e) {
        Log::error($e->getMessage()); // Log error ke Laravel Log
        return response()->json(['error' => 'Terjadi kesalahan server'], 500);
    }
});

Route::get('/cek-nik-driver', function (Request $request) {
    try {
        $nik = Request::get('nik'); // Gunakan input() atau query()

        if (!$nik) {
            return response()->json(['error' => 'NIK tidak boleh kosong'], 400);
        }

        $exists = DB::table('drivers')->where('nik', $nik)->exists();

        return response()->json(['exists' => $exists]);
    } catch (\Exception $e) {
        Log::error($e->getMessage()); // Log error ke Laravel Log
        return response()->json(['error' => 'Terjadi kesalahan server'], 500);
    }
});

Route::get('/cek-email-driver', function (Request $request) {
    try {
        $email = Request::get('email'); // Gunakan input() atau query()

        if (!$email) {
            return response()->json(['error' => 'NIK tidak boleh kosong'], 400);
        }

        $exists = DB::table('drivers')->where('email', $email)->exists() ||
            DB::table('users')->where('email', $email)->exists();

        return response()->json(['exists' => $exists]);
    } catch (\Exception $e) {
        Log::error($e->getMessage()); // Log error ke Laravel Log
        return response()->json(['error' => 'Terjadi kesalahan server'], 500);
    }
});

require __DIR__ . '/auth.php';
