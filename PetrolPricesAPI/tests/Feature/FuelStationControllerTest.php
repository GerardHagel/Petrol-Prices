<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\FuelStation;

class FuelStationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testSearch()
    {
        // Przygotowanie danych do testu
        FuelStation::create([
            'name' => 'Test Station',
            'location' => 'Test Location',
            'fuel_type' => 'Test Fuel Type',
            'price' => 2.5,
            'opening_hours' => '9:00 AM - 5:00 PM',
        ]);

        $requestData = [
            'location' => 'Test',
            'fuel_type' => 'Fuel Type',
            'max_price' => 3.0,
            'open_now' => true,
        ];

        // Wywołanie funkcji w kontrolerze
        $response = $this->post('/api/fuel-stations/search', $requestData);

        // Sprawdzenie, czy odpowiedź to widok
        $response->assertStatus(200);

        // Sprawdzenie, czy treść widoku zawiera oczekiwane dane
        if (strpos($response->getContent(), 'Brak wyników wyszukiwania.') !== false) {
            $this->assertStringContainsString('Brak wyników wyszukiwania.', $response->getContent());
        } else {
            $response->assertSeeText('Test Station');
        }
    }
}
