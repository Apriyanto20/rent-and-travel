<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SheduleTravel extends Model
{
    use HasFactory;
    protected $fillable = [
        'codeSchedule',
        'codeRoute',
        'codeDetailTransportation',
    ];

    protected $table = 'schedule_travel';
}
