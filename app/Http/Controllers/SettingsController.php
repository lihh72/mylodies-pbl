<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Ambil user yang sedang login
    return view('pages.settings', compact('user'));
    }

public function update(Request $request)
{
    $user = auth()->user();

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'profile_picture' => 'nullable|image|max:2048',
        'identity_card' => 'nullable|image|max:4096', // tambahkan validasi KTP (gambar)
        'address' => 'nullable|string|max:255',
        'phone_number' => 'nullable|string|max:15',
        'province' => 'nullable|string|max:100',
        'city' => 'nullable|string|max:100',
        'postal_code' => 'nullable|string|max:20',
        'district' => 'nullable|string|max:100',
    ]);

    if ($request->hasFile('profile_picture')) {
        $data['profile_picture'] = $request->file('profile_picture')->store('profiles', 'public');
    }

    if ($request->hasFile('identity_card')) {
        $data['identity_card'] = $request->file('identity_card')->store('identity_cards', 'public');

        // Reset verified status jika upload baru
        $data['identity_card_verified_at'] = null;
    }

    $user->update($data);

    return redirect()->back()->with('success', 'Profile updated successfully.');
}

public function editAddress()
{
    $user = auth()->user();

    if (
        !$user->email_verified_at ||
        !$user->phone_number_verified_at ||
        !$user->identity_card_verified_at
    ) {
        return redirect()->route('settings.index')->with('error', 'Silakan verifikasi email, nomor telepon, dan KTP Anda terlebih dahulu.');
    }

    return view('pages.address', compact('user'));
}

public function updateAddress(Request $request)
{
    $request->validate([
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'province' => 'required|string|max:100',
        'postal_code' => 'required|string|max:20',
        'district' => 'required|string|max:100',
    ]);

    $user = auth()->user();
    $user->update($request->only(['address', 'city', 'province', 'postal_code', 'district']));

    return back()->with('success', 'Alamat berhasil diperbarui.');
}




}
