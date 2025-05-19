<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSeat extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeDetailTransportation',
        'seat_code',
    ];

    protected $table = 'detail_seat';
}
