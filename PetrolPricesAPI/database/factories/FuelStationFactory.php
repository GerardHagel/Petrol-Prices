<?php

namespace Database\Factories;

use App\Models\FuelStation;
use Illuminate\Database\Eloquent\Factories\Factory;

class FuelStationFactory extends Factory
{
    protected $model = FuelStation::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'location' => $this->faker->city,
            'fuel_type' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 2, 5),
            'opening_hours' => $this->faker->time,
        ];
    }
}
