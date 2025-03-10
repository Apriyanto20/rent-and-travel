<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportationRoute extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeRoute',
        'route',
        'route_price',
    ];

    protected $table = 'transportation_route';
}
