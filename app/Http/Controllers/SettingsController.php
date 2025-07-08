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
    return view('settings', compact('user'));
    }

    public function update(Request $request)
{
    $user = auth()->user();

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'profile_picture' => 'nullable|image|max:2048',
        'address' => 'nullable|string|max:255', // Ganti 'shipping_address' dengan 'address'
        'phone_number' => 'nullable|string|max:15', // Tambahkan validasi untuk nomor telepon
        'province' => 'nullable|string|max:100', // Tambahkan validasi untuk provinsi
        'city' => 'nullable|string|max:100', // Tambahkan validasi untuk kota
        'postal_code' => 'nullable|string|max:20', // Tambahkan validasi untuk kode pos
        'district' => 'nullable|string|max:100', // Tambahkan validasi untuk kecamatan
    ]);

    if ($request->hasFile('profile_picture')) {
        $data['profile_picture'] = $request->file('profile_picture')->store('profiles', 'public');
    }

    $user->update($data);

    return redirect()->back()->with('success', 'Profile updated successfully.');
}



}
