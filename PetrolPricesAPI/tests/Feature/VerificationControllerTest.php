<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\URL;
use App\Providers\RouteServiceProvider;

class VerificationControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function email_verification_screen_can_be_viewed_by_unverified_user()
    {
        $user = User::factory()->unverified()->create();

        $response = $this->actingAs($user)->get('/email/verify');

        $response->assertStatus(200);
    }

    /** @test */
    public function email_can_be_verified()
    {
        Notification::fake();

        $user = User::factory()->unverified()->create();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify', now()->addMinutes(60), ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $response = $this->actingAs($user)->get($verificationUrl);

        $response->assertRedirect(RouteServiceProvider::HOME);
        $this->assertTrue($user->fresh()->hasVerifiedEmail());
    }

    /** @test */
    public function verification_email_can_be_resent()
    {
        Notification::fake();

        $user = User::factory()->unverified()->create();

        $response = $this->actingAs($user)->post('/email/resend');

        Notification::assertSentTo($user, VerifyEmail::class);
        $response->assertRedirect();
    }
}
