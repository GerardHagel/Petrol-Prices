<?php

namespace Database\Factories;

use App\Models\FuelPrice;
use App\Models\FuelStation;
use Illuminate\Database\Eloquent\Factories\Factory;

class FuelPriceFactory extends Factory
{
    protected $model = FuelPrice::class;

    public function definition()
    {
        return [
            'fuel_station_id' => function () {
                return FuelStation::factory()->create()->id;
            },
            'fuel_type' => $this->faker->randomElement(['Diesel', 'Gasoline']),
            'price' => $this->faker->randomFloat(2, 1, 3), // Przykładowa cena z zakresu od 1 do 3
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
