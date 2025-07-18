@php
    function is_url($str) {
        return preg_match('/^https?:\/\//', $str) === 1;
    }
@endphp

<!-- Wrapper Alpine -->
<div x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 600)">
<div class="light-stage"></div>
    <!-- ✅ SKELETON (Fade out natural) -->
    <div
        x-show="!loaded"
        x-transition:leave="transition-opacity duration-100 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-4 gap-10 animate-pulse"
    >
        @for ($i = 0; $i < 6; $i++)
            <div class="relative bg-white rounded-3xl overflow-hidden shadow-lg">
                <div class="bg-[#e8dccd] w-full h-60 rounded-t-3xl"></div>
                <div class="p-6 space-y-3">
                    <div class="h-5 bg-[#e8dccd] rounded w-2/3"></div>
                    <div class="h-4 bg-[#e8dccd] rounded w-3/5"></div>
                    <div class="h-4 bg-[#e8dccd] rounded w-full"></div>
                    <div class="h-10 bg-[#e8dccd] rounded-full w-3/5 mt-4"></div>
                </div>
            </div>
        @endfor
    </div>

    <!-- ✅ PRODUK (intersect animasi) -->
    <div
        x-show="loaded"
        x-transition:enter="transition-opacity duration-300 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-cloak
        class="light-stage grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 2xl:grid-cols-4 gap-8"
    >
        @foreach ($products as $index => $product)
            @php
                $img1 = $product->images[0] ?? 'default.jpg';
                $img2 = $product->images[1] ?? null;
                $img1_url = is_url($img1) ? $img1 : asset('storage/' . $img1);
                $img2_url = $img2 ? (is_url($img2) ? $img2 : asset('storage/' . $img2)) : null;
            @endphp

            <div class="relative bg-white rounded-3xl overflow-hidden shadow-lg transform group hover:shadow-2xl transition-all duration-300 hover:scale-[1.02]
                opacity-0 translate-y-6 motion-safe:transition-all motion-safe:duration-500 motion-safe:ease-out
                intersect-once intersect:opacity-100 intersect:translate-y-0 motion-delay-{{ $index * 100 }}"
            >
                <div class="relative">
                    <img src="{{ $img1_url }}"
                         alt="{{ $product->name }}"
                         class="w-full h-52 object-contain transition-opacity duration-500 ease-in-out group-hover:opacity-0">

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
                        <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-[#f6e8d6] to-[#e2cbb3] text-[#5a4a3b] font-semibold text-sm shadow-inner border border-[#d6b896] transition-transform duration-300 group-hover:scale-105">
                            IDR {{ number_format($product->rental_price_per_day, 0, ',', '.') }} / Day
                        </span>
                    </div>

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
</div>
