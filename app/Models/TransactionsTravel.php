<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsTravel extends Model
{
    use HasFactory;
    protected $fillable = [
        'codeSchedule',
        'seat_code',
        'nik',
        'name',
        'price',
        'paymentStatus',
        'paymentMethod',
        'rentalStatus',
        'proofOfPayment',
        'notes',
    ];

    protected $table = 'transactions_travel';
}
