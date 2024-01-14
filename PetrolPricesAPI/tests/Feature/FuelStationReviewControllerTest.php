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
        // Utwórz obiekt FuelStationTest za pomocą fabryki
        $fuelStation = FuelStation::factory()->create();

        // Utwórz obiekt User za pomocą fabryki i zaloguj go
        $user = User::factory()->create();
        $this->actingAs($user);

        // Utwórz dane recenzji za pomocą fabryki
        $reviewData = FuelStationReview::factory()->make()->toArray();

        // Wywołaj endpoint API z odpowiednimi danymi
        $response = $this->post("/api/fuel-stations/{$fuelStation->id}/reviews", $reviewData);

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


