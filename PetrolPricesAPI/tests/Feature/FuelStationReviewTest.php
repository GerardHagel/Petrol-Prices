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
        // Create a fuel station
        $fuelStation = FuelStation::factory()->create();

        // Create a user
        $user = User::factory()->create();

        // Create a review using the created user's ID
        $review = FuelStationReview::factory()->create([
            'fuel_station_id' => $fuelStation->id,
            'user_id' => $user->id,
            'rating' => 5,
            'review' => 'Great fuel station!',
        ]);

        $this->assertInstanceOf(FuelStationReview::class, $review);
        $this->assertEquals($fuelStation->id, $review->fuel_station_id);
        $this->assertEquals($user->id, $review->user_id);
        $this->assertEquals(5, $review->rating);
        $this->assertEquals('Great fuel station!', $review->review);
    }
}
