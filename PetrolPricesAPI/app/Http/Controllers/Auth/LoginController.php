<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{

public function redirectToGoogle(){
    return Socialite::driver('google')->redirect();
}
public function redirectToGoogleCallback(){
    $user=Socialite::driver('google')->user();
    $this->_registerOrLoginUser($user);
    return redirect()->route('home');
}

protected function _registerOrLoginUser($data){
    $user = User::where('email','=',$data->email)->first();
    if(!$user){
        $user=new User();
        $user->name=$data->name;
        $user->email=$data->emial;
        $user->provider_id=$data->id;
        $user->avatar=$data->avatar;
        $user->save();

    }
    Auth::login($user);
}
}
