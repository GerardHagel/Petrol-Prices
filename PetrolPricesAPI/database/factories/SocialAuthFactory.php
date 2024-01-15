<?php

namespace Database\Factories;

use App\Models\SocialAuth;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SocialAuthFactory extends Factory
{
    protected $model = SocialAuth::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Correct reference to UserFactory
            'provider_name' => 'facebook',
            'provider_id' => Str::random(10),
            'avatar' => $this->faker->imageUrl(),
        ];
    }
}
