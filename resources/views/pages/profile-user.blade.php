<!-- resources/views/instruments.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rent Your Sound | Profile</title>
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="bg-[#fef8f2] text-[#5a4a3b] font-sans pt-[60px]">
    <!-- Navbar -->
<x-navbar />

    <div class="max-w-6xl mx-auto px-4">

        <!-- Orders Section -->
        <div class="bg-[#f7efe1] rounded-lg mt-8 mb-4 p-4 w-full shadow-md">
            <div class="font-bold text-lg border-b-2 border-[#c9bca7] text-[#7a5c46] pb-2" id="orders-header">
                My Orders
            </div>
            <div class="flex justify-around pt-4 flex-wrap">
                <!-- Unpaid Button -->
                <button
                    class="text-center text-[#5a534d] flex-1 min-w-[150px] mb-4 py-4 px-2 rounded-lg bg-transparent hover:bg-[#f6e8d6] transition-all duration-300">
                    <i class="fas fa-credit-card text-3xl"></i>
                    <p class="mt-2 font-semibold text-sm">Unpaid</p>
                </button>

                <!-- Packed Button -->
                <button
                    class="text-center text-[#5a534d] flex-1 min-w-[150px] mb-4 py-4 px-2 rounded-lg bg-transparent hover:bg-[#f6e8d6] transition-all duration-300">
                    <i class="fas fa-box fa-2x"></i>
                    <p class="mt-2 font-semibold text-sm">Packed</p>
                </button>

                <!-- Shipped Button -->
                <button
                    class="text-center text-[#5a534d] flex-1 min-w-[150px] mb-4 py-4 px-2 rounded-lg bg-transparent hover:bg-[#f6e8d6] transition-all duration-300">
                    <i class="fas fa-truck text-3xl"></i>
                    <p class="mt-2 font-semibold text-sm">Shipped</p>
                </button>

                <!-- Give Rating Button -->
                <button
                    class="text-center text-[#5a534d] flex-1 min-w-[150px] mb-4 py-4 px-2 rounded-lg bg-transparent hover:bg-[#f6e8d6] transition-all duration-300">
                    <i class="fas fa-thumbs-up text-3xl"></i>
                    <p class="mt-2 font-semibold text-sm">Give Rating / Review</p>
                </button>
            </div>
        </div>

        <!-- Activities Section -->
        <div class="flex justify-center">
            <div class="bg-[#f7efe1] rounded-lg mt-8 mb-4 p-4 w-full max-w-7xl shadow-md">
                <div class="font-bold text-lg border-b-2 border-[#c9bca7] text-[#7a5c46] pb-2" id="activities-header">
                    My Activities
                </div>

                <!-- Product Cards -->
                <main class="flex-1 p-8 animate-fade-in">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6">
                        <!-- Product 1 -->
                        <div
                            class="bg-[#f2e0c9] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
                            <img src="/images/gitarHitam.jpeg" alt="Electric Guitar"
                                class="w-full h-32 object-cover mb-3 rounded-md">
                            <h3 class="font-bold text-sm text-[#5c4633] mb-1">Gitar Electric Fender Original</h3>
                            <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 370.000 / Day</p>
                            <p class="text-[11px] text-gray-500 italic mt-1">Sewa tanggal: 27–28 Apr 2025</p>
                            <div class="flex items-center justify-center gap-3 mt-3">
                                <span
                                    class="px-2 py-1 text-[11px] rounded-full bg-green-100 text-green-700 font-medium">Selesai</span>
                                <button
                                    class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Reorder</button>
                            </div>
                        </div>

                        <!-- Product 2 -->
                        <div
                            class="bg-[#f2e0c9] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
                            <img src="/images/saaxophone.jpeg" alt="Saxophone"
                                class="w-full h-32 object-cover mb-3 rounded-md">
                            <h3 class="font-bold text-sm text-[#5c4633] mb-1">Thomann Tenor Saxophone</h3>
                            <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 280.000 / Day</p>
                            <p class="text-[11px] text-gray-500 italic mt-1">Sewa tanggal: 25–26 Apr 2025</p>
                            <div class="flex items-center justify-center gap-3 mt-3">
                                <span
                                    class="px-2 py-1 text-[11px] rounded-full bg-green-100 text-green-700 font-medium">Selesai</span>
                                <button
                                    class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Reorder</button>
                            </div>
                        </div>

                        <!-- Product 3 -->
                        <div
                            class="bg-[#f2e0c9] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
                            <img src="/images/biola.jpeg" alt="Violin"
                                class="w-full h-32 object-cover mb-3 rounded-md">
                            <h3 class="font-bold text-sm text-[#5c4633] mb-1">YAMAHA Violin (YVN00344)</h3>
                            <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 300.000 / Day</p>
                            <p class="text-[11px] text-gray-500 italic mt-1">Sewa tanggal: 26–27 Apr 2025</p>
                            <div class="flex items-center justify-center gap-3 mt-3">
                                <span
                                    class="px-2 py-1 text-[11px] rounded-full bg-green-100 text-green-700 font-medium">Selesai</span>
                                <button
                                    class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Reorder</button>
                            </div>
                        </div>

                        <!-- Product 4 -->
                        <div
                            class="bg-[#f2e0c9] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
                            <img src="/images/drum.jpg" alt="Drum Set" class="w-full h-32 object-cover mb-3 rounded-md">
                            <h3 class="font-bold text-sm text-[#5c4633] mb-1">PEARL DRUM SET EXX-725</h3>
                            <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 500.000 / Day</p>
                            <p class="text-[11px] text-gray-500 italic mt-1">Sewa tanggal: 24–25 Apr 2025</p>
                            <div class="flex items-center justify-center gap-3 mt-3">
                                <span
                                    class="px-2 py-1 text-[11px] rounded-full bg-green-100 text-green-700 font-medium">Selesai</span>
                                <button
                                    class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Reorder</button>
                            </div>
                        </div>

                        <!-- Product 5 -->
                        <div
                            class="bg-[#f2e0c9] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
                            <img src="/images/paiolin.jpg" alt="Violin"
                                class="w-full h-32 object-cover mb-3 rounded-md">
                            <h3 class="font-bold text-sm text-[#5c4633] mb-1">YAMAHA violin v3ska</h3>
                            <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 400.000 / Day</p>
                            <p class="text-[11px] text-gray-500 italic mt-1">Sewa tanggal: 22–23 Apr 2025</p>
                            <div class="flex items-center justify-center gap-3 mt-3">
                                <span
                                    class="px-2 py-1 text-[11px] rounded-full bg-green-100 text-green-700 font-medium">Selesai</span>
                                <button
                                    class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Reorder</button>
                            </div>
                        </div>

                        <!-- Product 6 -->
                        <div
                            class="bg-[#f2e0c9] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
                            <img src="/images/triangle.jpg" alt="Triangle"
                                class="w-full h-32 object-cover mb-3 rounded-md">
                            <h3 class="font-bold text-sm text-[#5c4633] mb-1">YAMAHA Triangle</h3>
                            <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 200.000 / 2 Days</p>
                            <p class="text-[11px] text-gray-500 italic mt-1">Sewa tanggal: 28–30 Apr 2025</p>
                            <div class="flex items-center justify-center gap-3 mt-3">
                                <span
                                    class="px-2 py-1 text-[11px] rounded-full bg-green-100 text-green-700 font-medium">Selesai</span>
                                <button
                                    class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Reorder</button>
                            </div>
                        </div>

                    </div>

                    <!-- My Favorites Button -->
                    <div class="pt-20 flex justify-start">
                        <button
                            class="border border-[#5a534d] rounded-lg bg-transparent text-[#5a534d] font-semibold px-4 py-2 text-sm flex items-center space-x-2 hover:bg-[#f3e6d3] hover:text-[#5a534d] transition-all transform hover:scale-105 hover:shadow-lg shadow-md">
                            <i class="far fa-star text-sm"></i><span>My Favorite</span>
                        </button>
                    </div>

                </main>
            </div>
        </div>

    </div>
</body>

</html>
