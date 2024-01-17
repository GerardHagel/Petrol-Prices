<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\FuelPrice;
use App\Models\FuelStation;
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
        ]);

        $this->assertInstanceOf(FuelPrice::class, $fuelPrice);
        $this->assertEquals($fuelStation->id, $fuelPrice->fuel_station_id);
        $this->assertEquals('Gasoline', $fuelPrice->fuel_type);
        $this->assertEquals(2.50, $fuelPrice->price);
    }

    public function test_can_retrieve_reviews_relation()
    {
        $fuelStation = FuelStation::factory()->create();
        $review = $fuelStation->reviews()->create([
            'user_id' => 1,
            'rating' => 5,
            'comment' => 'Great fuel station!',
        ]);

        $this->assertInstanceOf(FuelStationReview::class, $review);
        $this->assertEquals($fuelStation->id, $review->fuel_station_id);
        $this->assertEquals(1, $review->user_id);
        $this->assertEquals(5, $review->rating);
        $this->assertEquals('Great fuel station!', $review->comment);
    }
}
