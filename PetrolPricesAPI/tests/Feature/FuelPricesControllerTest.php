<?php

namespace Tests\Unit\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\FuelPrice;

class FuelPricesControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Testuje czy metoda getCurrentPrices zwraca odpowiedź HTTP 200.
     */
    public function testGetCurrentPricesReturns200()
    {
        // Wywołujemy metodę getCurrentPrices kontrolera
        $response = $this->get('/api/current-prices');

        // Sprawdzamy czy odpowiedź ma status HTTP 200 (OK)
        $response->assertStatus(200);
    }

    /**
     * Testuje czy metoda getCurrentPrices zwraca dane w formacie JSON.
     */
    public function testGetCurrentPricesReturnsJson()
    {
        // Wywołujemy metodę getCurrentPrices kontrolera
        $response = $this->get('/api/current-prices');

        // Sprawdzamy czy odpowiedź zawiera dane w formacie JSON
        $response->assertJson([]);
    }

    /**
     * Testuje czy metoda getCurrentPrices zwraca poprawne dane.
     */
    public function testGetCurrentPricesReturnsCorrectData()
    {
        // Utwórz kilka przykładowych cen paliwa w bazie danych za pomocą fabryki
        $fuelPrice1 = FuelPrice::factory()->create(['fuel_type' => 'Diesel', 'price' => 2.50]);
        $fuelPrice2 = FuelPrice::factory()->create(['fuel_type' => 'Gasoline', 'price' => 3.00]);

        // Wywołujemy metodę getCurrentPrices kontrolera
        $response = $this->get('/api/current-prices');

        // Sprawdzamy czy odpowiedź zawiera oczekiwane dane
        $response->assertJson([
            ['fuel_type' => 'Diesel', 'price' => '2.50', 'fuel_station_id' => $fuelPrice1->fuel_station_id, ],
            ['fuel_type' => 'Gasoline', 'price' => '3.00', 'fuel_station_id' => $fuelPrice2->fuel_station_id, ],
        ]);
    }

}
