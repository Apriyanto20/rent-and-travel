<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportationsRentalDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'codeDetailTransportation',
        'codeTransportation',
        'codeMerk',
        'vehicle_statuses',
        'license_plate',
        'color',
        'seats',
        'model',
        'production_year',
        'chassis_number',
        'engine_number',
        'engine_capacity',
        'fuel_type',
        'transmission',
        'ownership_status',
        'registration_date',
        'tax_validity_date',
        'vehicle_condition',
        'insurance_status',
        'location',
        'rental_price',
        'photo_front',
        'photo_right',
        'photo_left',
        'photo_back',
        'notes',
        'user_id',
    ];

    protected $table = 'transportations_rental_detail';

    public static function codeRentalMobil()
    {
        $latestRecord = self::orderByRaw("CAST(SUBSTRING(codeDetailTransportation, 3, LENGTH(codeDetailTransportation) - 2) AS UNSIGNED) DESC")->first();
        $latestCodeNumber = optional($latestRecord)->codeDetailTransportation;
        $nextCodeNumber = $latestCodeNumber ? intval(substr($latestCodeNumber, 2)) + 1 : 1;
        return 'TC' . str_pad($nextCodeNumber, 3, '0', STR_PAD_LEFT);
    }

    public static function codeRentalMotor()
    {
        $latestRecord = self::orderByRaw("CAST(SUBSTRING(codeDetailTransportation, 3, LENGTH(codeDetailTransportation) - 2) AS UNSIGNED) DESC")->first();
        $latestCodeNumber = optional($latestRecord)->codeDetailTransportation;
        $nextCodeNumber = $latestCodeNumber ? intval(substr($latestCodeNumber, 2)) + 1 : 1;
        return 'TM' . str_pad($nextCodeNumber, 3, '0', STR_PAD_LEFT);
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'codeMerk', 'codeMerk');
    }

    public function transportation()
    {
        return $this->belongsTo(Transportations::class, 'codeTransportation', 'codeTransportation');
    }

    public function transactionRental()
    {
        return $this->hasMany(TransactionsRental::class, 'codeDetailTransportation');
    }
}
