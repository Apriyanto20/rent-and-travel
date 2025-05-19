<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportations extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeTransportation',
        'transportation'
    ];

    protected $table = 'transportations';

    public static function createCode()
    {
        $latestRecord = self::orderByRaw("CAST(SUBSTRING(codeTransportation, 3, LENGTH(codeTransportation) - 2) AS UNSIGNED) DESC")->first();
        $latestCodeNumber = optional($latestRecord)->codeTransportation;
        $nextCodeNumber = $latestCodeNumber ? intval(substr($latestCodeNumber, 2)) + 1 : 1;
        return 'TP' . str_pad($nextCodeNumber, 5, '0', STR_PAD_LEFT);
    }

    public function transportationRentalDetail()
    {
        return $this->hasMany(TransportationsRentalDetail::class, 'codeTransportation');
    }
}
