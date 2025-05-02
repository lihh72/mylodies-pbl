<!-- resources/views/instruments.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Music Instruments</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .filter-button {
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .filter-button:hover {
            filter: brightness(0.85);
            transform: scale(1.1);
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .check-button {
            transition: transform 0.2s ease;
        }

        .check-button:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-white">
    <!-- Header -->
    <header class="bg-[#9D8B76] flex items-center justify-between px-6 py-4 shadow-md">
        <div class="flex items-center space-x-2">
            <img alt="Logo" class="w-12 h-12 object-contain" src="{{ asset('images/logo.png') }}" />
        </div>
        <div class="flex-1 max-w-md mx-6">
            <div class="relative">
                <input class="w-full rounded-full py-1 pl-4 pr-10 text-gray-400 text-sm font-sans outline-none"
                    placeholder="Search" style="background-color: #F9F6F0; border: 2.5px solid black" type="text" />
                <button aria-label="Search"
                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-[#9D8B76] w-6 h-6 rounded-full flex items-center justify-center p-0">
                    <i class="fas fa-search text-black text-xs"></i>
                </button>
            </div>
        </div>
        <div class="flex items-center space-x-6 text-black text-2xl cursor-pointer -translate-y-1">
            <i class="fas fa-shopping-cart"></i>
            <i class="fas fa-user-circle"></i>
        </div>
    </header>

    <!-- Filters -->
    <section
        class="flex justify-center gap-16 py-8 px-4 max-w-6xl mx-auto text-[#3A3A3A] text-sm font-semibold font-sans">
        @foreach ([['icon' => 'keyboard', 'label' => 'Keyboard'], ['icon' => 'guitar', 'label' => 'Guitar'], ['icon' => 'music', 'label' => 'Aerophones'], ['icon' => 'drum', 'label' => 'Traditional Instruments'], ['icon' => 'heart', 'label' => 'Favorites']] as $filter)
            <button type="button"
                class="filter-button flex flex-col items-center space-y-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#9D8B76]"
                aria-label="Filter by {{ $filter['label'] }}">
                <i class="fas fa-{{ $filter['icon'] }} fa-2x"></i>
                <span>{{ $filter['label'] }}</span>
            </button>
        @endforeach
    </section>

    <!-- Carousel -->
    <section class="max-w-6xl mx-auto px-4 relative flex items-center py-6">
        <button aria-label="Previous" class="text-3xl text-gray-700 hover:text-black focus:outline-none">
            <i class="fas fa-chevron-left"></i>
        </button>

        <div class="flex gap-6 overflow-x-auto no-scrollbar flex-1 px-6">
            @php
                $items = [
                    [
                        'name' => 'Alto Saxophone',
                        'price' => 'IDR 350.000 / Day',
                        'img' => 'https://storage.googleapis.com/a1aa/image/537e1a8a-fdbe-4284-246b-91ea5f3ad880.jpg'
                    ],
                    [
                        'name' => 'DW Drum Set (Drum Workshop)',
                        'price' => 'IDR 450.000 / Day',
                        'img' => 'https://storage.googleapis.com/a1aa/image/d75a0787-a4de-435f-1ea8-eb8d6689cc1e.jpg'
                    ],
                    [
                        'name' => 'Roland V-Accordion',
                        'price' => 'IDR 250.000 / Day',
                        'img' => 'https://storage.googleapis.com/a1aa/image/1d4b45f3-5a3f-4f71-fc8f-44a54bfa0405.jpg'
                    ],
                    [
                        'name' => 'Sonic Grey Fender',
                        'price' => 'IDR 300.000 / Day',
                        'img' => 'https://storage.googleapis.com/a1aa/image/eb8e26e7-96e8-43d3-1427-9d00f26cddcc.jpg'
                    ],
                    [
                        'name' => 'Classic Acoustic Violin',
                        'price' => 'IDR 400.000 / Day',
                        'img' => asset('images/biola.jpeg')
                    ],
                ];
            @endphp
        
            @foreach ($items as $item)
                <div class="card-hover bg-[#F4E6D4] rounded-xl p-4 min-w-[180px] max-w-[180px] flex flex-col items-center">
                    <img src="{{ $item['img'] }}" alt="{{ $item['name'] }}" class="mb-3 object-contain w-36 h-36" />
                    <div class="text-xs font-semibold text-[#3A3A3A] w-full flex flex-col justify-between flex-grow">
                        <div>
                            <p class="mb-1">{{ $item['name'] }}</p>
                            <p class="text-[10px] font-normal text-[#3A3A3A]">{{ $item['price'] }}</p>
                        </div>
                        <button class="check-button bg-[#9D8B76] text-[10px] text-white rounded px-2 py-1 mt-2">
                            Check
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <button aria-label="Next" class="text-3xl text-gray-700 hover:text-black focus:outline-none">
            <i class="fas fa-chevron-right"></i>
        </button>
    </section>
</body>

</html> 
