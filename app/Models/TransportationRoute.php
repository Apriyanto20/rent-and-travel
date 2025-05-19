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

    public static function createCode()
    {
        $latestRecord = self::orderByRaw("CAST(SUBSTRING(codeRoute, 3, LENGTH(codeRoute) - 2) AS UNSIGNED) DESC")->first();
        $latestCodeNumber = optional($latestRecord)->codeRoute;
        $nextCodeNumber = $latestCodeNumber ? intval(substr($latestCodeNumber, 2)) + 1 : 1;
        return 'TR' . str_pad($nextCodeNumber, 5, '0', STR_PAD_LEFT);
    }
}
