@extends('layouts.app')

@section('title', 'MyLodies - Product')
@section('body_class', 'bg-[#fdfaf5] text-gray-800 font-sans')
@section('loading_screen', true)

@section('content')
<div class="light-stage min-h-screen flex flex-col">
    <!-- Breadcrumb Natural Tanpa Background/Border -->
<div class="w-full pt-[6rem]">
  <nav class="flex items-center text-sm text-[#5e4b3b]" aria-label="Breadcrumb">
    <ol class="flex flex-wrap items-center gap-2 w-full pl-16">
      <li>
        <a href="{{ route('landing') }}" class="inline-flex items-center font-semibold hover:text-[#a38f7a] transition">
          <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10.707 1.293a1 1 0 00-1.414 0l-8 8a1 1 0 001.414 1.414L3 10.414V18a2 2 0 002 2h3a1 1 0 001-1v-4h2v4a1 1 0 001 1h3a2 2 0 002-2v-7.586l.293.293a1 1 0 001.414-1.414l-8-8z"/>
          </svg>
          Home
        </a>
      </li>
      <li><span class="text-[#a38f7a] font-semibold">›</span></li>
      <li>
        <a href="{{ route('catalog') }}" class="font-semibold hover:text-[#a38f7a] transition">
          Products
        </a>
      </li>
      <li><span class="text-[#a38f7a] font-semibold">›</span></li>
      <li class="text-[#7a6650] font-semibold truncate max-w-[150px] md:max-w-[300px]">
        {{ Str::limit($product->name, 50) }}
      </li>
    </ol>
  </nav>
</div>

    <!-- Hero Section -->
    <section class="flex-1 flex items-center justify-center relative bg-[#fdfaf5] py-2 overflow-hidden">
        <div
            class="absolute -top-10 -left-10 w-72 h-72 bg-[#f9e5c9] rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-pulse">
        </div>
        <div
            class="absolute -bottom-16 right-0 w-96 h-96 bg-[#d2bfa4] rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse">
        </div>

        @php
            function is_url($str) {
                return preg_match('/^https?:\/\//', $str) === 1;
            }
        @endphp

        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-stretch px-6 md:px-12 relative z-10 pt-1">


           <!-- Gallery kiri -->
<div class="space-y-6 flex flex-col" x-data="gallerySlideshow()" x-init="start()">
    <div class="relative group overflow-hidden rounded-3xl shadow-xl transition-transform duration-500 transform hover:scale-[1.02] flex-1">
        
        <!-- Container Gambar -->
        <div class="bg-white rounded-2xl overflow-hidden flex items-center justify-center h-[400px] relative">

            <!-- Slideshow Images -->
            <template x-for="(image, index) in images" :key="index">
                <img :src="image"
                    :alt="'Product Image ' + index"
                    x-show="index === currentIndex"
                    x-transition:enter="transition-opacity duration-700"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity duration-700"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute inset-0 w-full h-full object-contain object-center z-0" />
            </template>

            <!-- Dot Animation Inside -->
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 z-10 flex gap-2">
                <template x-for="(dot, i) in 3" :key="i">
                    <div :class="[
                        'w-2.5 h-2.5 rounded-full transition-all duration-500',
                        animationStep === 1 && i === 1 ? 'bg-[#3e2d1f] scale-150 blur-[1px]' :
                        (animationStep === 2 && (i === 0 || i === 2)) ? 'bg-[#c1b1a0] scale-125' :
                        (i === currentIndex) ? 'bg-[#816c59]' : 'bg-[#d8c4ae] opacity-50'
                    ]"></div>
                </template>
            </div>
        </div>

        <!-- Badge -->
        <span class="absolute top-5 left-5 bg-white/80 px-3 py-1 rounded-full text-sm font-medium text-[#3e2d1f] shadow-sm">
            ⭐ {{ $averageRating }} / 5.0
        </span>
        <span class="absolute bottom-5 right-5 bg-gradient-to-r from-[#a38f7a] to-[#816c59] text-white px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wide animate-pulse">
            ⚡ Limited Edition
        </span>
    </div>

    <!-- Thumbnail -->
    <div class="flex gap-3 mt-1">
        @foreach ($product->images as $index => $image)
            @php $imageUrl = is_url($image) ? $image : asset('storage/' . $image); @endphp
            <img @click="goTo({{ $index }})"
                src="{{ $imageUrl }}"
                class="w-20 h-20 object-contain rounded-xl shadow-md cursor-pointer hover:scale-110 transition" />
        @endforeach
    </div>
