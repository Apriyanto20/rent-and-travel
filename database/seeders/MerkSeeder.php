<?php

namespace Database\Seeders;

use App\Models\Merk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merks = [
            ['codeMerk' => 'MR00001', 'merk' => 'Toyota'],
            ['codeMerk' => 'MR00002', 'merk' => 'Honda'],
            ['codeMerk' => 'MR00003', 'merk' => 'Nissan'],
            ['codeMerk' => 'MR00004', 'merk' => 'Mazda'],
            ['codeMerk' => 'MR00005', 'merk' => 'Mitsubishi'],
            ['codeMerk' => 'MR00006', 'merk' => 'Suzuki'],
            ['codeMerk' => 'MR00007', 'merk' => 'Hyundai'],
            ['codeMerk' => 'MR00008', 'merk' => 'Kia'],
            ['codeMerk' => 'MR00009', 'merk' => 'BMW'],
            ['codeMerk' => 'MR00010', 'merk' => 'Mercedes-Benz'],
        ];

        foreach ($merks as $merk) {
            Merk::create($merk);
        }
    }
}
