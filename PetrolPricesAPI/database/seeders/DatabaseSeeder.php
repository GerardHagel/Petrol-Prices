<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FuelStation;
use App\Models\FuelPrice;
use App\Models\SupportTicket;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for FuelStation
        FuelStation::factory(10)->create(); // Create 10 FuelStation records

        // Seed data for FuelPrice
        FuelPrice::factory(50)->create(); // Create 50 FuelPrice records

        // Seed data for SupportTicket
        SupportTicket::factory(20)->create(); // Create 20 SupportTicket records
    }
}
