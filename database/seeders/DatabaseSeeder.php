<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Adi Apriyanto',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'A'
        ]);

        $this->call([
            DriversSeeder::class,
            MembersSeeder::class,
            MerkSeeder::class,
            RentalOptionsSeeder::class,
            TransportationRouteSeeder::class,
            TransportationsSeeder::class,
            RentalSeeder::class
        ]);
    }
}