<?php

namespace Tests\Unit\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\FuelStation;

class FuelStationControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testuje czy metoda search zwraca odpowiedź HTTP 200.
     */
    public function testSearchReturns200()
    {
        // Wywołujemy metodę search kontrolera
        $response = $this->post('/api/fuel-stations/search');

        // Sprawdzamy czy odpowiedź ma status HTTP 200 (OK)
        $response->assertStatus(200);
    }

    /**
     * Testuje czy metoda search zwraca dane w formacie JSON.
     */
    public function testSearchReturnsJson()
    {
        // Wywołujemy metodę search kontrolera
        $response = $this->post('/api/fuel-stations/search');

        // Sprawdzamy czy odpowiedź zawiera dane w formacie JSON
        $response->assertJson([]);
    }

    /**
     * Testuje czy metoda index zwraca odpowiedź HTTP 200.
     */
    public function testIndexReturns200()
    {
        // Wywołujemy metodę index kontrolera
        $response = $this->get('/fuel-stations');

        // Sprawdzamy czy odpowiedź ma status HTTP 200 (OK)
        $response->assertStatus(200);
    }

    /**
     * Testuje czy metoda create zwraca odpowiedź HTTP 200.
     */
    public function testCreateReturns200()
    {
        // Wywołujemy metodę create kontrolera
        $response = $this->get('/fuel-stations/create');

        // Sprawdzamy czy odpowiedź ma status HTTP 200 (OK)
        $response->assertStatus(200);
    }

    // Pozostałe testy dla pozostałych metod kontrolera (store, edit, update, destroy, show) można stworzyć analogicznie.
}

