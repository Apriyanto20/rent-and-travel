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
}
