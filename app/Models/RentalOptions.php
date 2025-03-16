<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalOptions extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeRentalOption',
        'option'
    ];

    protected $table = 'rental_options';

    public static function createCode()
    {
        $latestRecord = self::orderByRaw("CAST(SUBSTRING(codeRentalOption, 3, LENGTH(codeRentalOption) - 2) AS UNSIGNED) DESC")->first();
        $latestCodeNumber = optional($latestRecord)->codeRentalOption;
        $nextCodeNumber = $latestCodeNumber ? intval(substr($latestCodeNumber, 2)) + 1 : 1;
        return 'RO' . str_pad($nextCodeNumber, 5, '0', STR_PAD_LEFT);
    }
}
