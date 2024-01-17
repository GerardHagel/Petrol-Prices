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

    public function test_can_retrieve_reviews_relation()
    {
        $fuelStation = FuelStation::factory()->create();
        $review = FuelStationReview::factory()->create([ // Tworzenie recenzji
            'user_id' => 1,
            'rating' => 5,
            'review' => 'Great fuel station!', // Dodawanie recenzji
        ]);

        $this->assertInstanceOf(FuelStationReview::class, $review);
        $this->assertEquals($fuelStation->id, $review->fuel_station_id);
        $this->assertEquals(1, $review->user_id);
        $this->assertEquals(5, $review->rating);
        $this->assertEquals('Great fuel station!', $review->review); // Sprawdzanie recenzji
    }
}
