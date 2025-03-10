<?php

namespace Database\Seeders;

use App\Models\Drivers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drivers = [
            [
                'nik' => '1234567890123456',
                'name' => 'Arya Mohan',
                'driverLicenseNumber' => 'DLN003',
                'licenseType' => 'A',
                'licenseValidityDate' => '2027-05-10',
                'address' => 'Jl. Diponegoro No. 5',
                'phoneNumber' => '6281234567890',
                'email' => 'aryamohan@example.com',
                'dateOfBirth' => '1992-03-18',
                'status' => 'Active',
                'workExperience' => '6',
                'startDate' => '2019-04-01',
                'maritalStatus' => 'Single',
                'photo' => 'arya_mohan.jpg',
                'photoKtp' => 'arya_mohan_ktp.jpg',
                'notes' => 'Professional and punctual driver',
                'prices' => '550000',
                'userId' => 1,
            ],
            [
                'nik' => '6543210987654321',
                'name' => 'Noel',
                'driverLicenseNumber' => 'DLN004',
                'licenseType' => 'B',
                'licenseValidityDate' => '2026-09-15',
                'address' => 'Jl. Gatot Subroto No. 8',
                'phoneNumber' => '6289876543210',
                'email' => 'noel@example.com',
                'dateOfBirth' => '1990-08-25',
                'status' => 'Active',
                'workExperience' => '8',
                'startDate' => '2017-06-20',
                'maritalStatus' => 'Married',
                'photo' => 'noel.jpg',
                'photoKtp' => 'noel_ktp.jpg',
                'notes' => 'Expert in long-distance driving',
                'prices' => '600000',
                'userId' => 2,
            ]
        ];

        foreach ($drivers as $driver) {
            Drivers::create($driver);
        }
    }
}
