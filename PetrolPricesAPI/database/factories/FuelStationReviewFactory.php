<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\FuelStation;
use App\Models\FuelStationReview;
use Illuminate\Database\Eloquent\Factories\Factory;

class FuelStationReviewFactory extends Factory
{
    protected $model = FuelStationReview::class;

    public function definition()
    {
        return [
        //    'user_id' => User::factory(), // Dodaj to, jeśli masz relację z użytkownikiem
            'fuel_station_id' => FuelStation::factory(), // Dodaj to, jeśli masz relację ze stacją paliw
            'review' => $this->faker->paragraph,
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
