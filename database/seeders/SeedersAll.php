<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedersAll extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            DatabaseSeeder::class,
            MerkSeeder::class,
            DriversSeeder::class,
            MembersSeeder::class,
            RentalOptionsSeeder::class,
            TransportationsSeeder::class,
            TransportationRouteSeeder::class
        ]);
    }
}