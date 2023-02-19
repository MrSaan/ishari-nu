<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

Route::middleware('guest')->group(function () {

    Route::get('/auth/google/redirect', function () {
        return Socialite::driver('google')->redirect();
    });

    Route::get('/auth/google/callback', function () {
        try {
            $socialiteUser = Socialite::driver('google')->user();
        } catch (\Throwable $e) {
            return redirect('/login');
        }

        $user = User::where([
            'provider' => 'google',
            'provider_id' => $socialiteUser->getId()
        ])->first();

        if (!$user) {

            $validator = Validator::make(
                ['email' => $socialiteUser->getEmail()],
                ['email' => ['unique:users,email']],
                ['email.unique' => 'Tidak bisa login. Coba login cara lain..']
            );

            if ($validator->fails()) {
                return redirect('/login')->withErrors($validator);
            }

            $user = User::create([
                'name' => $socialiteUser->getName(),
                'email' => $socialiteUser->getEmail(),
                'provider' => 'google',
                'provider_id' => $socialiteUser->getId(),
                'email_verified_at' => now()
            ]);
        }

        Auth::login($user);

        return redirect('/muhud');
        // dd($user->getName(), $user->getEmail(), $user->getId());
        // $user->token
    });
});
