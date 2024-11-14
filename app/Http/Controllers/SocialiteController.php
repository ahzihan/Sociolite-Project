<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function SocialLogin($provider)
    {
        if ($provider) {
            return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }

    public function socialAuthentication($provider)
    {

        try {
            if ($provider) {

                $socialUser = Socialite::driver($provider)->user();

                $user = User::where('auth_provider_id', $socialUser->id)->first();

                if ($user) {
                    Auth::login($user);
                } else {
                    $userInfo = User::create([
                        'name' => $socialUser->name,
                        'email' => $socialUser->email,
                        'password' => Hash::make('1234'),
                        'auth_provider' => $provider,
                        'auth_provider_id' => $socialUser->id,
                    ]);

                    if ($user) {
                        Auth::login($userInfo);
                    }

                }
                return redirect()->route('dashboard');
            }
            abort(404);

        } catch (Exception $e) {
            dd($e);
        }
    }
}
