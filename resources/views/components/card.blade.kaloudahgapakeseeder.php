            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
    @foreach ($products as $product)
        <div
            class="relative bg-white rounded-3xl overflow-hidden shadow-lg transform group hover:shadow-2xl transition-all duration-300 hover:scale-[1.02]">
            <div class="relative">
                <!-- Gambar default -->
                <img src="{{ asset('storage/' . ($product->images[0] ?? 'default.jpg')) }}"
                     alt="{{ $product->name }}"
                     class="w-full h-52 object-contain transition-opacity duration-500 ease-in-out group-hover:opacity-0">

                <!-- Gambar saat hover (gambar ke-2 jika ada) -->
                @if (isset($product->images[1]))
                    <img src="{{ asset('storage/' . $product->images[1]) }}"
                         alt="{{ $product->name }} Hover"
                         class="absolute inset-0 w-full h-52 object-contain opacity-0 transition-opacity duration-500 ease-in-out group-hover:opacity-100">
                @endif

                <div
                    class="absolute top-4 right-4 bg-[#b49875] text-white px-3 py-1 text-xs rounded-full shadow">
                    Top Pick
                </div>
            </div>

            <div class="p-6">
                <h3 class="text-xl font-bold text-[#5a4a3b] mb-1">{{ $product->name }}</h3>
                <div class="mt-4">
                    <span
                        class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-[#f6e8d6] to-[#e2cbb3] text-[#5a4a3b] font-semibold text-sm shadow-inner border border-[#d6b896] transition-transform duration-300 group-hover:scale-105">
                        IDR {{ number_format($product->rental_price_per_day, 0, ',', '.') }} / Day
                    </span>
                </div>

                <!-- Animated Description -->
                <p class="mt-3 text-sm text-gray-600 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-in-out">
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
