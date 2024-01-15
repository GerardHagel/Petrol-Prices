<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;

class ForgotPasswordControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        // Prevent actual email sending
        Mail::fake();
        // Prevent actual notifications from being sent
        Notification::fake();
    }

    /** @test */
    public function forgot_password_form_can_be_accessed()
    {
        $response = $this->get('/password/reset');

        $response->assertStatus(200);
    }

    /** @test */
    public function email_is_required_for_password_reset()
    {
        $response = $this->post('/password/email', [
            'email' => '',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function valid_email_sends_password_reset_link()
    {
        $user = User::factory()->create();

        $response = $this->post('/password/email', [
            'email' => $user->email,
        ]);

        $response->assertStatus(302); // Usually a redirect to the same page
        Notification::assertSentTo($user, \Illuminate\Auth\Notifications\ResetPassword::class);
    }
}
