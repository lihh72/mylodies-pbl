@extends('layouts.app')

@section('title', 'MyLodies - Product')
@section('body_class', 'bg-[#fdfaf5] text-gray-800 font-sans')
@section('loading_screen', true)

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-[#fdfaf5] py-20 overflow-hidden">
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

<div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-stretch px-6 md:px-12 relative z-10 pt-9">


    <!-- Gallery kiri -->
    <div class="space-y-6 flex flex-col">
        <div
            class="relative group overflow-hidden rounded-3xl shadow-xl transition-transform duration-500 transform hover:scale-[1.02] flex-1">
            @php
                $mainImage = $product->images[0] ?? 'fallback.jpg';
                $mainImageUrl = is_url($mainImage) ? $mainImage : asset('storage/' . $mainImage);
            @endphp
            <div class="bg-white rounded-2xl overflow-hidden flex items-center justify-center h-[400px]">
    <img id="mainImage"
        src="{{ $mainImageUrl }}"
        alt="{{ $product->name }}"
        class="object-contain object-center w-full h-full transition duration-300" />
</div>


            <span
                class="absolute top-5 left-5 bg-white/80 px-3 py-1 rounded-full text-sm font-medium text-[#3e2d1f] shadow-sm">
                ⭐ 4.8 / 5.0
            </span>
            <span
                class="absolute bottom-5 right-5 bg-gradient-to-r from-[#a38f7a] to-[#816c59] text-white px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wide animate-pulse">
                ⚡ Limited Edition
            </span>
        </div>
        <div class="flex gap-3">
            @foreach ($product->images as $image)
                @php
                    $imageUrl = is_url($image) ? $image : asset('storage/' . $image);
                @endphp
                <img onclick="document.getElementById('mainImage').src='{{ $imageUrl }}'"
                    src="{{ $imageUrl }}"
                    class="w-20 h-20 object-contain rounded-xl shadow-md cursor-pointer hover:scale-110 transition" />
            @endforeach
        </div>
    </div>

    <!-- Form kanan -->
    <div
        class="relative max-w-screen mx-auto bg-gradient-to-br from-[#fdf6ee]/70 to-[#f6f1e9]/80 p-8 rounded-3xl border-[1.5px] border-[#dec9b0] shadow-[0_10px_60px_rgba(0,0,0,0.2)] backdrop-blur-3xl overflow-hidden text-[#3e2d1f] animate-fadeIn space-y-5">
         <!-- Ambient Glow (optional, aesthetic only) -->
                <div class="absolute -top-20 -left-24 w-72 h-72 bg-[#f7e8d5]/40 rounded-full blur-3xl opacity-30 z-0">
                </div>

                <!-- Title & Description -->
                <h2 class="relative z-10 text-4xl font-extrabold">{{ $product->name }}</h2>
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



                    <div id="date-range-picker" name="start_date" date-rangepicker class="flex items-center gap-3">
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



                    <div class="relative">
                        <i class="fas fa-truck absolute left-3 top-3.5 text-[#a38f7a]"></i>
                        <select id="pickup_method" name="pickup_method"
                            class="pl-10 w-full rounded-md border border-[#d6c5b3] py-2.5 bg-white/60 text-gray-700 focus:ring-[#a38f7a] focus:border-[#a38f7a] transition"
                            required>
                            <option disabled selected value="">Choose Pickup Method</option>
                            <option value="pickup">🎚 Pickup</option>
                            <option value="delivery">🚚 Delivery</option>
                        </select>
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




    <!-- Price Estimator Script -->
    <script>

        document.addEventListener('DOMContentLoaded', function () {
  const el = document.querySelector('[date-rangepicker]');
  if (el) {
    new DateRangePicker(el, {
      format: 'yyyy-MM-dd',
      minDate: new Date(),
    });
  }
});
        const rentInput = document.getElementById('datepicker-range-start');
const returnInput = document.getElementById('datepicker-range-end');

        const priceDisplay = document.getElementById('priceEstimation');

        function calculatePrice() {
            const rentDate = new Date(rentInput.value);
            const returnDate = new Date(returnInput.value);
            const diffTime = returnDate - rentDate;
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            if (diffDays > 0) {
                const price = diffDays * 100000;
                priceDisplay.textContent = `IDR ${price.toLocaleString()}`;
            } else {
                priceDisplay.textContent = "—";
            }
        }

        rentInput.addEventListener('change', calculatePrice);
        returnInput.addEventListener('change', calculatePrice);
    </script>
    <!-- Stylish Product Description with SVGs -->
<section class="relative max-w-6xl mx-auto px-6 py-20">
    <!-- Decorative Background SVGs -->
    <svg class="absolute top-0 left-0 w-40 h-40 text-[#f9e5c9] opacity-30 animate-spin-slow" fill="currentColor"
        viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none" />
    </svg>

    <div class="bg-white/80 backdrop-blur-xl p-10 rounded-3xl shadow-xl relative z-10">
        <h2 class="text-3xl font-extrabold text-[#3e2d1f] mb-6 flex items-center gap-2">
            <svg class="w-7 h-7 text-[#a38f7a]" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6h13M9 6L2 12l7 6" />
            </svg>
            About This Gear
        </h2>

        {{-- Full Description (dinamis dari model) --}}
        <p class="text-sm md:text-base text-gray-700 leading-relaxed mb-6">
            {!! nl2br(e($product->full_description)) !!}
        </p>

        <div class="grid md:grid-cols-2 gap-8 text-sm md:text-base text-gray-600">
            <div>
                <h3 class="font-bold text-[#3e2d1f] mb-3 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#a38f7a]" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path d="M12 4v16m8-8H4" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    Highlights
                </h3>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($product->highlights ?? [] as $highlight)
    <li>{{ $highlight['value'] ?? '' }}</li>
@endforeach

                </ul>
            </div>
            <div>
                <h3 class="font-bold text-[#3e2d1f] mb-3 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#a38f7a]" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path d="M3 7h18M3 12h18M3 17h18" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    What's Included
                </h3>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($product->included_items ?? [] as $item)
    <li>{{ $item['value'] ?? '' }}</li>
@endforeach

                </ul>
            </div>
        </div>

        <!-- Stylish Badge -->
        <div
            class="absolute -top-5 right-5 bg-gradient-to-r from-[#a38f7a] to-[#816c59] text-white text-xs px-4 py-1 rounded-full font-semibold shadow-md animate-pulse">
            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M5 13l4 4L19 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            {{ $product->badge ?? 'Limited Edition' }}
        </div>
    </div>
</section>


    <!-- Testimonials -->
    <section class="max-w-7xl mx-auto py-20 text-center space-y-10">
        <h2 class="text-3xl font-bold text-[#3e2d1f]">What Our Customers Say</h2>
        <div class="grid md:grid-cols-3 gap-10">
            <div
                class="bg-white/80 backdrop-blur rounded-2xl shadow-xl p-6 hover:-translate-y-1 hover:shadow-2xl transition">
                <p class="italic text-sm">"Amazing guitar quality. Sounded incredible at my live show!"</p>
                <div class="mt-4 flex justify-center gap-1 text-[#a38f7a] text-sm">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="far fa-star"></i>
                </div>
                <p class="mt-2 text-xs text-gray-500">— Alex, Musician</p>
            </div>
            <div
                class="bg-white/80 backdrop-blur rounded-2xl shadow-xl p-6 hover:-translate-y-1 hover:shadow-2xl transition">
                <p class="italic text-sm">"Smooth rental process, fast delivery, great support."</p>
                <div class="mt-4 flex justify-center gap-1 text-[#a38f7a] text-sm">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="mt-2 text-xs text-gray-500">— Jamie, Producer</p>
            </div>
            <div
                class="bg-white/80 backdrop-blur rounded-2xl shadow-xl p-6 hover:-translate-y-1 hover:shadow-2xl transition">
                <p class="italic text-sm">"Looks brand new. Loved the whole experience!"</p>
                <div class="mt-4 flex justify-center gap-1 text-[#a38f7a] text-sm">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="mt-2 text-xs text-gray-500">— Mia, Performer</p>
            </div>
        </div>
    </section>

</body>

</html>

@endsection