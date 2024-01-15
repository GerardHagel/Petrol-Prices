<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Providers\RouteServiceProvider;

class ResetPasswordControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function reset_password_form_can_be_accessed()
    {
        Notification::fake();

        $user = User::factory()->create();
        $token = \Password::broker()->createToken($user);

        $response = $this->get('/password/reset/'.$token);

        $response->assertStatus(200);
    }

    /** @test */
    public function password_can_be_reset_with_valid_token()
    {
        Notification::fake();

        $user = User::factory()->create();
        $token = \Password::broker()->createToken($user);
        $newPassword = 'newStrongPassword123';

        $response = $this->post('/password/reset', [
            'token' => $token,
            'email' => $user->email,
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
        ]);

        $response->assertRedirect(RouteServiceProvider::HOME);
        $this->assertTrue(Hash::check($newPassword, $user->fresh()->password));
    }

    /** @test */
    public function password_cannot_be_reset_with_invalid_token()
    {
        $user = User::factory()->create();
        $newPassword = 'newStrongPassword123';

        $response = $this->post('/password/reset', [
            'token' => 'invalid-token',
            'email' => $user->email,
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
        ]);

        $response->assertSessionHasErrors('email');
    }
}
