<?php

namespace Database\Seeders;

use App\Models\RentalOptions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentalOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rentalOptions = [
            ['codeRentalOption' => 'RO00001', 'option' => 'Dengan Driver'],
            ['codeRentalOption' => 'RO00002', 'option' => 'Tanpa Driver'],
            ['codeRentalOption' => 'RO00003', 'option' => 'Hanya Driver']
        ];

        foreach ($rentalOptions as $rentalOption) {
            RentalOptions::create($rentalOption);
        }
    }
}
