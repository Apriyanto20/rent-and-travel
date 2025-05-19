<?php

namespace App\Models;

use App\Http\Controllers\TransportationsRentalDetailController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeMerk',
        'merk'
    ];

    protected $table = 'merk';

    public static function createCode()
    {
        $latestRecord = self::orderByRaw("CAST(SUBSTRING(codeMerk, 3, LENGTH(codeMerk) - 2) AS UNSIGNED) DESC")->first();
        $latestCodeNumber = optional($latestRecord)->codeMerk;
        $nextCodeNumber = $latestCodeNumber ? intval(substr($latestCodeNumber, 2)) + 1 : 1;
        return 'MR' . str_pad($nextCodeNumber, 5, '0', STR_PAD_LEFT);
    }

    public function rental()
    {
        return $this->hasMany(TransportationsRentalDetailController::class, 'codeMerk');
    }
}
