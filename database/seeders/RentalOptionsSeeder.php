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
            ['codeRentalOption' => 'RO00001', 'option' => 'DENGAN DRIVER'],
            ['codeRentalOption' => 'RO00002', 'option' => 'TANPA DRIVER'],
            ['codeRentalOption' => 'RO00003', 'option' => 'HANYA DRIVER']
        ];

        foreach ($rentalOptions as $rentalOption) {
            RentalOptions::create($rentalOption);
        }
    }
}
