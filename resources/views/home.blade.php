<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLodies - Instrument</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white">

    <!-- Navbar -->
    <header class="bg-[#b79e7d] p-4 flex items-center justify-between shadow">
        <div class="flex items-center space-x-4">
            <img src="/images/logo.png" alt="Logo" class="h-10">
        </div>
        <div class="relative w-full max-w-xl mx-4">
            <input type="text" placeholder="Search"
                class="w-full py-2 pl-4 pr-10 rounded-full border focus:outline-none">
            <button class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-700">
                🔍
            </button>
        </div>
        <div class="flex space-x-4 text-2xl">
            🛒 <!-- Cart -->
            👤 <!-- Profile -->
        </div>
    </header>

    <!-- Category Icons -->
    <section class="py-6 flex justify-center space-x-8 text-center text-sm font-medium">
        <div>
            <img src="/icons/keyboard.png" class="mx-auto h-10 mb-1">
            <p>Keyboard</p>
        </div>
        <div>
            <img src="{{ asset('images/guitar.png') }}" class="mx-auto h-10 mb-1">
            <p>Guitar</p>
        </div>
        <div>
            <img src="/icons/aerophones.png" class="mx-auto h-10 mb-1">
            <p>Aerophones</p>
        </div>
        <div>
            <img src="/icons/traditional.png" class="mx-auto h-10 mb-1">
            <p>Traditional Instruments</p>
        </div>
        <div>
            <img src="/icons/favorites.png" class="mx-auto h-10 mb-1">
            <p>Favorites</p>
        </div>
    </section>

    <!-- Carousel / Product List -->
    <section class="px-6 pb-10">
        <div class="flex items-center space-x-6 overflow-x-auto scroll-smooth">

            <!-- Item -->
            <div class="bg-amber-100 p-4 rounded-xl min-w-[200px] text-center">
                <img src="/images/saxophone.png" alt="Alto Saxophone" class="h-40 mx-auto mb-2">
                <p class="font-semibold">Alto Saxophone</p>
                <p class="text-sm text-gray-600">IDR 300.000 / Day</p>
                <button
                    class="mt-2 px-3 py-1 text-sm border border-black rounded-full hover:bg-black hover:text-white">Check</button>
            </div>

            <!-- Item -->
            <div class="bg-amber-100 p-4 rounded-xl min-w-[200px] text-center">
                <img src="/images/drum.png" alt="DW Drum" class="h-40 mx-auto mb-2">
                <p class="font-semibold">DW Drum Set (Drum Workshop)</p>
                <p class="text-sm text-gray-600">IDR 450.000 / Day</p>
                <button
                    class="mt-2 px-3 py-1 text-sm border border-black rounded-full hover:bg-black hover:text-white">Check</button>
            </div>

            <!-- Item -->
            <div class="bg-amber-100 p-4 rounded-xl min-w-[200px] text-center">
                <img src="/images/accordion.png" alt="Accordion" class="h-40 mx-auto mb-2">
                <p class="font-semibold">Roland V-Accordion</p>
                <p class="text-sm text-gray-600">IDR 250.000 / Day</p>
                <button
                    class="mt-2 px-3 py-1 text-sm border border-black rounded-full hover:bg-black hover:text-white">Check</button>
            </div>

            <!-- Item -->
            <div class="bg-amber-100 p-4 rounded-xl min-w-[200px] text-center">
                <img src="/images/fender.png" alt="Fender" class="h-40 mx-auto mb-2">
                <p class="font-semibold">Sonic grey Fender</p>
                <p class="text-sm text-gray-600">IDR 100.000 / Day</p>
                <button
                    class="mt-2 px-3 py-1 text-sm border border-black rounded-full hover:bg-black hover:text-white">Check</button>
            </div>

        </div>
    </section>

</body>

</html>
