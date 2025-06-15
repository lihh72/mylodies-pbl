@extends('layouts.app')

@section('title', 'Detail Order')
@section('body_class', 'bg-[#fdfaf5] text-gray-800 font-sans')
@section('loading_screen', true)

@section('content')
<section class="min-h-screen pt-[80px] pb-20 px-6 md:px-12 bg-[#fdfaf5] relative overflow-hidden">
    <!-- Glow Background -->
    <div class="absolute -top-32 -left-24 w-[400px] h-[400px] bg-[#fcecd6] rounded-full filter blur-3xl opacity-50 animate-pulse z-0"></div>
    <div class="absolute bottom-0 right-0 w-[420px] h-[420px] bg-[#dac4a9] rounded-full filter blur-3xl opacity-40 animate-pulse z-0"></div>

    <div class="relative z-10 max-w-5xl mx-auto space-y-12">

        <!-- Heading -->
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-[#3e2d1f] tracking-tight drop-shadow">
                Detail Peminjaman
            </h1>
            <p class="text-sm text-[#7d6750] mt-1 italic">Rincian lengkap transaksi sewa alat musik kamu</p>
        </div>

        <!-- Main Card -->
        <div class="bg-gradient-to-br from-[#fdf6ee]/90 to-[#f6f1e9]/80 border-4 border-[#a38f7a]/20 shadow-2xl rounded-3xl overflow-hidden">
            <!-- Top Bar -->
            <div class="h-3 bg-gradient-to-r from-[#a38f7a] via-[#f9e5c9] to-[#816c59]"></div>

            <div class="px-6 md:px-10 py-10 space-y-10">

                <!-- Order Info -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm text-[#7a6452] font-medium">Kode Order</p>
                        <h3 class="text-xl font-bold text-[#3e2d1f] tracking-wide">{{ $order->id }}</h3>

                        @if($order->payment && $order->payment->midtrans_order_id)
                        <p class="text-sm text-[#7a6452] font-medium mt-4">Midtrans Order ID</p>
                        <span class="mt-1 inline-block font-mono text-sm bg-white/70 text-[#3e2d1f] px-4 py-2 border border-[#d5c4a6] rounded-lg shadow-sm">
                            {{ $order->payment->midtrans_order_id }}
                        </span>
                        @endif
                    </div>

                    <div class="flex md:justify-end items-start mt-4 md:mt-0">
                        <span class="px-4 py-1 text-xs font-semibold rounded-full bg-gradient-to-r from-[#a38f7a] to-[#816c59] text-white shadow-md">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>

                <!-- Payment Info -->
                <div class="grid md:grid-cols-2 gap-6 text-sm text-[#4f3d30]">
                    <div>
                        <p class="font-semibold text-[#6b5645] mb-1">Status Pembayaran</p>
                        <div class="bg-white/70 rounded-xl px-4 py-3 border border-[#dac3a8] shadow-sm">
                            {{ ucfirst($order->payment->payment_status ?? 'Belum Diproses') }}
                        </div>
                    </div>

                </div>



                <!-- Item List -->
<div class="border-t border-[#d8bea2] pt-6">
    <h2 class="text-lg font-bold text-[#3e2d1f] mb-4">Item Disewa</h2>
    <div class="grid gap-6">
        @foreach ($order->orderItems as $item)
        @php
            $product = $item->product;
            $img = is_array($product->images) ? $product->images[0] ?? 'fallback.jpg' : 'fallback.jpg';
            $start = \Carbon\Carbon::parse($item->start_date);
            $end = \Carbon\Carbon::parse($item->end_date);
            $days = $start->diffInDays($end) + 1;
            $subtotal = $item->price * $item->quantity * $days;
        @endphp
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-5 p-5 bg-white/85 border border-[#e8d5bd] rounded-2xl shadow-sm hover:shadow-md transition">
            <img src="{{ preg_match('/^https?:\/\//', $img) ? $img : asset('storage/' . $img) }}"
                 class="w-24 h-24 object-contain rounded-xl border border-[#d1c1a5]" alt="{{ $product->name }}" />
            <div class="flex-1">
                <h3 class="text-base font-bold text-[#3e2d1f]">{{ $product->name }}</h3>
                <p class="text-sm text-[#6c5748]">{{ Str::limit($product->description, 100) }}</p>
                <p class="text-xs mt-1 text-[#998976] italic">
                    {{ $item->quantity }} barang × IDR {{ number_format($item->price, 0, ',', '.') }} × {{ $days }} hari
                </p>
                <p class="text-sm text-[#4a3828] font-semibold mt-1">
                    = IDR {{ number_format($subtotal, 0, ',', '.') }}
                </p>
                <p class="text-xs mt-2 text-[#7a6d58] italic">
                    Durasi: {{ $start->format('d M Y') }} → {{ $end->format('d M Y') }} ({{ $days }} hari)
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Total Pembayaran -->
<div class="border-t border-[#d8bea2] pt-6">
    <p class="text-lg font-semibold text-[#6b5645] mb-2">Total Pembayaran</p>
    <div class="bg-white/80 px-6 py-4 rounded-2xl border border-[#dac3a8] shadow-inner text-[#2d1e14] text-xl font-extrabold">
        IDR {{ number_format($order->total_price, 0, ',', '.') }}
    </div>
</div>

<!-- Tombol Aksi -->
<div class="flex flex-col md:flex-row justify-between items-center gap-4 pt-10 border-t border-[#d8bea2]">
    <a href="{{ route('history.index') }}"
       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-white/70 border border-[#dac3a8] text-[#4f3d30] font-medium text-sm shadow-sm hover:shadow-md transition duration-200">
        <svg class="w-4 h-4 text-[#816c59]" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
            <path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Kembali ke Riwayat
    </a>

    @if(strtolower($order->payment->payment_status ?? '') === 'pending' && $order->payment?->code)
        <a href="{{ url('/payment/' . $order->payment->code) }}"
           class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-[#a38f7a] to-[#816c59] text-white font-semibold text-sm shadow-md hover:shadow-lg transition duration-200">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path d="M17 9V7a4 4 0 0 0-8 0v2m-2 0h12v10H7V9z" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Bayar Sekarang
        </a>
    @endif
</div>

            </div>
        </div>
    </div>
</section>
@endsection
