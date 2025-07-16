@extends('layouts.app')

@section('title', 'MyLodies - Riwayat')
@section('body_class', 'bg-[#fdfaf5] text-gray-800 font-sans pt-[60px] overflow-x-hidden')
@section('loading_screen', true)

@section('content')
<div class="light-stage relative z-10 w-full max-w-[1280px] mx-auto px-4 md:px-6 py-16">
    <div class="flex flex-col lg:flex-row gap-8 items-start">

        <!-- Sidebar -->
        <aside class="w-full lg:w-[280px] shrink-0 bg-white/40 backdrop-blur-lg border border-[#e5d5c2]/40 rounded-3xl shadow-xl px-6 py-10 flex flex-col items-center text-center">
            @if (Auth::user()->profile_picture)
                <img
                    src="{{ Str::startsWith(Auth::user()->profile_picture, 'http') 
                            ? Auth::user()->profile_picture 
                            : '/storage/' . Auth::user()->profile_picture }}"
                    alt="Profile Picture"
                    class="w-24 h-24 rounded-full object-cover ring-4 ring-[#eee1d2] shadow-md hover:scale-105 transition-transform duration-300" />
            @else
                <i class="bx bxs-user-circle text-[90px] text-[#67574b] drop-shadow-md"></i>
            @endif

            <div class="mt-4 text-lg font-semibold">{{ Auth::user()->name ?? 'User' }}</div>
            <div class="text-sm text-[#887466] mb-6">{{ Auth::user()->email }}</div>

            <nav class="w-full space-y-2 mt-4">
                @foreach([
                    ['#', 'Rent History', 'bx-history'],
                    ['edit', 'Change Password', 'bx-lock'],
                    ['settings', 'Settings', 'bx-cog'],
                ] as [$url, $label, $icon])
                    <a href="{{ $url }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium 
                       {{ $label == 'Rent History' ? 'bg-[#ae8e73] text-white shadow' : 'hover:bg-[#e6d8cb]/50 text-[#49392d]' }} 
                       transition-all duration-300">
                        <i class="bx {{ $icon }} text-[18px]"></i> {{ $label }}
                    </a>
                @endforeach
            </nav>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="mt-8 text-sm text-[#a08b78] hover:underline">Logout</a>
        </aside>

        <!-- Main Section -->
        <section x-data="{ status: 'All' }" class="flex-1 min-h-screen relative overflow-hidden">
            <!-- Glow -->
            <div class="absolute -top-32 -left-24 w-80 h-80 bg-[#f9e5c9] rounded-full filter blur-3xl opacity-40 animate-pulse z-0"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#d2bfa4] rounded-full filter blur-3xl opacity-30 animate-pulse z-0"></div>

            <div class="relative z-10 space-y-12">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold text-[#3e2d1f] drop-shadow-sm tracking-tight">Rent Histoyr</h1>
                    <p class="text-sm text-[#6c5949] mt-2 italic">Review all your rental transactions based on their status.</p>
                </div>

                <!-- Filter Status -->
                <div class="flex flex-wrap justify-center gap-4 mb-6">
                    @foreach (['All', 'Pending', 'Processing', 'Shipped', 'arrive', 'Cancelled', 'returned'] as $label)
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
                                            Rent {{ $firstItem->product->name ?? 'Produk' }}
                                            @if($order->orderItems->count() > 1)
                                                and {{ $order->orderItems->count() - 1 }} More
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
                                           View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>

                @if ($groupedHistories->flatten(1)->isEmpty())
                    <div class="text-center text-[#b09b85] italic pt-12">There is no borrowing history yet.</div>
                @endif
            </div>
        </section>

    </div>
</div>
@endsection
