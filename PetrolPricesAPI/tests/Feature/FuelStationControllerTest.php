<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Models\FuelStation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;

class FuelStationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_fuel_stations()
    {
        // Tworzenie kilku przykładowych stacji paliw w bazie danych
        FuelStation::factory()->create([
            'name' => 'Fuel Station 1',
            'location' => '123 Main St, City',
            'fuel_type' => 'Gasoline',
            'price' => 2.50,
            'opening_hours' => '{"day": "Monday", "open": true}',
        ]);

        FuelStation::factory()->create([
            'name' => 'Fuel Station 2',
            'location' => '456 Elm St, Town',
            'fuel_type' => 'Diesel',
            'price' => 2.80,
            'opening_hours' => '{"day": "Tuesday", "open": true}',
        ]);

        // Przykładowe dane do wyszukiwania
        $searchParams = [
            'location' => 'City',
            'fuel_type' => 'Gasoline',
            'max_price' => 3.00,
            'open_now' => true,
        ];

        // Wywołanie akcji kontrolera z poprawionym URL
        $response = $this->post('/api/fuel-stations/search', $searchParams);

        // Sprawdzanie, czy odpowiedź jest poprawna
        $response->assertStatus(200);

        // Sprawdzanie, czy odpowiedź zawiera oczekiwane dane
        $response->assertJsonCount(1); // Oczekujemy jednej znalezionej stacji paliw
        $response->assertJsonFragment(['name' => 'Fuel Station 1']);
    }
}
