@extends('layouts.app')

@section('title', 'MyLodies - Riwayat')
@section('body_class', 'bg-[#fdfaf5] text-gray-800 font-sans')
@section('loading_screen', true)

@section('content')
<section x-data="{ status: 'All' }" class="min-h-screen pt-[80px] pb-20 px-6 md:px-12 bg-[#fdfaf5] relative overflow-hidden">
    <!-- Glow -->
    <div class="absolute -top-32 -left-24 w-80 h-80 bg-[#f9e5c9] rounded-full filter blur-3xl opacity-40 animate-pulse z-0"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#d2bfa4] rounded-full filter blur-3xl opacity-30 animate-pulse z-0"></div>

    <div class="relative z-10 max-w-5xl mx-auto space-y-12">
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-[#3e2d1f] drop-shadow-sm tracking-tight">Riwayat Peminjaman</h1>
            <p class="text-sm text-[#6c5949] mt-2 italic">Lihat kembali semua transaksi sewa kamu berdasarkan statusnya.</p>
        </div>

        <!-- Filter Status -->
        <div class="flex flex-wrap justify-center gap-4 mb-6">
            @foreach (['All', 'Pending', 'Confirmed', 'Processing', 'Shipped', 'Completed', 'Cancelled'] as $label)
                <button @click="status = '{{ $label }}'"
                        class="flex items-center gap-2 px-5 py-2 rounded-full border border-[#d6b896] text-sm font-medium transition transform hover:scale-105 shadow hover:shadow-md focus:outline-none"
                        :class="{ 'bg-gradient-to-r from-[#f6e8d6] to-[#d6b896] text-[#5a4a3b] ring-2 ring-[#b49875]' : status === '{{ $label }}', 'bg-white text-[#6f5a48]' : status !== '{{ $label }}' }">
                    <i class="fas fa-circle text-xs" :class="status === '{{ $label }}' ? 'text-[#b49875]' : 'text-[#bfb2a3]'"></i>
                    <span>{{ $label }}</span>
                </button>
            @endforeach
        </div>

        <!-- Orders -->
        <div class="space-y-6">
            @foreach ($groupedHistories as $status => $orders)
                @foreach ($orders as $order)
                <div x-show="status === 'All' || status === '{{ ucfirst($status) }}'"
                     class="bg-gradient-to-br from-[#fdf6ee]/70 to-[#f3ede3]/80 p-6 md:p-7 rounded-3xl border border-[#e4d4c3] shadow-lg backdrop-blur-xl transition hover:shadow-xl hover:scale-[1.01] duration-200">
                    <div class="flex flex-col md:flex-row md:items-center gap-6">

                        @php
                            $firstItem = $order->orderItems->first();
                            $firstImage = optional($firstItem->product->images)[0] ?? 'fallback.jpg';
                            $productNames = $order->orderItems->pluck('product.name')->filter()->implode(', ');
                        @endphp

                        <img src="{{ preg_match('/^https?:\/\//', $firstImage) ? $firstImage : asset('storage/' . $firstImage) }}"
                             class="w-24 h-24 object-contain rounded-2xl border border-[#d6c5b3] shadow-sm" />

                        <div class="flex-1 space-y-1">
                           <h3 class="text-xl font-semibold text-[#3e2d1f] tracking-tight">
    Sewa {{ $firstItem->product->name ?? 'Produk' }}
    @if($order->orderItems->count() > 1)
        dan {{ $order->orderItems->count() - 1 }} lainnya
    @endif
</h3>

                            <p class="text-sm text-[#7b6957]">Produk: {{ $productNames }}</p>
                            <p class="text-xs text-[#a08973] italic">Dipesan: {{ $order->created_at->format('d M Y, H:i') }}</p>
                        </div>

                        <div class="flex flex-col justify-between items-end gap-2 text-right min-w-[140px]">
                            <p class="text-[#6e5c4d] font-bold text-sm whitespace-nowrap">
                                IDR {{ number_format($order->total_price, 0, ',', '.') }}
                            </p>
                            <span class="text-xs text-white px-3 py-1 rounded-full bg-[#a38f7a] shadow whitespace-nowrap">
                                {{ ucfirst($order->status) }}
                            </span>
                            <a href="{{ route('order.detail', $order->id) }}"
                               class="inline-flex items-center gap-1 px-4 py-2 rounded-full bg-[#fdf9f3] hover:bg-[#f3eee7] text-[#3e2d1f] border border-[#dec9b0] text-xs font-semibold shadow-sm transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m0 0l3-3m-3 3l3 3" />
                                </svg>
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endforeach
        </div>

        @if ($groupedHistories->flatten(1)->isEmpty())
            <div class="text-center text-[#b09b85] italic pt-12">Belum ada riwayat peminjaman.</div>
        @endif
    </div>
</section>
@endsection