</div>

<script>
function gallerySlideshow() {
    return {
        images: @json(array_map(fn($img) => is_url($img) ? $img : asset('storage/' . $img), $product->images)),
        currentIndex: 0,
        animationStep: 0, // 0 = normal, 1 = merge center, 2 = rebound
        interval: null,
        stepTimeout: null,

        start() {
            this.interval = setInterval(() => {
                this.animateDots(); // Jalankan animasi dot dulu

                // Ganti gambar setelah jeda transisi dot
                setTimeout(() => {
                    this.currentIndex = (this.currentIndex + 1) % this.images.length;
                }, 1000);
            }, 5000); // 5 detik siklus penuh
        },

        animateDots() {
            // Step 1: merge center
            this.animationStep = 1;
            clearTimeout(this.stepTimeout);

            // Step 2: bounce / pisah balik
            this.stepTimeout = setTimeout(() => {
                this.animationStep = 2;
            }, 500); // merge sebentar lalu rebound

            // Reset
            this.stepTimeout = setTimeout(() => {
                this.animationStep = 0;
            }, 900);
        },

        goTo(index) {
            this.currentIndex = index;
            clearInterval(this.interval);
            clearTimeout(this.stepTimeout);
            this.animationStep = 0;
            this.start();
        }
    }
}
</script>


            <!-- Form kanan -->
            <div
                class="relative max-w-screen mx-auto bg-gradient-to-br from-[#fdf6ee]/70 to-[#f6f1e9]/80 p-8 rounded-3xl border-[1.5px] border-[#dec9b0] shadow-[0_10px_60px_rgba(0,0,0,0.2)] backdrop-blur-3xl overflow-hidden text-[#3e2d1f] animate-fadeIn space-y-5">
                 <!-- Ambient Glow (optional, aesthetic only) -->
                <div class="absolute -top-20 -left-24 w-72 h-72 bg-[#f7e8d5]/40 rounded-full blur-3xl opacity-30 z-0">
                </div>

                <!-- Title & Description -->
                <h2 class="relative z-10 text-3xl font-bold">{{ $product->name }}</h2>
<p class="relative z-10 text-lg text-[#7a6650] font-semibold">
    IDR {{ number_format($product->rental_price_per_day, 0, ',', '.') }}
    <span class="text-sm text-gray-500">/ day</span>
</p>
<p class="relative z-10 text-sm text-[#5e4b3b] italic">
    {{ $product->description }}
</p>



                <!-- Form -->
