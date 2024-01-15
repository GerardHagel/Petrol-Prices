<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\SocialAuth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Database\Factories\SocialAuthFactory;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function user_has_expected_fillable_attributes()
    {
        $fillable = ['name', 'email', 'password', 'provider_name', 'provider_id'];
        $user = new User();

        $this->assertEquals($fillable, $user->getFillable());
    }

    /** @test */
    public function user_can_have_many_social_auths()
    {
        $user = User::factory()->create();
        $socialAuth1 = SocialAuth::factory()->create(['user_id' => $user->id]);
        $socialAuth2 = SocialAuth::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($user->oauth()->exists());
        $this->assertEquals(2, $user->oauth->count());
    }
}
