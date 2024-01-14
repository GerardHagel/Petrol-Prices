<?php

namespace Tests\Feature;

use App\Models\FuelPrice;
use App\Models\FuelStation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Factories\FuelPricesFactory;

class FuelPriceTest extends TestCase
{
    use RefreshDatabase;

    public function testFuelPrice()
    {
        // Tworzenie obiektu FuelStationTest
        $fuelStation = FuelStation::factory()->create();

        // Tworzenie obiektu FuelPrice
        $fuelPrice = \Database\Factories\FuelPricesFactory::new()->create([
            'fuel_station_id' => $fuelStation->id,
            'fuel_type' => 'Diesel',
            'price' => '2.50',
            'date' => now(),
        ]);

        // Pobieranie obiektu z bazy danych
        $retrievedFuelPrice = FuelPrice::find($fuelPrice->id);

        // Sprawdzanie, czy dane się zgadzają
        $this->assertEquals($fuelPrice->id, $retrievedFuelPrice->id);
        $this->assertEquals($fuelStation->id, $retrievedFuelPrice->fuel_station_id);
        $this->assertEquals('Diesel', $retrievedFuelPrice->fuel_type);
        $this->assertEquals('2.50', $retrievedFuelPrice->price);

        // Sprawdzanie relacji z FuelStationTest
        $this->assertInstanceOf(FuelStation::class, $retrievedFuelPrice->fuelStation);
        $this->assertEquals($fuelStation->id, $retrievedFuelPrice->fuelStation->id);

        // Aktualizacja danych
        $retrievedFuelPrice->update([
            'fuel_type' => 'Gasoline',
            'price' => '2.80',
        ]);

        // Ponowne pobieranie obiektu z bazy danych
        $updatedFuelPrice = FuelPrice::find($fuelPrice->id);

        // Sprawdzanie, czy dane zostały zaktualizowane
        $this->assertEquals('Gasoline', $updatedFuelPrice->fuel_type);
        $this->assertEquals('2.80', $updatedFuelPrice->price);

        // Usuwanie z bazy danych
        $updatedFuelPrice->delete();

        // Sprawdzanie, czy obiekt został usunięty
        $this->assertNull(FuelPrice::find($fuelPrice->id));
    }
}
