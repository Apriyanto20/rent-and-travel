<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportationsTravelDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'codeDetailTransportation',
        'codeTransportation',
        'codeMerk',
        'driverCode',
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
        'photo_front',
        'photo_right',
        'photo_left',
        'photo_back',
        'notes',
        'user_id',
    ];

    protected $table = 'transportations_travel_detail';
}
