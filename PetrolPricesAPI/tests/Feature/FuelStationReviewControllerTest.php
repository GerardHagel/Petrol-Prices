<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\FuelStation;
use App\Models\FuelStationReview;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FuelStationReviewControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testAddReview()
    {
        // Utwórz obiekt FuelStation za pomocą fabryki
        $fuelStation = FuelStation::factory()->create();

        // Utwórz obiekt User za pomocą fabryki
        $user = User::factory()->create();

        // Utwórz dane recenzji za pomocą fabryki
        $reviewData = FuelStationReview::factory()->make([
            'user_id' => $user->id,
        ]) ->toArray();

        // Wywołaj endpoint API z odpowiednimi danymi
        $response = $this->post("/api/fuel-stations/{$fuelStation->id}/reviews", $reviewData);

        // Debugowanie: Wyświetl treść odpowiedzi i status odpowiedzi
     //   dd('Po żądaniu', $response->getContent(), $response->getStatusCode());

        // Sprawdź, czy odpowiedź ma status 201 (Created)
        $response->assertStatus(201);

        // Sprawdź, czy recenzja została dodana do bazy danych
        $this->assertDatabaseHas('fuel_station_reviews', [
            'user_id' => $user->id,
            'fuel_station_id' => $fuelStation->id,
            'review' => $reviewData['review'],
            'rating' => $reviewData['rating'],
        ]);
    }
}
