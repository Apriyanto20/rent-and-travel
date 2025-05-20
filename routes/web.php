<?php

use App\Http\Controllers\DetailSeatController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalOptionsController;
use App\Http\Controllers\ScheduleTravelController;
use App\Http\Controllers\TransactionsRentalController;
use App\Http\Controllers\TransactionsTravelController;
use App\Http\Controllers\TransportationsController;
use App\Http\Controllers\TransportationsRentalDetailController;
use App\Http\Controllers\TransportationsRentalMotorcyleController;
use App\Http\Controllers\TransportationsRouteController;
use App\Http\Controllers\TransportationsTravelDetailController;
use App\Models\Drivers;
use App\Models\TransactionsRental;
use App\Models\TransactionsTravel;
use App\Models\TransportationsRentalDetail;
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

Route::get('/coba', function () {
    return view('coba');
})->middleware(['auth', 'verified'])->name('coba');

Route::get('/cobaLoop', function () {
    return view('cobaLoop');
})->middleware(['auth', 'verified'])->name('cobaLoop');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('transportations', TransportationsController::class);
    Route::resource('merks', MerkController::class);
    Route::resource('rentalOptions', RentalOptionsController::class);
    Route::resource('members', MemberController::class);
    Route::get('drivers/export/', [DriverController::class, 'export'])->name('drivers.export');
    Route::resource('drivers', DriverController::class);
    Route::resource('transportationRoutes', TransportationsRouteController::class);

    Route::resource('transportationsRental', TransportationsRentalDetailController::class);
    Route::resource('transportationsRentalMotorcycle', TransportationsRentalMotorcyleController::class);
    Route::resource('detailSeat', DetailSeatController::class);
    Route::resource('trasnportationsTravel', TransportationsTravelDetailController::class);
    Route::resource('scheduleTravel', ScheduleTravelController::class);
    Route::resource('transactionsTravel', TransactionsTravelController::class);
    Route::resource('transactionsRental', TransactionsRentalController::class);

    Route::get('/generate-code-detail/{type}', [TransportationsRouteController::class, 'generateCodeDetail']);
    Route::get('/transportations-rental/{slug}', [TransportationsRouteController::class, 'category'])->name('transportationsRental.category');
    Route::get('/transactionsRental/create/{codeDetailTransportation}', [TransactionsRentalController::class, 'create'])->name('transactionsRental.create.withCode');
    Route::put('/transactions-rental/{id}', [TransactionsRentalController::class, 'updateStatus'])->name('transactionsRental.updateStatus');
    Route::put('/transactions-rental/{id}/update-pembayaran', [TransactionsRentalController::class, 'updatePembayaran'])->name('transactionsRental.updatePembayaran');
    Route::post('/transactions-rental/{id}/auto-cancel', [TransactionsRentalController::class, 'autoCancel']);
    Route::post('/transactions/check-expired', [TransactionsRentalController::class, 'checkExpired'])->name('transactions.checkExpired');
    Route::get('/get-driver/{nik}', function ($nik) {
        $driver = Drivers::where('nik', $nik)->first();

        if (!$driver) {
            return response()->json(['error' => 'Driver tidak ditemukan'], 404);
        }

        return response()->json([
            'experience' => $driver->workExperience,
            'prices' => $driver->prices,
        ]);
    });
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
