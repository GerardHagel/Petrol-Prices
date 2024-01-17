<?php

namespace Tests\Feature;


use Tests\TestCase;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Providers\RouteServiceProvider;
class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function testRedirectToProvider()
    {
        Socialite::shouldReceive('driver')->with('google')->andReturnSelf()
            ->shouldReceive('redirect')->andReturn(redirect()->to('http://fake-redirect-uri.com'));

        $response = $this->get('/auth/redirect/google');
        $response->assertRedirect('http://fake-redirect-uri.com');
    }

    public function testHandleProviderCallbackSuccess()
    {
        $fakeUser = new User([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);

        $this->mockSocialiteFacade($fakeUser);

        $response = $this->get('/auth/google/callback');
        $response->assertRedirect(route('login'));
    }

    public function testHandleProviderCallbackException()
    {
        Socialite::shouldReceive('driver')->with('facebook')->andThrow(new \Exception);

        $response = $this->get('/auth/google/callback');;
        $response->assertRedirect(route('login'));
    }

    public function testFindOrCreateUser()
    {
        $fakeUser = new User([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);

        $this->mockSocialiteFacade($fakeUser);

        // Additional assertions to verify user creation or retrieval logic
    }

    // Additional tests as needed
}
