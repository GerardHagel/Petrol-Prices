<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\FuelPrice;
use App\Models\FuelStation;
use App\Models\FuelStationReview;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FuelStationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_fuel_station()
    {
        $fuelStationData = [
            'name' => 'Example Fuel Station',
            'location' => '123 Main St, City',
            'fuel_type' => 'Gasoline',
            'price' => 2.50,
            'opening_hours' => 'Mon-Fri: 8:00 AM - 6:00 PM',
        ];

        $fuelStation = FuelStation::create($fuelStationData);

        $this->assertInstanceOf(FuelStation::class, $fuelStation);
        $this->assertEquals($fuelStationData['name'], $fuelStation->name);
        $this->assertEquals($fuelStationData['location'], $fuelStation->location);
        $this->assertEquals($fuelStationData['fuel_type'], $fuelStation->fuel_type);
        $this->assertEquals($fuelStationData['price'], $fuelStation->price);
        $this->assertEquals($fuelStationData['opening_hours'], $fuelStation->opening_hours);
    }

    public function test_can_retrieve_fuel_prices_relation()
    {
        $fuelStation = FuelStation::factory()->create();
        $fuelPrice = $fuelStation->fuelPrices()->create([
            'fuel_type' => 'Gasoline',
            'price' => 2.50,
            'date' => now(),
        ]);

        $this->assertInstanceOf(FuelPrice::class, $fuelPrice);
        $this->assertEquals($fuelStation->id, $fuelPrice->fuel_station_id);
        $this->assertEquals('Gasoline', $fuelPrice->fuel_type);
        $this->assertEquals(2.50, $fuelPrice->price);
    }

    public function test_can_retrieve_reviews_relation()
    {
        // Create a fuel station
        $fuelStation = FuelStation::factory()->create();

        // Create a user
        $user = User::factory()->create();

        // Create a review using the user's ID and the correct field name
        $review = $fuelStation->reviews()->create([
            'user_id' => $user->id,
            'rating' => 5,
            'review' => 'Great fuel station!', // Ensure this field name matches your schema
        ]);

        $this->assertInstanceOf(FuelStationReview::class, $review);
        $this->assertEquals($fuelStation->id, $review->fuel_station_id);
        $this->assertEquals($user->id, $review->user_id);
        $this->assertEquals(5, $review->rating);
        $this->assertEquals('Great fuel station!', $review->review); // Use the correct field here as well
    }
}
