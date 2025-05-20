<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transportations_rental_detail')->insert([
            [
                'codeDetailTransportation' => 'TC001',
                'codeTransportation' => 'TP00001',
                'codeMerk' => 'MR00010',
                'vehicle_statuses' => 'TERSEDIA',
                'license_plate' => 'B 1234 ABC',
                'color' => 'Black',
                'seats' => 5,
                'model' => 'MERCEDES BENZ',
                'production_year' => 2020,
                'chassis_number' => 'CH123456789',
                'engine_number' => 'EN123456789',
                'engine_capacity' => 1500,
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'ownership_status' => 'Owned',
                'registration_date' => '2023-01-15',
                'tax_validity_date' => '2024-01-15',
                'vehicle_condition' => 'Good',
                'insurance_status' => 'Active',
                'location' => 'Jakarta',
                'rental_price' => 350000,
                'photo_front' => 'rental/car/TC001-front.png',
                'photo_right' => 'rental/car/TC001-right.png',
                'photo_left' => 'rental/car/TC001-left.png',
                'photo_back' => 'rental/car/TC001-back.png',
                'notes' => 'Siap disewa kapan saja',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}