<?php

namespace Tests\Feature;

use App\Models\FuelStation;
use App\Models\FuelStationReview;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FuelStationReviewTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateFuelStationReview()
    {
        // Utwórz testowego użytkownika
        $user = User::factory()->create();

        // Utwórz testową stację paliwową
        $fuelStation = FuelStation::factory()->create();

        // Dane do testu
        $reviewData = [
            'user_id' => $user->id,
            'fuel_station_id' => $fuelStation->id,
            'review' => 'Test review',
            'rating' => 4,
        ];

        // Utwórz recenzję stacji paliwowej
        $review = FuelStationReview::create($reviewData);

        // Sprawdź, czy dane się zgadzają
        $this->assertEquals($reviewData['user_id'], $review->user_id);
        $this->assertEquals($reviewData['fuel_station_id'], $review->fuel_station_id);
        $this->assertEquals($reviewData['review'], $review->review);
        $this->assertEquals($reviewData['rating'], $review->rating);

        // Sprawdź relacje z użytkownikiem i stacją paliwową
        $this->assertInstanceOf(User::class, $review->user);
        $this->assertEquals($user->id, $review->user->id);

        $this->assertInstanceOf(FuelStation::class, $review->fuelStation);
        $this->assertEquals($fuelStation->id, $review->fuelStation->id);
    }
}
