<?php

namespace App\Http\Controllers;

use Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class OauthController extends Controller
{
    public function redirectToProvider()
{
    session(['remember' => request()->boolean('remember')]);
    return Socialite::driver('google')->redirect();
}


    public function handleProviderCallback()
{
    try {
        $user = Socialite::driver('google')->stateless()->user();

        $finduser = User::where('gauth_id', $user->id)->first();

        if ($finduser) {
            // Update foto jika belum ada
            if (!$finduser->profile_picture && $user->avatar) {
                $finduser->update(['profile_picture' => $user->avatar]);
            }

            Auth::login($finduser, session('remember', false));
            return redirect()->intended(route('landing'));

        } else {
            // Cek apakah sudah ada user dengan email sama (register manual)
            $existingUser = User::where('email', $user->email)->first();

            if ($existingUser) {
                // Hubungkan akun Google ke akun manual tersebut
                $existingUser->update([
                    'gauth_id' => $user->id,
                    'gauth_type' => 'google',
                    'profile_picture' => $existingUser->profile_picture ?: $user->avatar,
                    'email_verified_at' => now(),
                ]);

                Auth::login($existingUser, session('remember', false));
                return redirect()->intended(route('landing'));
            }

            // Buat akun baru jika email belum ada sama sekali
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'gauth_id' => $user->id,
                'gauth_type' => 'google',
                'password' => Hash::make('user@123'),
                'profile_picture' => $user->avatar,
                'email_verified_at' => now(),
            ]);

            $newUser->assignRole('user');
            Auth::login($newUser, session('remember', false));

            return redirect(route('landing'))->with('success', 'Successfully logged in with your Google account!');
        }

    } catch (Exception $e) {
        dd($e->getMessage());
    }
}



}
