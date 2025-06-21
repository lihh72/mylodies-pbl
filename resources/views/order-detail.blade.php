@extends('layouts.app')

@section('title', 'Detail Order')
@section('body_class', 'bg-[#fdfaf5] text-gray-800 font-sans')
@section('loading_screen', true)

@section('content')
<section class="min-h-screen pt-24 pb-20 px-6 md:px-12 bg-[#fdfaf5] relative overflow-hidden">
    <!-- Latar belakang glow -->
    <div class="absolute -top-40 -left-32 w-[400px] h-[400px] bg-[#fcecd6] rounded-full blur-3xl opacity-50 animate-pulse z-0"></div>
    <div class="absolute bottom-0 right-0 w-[420px] h-[420px] bg-[#dac4a9] rounded-full blur-3xl opacity-40 animate-pulse z-0"></div>

    <div class="relative z-10 max-w-4xl mx-auto space-y-12">
        <!-- Heading -->
        <div class="text-center space-y-1">
            <h1 class="text-4xl font-bold text-[#3e2d1f] tracking-tight">Rincian Order #{{ $order->id }}</h1>
            <p class="text-sm text-[#7d6750] italic">Informasi lengkap penyewaan alat musik kamu</p>
        </div>

        <!-- Kartu utama -->
        <div class="bg-white/90 border border-[#dbc8b2] shadow-xl rounded-2xl overflow-hidden">
            <div class="h-2 bg-gradient-to-r from-[#a38f7a] via-[#f9e5c9] to-[#816c59]"></div>

            <div class="p-8 space-y-10">

                <!-- INFORMASI ORDER -->
                <div class="grid md:grid-cols-2 gap-8 text-sm text-[#3e2d1f] font-medium leading-snug">
                    <!-- Kolom Kiri -->
                    <div class="flex flex-col justify-between gap-5">
                        <div>
                            <p class="text-sm text-[#7d6750] font-semibold uppercase mb-1">Nama Penyewa</p>
                            <p class="text-base font-bold">{{ $order->user->name }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-[#7d6750] font-semibold uppercase mb-1">No. Telepon</p>
                            <p class="text-base">{{ $order->phone_number }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-[#7d6750] font-semibold uppercase mb-1">Status Pembayaran</p>
                            <p class="text-base">{{ ucfirst($order->payment->payment_status ?? 'Belum Diproses') }}</p>
                        </div>

                        @if($order->payment && $order->payment->midtrans_order_id)
                        <div>
                            <p class="text-sm text-[#7d6750] font-semibold uppercase mb-1">Midtrans Order ID</p>
                            <span class="inline-block font-mono text-sm px-3 py-1 bg-white/70 border border-[#dac3a8] rounded-lg shadow-sm">
                                {{ $order->payment->midtrans_order_id }}
                            </span>
                        </div>
                        @endif
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="flex flex-col justify-between gap-5">
                        <div>
                            <p class="text-sm text-[#7d6750] font-semibold uppercase mb-1">Status Order</p>
                            <span class="inline-block px-4 py-1 text-sm font-semibold rounded-full bg-gradient-to-r from-[#a38f7a] to-[#816c59] text-white shadow-md">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>

                        <div>
                            <p class="text-sm text-[#7d6750] font-semibold uppercase mb-1">Alamat Pengiriman</p>
                            <p class="bg-white/70 px-4 py-3 border border-[#dac3a8] rounded-lg text-base leading-relaxed">
                                {{ $order->shipping_address }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-[#7d6750] font-semibold uppercase mb-1">Total Pembayaran</p>
                            <p class="text-xl font-extrabold text-[#2c1c10] tracking-wide">
                                IDR {{ number_format($order->total_price, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ITEM DISEWA -->
                <div class="space-y-6 border-t pt-6 border-[#e2d4c2]">
                    <h2 class="text-lg font-bold text-[#3e2d1f]">Item Disewa</h2>

                    @foreach ($order->orderItems as $item)
                    @php
                        $product = $item->product;
                        $img = is_array($product->images) ? $product->images[0] ?? 'fallback.jpg' : 'fallback.jpg';
                        $start = \Carbon\Carbon::parse($item->start_date);
                        $end = \Carbon\Carbon::parse($item->end_date);
                        $days = $start->diffInDays($end) + 1;
                        $subtotal = $item->price * $item->quantity * $days;
                    @endphp
                    <div class="flex gap-5 items-start bg-white/80 border border-[#e3d6c3] p-5 rounded-xl shadow-sm hover:shadow-md transition">
                        <img src="{{ preg_match('/^https?:\/\//', $img) ? $img : asset('storage/' . $img) }}"
                             class="w-24 h-24 object-contain rounded-lg border border-[#d1c1a5]" alt="{{ $product->name }}">
                        <div class="flex-1 space-y-1">
                            <h3 class="text-base font-semibold text-[#3e2d1f]">{{ $product->name }}</h3>
                            <p class="text-sm text-[#6c5748]">{{ Str::limit($product->description, 100) }}</p>
                            <p class="text-xs mt-1 italic text-[#998976]">
                                {{ $item->quantity }} × IDR {{ number_format($item->price, 0, ',', '.') }} × {{ $days }} hari
                            </p>
                            <p class="text-sm text-[#4a3828] font-semibold">= IDR {{ number_format($subtotal, 0, ',', '.') }}</p>
                            <p class="text-xs mt-1 text-[#7a6d58] italic">
                                {{ $start->format('d M Y') }} → {{ $end->format('d M Y') }} ({{ $days }} hari)
                            </p>
                            <!-- Tombol Review -->
@if($order->status === 'arrive' && !$item->review)
    <div class="pt-3">
        <a href="{{ route('reviews.create', ['order_item' => $item->id]) }}"
           class="inline-block px-4 py-2 text-sm rounded-full bg-[#f9e5c9] border border-[#a38f7a] text-[#3e2d1f] font-semibold shadow hover:bg-[#f5ddbe] transition">
            ✍️ Beri Ulasan
        </a>
    </div>
@endif
                        </div>
                    </div>
                    @endforeach
                </div>


                <!-- Tombol Aksi -->
                <div class="pt-8 flex flex-col md:flex-row justify-between items-center gap-4 border-t border-[#e0ccb1]">
                    <a href="{{ route('history.index') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-white/70 border border-[#dac3a8] text-[#4f3d30] font-medium text-sm shadow-sm hover:shadow-md transition duration-200">
                        <svg class="w-4 h-4 text-[#816c59]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Kembali ke Riwayat
                    </a>

                    @if(strtolower($order->payment->payment_status ?? '') === 'pending' && $order->payment?->code)
                        <a href="{{ url('/payment/' . $order->payment->code) }}"
                           class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-[#a38f7a] to-[#816c59] text-white font-semibold text-sm shadow-md hover:shadow-lg transition duration-200">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
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
