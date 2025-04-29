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
<nav class="fixed top-0 left-0 w-full z-50 bg-[#b49875] shadow flex items-center justify-between px-6 py-4">
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
<section class="relative min-h-[500px] md:min-h-[600px] flex flex-col items-center justify-center bg-cover bg-center text-center"
    style="background-image: url('{{ asset('images/background.jpg') }}');">
    <div class="bg-black bg-opacity-50 w-full h-full absolute top-0 left-0"></div>
    <div class="relative z-10 px-4">
        <h1 class="text-white text-4xl md:text-5xl font-extrabold drop-shadow mb-4">Your stage, your sound</h1>
        <h2 class="text-[#b49875] text-4xl md:text-5xl font-extrabold">our support</h2>
    </div>
</section>

    <!-- Content Section -->
<section class="flex flex-col md:flex-row items-center justify-between px-10 py-16 bg-white gap-10">
    <div class="max-w-xl">
        <h2 class="text-4xl font-extrabold leading-tight mb-6">
            MyLodies <br>
            Supporting Great <br>
            Performances with <br>
            World-Class Equipment
        </h2>
        <p class="text-base text-gray-700 leading-relaxed">
            Lorem ipsum dolor sit amet consectetur. Nisl in pretium mattis nunc nisl mauris quis euismod congue.
            Augue elit id morbi semper sed in. Natoque odio pharetra.
        </p>
    </div>
    <div class="flex-shrink-0">
        <img src="{{ asset('images/instruments-group.png') }}" alt="Instruments" class="max-h-80 md:max-h-[350px] object-contain">
    </div>
</section>

    <!-- Top Rented Items Section -->
    <section class="px-6 py-10 bg-white text-center">
        <h2 class="text-3xl font-bold mb-10">Our Top Rented Items</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Item 1 -->
            <div class="bg-[#f9e5c9] p-4 rounded-xl shadow-md flex flex-col items-center">
                <img src="{{ asset('images/piano.png') }}" alt="Piano" class="h-32 object-contain mb-4">
                <p class="font-semibold">Yamaha, Grand Piano</p>
                <p class="text-sm mb-2">IDR 400.000 / Day</p>
                <button class="px-4 py-1 bg-black text-white rounded-full text-sm">Check</button>
            </div>
            <!-- Item 2 -->
            <div class="bg-[#f9e5c9] p-4 rounded-xl shadow-md flex flex-col items-center">
                <img src="{{ asset('images/bass.png') }}" alt="Bass" class="h-32 object-contain mb-4">
                <p class="font-semibold">Fender Precision Bass</p>
                <p class="text-sm mb-2">IDR 290.000 / Day</p>
                <button class="px-4 py-1 bg-black text-white rounded-full text-sm">Check</button>
            </div>
            <!-- Item 3 -->
            <div class="bg-[#f9e5c9] p-4 rounded-xl shadow-md flex flex-col items-center">
                <img src="{{ asset('images/violin.png') }}" alt="Violin" class="h-32 object-contain mb-4">
                <p class="font-semibold">Classic Acoustic Violin</p>
                <p class="text-sm mb-2">IDR 400.000 / Day</p>
                <button class="px-4 py-1 bg-black text-white rounded-full text-sm">Check</button>
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
        <button class="mt-10 px-6 py-2 bg-[#b49875] text-white rounded-full font-semibold hover:bg-[#9a7b56]">More Details</button>
    </section>

    <!-- Contact Us Section -->
    <section class="py-16 px-6 bg-white text-center">
        <h2 class="text-3xl font-bold mb-8">Contact Us</h2>

        <!-- Map -->
        <div class="mb-8 flex justify-center">
            <iframe class="w-full max-w-4xl h-64 rounded-lg shadow-md"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0147434092796!2d104.03150287496585!3d1.1239959620302176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da3e20390dbca3%3A0xd3d2386a8d2a4634!2sPoliteknik%20Negeri%20Batam!5e0!3m2!1sen!2sid!4v1685613960843!5m2!1sen!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!-- Form and Info -->
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
            <!-- Form -->
            <form class="md:col-span-2 space-y-4">
                <div class="flex flex-col md:flex-row gap-4">
                    <input type="text" placeholder="Username" class="flex-1 border rounded px-4 py-2 focus:outline-none">
                    <input type="email" placeholder="Email Address" class="flex-1 border rounded px-4 py-2 focus:outline-none">
                </div>
                <input type="text" placeholder="Subject" class="w-full border rounded px-4 py-2 focus:outline-none">
                <textarea placeholder="Message" rows="4" class="w-full border rounded px-4 py-2 focus:outline-none"></textarea>
                <button type="submit"
                    class="bg-[#b49875] text-white px-6 py-2 rounded-full hover:bg-[#9a7b56] transition font-semibold">
                    Send
                </button>
            </form>

            <!-- Contact Info -->
            <div class="space-y-6 text-sm text-gray-800">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.1 2 5 5.1 5 9c0 5.2 7 13 7 13s7-7.8 7-13c0-3.9-3.1-7-7-7zm0 9.5c-1.4 0-2.5-1.1-2.5-2.5S10.6 6.5 12 6.5s2.5 1.1 2.5 2.5S13.4 11.5 12 11.5z" />
                    </svg>
                    <span>Batam, Kepulauan Riau</span>
                </div>
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6.6 10.8c1.4 2.8 3.6 5 6.4 6.4l2.1-2.1c.3-.3.8-.4 1.2-.3 1.3.4 2.6.7 4 .7.7 0 1.2.6 1.2 1.2v3.6c0 .7-.6 1.2-1.2 1.2C9.8 22 2 14.2 2 4.8 2 4.1 2.6 3.6 3.2 3.6H7c.7 0 1.2.6 1.2 1.2 0 1.4.3 2.7.7 4 .1.4 0 .9-.3 1.2l-2 2z" />
                    </svg>
                    <span>0822 3001 9821</span>
                </div>
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4.2l-8 4.9-8-4.9V6l8 5 8-5v2.2z" />
                    </svg>
                    <span>mylodies@gmail.com</span>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
