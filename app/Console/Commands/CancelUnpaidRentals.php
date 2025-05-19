<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TransactionsRental;
use Carbon\Carbon;

class CancelUnpaidRentals extends Command
{
    protected $signature = 'rental:cancel-unpaid';
    protected $description = 'Batalkan rental yang belum dibayar dalam 6 menit';

    public function handle()
    {
        $expiredRentals = TransactionsRental::where('paymentStatus', 'WAITING FOR PAYMENT')
            ->where('rentalStatus', 'WAITING FOR PAYMENT')
            ->whereNull('proofOfPayment')
            ->where('created_at', '<=', Carbon::now()->subMinutes(1))
            ->get();

        foreach ($expiredRentals as $rental) {
            $rental->paymentStatus = 'BATAL';
            $rental->rentalStatus = 'BATAL';
            $rental->save();

            // Optional: Set kendaraan dan driver jadi tersedia lagi
            if ($rental->codeDetailTransportation) {
                $kendaraan = \App\Models\TransportationsRentalDetail::where('codeDetailTransportation', $rental->codeDetailTransportation)->first();
                if ($kendaraan) {
                    $kendaraan->vehicle_statuses = 'TERSEDIA';
                    $kendaraan->save();
                }
            }

            if ($rental->driverCode) {
                $driver = \App\Models\Drivers::where('nik', $rental->driverCode)->first();
                if ($driver) {
                    $driver->status = 'TERSEDIA';
                    $driver->save();
                }
            }
        }

        $this->info("Berhasil membatalkan " . count($expiredRentals) . " rental.");
    }
}
