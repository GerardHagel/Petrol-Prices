<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Socialite\Facades\Socialite; // Import the Socialite facade

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Mock the Socialite Facade.
     *
     * @param \App\Models\User $user
     * @param string $driver
     */
    protected function mockSocialiteFacade($user, $driver = 'facebook')
    {
        $socialiteUser = $this->createMock(\Laravel\Socialite\Two\User::class);
        $socialiteUser->token = 'fake-token-for-user';
        $socialiteUser->id = $user->id;
        $socialiteUser->email = $user->email;
        $socialiteUser->name = $user->name;
        $socialiteUser->avatar = 'fake-avatar-url';

        $provider = $this->createMock(\Laravel\Socialite\Contracts\Provider::class);
        $provider->expects($this->any())
            ->method('user')
            ->willReturn($socialiteUser);

        Socialite::shouldReceive('driver')
            ->with($driver)
            ->andReturn($provider);
    }
}
