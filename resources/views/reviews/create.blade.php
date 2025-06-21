@extends('layouts.app')

@section('title', 'Beri Ulasan')
@section('body_class', 'bg-[#fdfaf5] text-gray-800 font-sans')
@section('loading_screen', false)

@section('content')
<section class="min-h-screen pt-28 pb-20 px-6 md:px-12 bg-[#fdfaf5] relative">
    <!-- Background Glow -->
    <div class="absolute -top-32 -left-32 w-[400px] h-[400px] bg-[#fcecd6] rounded-full blur-3xl opacity-50 animate-pulse z-0"></div>
    <div class="absolute bottom-0 right-0 w-[420px] h-[420px] bg-[#dac4a9] rounded-full blur-3xl opacity-40 animate-pulse z-0"></div>

    <div class="relative z-10 max-w-xl mx-auto bg-white/90 border border-[#e4d1b9] rounded-3xl shadow-xl p-10 space-y-6">
        <h1 class="text-3xl font-bold text-[#3e2d1f] text-center">Beri Ulasan</h1>

        <div class="flex items-center gap-4 border-t pt-4 border-[#e2d4c2]">
            <img src="{{ is_array($order_item->product->images) ? asset('storage/' . ($order_item->product->images[0] ?? 'fallback.jpg')) : asset('storage/fallback.jpg') }}"
                 alt="{{ $order_item->product->name }}"
                 class="w-20 h-20 object-contain rounded-xl border border-[#dbc2a6] shadow">
            <div class="flex-1">
                <h2 class="font-semibold text-[#3e2d1f]">{{ $order_item->product->name }}</h2>
                <p class="text-sm text-[#7d6750] italic">Order #{{ $order_item->order_id }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('reviews.store', $order_item->id) }}" class="space-y-6">
            @csrf

            <!-- Rating -->
            <div class="space-y-1">
                <label for="rating" class="block text-sm font-medium text-[#3e2d1f]">Rating</label>
                <select id="rating" name="rating" required
                        class="w-full rounded-md border border-[#d6c5b3] py-2 px-3 bg-white text-gray-700 focus:ring-[#a38f7a] focus:border-[#a38f7a]">
                    <option value="">-- Pilih Rating --</option>
                    @for ($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}">{{ $i }} Bintang</option>
                    @endfor
                </select>
            </div>

            <!-- Komentar -->
            <div class="space-y-1">
                <label for="comment" class="block text-sm font-medium text-[#3e2d1f]">Komentar (Opsional)</label>
                <textarea id="comment" name="comment" rows="4"
                          class="w-full rounded-md border border-[#d6c5b3] py-2 px-3 bg-white text-gray-700 focus:ring-[#a38f7a] focus:border-[#a38f7a]"
                          placeholder="Ceritakan pengalamanmu menggunakan alat ini..."></textarea>
            </div>

            <div class="text-center">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-gradient-to-r from-[#a38f7a] to-[#816c59] text-white font-semibold text-sm shadow-md hover:shadow-lg transition duration-200">
                    Kirim Ulasan
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
