<?php

namespace Database\Seeders;

use App\Models\Members;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'nik' => '1234567890123456',
                'name' => 'Zara',
                'phoneNumber' => '6281234567890',
                'email' => 'zara@example.com',
                'address' => 'Jl. Diponegoro No. 5',
                'dateOfBirth' => '1995-06-12',
                'gender' => 'Female',
                'photo' => 'zara.jpg',
                'photoKtp' => 'zara_ktp.jpg',
            ],
            [
                'nik' => '6543210987654321',
                'name' => 'Cantika',
                'phoneNumber' => '6289876543210',
                'email' => 'cantika@example.com',
                'address' => 'Jl. Gatot Subroto No. 8',
                'dateOfBirth' => '1998-11-25',
                'gender' => 'Female',
                'photo' => 'cantika.jpg',
                'photoKtp' => 'cantika_ktp.jpg',
            ]
        ];

        foreach ($members as $member) {
            Members::create($member);
        }
    }
}
