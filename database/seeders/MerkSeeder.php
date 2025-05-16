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
            ['codeMerk' => 'MR00001', 'merk' => 'TOYOTA'],
            ['codeMerk' => 'MR00002', 'merk' => 'HONDA'],
            ['codeMerk' => 'MR00003', 'merk' => 'NISSAN'],
            ['codeMerk' => 'MR00004', 'merk' => 'MAZDA'],
            ['codeMerk' => 'MR00005', 'merk' => 'MITSUBISHI'],
            ['codeMerk' => 'MR00006', 'merk' => 'SUZUKI'],
            ['codeMerk' => 'MR00007', 'merk' => 'HYUNDAI'],
            ['codeMerk' => 'MR00008', 'merk' => 'KIA'],
            ['codeMerk' => 'MR00009', 'merk' => 'BMW'],
            ['codeMerk' => 'MR00010', 'merk' => 'MERCEDES-BENZ'],
            ['codeMerk' => 'MR00011', 'merk' => 'YAMAHA'],
            ['codeMerk' => 'MR00012', 'merk' => 'KAWASAKI'],
            ['codeMerk' => 'MR00013', 'merk' => 'VESPA'],
            ['codeMerk' => 'MR00014', 'merk' => 'TRIUMPH'],
            ['codeMerk' => 'MR00015', 'merk' => 'HARLEY-DAVIDSON'],
            ['codeMerk' => 'MR00016', 'merk' => 'DUCATI'],
            ['codeMerk' => 'MR00017', 'merk' => 'BMW MOTORRAD'],
            ['codeMerk' => 'MR00018', 'merk' => 'SYM'],
            ['codeMerk' => 'MR00019', 'merk' => 'KTM'],
            ['codeMerk' => 'MR00020', 'merk' => 'BENELLI'],
        ];

        foreach ($merks as $merk) {
            Merk::create($merk);
        }
    }
}