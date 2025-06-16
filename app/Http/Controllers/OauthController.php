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

            Auth::login($finduser);

            // 🔁 Cek jika perlu ganti password
            if (session('force_change_password')) {
                return redirect('/change-password');
            }

            // ✅ Redirect ke halaman intended
            return redirect()->intended(route('landing'));

        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'gauth_id' => $user->id,
                'gauth_type' => 'google',
                'password' => Hash::make('user@123'),
                'profile_picture' => $user->avatar,
            ]);

            $newUser->assignRole('user');

            Auth::login($newUser);

            // Set flag wajib ganti password
            session(['force_change_password' => true]);

            return redirect('/change-password');
        }

    } catch (Exception $e) {
        dd($e->getMessage());
    }
}


}
