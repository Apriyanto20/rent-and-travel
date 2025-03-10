<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'name',
        'driverLicenseNumber',
        'licenseType',
        'licenseValidityDate',
        'address',
        'phoneNumber',
        'email',
        'dateOfBirth',
        'status',
        'workExperience',
        'startDate',
        'maritalStatus',
        'photo',
        'photoKtp',
        'notes',
        'prices',
        'userId',
    ];

    protected $table = 'drivers';
}
