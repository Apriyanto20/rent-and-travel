<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsRental extends Model
{
    use HasFactory;
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
}
