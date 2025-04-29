<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLodies</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans">

    <!-- Navbar -->
    <nav class="bg-[#b49875] flex items-center justify-between px-6 py-4">
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 mr-4">
        </div>
        <ul class="flex space-x-6">
            <li><a href="#" class="text-black font-bold">Home</a></li>
            <li><a href="#" class="text-black font-bold">About Us</a></li>
            <li><a href="#" class="text-black font-bold">Contact</a></li>
        </ul>
        @auth
            <a href="#"
                class="flex items-center border border-black rounded-full px-4 py-1 font-bold hover:bg-black hover:text-white transition">
                Logout →
            </a>
        @else
            <a href="#"
                class="flex items-center border border-black rounded-full px-4 py-1 font-bold hover:bg-black hover:text-white transition">
                Login →
            </a>
        @endauth
    </nav>

    <!-- Hero Section -->
    <section class="relative h-[400px] flex flex-col items-center justify-center bg-cover bg-center text-center"
        style="background-image: url('{{ asset('images/background.jpg') }}');">
        <h1 class="text-white text-3xl font-bold">Your stage, your sound</h1>
        <h2 class="text-[#5b4526] text-2xl font-bold mt-2">our support</h2>
    </section>

    <!-- Content Section -->
    <section class="flex flex-col md:flex-row items-center justify-between p-10 gap-8">
        <div class="text-2xl font-bold max-w-md text-center md:text-left">
            <p>MyLodies<br>Supporting Great<br>Performances with<br>World-Class Equipment</p>
        </div>
        <div>
            <img src="{{ asset('images/background.jpg') }}" alt="Instruments" class="h-48 object-contain">
        </div>
    </section>

    <!-- Top Rented Items Section -->
    <section class="bg-[#fef6ea] py-12 px-6 text-center">
        <h2 class="text-3xl font-bold mb-10">Our Top Rented Items</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-6xl mx-auto">

            <!-- Item 1 -->
            <div class="bg-[#f9e5c9] p-4 rounded-xl shadow-md flex flex-col items-center">
                <img src="{{ asset('images/piano.png') }}" alt="Yamaha Grand Piano" class="h-40 object-contain mb-4">
                <h3 class="font-bold">Yamaha, Grand Piano</h3>
                <p class="text-sm text-gray-600">IDN 400.000 / Day</p>
                <button class="mt-2 px-4 py-1 border border-black rounded-full font-semibold hover:bg-black hover:text-white transition">
                    Check
                </button>
            </div>

            <!-- Item 2 -->
        <div class="bg-[#f9e5c9] p-4 rounded-xl shadow-md flex flex-col items-center">
            <img src="{{ asset('images/bass.png') }}" alt="Fender Precision Bass" class="h-40 object-contain mb-4">
                <h3 class="font-bold">Fender Precision Bass</h3>
                <p class="text-sm text-gray-600">IDN 290.000 / Day</p>
                <button class="mt-2 px-4 py-1 border border-black rounded-full font-semibold hover:bg-black hover:text-white transition">
                    Check
                </button>
            </div>

            <!-- Item 3 -->
            <div class="bg-[#f9e5c9] p-4 rounded-xl shadow-md flex flex-col items-center">
                <img src="{{ asset('images/violin.png') }}" alt="Classic Acoustic Violin" class="h-40 object-contain mb-4">
                <h3 class="font-bold">Classic Acoustic Violin</h3>
                <p class="text-sm text-gray-600">IDN 400.000 / Day</p>
                <button class="mt-2 px-4 py-1 border border-black rounded-full font-semibold hover:bg-black hover:text-white transition">
                    Check
                </button>
            </div>

            <!-- Item 4 -->
            <div class="bg-[#f9e5c9] p-4 rounded-xl shadow-md flex flex-col items-center">
                <img src="{{ asset('images/saxophone.png') }}" alt="Saxophone" class="h-40 object-contain mb-4">
                <h3 class="font-bold">Saxophone</h3>
                <p class="text-sm text-gray-600">IDN 350.000 / Day</p>
                <button class="mt-2 px-4 py-1 border border-black rounded-full font-semibold hover:bg-black hover:text-white transition">
                    Check
                </button>
            </div>

            <!-- Item 5 -->
            <div class="bg-[#f9e5c9] p-4 rounded-xl shadow-md flex flex-col items-center">
                <img src="{{ asset('images/drum.png') }}" alt="Drum Set" class="h-40 object-contain mb-4">
                <h3 class="font-bold">Drum Set</h3>
                <p class="text-sm text-gray-600">IDN 380.000 / Day</p>
                <button class="mt-2 px-4 py-1 border border-black rounded-full font-semibold hover:bg-black hover:text-white transition">
                    Check
                </button>
            </div>

            <!-- Item 6 -->
            <div class="bg-[#f9e5c9] p-4 rounded-xl shadow-md flex flex-col items-center">
                <img src="{{ asset('images/accordion.png') }}" alt="Accordion" class="h-40 object-contain mb-4">
                <h3 class="font-bold">Accordion</h3>
                <p class="text-sm text-gray-600">IDN 330.000 / Day</p>
                <button class="mt-2 px-4 py-1 border border-black rounded-full font-semibold hover:bg-black hover:text-white transition">
                    Check
                </button>
            </div>

        </div>
    </section>

</body>

</html>
