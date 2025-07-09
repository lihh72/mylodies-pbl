<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class OtpController extends Controller
{
    /**
     * Kirim OTP ke nomor WhatsApp user
     */
    public function send(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string'
        ]);

        $user = Auth::user();
        $phone = preg_replace('/\D/', '', $request->phone_number);
        if (!str_starts_with($phone, '62')) {
            $phone = '62' . ltrim($phone, '0');
        }

        // Generate & simpan OTP sementara di cache (5 menit)
        $otp = rand(100000, 999999);
        $key = "otp_{$phone}";
        Cache::put($key, $otp, now()->addMinutes(5));

        // Kirim pesan via bot WhatsApp
        $message = "🔐 Kode verifikasi Mylodies Anda:\n\n*{$otp}*\n\nKode berlaku 5 menit.";

        try {
            Http::timeout(10)->post(config('services.wa_bot.endpoint'), [
                'number' => $phone,
                'message' => $message,
            ]);
        } catch (\Throwable $e) {
            \Log::error('❌ Gagal kirim OTP ke WhatsApp:', [
                'error' => $e->getMessage(),
            ]);
            return response()->json(['error' => 'Gagal mengirim OTP.'], 500);
        }

        return response()->json(['status' => 'sent']);
    }

    /**
     * Verifikasi OTP yang dimasukkan user
     */
    public function verify(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'otp' => 'required|digits:6'
        ]);

        $user = Auth::user();
        $phone = preg_replace('/\D/', '', $request->phone_number);
        if (!str_starts_with($phone, '62')) {
            $phone = '62' . ltrim($phone, '0');
        }

        $key = "otp_{$phone}";
        $cachedOtp = Cache::get($key);

        if (!$cachedOtp) {
            return response()->json(['error' => 'Kode OTP sudah kedaluwarsa.'], 422);
        }

        if ((string)$cachedOtp !== $request->otp) {
            return response()->json(['error' => 'Kode OTP salah.'], 401);
        }

        // Tandai sebagai terverifikasi
        $user->update([
            'phone_number' => $phone,
            'phone_number_verified_at' => now(),
        ]);

        Cache::forget($key);

        return response()->json(['status' => 'verified']);
    }
}
