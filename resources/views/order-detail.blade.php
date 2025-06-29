@extends('layouts.app')

@section('title', 'Detail Order')
@section('body_class', 'bg-[#fdfaf5] text-gray-800 font-sans')
@section('loading_screen', true)

@section('content')
<section class="light-stage min-h-screen pt-24 pb-20 px-6 md:px-12 bg-[#fdfaf5] relative overflow-hidden">
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

@php
    $statusSteps = [
        'pending' => ['label' => 'Pesanan Dibuat', 'icon' => 'document'],
        'processing' => ['label' => 'Pembayaran Dikonfirmasi', 'icon' => 'credit-card'],
        'shipped' => ['label' => 'Pesanan Dikirim', 'icon' => 'truck'],
        'arrive' => ['label' => 'Pesanan Sampai', 'icon' => 'box'],
    ];

    $statusOrder = $order->status;
    $statusSequence = array_keys($statusSteps);
    $currentStepIndex = array_search($statusOrder, $statusSequence);
@endphp

<div class="flex items-center justify-between overflow-x-auto px-2 py-6 gap-3">
    @foreach($statusSequence as $index => $status)
        @php
            $step = $statusSteps[$status];
            $isActive = $index <= $currentStepIndex;
            $isLast = $index === count($statusSequence) - 1;
        @endphp

        <div class="relative flex items-center gap-2 {{ !$isLast ? 'flex-1' : '' }}">
            <!-- Icon Circle -->
            <div class="flex flex-col items-center text-center w-24 min-w-[72px]">
                <div class="w-10 h-10 rounded-full border-2 flex items-center justify-center 
                    {{ $isActive ? 'border-[#22c55e] bg-[#f0fdf4]' : 'border-gray-300 bg-white' }}">
                    @switch($step['icon'])
                        @case('document')
                            <svg class="w-5 h-5 {{ $isActive ? 'text-[#22c55e]' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
  <path d="M8 16h8M8 12h8M8 8h4m6-2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4z" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

                            @break
                        @case('credit-card')
                            <svg class="w-5 h-5 {{ $isActive ? 'text-[#22c55e]' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
  <rect x="2" y="5" width="20" height="14" rx="2" ry="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M2 10h20M6 15h2m2 0h6" stroke-linecap="round"/>
</svg>

                            @break
                        @case('truck')
                            <svg class="w-5 h-5 {{ $isActive ? 'text-[#22c55e]' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
  <path d="M3 13V6a1 1 0 011-1h11v8h5.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V19a1 1 0 01-1 1H19" stroke-linecap="round" stroke-linejoin="round"/>
  <circle cx="7.5" cy="19.5" r="1.5"/>
  <circle cx="17.5" cy="19.5" r="1.5"/>
</svg>

                            @break
                        @case('box')
                            <svg class="w-5 h-5 {{ $isActive ? 'text-[#22c55e]' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
  <path d="M21 16V8l-9-4-9 4v8l9 4 9-4z" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M3.3 7.8L12 12.5l8.7-4.7" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

                            @break
                    @endswitch
                </div>

                <div class="mt-1 text-xs md:text-sm font-medium {{ $isActive ? 'text-green-600' : 'text-gray-400' }}">
                    {{ $step['label'] }}
                </div>
            </div>

            <!-- Connector Line -->
            @if(!$isLast)
                <div class="flex-1 h-1 {{ $index < $currentStepIndex ? 'bg-green-500' : 'bg-gray-300' }}"></div>
            @endif
        </div>
    @endforeach
</div>


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
                            <p class="text-sm text-[#7d6750] font-semibold uppercase mb-1">Alamat Pengiriman</p>
                            <p class="bg-white/70 px-4 py-3 border border-[#dac3a8] rounded-lg text-base leading-relaxed">
                                {{ $order->shipping_address }}
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

                <!-- RINGKASAN PEMBAYARAN -->
<div class="space-y-3 border-t pt-6 border-[#e2d4c2]">
    <h2 class="text-lg font-bold text-[#3e2d1f]">Ringkasan Pembayaran</h2>

    @php
        $subtotal = 0;
        foreach ($order->orderItems as $item) {
            $days = \Carbon\Carbon::parse($item->start_date)->diffInDays(\Carbon\Carbon::parse($item->end_date)) + 1;
            $subtotal += $item->price * $item->quantity * $days;
        }

        $total = $order->payment->gross_amount ?? $order->total_price;
        $diskon = $subtotal - $total;
    @endphp

    <div class="space-y-2 text-sm text-[#3e2d1f]">
        <div class="flex justify-between">
            <span>Subtotal Produk</span>
            <span>IDR {{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>

        @if($diskon > 0)
        <div class="flex justify-between">
            <span class="text-[#816c59]">Diskon</span>
            <span class="text-[#a94442]">- IDR {{ number_format($diskon, 0, ',', '.') }}</span>
        </div>
        @endif

        {{-- Tambahkan biaya tambahan lain jika ada --}}
        {{-- Contoh biaya layanan tetap Rp0 --}}
        <div class="flex justify-between">
            <span class="text-[#816c59]">Biaya Layanan</span>
            <span>IDR 0</span>
        </div>

        <hr class="my-2 border-[#dbc8b2]">

        <div class="flex justify-between font-bold text-lg text-[#2c1c10]">
            <span>Total Pembayaran</span>
            <span>IDR {{ number_format($total, 0, ',', '.') }}</span>
        </div>
    </div>
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
@elseif(!empty($order->invoice_number))
    <a href="{{ route('invoice.show', ['order' => $order->id]) }}"
       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#f9e5c9] border border-[#a38f7a] text-[#3e2d1f] font-semibold text-sm shadow hover:bg-[#f5ddbe] transition">
        <svg class="w-4 h-4 text-[#3e2d1f]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Cek Invoice
    </a>
@endif

                </div>

            </div>
        </div>
    </div>
</section>
@endsection