<form id="rentalForm" method="POST" action="{{ route('order.store', $product->id) }}" class="space-y-3 text-sm relative z-10">
    @csrf



                    <div id="date-range-picker" name="start_date" date-rangepicker datepicker-min-date="{{ $minDate }}" class="flex items-center gap-3">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-[#a38f7a]" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="datepicker-range-start" name="start_date" type="text" autocomplete="off"
                                class="pl-10 w-full rounded-md border border-[#d6c5b3] py-2.5 bg-white/60 text-gray-700 focus:ring-[#a38f7a] focus:border-[#a38f7a] placeholder:text-sm"
                                placeholder="Start date">
                        </div>

                        <span class="text-[#a38f7a] font-semibold">to</span>

                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-[#a38f7a]" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="datepicker-range-end" name="end_date" type="text" autocomplete="off"
                                class="pl-10 w-full rounded-md border border-[#d6c5b3] py-2.5 bg-white/60 text-gray-700 focus:ring-[#a38f7a] focus:border-[#a38f7a] placeholder:text-sm"
                                placeholder="End date">
                        </div>
                    </div>



                    <div
                        class="text-sm bg-[#f9e5c9]/50 text-[#3e2d1f] px-4 py-2 rounded-lg flex justify-between items-center font-semibold shadow-inner border border-[#e4c7aa]">
                        Total Estimate:
                        <span id="priceEstimation">—</span>
                    </div>

                   <div class="flex gap-3 mt-10 pt-10 border-t border-[#e4c7aa]">

    <!-- Add to Cart Button -->
<button type="submit" class="w-1/2 bg-white border border-[#a38f7a] text-[#3e2d1f] font-semibold py-2.5 rounded-full shadow-sm transition-transform hover:-translate-y-1 hover:bg-[#f9e5c9] flex justify-center gap-2 uppercase tracking-wide" formaction="{{ route('cart.store', $product->id) }}">
    <i class="fas fa-shopping-cart"></i> Add to Cart
</button>

<button type="submit"
    class="w-1/2 bg-gradient-to-tr from-[#a38f7a] to-[#8c7a65] hover:from-[#8c7a65] hover:to-[#6b584a] text-white font-semibold py-2.5 rounded-full shadow-md transition-transform hover:-translate-y-1 flex justify-center gap-2 uppercase tracking-wide">
    <i class="fas fa-paper-plane"></i> Rent Now
</button>

</div>

</div>

    </section>
</div>




    <!-- Price Estimator Script -->
   <script>
    const rentalPricePerDay = {{ $product->rental_price_per_day }};
    const rentInput = document.getElementById('datepicker-range-start');
    const returnInput = document.getElementById('datepicker-range-end');
    const priceDisplay = document.getElementById('priceEstimation');

    function calculateEstimate() {
        const startVal = rentInput.value;
        const endVal = returnInput.value;

        if (!startVal || !endVal) {
            priceDisplay.textContent = "—";
            return;
        }

        const startDate = new Date(startVal);
        const endDate = new Date(endVal);

        if (isNaN(startDate.getTime()) || isNaN(endDate.getTime())) {
            priceDisplay.textContent = "—";
            return;
        }

        const diffDays = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24)) + 1;

        if (diffDays <= 0) {
            priceDisplay.textContent = "—";
            return;
        }

        const total = diffDays * rentalPricePerDay;
        priceDisplay.textContent = `IDR ${total.toLocaleString('id-ID')}`;
    }

    // Auto-check terus-menerus tiap 500ms
    setInterval(calculateEstimate, 500);

    // Inisialisasi datepicker jika pakai Flowbite atau lainnya
    document.addEventListener('DOMContentLoaded', function () {
        const el = document.querySelector('[date-rangepicker]');
        if (el) {
            new DateRangePicker(el, {
                format: 'yyyy-MM-dd',
                minDate: new Date(),
            });
        }
    });
