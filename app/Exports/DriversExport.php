<?php

namespace App\Exports;

use App\Models\Drivers;
use Maatwebsite\Excel\Concerns\FromCollection;

class DriversExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Drivers::all();
    }
}
