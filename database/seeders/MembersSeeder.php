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
                'name' => 'YANTI',
                'phoneNumber' => '6281234567890',
                'email' => 'yanti@example.com',
                'address' => 'JL. DIPONEGORO NO. 5',
                'dateOfBirth' => '1995-06-12',
                'gender' => 'FEMALE',
                'photo' => 'zara.jpg',
                'photoKtp' => 'zara_ktp.jpg',
            ],
            [
                'nik' => '6543210987654321',
                'name' => 'CANTIKA',
                'phoneNumber' => '6289876543210',
                'email' => 'cantika@example.com',
                'address' => 'JL. GATOT SUBROTO NO. 8',
                'dateOfBirth' => '1998-11-25',
                'gender' => 'FEMALE',
                'photo' => 'cantika.jpg',
                'photoKtp' => 'cantika_ktp.jpg',
            ]
        ];

        foreach ($members as $member) {
            Members::create($member);
        }
    }
}