<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'name',
        'phoneNumber',
        'email',
        'address',
        'dateOfBirth',
        'gender',
        'photo',
        'photoKtp',
    ];

    protected $table = 'members';

    public function transactionRental()
    {
        return $this->hasMany(TransactionsRental::class, 'memberCode');
    }

}
