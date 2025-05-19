<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsRental extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'codeTransaction',
        'memberCode',
        'codeRentalOption',
        'codeDetailTransportation',
        'driverCode',
        'rentalStartDate',
        'rentalEndDate',
        'rentalCost',
        'paymentStatus',
        'paymentMethod',
        'rentalStatus',
        'proofOfPayment',
        'notes',
    ];

    protected $table = 'transactions_rental';

    public static function createCode()
    {
        $latestRecord = self::orderByRaw("CAST(SUBSTRING(codeTransaction, 3, LENGTH(codeTransaction) - 2) AS UNSIGNED) DESC")->first();
        $latestCodeNumber = optional($latestRecord)->codeTransaction;
        $nextCodeNumber = $latestCodeNumber ? intval(substr($latestCodeNumber, 2)) + 1 : 1;
        return 'TR' . str_pad($nextCodeNumber, 5, '0', STR_PAD_LEFT);
    }

    public function member()
    {
        return $this->belongsTo(Members::class, 'memberCode', 'nik');
    }

    public function transportationRental()
    {
        return $this->belongsTo(TransportationsRentalDetail::class, 'codeDetailTransportation', 'codeDetailTransportation');
    }
}
