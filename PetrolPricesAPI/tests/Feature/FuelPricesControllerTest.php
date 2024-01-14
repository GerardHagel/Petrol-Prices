<?php

namespace Tests\Feature;

use App\Models\FuelStation;
use App\Models\FuelPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Factories\FuelPricesFactory;

class FuelPricesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testCurrentPrices()
    {
        // Dodaj testową stację paliw przed dodaniem ceny paliw
        $fuelStation = FuelStation::factory()->create();

        // Dodaj testową cenę paliw z użyciem fuel_station_id utworzonej wcześniej stacji
        FuelPricesFactory::new(['fuel_station_id' => $fuelStation->id])->create();

        $response = $this->get('http://localhost:8000/current-prices');

        $response->assertStatus(200);

 //       $response->assertJson(['data' => true]);

        // Sprawdź, czy odpowiedź zawiera dane cen paliw
        $response->assertJsonCount(1, '*.id'); // Sprawdź, czy jest co najmniej jedna cena paliw

// Dla bardziej szczegółowego sprawdzenia, możesz użyć assertJsonStructure
        $response->assertJsonStructure([
            '*' => [
                'id',
                'fuel_station_id',
                'fuel_type',
                'price',
                'date',
                'created_at',
                'updated_at',
            ],
        ]);
    }

    public function testHistoricalPrices()
    {
        // Dodaj testowe ceny paliw w przeszłości
        $fuelStation = FuelStation::factory()->create();

        // Dodaj testową cenę paliw z użyciem fuel_station_id utworzonej wcześniej stacji
        FuelPricesFactory::new(['fuel_station_id' => $fuelStation->id, 'date' => now()->subDays(2)])->create();

        $response = $this->get('http://localhost:8000/historical-prices');

        $response->assertStatus(200);

        // Sprawdź, czy odpowiedź zawiera dane cen paliw
        $response->assertJsonCount(1, '*.id'); // Sprawdź, czy jest co najmniej jedna cena paliw

// Dla bardziej szczegółowego sprawdzenia, możesz użyć assertJsonStructure
        $response->assertJsonStructure([
            '*' => [
                'id',
                'fuel_station_id',
                'fuel_type',
                'price',
                'date',
                'created_at',
                'updated_at',
            ],
        ]);
    }
}
