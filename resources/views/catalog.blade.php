<!-- resources/views/instruments.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rent Your Sound | Catalog</title>
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="bg-[#fef8f2] text-[#5a4a3b] font-sans">

    <x-navbar />


    <!-- Catalog / Rentals Section -->

    <section id="rentals" class="bg-gradient-to-b from-[#fff8f2] to-[#f9f3ea] py-28 relative overflow-hidden">
    <!-- Background noise -->
    <div class="absolute inset-0 pointer-events-none">
        <img src="{{ asset('images/texture-noise.png') }}" class="w-full h-full object-cover opacity-5" alt="Texture">
    </div>

    <!-- Decorative shapes -->
    <div class="absolute -top-10 -left-10 w-64 h-64 bg-[#f0e1ce] opacity-30 rounded-full blur-3xl pointer-events-none animate-pulse"></div>
    <div class="absolute bottom-0 right-0 w-40 h-40 bg-[#e9d4bd] opacity-20 rounded-full blur-2xl pointer-events-none"></div>

    <div class="max-w-8xl mx-auto px-6 relative z-10">
        <!-- Filters -->
        <div class="flex flex-wrap justify-center gap-4 mb-14">
            @foreach([
                ['icon' => 'keyboard', 'label' => 'Keyboards'],
                ['icon' => 'guitar', 'label' => 'Guitars'],
                ['icon' => 'music', 'label' => 'Winds'],
                ['icon' => 'drum', 'label' => 'Drums'],
                ['icon' => 'heart', 'label' => 'Favorites']
            ] as $filter)
                <button class="flex items-center gap-3 px-5 py-3 rounded-full border border-[#d6b896] bg-gradient-to-r from-[#f6e8d6] to-[#d6b896] text-[#5a4a3b] text-sm font-medium transition-all transform hover:scale-105 shadow-lg hover:shadow-2xl hover:bg-[#f3d0a9] focus:outline-none focus:ring-2 focus:ring-[#b49875] focus:ring-opacity-50">
                    <i class="fas fa-{{ $filter['icon'] }} text-[#b49875]"></i>
                    <span>{{ $filter['label'] }}</span>
                </button>
            @endforeach
        </div>

        <!-- Catalog Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 px-4 lg:px-8">
            @foreach([
                ['img' => 'piano1.jpg', 'name' => 'Yamaha Grand Piano', 'price' => 'IDR 400.000 / Day', 'desc' => 'A premium grand piano with rich tonal quality, ideal for concerts and recordings.'],
                ['img' => 'gitar1.jpg', 'name' => 'Fender Precision Bass', 'price' => 'IDR 290.000 / Day', 'desc' => 'Legendary bass tone for rock, jazz, and funk performances.'],
                ['img' => 'violin1.jpg', 'name' => 'Classic Acoustic Violin', 'price' => 'IDR 400.000 / Day', 'desc' => 'Handcrafted violin with warm, mellow sound. Perfect for orchestras.'],
                ['img' => 'saxophone.jpg', 'name' => 'Saxophone', 'price' => 'IDR 350.000 / Day', 'desc' => 'Smooth and expressive tone, great for jazz sessions and solos.'],
                ['img' => 'drum.jpg', 'name' => 'Drum Set', 'price' => 'IDR 380.000 / Day', 'desc' => 'Full professional drum set with crisp snare and booming bass.'],
                ['img' => 'accordion.jpg', 'name' => 'Accordion', 'price' => 'IDR 330.000 / Day', 'desc' => 'Versatile and traditional, adds color to classical or folk music.'],
            ] as $item)
                <div class="relative bg-white rounded-3xl overflow-hidden shadow-lg transform group hover:shadow-2xl transition-all duration-300 hover:scale-[1.02]">
                    <div class="relative">
                        <img src="{{ asset('images/' . $item['img']) }}" alt="{{ $item['name'] }}" class="w-full h-52 object-cover transition-transform duration-500 ease-in-out group-hover:scale-105">
                        <div class="absolute top-4 right-4 bg-[#b49875] text-white px-3 py-1 text-xs rounded-full shadow">Top Pick</div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#5a4a3b] mb-1">{{ $item['name'] }}</h3>
                        <div class="mt-4">
                            <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-[#f6e8d6] to-[#e2cbb3] text-[#5a4a3b] font-semibold text-sm shadow-inner border border-[#d6b896] transition-transform duration-300 group-hover:scale-105">
                                {{ $item['price'] }}
                            </span>
                        </div>

                        <!-- Animated Description -->
                        <p class="mt-3 text-sm text-gray-600 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                            {{ $item['desc'] }}
                        </p>

                        <button class="mt-4 inline-block px-5 py-2 border border-[#b49875] text-[#b49875] font-medium rounded-full hover:bg-[#b49875] hover:text-white transition-all duration-300">Check Availability</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

    

