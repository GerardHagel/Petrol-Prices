<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\SocialAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        if (!empty($provider)) {
            return Socialite::driver($provider)->redirect();
        }

        return redirect()->route('login');
    }

    public function handleProviderCallback($provider)
    {
        try {
            $oauthUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Nie udało się zalogować przez dostawcę.');
        }

        $oauthUser = $this->findOrCreateUser($oauthUser, $provider);

        Auth::login($oauthUser, true);

        return redirect($this->redirectTo);
    }

    private function findOrCreateUser($oauthUser, $provider)
    {
        $existingOAuth = SocialAuth::where('provider_name', $provider)
            ->where('provider_id', $oauthUser->getId())
            ->first();

        if ($existingOAuth) {
            return $existingOAuth->user;
        }

        $user = User::where('provider_id', $oauthUser->getId())
            ->where('provider_name', $provider)
            ->first();

        if (!$user) {
            $user = User::whereEmail($oauthUser->getEmail())->first();

            $email = (!$user) ? $oauthUser->getEmail() : $provider . '_' . $oauthUser->getEmail();

            $user = User::create([
                'email' => $email,
                'name' => $oauthUser->getName(),
                'provider_name' => $provider,
                'provider_id' => $oauthUser->getId(),
            ]);
        }

        $user->oauth()->create([
            'provider_id' => $oauthUser->getId(),
            'provider_name' => $provider,
            'avatar' => $oauthUser->getAvatar(),
        ]);

        return $user;
    }
}
