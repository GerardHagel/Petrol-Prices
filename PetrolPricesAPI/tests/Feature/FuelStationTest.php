<?php

namespace Tests\Feature;

use App\Models\FuelStation;
use App\Models\FuelPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FuelStationTest extends TestCase
{
    use RefreshDatabase;

    public function testFuelStation()
    {
        // Tworzenie obiektu FuelStation
        $fuelStation = FuelStation::factory()->create();

        // Tworzenie obiektu FuelPrice i przypisywanie go do FuelStation
        $fuelPrice = \Database\Factories\FuelPricesFactory::new()->create([
            'fuel_station_id' => $fuelStation->id,
            'fuel_type' => 'Diesel',
            'price' => '2.50',
            'date' => now(),
        ]);

        // Pobieranie obiektu FuelStation z bazy danych
        $retrievedFuelStation = FuelStation::find($fuelStation->id);

        // Sprawdzanie, czy FuelStation ma przypisaną instancję FuelPrice
        $this->assertInstanceOf(FuelPrice::class, $retrievedFuelStation->fuelPrices->first());

        // Dodatkowe asercje, które chcesz przetestować dla FuelStation
        $this->assertEquals('Diesel', $retrievedFuelStation->fuelPrices->first()->fuel_type);
        $this->assertEquals('2.50', $retrievedFuelStation->fuelPrices->first()->price);
    }
}


