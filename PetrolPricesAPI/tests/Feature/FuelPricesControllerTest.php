<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Models\FuelStation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FuelPricesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_current_prices()
    {
        // Tworzenie kilku przykładowych stacji paliw w bazie danych
        FuelStation::factory()->create([
            'fuel_type' => 'Gasoline',
            'price' => 2.50,
        ]);

        FuelStation::factory()->create([
            'fuel_type' => 'Diesel',
            'price' => 2.80,
        ]);

        // Wywołanie akcji kontrolera
        $response = $this->get('/current-prices');

        // Sprawdzanie, czy odpowiedź jest poprawna
        $response->assertStatus(200);

        // Sprawdzanie, czy odpowiedź zawiera oczekiwane dane
        $response->assertJsonCount(2); // Oczekujemy dwóch cen paliw
        $response->assertJsonFragment(['fuel_type' => 'Gasoline', 'price' => 2.50]);
        $response->assertJsonFragment(['fuel_type' => 'Diesel', 'price' => 2.80]);
    }
}