</script>


    <!-- Stylish Product Description with SVGs -->
    <section class="relative max-w-6xl mx-auto px-6 py-20">
        <!-- Decorative Background SVGs -->
        <svg class="absolute top-0 left-0 w-40 h-40 text-[#f9e5c9] opacity-30 animate-spin-slow" fill="currentColor"
            viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none" />
        </svg>

        <div class="relative z-10 bg-gradient-to-br from-[#fdf6ee]/90 to-[#f6f1e9]/80 border-4 border-[#a38f7a]/20 shadow-2xl rounded-3xl p-0 overflow-hidden">
            <!-- Decorative Top Bar -->
            <div class="h-3 bg-gradient-to-r from-[#a38f7a] via-[#f9e5c9] to-[#816c59]"></div>
            <div class="p-10 md:p-14">
                <div class="flex items-center gap-4 mb-6">
                    <span class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-[#a38f7a]/10 border-2 border-[#a38f7a]/30 shadow-lg">
                        <svg class="w-8 h-8 text-[#a38f7a]" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6h13M9 6L2 12l7 6" />
                        </svg>
                    </span>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-[#3e2d1f] tracking-tight drop-shadow-lg bg-gradient-to-r from-[#a38f7a] to-[#816c59] bg-clip-text text-transparent">
                        About This Gear
                    </h2>
                </div>

                {{-- Full Description (dinamis dari model) --}}
                <p class="text-base md:text-lg text-[#5e4b3b] leading-relaxed mb-8 italic border-l-4 border-[#a38f7a]/40 pl-6 bg-[#f9e5c9]/30 py-3 shadow-inner">
                    {!! nl2br(e($product->full_description)) !!}
                </p>

                <div class="grid md:grid-cols-2 gap-10 text-base text-[#3e2d1f]">
                    <div>
                        <h3 class="font-bold text-[#a38f7a] mb-3 flex items-center gap-2 text-lg">
                            <svg class="w-5 h-5 text-[#a38f7a]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M12 4v16m8-8H4" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            Highlights
                        </h3>
                        <ul class="list-none space-y-2">
                            @foreach ($product->highlights ?? [] as $highlight)
                            <li class="flex items-start gap-2">
                                <span class="mt-1 w-3 h-3 rounded-full bg-gradient-to-tr from-[#a38f7a] to-[#816c59] shadow"></span>
                                <span class="font-medium">{{ $highlight['value'] ?? '' }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#a38f7a] mb-3 flex items-center gap-2 text-lg">
                            <svg class="w-5 h-5 text-[#a38f7a]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M3 7h18M3 12h18M3 17h18" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            What's Included
                        </h3>
                        <ul class="list-none space-y-2">
                            @foreach ($product->included_items ?? [] as $item)
                            <li class="flex items-start gap-2">
                                <span class="mt-1 w-3 h-3 rounded-full bg-gradient-to-tr from-[#816c59] to-[#a38f7a] shadow"></span>
                                <span class="font-medium">{{ $item['value'] ?? '' }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

               
            </div>
        </div>
    </section>

<!-- User Reviews Section -->
<section class="max-w-5xl mx-auto px-6 py-14">
  <div class="bg-[#fffaf3] border border-[#e4c7aa] rounded-3xl shadow-xl p-8 space-y-8">
    
    <!-- Judul -->
    <h3 class="text-2xl md:text-3xl font-bold text-[#3e2d1f]">User Reviews</h3>

    <!-- Overall Rating Summary -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 bg-[#fffaf3] rounded-2xl p-4 border border-[#e7d4be] shadow-sm">
  <!-- Skor Besar -->
  <div class="text-center md:text-left">
    <div class="text-4xl font-bold text-[#3e2d1f] leading-tight">{{ $averageRating }}</div>
    <div class="text-sm text-[#7a6650]">out of 5.0</div>
  </div>

  <!-- Bintang -->
  <div class="flex items-center gap-1 text-[#f2c94c]">
    @for ($i = 0; $i < round($averageRating); $i++)
      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
        <path d="M9.049 2.927c..." />
      </svg>
    @endfor
  </div>

  <!-- Total Review -->
  <div class="text-sm text-[#7a6650] font-medium md:text-right">
    Based on <span class="font-semibold text-[#3e2d1f]">{{ $totalReviews }} reviews</span>
  </div>
</div>


    <!-- Daftar Review -->
   @foreach ($reviews as $review)
<div class="flex items-start gap-5 bg-white border border-[#e4c7aa] rounded-2xl p-6 shadow-sm">
<!-- Avatar -->
@php
    $avatar = $review->user->profile_picture;

    $avatarUrl = Str::startsWith($avatar, 'http')
        ? $avatar
        : ($avatar ? asset('storage/' . $avatar) : 'https://i.pravatar.cc/100?u=' . $review->user->id);
@endphp

<div class="w-12 h-12 rounded-full overflow-hidden bg-[#f9e5c9] border border-[#dec0a2] shadow-inner">
    <img src="{{ $avatarUrl }}" alt="{{ $review->user->name }}" class="w-full h-full object-cover">
</div>


  <!-- Content -->
  <div class="flex-1 space-y-1">
    <div class="flex justify-between items-center">
      <div class="font-semibold text-[#3e2d1f]">{{ $review->user->name }}</div>
      <div class="text-sm text-[#a38f7a]">{{ $review->created_at->diffForHumans() }}</div>
    </div>

<!-- Stars -->
<div class="flex items-center gap-1 text-[#f2c94c]">
  @for ($i = 1; $i <= 5; $i++)
    <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-[#f2c94c]' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.237 3.8a1 1 0 00.95.69h4.004c.969 0 1.371 1.24.588 1.81l-3.24 2.355a1 1 0 00-.364 1.118l1.237 3.8c.3.921-.755 1.688-1.54 1.118l-3.24-2.355a1 1 0 00-1.176 0l-3.24 2.355c-.784.57-1.838-.197-1.539-1.118l1.236-3.8a1 1 0 00-.364-1.118L2.22 9.227c-.784-.57-.38-1.81.588-1.81h4.005a1 1 0 00.95-.69l1.236-3.8z"/>
    </svg>
  @endfor
</div>


    <!-- Comment -->
    <p class="text-sm text-[#5e4b3b] italic">
      {{ $review->comment ?? 'Tidak ada komentar.' }}
    </p>
  </div>
</div>
@endforeach


  </div>
</section>


    

</body>

</html>

@endsection