<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EditUserController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Ambil user yang sedang login
    return view('edit-user', compact('user'));
    }

    public function updatePassword(Request $request)
{
    $request->validate([
        'prev_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = auth()->user();

    if (!Hash::check($request->prev_password, $user->password)) {
        return back()->withErrors(['prev_password' => 'The previous password is incorrect.']);
    }

    $user->update([
        'password' => Hash::make($request->new_password),
    ]);

    return back()->with('success', 'Password has been updated successfully.');
}

public function forceChange()
{
    if (!session('force_change_password')) {
        return redirect()->route('landing'); // redirect jika tidak perlu ubah password
    }

    $user = Auth::user();
    return view('change-password-force', compact('user'));
}

public function forceChangePost(Request $request)
{
    $request->validate([
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = auth()->user();
    $user->update([
        'password' => Hash::make($request->new_password),
    ]);

    session()->forget('force_change_password'); // hapus flag
    return redirect()->route('landing')->with('success', 'Password updated successfully.');
}




}
