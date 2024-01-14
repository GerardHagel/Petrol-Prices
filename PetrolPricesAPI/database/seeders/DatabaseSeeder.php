<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FuelPrice;
use App\Models\SupportTicket;
use Database\Factories\FuelPricesFactory;
use Illuminate\Database\Seeder;
use App\Models\FuelStation;
//use App\Models\SupportTicket;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        FuelStation::factory()->create();
        FuelPrice::factory()->create();
        SupportTicket::factory()->create();
        FuelPricesFactory::factoryForModel()->create();
    }
}
