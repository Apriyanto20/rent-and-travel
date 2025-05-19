<?php

namespace Database\Seeders;

use App\Models\TransportationRoute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportationRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transportationsRoute = [
            ['codeRoute' => 'TR00001', 'route' => 'BANJAR-BANDUNG', 'route_price' => '150000'],
            ['codeRoute' => 'TR00002', 'route' => 'BANJAR-JAKARTA', 'route_price' => '300000'],
            ['codeRoute' => 'TR00003', 'route' => 'BANJAR-TANGERANG', 'route_price' => '350000']
        ];

        foreach ($transportationsRoute as $transportationRoute) {
            TransportationRoute::create($transportationRoute);
        }
    }
}
