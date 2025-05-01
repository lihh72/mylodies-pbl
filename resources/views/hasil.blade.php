<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Product Filter Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-[#f4f4f4]">

  <!-- Header -->
  <header class="bg-[#9D8B76] flex items-center justify-between px-6 py-4 shadow-md w-full">
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

  <!-- Main Content Area -->
  <div class="flex min-h-screen">

    <!-- Sidebar Filter -->
    <aside class="w-[250px] bg-white p-6 border-r shadow-sm">
      <h2 class="text-2xl font-extrabold mb-6 tracking-wide text-[#8c735a] flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#5c4633]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2H3V4zM3 7h18v2H3V7zm0 3h18v2H3v-2zm0 3h18v2H3v-2zm0 3h18v2H3v-2z" />
        </svg>
        FILTER
      </h2>

      <ul class="space-y-6 text-sm text-gray-800">
        <li>
          <details class="group">
            <summary class="cursor-pointer font-semibold flex items-center gap-2 text-[#5c4633] group-open:text-[#8c735a] hover:underline">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                <circle cx="12" cy="9" r="2.5" />
              </svg>
              Lokasi
            </summary>
            <div class="ml-6 mt-2 space-y-2 text-[13px]">
              <p class="cursor-pointer hover:text-[#8c735a]">Batam</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Jawa Barat</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Jabodetabek</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Others</p>
            </div>
          </details>
        </li>

        <li>
          <details class="group">
            <summary class="cursor-pointer font-semibold flex items-center gap-2 text-[#5c4633] group-open:text-[#8c735a] hover:underline">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 17.27L18.18 21 16.54 13.97 22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
              </svg>
              Sort by Ratings
            </summary>
            <div class="ml-6 mt-2 space-y-2 text-[13px] text-yellow-600">
              <p class="cursor-pointer hover:text-[#8c735a]">★☆☆☆☆</p>
              <p class="cursor-pointer hover:text-[#8c735a]">★★☆☆☆</p>
              <p class="cursor-pointer hover:text-[#8c735a]">★★★☆☆</p>
              <p class="cursor-pointer hover:text-[#8c735a]">★★★★☆</p>
              <p class="cursor-pointer hover:text-[#8c735a]">★★★★★</p>
            </div>
          </details>
        </li>

        <li>
          <details class="group">
            <summary class="cursor-pointer font-semibold flex items-center gap-2 text-[#5c4633] group-open:text-[#8c735a] hover:underline">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M6 3v12h12V3H6zm0 14v2a2 2 0 002 2h8a2 2 0 002-2v-2H6z" />
              </svg>
              Brand
            </summary>
            <div class="ml-6 mt-2 space-y-2 text-[13px]">
              <p class="cursor-pointer hover:text-[#8c735a]">Fender</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Yamaha</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Others</p>
            </div>
          </details>
        </li>

        <li>
          <details class="group">
            <summary class="cursor-pointer font-semibold flex items-center gap-2 text-[#5c4633] group-open:text-[#8c735a] hover:underline">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 8c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2zm0 2c2.21 0 4 1.79 4 4v4h-8v-4c0-2.21 1.79-4 4-4z" />
              </svg>
              Price Range
            </summary>
            <div class="ml-6 mt-2 space-y-2 text-[13px]">
              <p class="cursor-pointer hover:text-[#8c735a]">Rp.100.000 - Rp.150.000</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Rp.150.000 - Rp.250.000</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Rp.250.000 - Rp.450.000</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Rp.450.000 - Rp.999.999</p>
            </div>
          </details>
        </li>
      </ul>
    </aside>

    <!-- Product Cards -->
    <main class="flex-1 p-8 animate-fade-in">
      <p class="mb-6 text-gray-500 italic">Menampilkan hasil pencarian "Electric Guitar".</p>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6">

    <!-- Produk 1 -->
    <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
        <img src="/images/gitar1.jpg" alt="Electric Guitar" class="w-full h-32 object-cover mb-3 rounded-md">
        <h3 class="font-bold text-sm text-[#5c4633] mb-1">Gitar Electric Aloha Original</h3>
        <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 270.000 / Day</p>
        <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Check</button>
    </div>
  
    <!-- Produk 2 -->
    <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
        <img src="/images/accordion.jpg" alt="Electric Guitar" class="w-full h-32 object-cover mb-3 rounded-md">
        <h3 class="font-bold text-sm text-[#5c4633] mb-1">STAINER ACCORDION 60</h3>
        <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 280.000 / Day</p>
        <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Check</button>
    </div>
  
    <!-- Produk 3 -->
    <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
        <img src="/images/biola.jpeg" alt="Electric Guitar" class="w-full h-32 object-cover mb-3 rounded-md">
        <h3 class="font-bold text-sm text-[#5c4633] mb-1">YAMAHA, Violin (YVN00344) </h3>
        <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 300.000 / Day</p>
        <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Check</button>
    </div>
  
    <!-- Produk 4 -->
    <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
        <img src="/images/drum.jpg" alt="Electric Guitar" class="w-full h-32 object-cover mb-3 rounded-md">
        <h3 class="font-bold text-sm text-[#5c4633] mb-1">PEARL DRUM SET EXX-725</h3>
        <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 500.000 / Day</p>
        <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Check</button>
    </div>
  
    <!-- Produk 5 -->
    <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
        <img src="/images/gitar2.jpg" alt="Electric Guitar" class="w-full h-32 object-cover mb-3 rounded-md">
        <h3 class="font-bold text-sm text-[#5c4633] mb-1">Fender Acoustic Guitar</h3>
        <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 260.000 / Day</p>
        <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Check</button>
    </div>
  
    <!-- Produk 6 -->
    <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
        <img src="/images/piano.jpeg" alt="Electric Guitar" class="w-full h-32 object-cover mb-3 rounded-md">
        <h3 class="font-bold text-sm text-[#5c4633] mb-1">Steinway&Sons Hinves Piano</h3>
        <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 600.000 / Day</p>
        <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Check</button>
    </div>
  
    <!-- Produk 7 -->
    <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
        <img src="/images/harmonika.jpg" alt="Electric Guitar" class="w-full h-32 object-cover mb-3 rounded-md">
        <h3 class="font-bold text-sm text-[#5c4633] mb-1">Hohner Harmonica 270</h3>
        <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 280.000 / Day</p>
        <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Check</button>
    </div>
  
    <!-- Produk 8 -->
    <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
        <img src="/images/saxophone.jpg" alt="Electric Guitar" class="w-full h-32 object-cover mb-3 rounded-md">
        <h3 class="font-bold text-sm text-[#5c4633] mb-1">yanagisawa saxophones</h3>
        <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 340.000 / Day</p>
        <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Check</button>
    </div>
  
    <!-- Produk 9 -->
    <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
        <img src="/images/guitar1.webp" alt="Electric Guitar" class="w-full h-32 object-cover mb-3 rounded-md">
        <h3 class="font-bold text-sm text-[#5c4633] mb-1">Gibson V Electric Guitar</h3>
        <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 375.000 / Day</p>
        <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Check</button>
    </div>
  
    <!-- Produk 10 -->
    <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
        <img src="/images/drum1.jpeg" alt="Electric Guitar" class="w-full h-32 object-cover mb-3 rounded-md">
        <h3 class="font-bold text-sm text-[#5c4633] mb-1">Ludwik Drum Blue set</h3>
        <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 560.000 / Day</p>
        <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Check</button>
    </div>
  
    <!-- Produk 11 -->
    <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
        <img src="/images/bass.jpeg" alt="Electric Guitar" class="w-full h-32 object-cover mb-3 rounded-md">
        <h3 class="font-bold text-sm text-[#5c4633] mb-1">Ibanez Bass Guitar 5-Strings</h3>
        <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 260.000 / Day</p>
        <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Check</button>
    </div>

    <!-- Produk 12 -->
    <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
        <img src="/images/djembe.jpeg" alt="Electric Guitar" class="w-full h-32 object-cover mb-3 rounded-md">
        <h3 class="font-bold text-sm text-[#5c4633] mb-1">Meinl White Ash Djembe</h3>
        <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 360.000 / Day</p>
        <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Check</button>
    </div>

        <!-- Tambahkan produk lainnya sesuai kebutuhan -->

      </div>
    </main>
  </div>

  <!-- Animation Script -->
  <script>
    document.querySelectorAll('.animate-fade-in').forEach(el => {
      el.classList.add('opacity-0');
      setTimeout(() => {
        el.classList.remove('opacity-0');
        el.classList.add('transition-opacity', 'duration-700', 'opacity-100');
      }, 100);
    });
  </script>
</body>
</html>
