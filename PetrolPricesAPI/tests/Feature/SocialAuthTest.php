<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\SocialAuth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Database\Factories\SocialAuthFactory;
class SocialAuthTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_social_auth_record_can_be_created()
    {
        $socialAuth = SocialAuth::create([
            'user_id' => User::factory()->create()->id,
            'provider_name' => 'facebook',
            'provider_id' => $this->faker->uuid,
            'avatar' => $this->faker->url,
        ]);

        $this->assertDatabaseHas('social_auths', [
            'id' => $socialAuth->id,
            'provider_name' => 'facebook',
        ]);
    }

    /** @test */
    public function social_auth_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $socialAuth = SocialAuth::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $socialAuth->user);
        $this->assertEquals($user->id, $socialAuth->user->id);
    }
}
