<?php

namespace Database\Seeders;

use App\Models\Transportations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transportations = [
            ['codeTransportation' => 'TP00001', 'transportation' => 'MOBIL'],
            ['codeTransportation' => 'TP00002', 'transportation' => 'MOTOR'],
            ['codeTransportation' => 'TP00003', 'transportation' => 'BUS']
        ];

        foreach ($transportations as $transportation) {
            Transportations::create($transportation);
        }
    }
}
