<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    #------------------------------- Login
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    #------------------------------- Redirect
    public function redirect()
    {
        $socialiteUser = Socialite::driver('google')->user();
        $user = User::updateOrCreate([
            'provider_id' => $socialiteUser->getId(),
        ], [
            'name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
        ]);

        // auth user
        Auth::login($user, true);

        return to_route('front.index');
    }
}
