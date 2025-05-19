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
                'name' => 'ARYA MOHAN',
                'driverLicenseNumber' => 'DLN003',
                'licenseType' => 'A',
                'licenseValidityDate' => '2027-05-10',
                'address' => 'JL. DIPONEGORO NO. 5',
                'phoneNumber' => '6281234567890',
                'email' => 'aryamohan@example.com',
                'dateOfBirth' => '1992-03-18',
                'status' => 'ACTIVE',
                'workExperience' => '6',
                'startDate' => '2019-04-01',
                'maritalStatus' => 'SINGLE',
                'photo' => 'arya_mohan.jpg',
                'photoKtp' => 'arya_mohan_ktp.jpg',
                'notes' => 'PROFESSIONAL AND PUNCTUAL DRIVER',
                'prices' => '550000',
                'userId' => 1,
            ],
            [
                'nik' => '6543210987654321',
                'name' => 'NOEL',
                'driverLicenseNumber' => 'DLN004',
                'licenseType' => 'B',
                'licenseValidityDate' => '2026-09-15',
                'address' => 'JL. GATOT SUBROTO NO. 8',
                'phoneNumber' => '6289876543210',
                'email' => 'noel@example.com',
                'dateOfBirth' => '1990-08-25',
                'status' => 'ACTIVE',
                'workExperience' => '8',
                'startDate' => '2017-06-20',
                'maritalStatus' => 'MARRIED',
                'photo' => 'noel.jpg',
                'photoKtp' => 'noel_ktp.jpg',
                'notes' => 'EXPERT IN LONG-DISTANCE DRIVING',
                'prices' => '600000',
                'userId' => 2,
            ]
        ];

        foreach ($drivers as $driver) {
            Drivers::create($driver);
        }
    }
}
