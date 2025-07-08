<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FonnteWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // 1. GET untuk cek webhook hidup
        if ($request->isMethod('get')) {
            return response()->json(['message' => 'Webhook active']);
        }

        // 2. Ambil data request
        $data    = $request->all();
        $sender  = $data['sender'] ?? null;
        $name    = $data['name'] ?? 'User';
        $message = $data['message'] ?? null;

        if (!$sender || !$message) {
            return response()->json(['error' => 'Missing sender or message'], 400);
        }

        // 3. Format ulang nomor WhatsApp
        $number = preg_replace('/\D/', '', $sender); // hanya digit
        if (!str_starts_with($number, '62')) {
            $number = '62' . ltrim($number, '0');
        }

        Log::info('📩 Incoming message', [
            'from' => $number,
            'name' => $name,
            'text' => $message,
        ]);

        // 4. Kirim ke GenAI
        $reply = "Maaf, saya sedang tidak bisa merespon saat ini.";
        try {
            $agentResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.genai.key'),
                'Content-Type'  => 'application/json',
            ])
            ->timeout(15)
            ->post(config('services.genai.url'), [
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => "WhatsApp message from {$name}: {$message}"
                    ]
                ],
                'temperature' => 0.7,
                'top_p' => 1,
                'max_tokens' => 512,
                'stream' => false,
                'retrieval_method' => 'rewrite',
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
                'stream_options' => ['include_usage' => true],
                'kb_filters' => [],
                'filter_kb_content_by_query_metadata' => false,
                'provide_citations' => false,
            ]);

            if ($agentResponse->ok()) {
                $json = $agentResponse->json();
                $reply = $json['choices'][0]['message']['content'] ?? $reply;
            } else {
                Log::error('❌ GenAI API Error', [
                    'status' => $agentResponse->status(),
                    'body' => $agentResponse->body(),
                ]);
            }
        } catch (\Throwable $e) {
            Log::error('❌ GenAI Request Failed', [
                'error' => $e->getMessage(),
            ]);
        }

        // 5. Kirim balasan ke WhatsApp Web.js
        

        // 6. Balas webhook
        return response()->json([
            'status' => 'ok',
            'reply'  => $reply,
        ]);
    }
}
