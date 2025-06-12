<div id="product-skeleton" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-4 gap-10 animate-pulse">
    @for ($i = 0; $i < 6; $i++)
        <div class="relative bg-white rounded-3xl overflow-hidden shadow-lg">
            <!-- Sesuaikan tinggi gambar skeleton -->
            <div class="bg-[#e8dccd] w-full h-60 rounded-t-3xl"></div>

            <div class="p-6 space-y-3">
                <!-- Lebar dan tinggi bar teks disesuaikan -->
                <div class="h-5 bg-[#e8dccd] rounded w-2/3"></div>
                <div class="h-4 bg-[#e8dccd] rounded w-3/5"></div>
                <div class="h-4 bg-[#e8dccd] rounded w-full"></div>
                <div class="h-10 bg-[#e8dccd] rounded-full w-3/5 mt-4"></div>
            </div>
        </div>
    @endfor
</div>


@php
    function is_url($str) {
        return preg_match('/^https?:\/\//', $str) === 1;
    }
@endphp

<div id="product-content" class="hidden">
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
@foreach ($products as $product)
    @php
        $img1 = $product->images[0] ?? 'default.jpg';
        $img2 = $product->images[1] ?? null;

        $img1_url = is_url($img1) ? $img1 : asset('storage/' . $img1);
        $img2_url = $img2 ? (is_url($img2) ? $img2 : asset('storage/' . $img2)) : null;
    @endphp

    <div class="relative bg-white rounded-3xl overflow-hidden shadow-lg transform group hover:shadow-2xl transition-all duration-300 hover:scale-[1.02]">
        <div class="relative">
            <!-- Gambar default -->
            <img src="{{ $img1_url }}"
                 alt="{{ $product->name }}"
                 class="w-full h-52 object-contain transition-opacity duration-500 ease-in-out group-hover:opacity-0">

            <!-- Gambar saat hover (gambar ke-2 jika ada) -->
            @if ($img2_url)
                <img src="{{ $img2_url }}"
                     alt="{{ $product->name }} Hover"
                     class="absolute inset-0 w-full h-52 object-contain opacity-0 transition-opacity duration-500 ease-in-out group-hover:opacity-100">
            @endif

            <div class="absolute top-4 right-4 bg-[#b49875] text-white px-3 py-1 text-xs rounded-full shadow">
                Top Pick
            </div>
        </div>

        <div class="p-6">
            <h3 class="text-xl font-bold text-[#5a4a3b] mb-1 truncate whitespace-nowrap overflow-hidden text-ellipsis">
  {{ $product->name }}
</h3>

            <div class="mt-4">
                <span
                    class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-[#f6e8d6] to-[#e2cbb3] text-[#5a4a3b] font-semibold text-sm shadow-inner border border-[#d6b896] transition-transform duration-300 group-hover:scale-105">
                    IDR {{ number_format($product->rental_price_per_day, 0, ',', '.') }} / Day
                </span>
            </div>

            <!-- Animated Description -->
            <p class="mt-3 text-sm text-gray-600 transform translate-y-4 truncate opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                {{ \Illuminate\Support\Str::limit($product->description, 100) }}
            </p>

            <a href="{{ url('/product/' . $product->slug) }}"
               class="mt-4 inline-block px-5 py-2 border border-[#b49875] text-[#b49875] font-medium rounded-full hover:bg-[#b49875] hover:text-white transition-all duration-300">
                Check Availability
            </a>
        </div>
    </div>
@endforeach
</div>
