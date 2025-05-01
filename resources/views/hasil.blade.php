<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Music Rental</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .scrollbar::-webkit-scrollbar {
      width: 8px;
    }
    .scrollbar::-webkit-scrollbar-thumb {
      background-color: rgba(0, 0, 0, 0.2);
      border-radius: 10px;
    }
  </style>
</head>
<body class="bg-[#f9f6f2] text-[#2e2e2e]">
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

  <!-- Content -->
  <div class="flex">
    <!-- Sidebar -->
    <aside class="w-[250px] bg-white p-6 border-r min-h-screen animate-fade-in">
      <h2 class="text-2xl font-extrabold mb-6 tracking-wide text-[#8c735a]">FILTER</h2>
      <ul class="space-y-5 text-sm text-gray-700">
        <li>
          <details class="group transition duration-300 ease-in-out">
            <summary class="cursor-pointer font-semibold group-open:text-[#8c735a] hover:underline">Lokasi</summary>
            <div class="ml-4 mt-2 space-y-1">
              <p class="cursor-pointer hover:text-[#8c735a]">Batam</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Jawa Barat</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Jabodetabek</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Others</p>
            </div>
          </details>
        </li>
        <li>
          <details class="group transition duration-300 ease-in-out">
            <summary class="cursor-pointer font-semibold group-open:text-[#8c735a] hover:underline">Sort by Ratings</summary>
            <div class="ml-4 mt-2 space-y-1">
              <p class="cursor-pointer hover:text-[#8c735a]">★☆☆☆☆</p>
              <p class="cursor-pointer hover:text-[#8c735a]">★★☆☆☆</p>
              <p class="cursor-pointer hover:text-[#8c735a]">★★★☆☆</p>
              <p class="cursor-pointer hover:text-[#8c735a]">★★★★☆</p>
              <p class="cursor-pointer hover:text-[#8c735a]">★★★★★</p>
            </div>
          </details>
        </li>
        <li>
          <details class="group transition duration-300 ease-in-out">
            <summary class="cursor-pointer font-semibold group-open:text-[#8c735a] hover:underline">Brand</summary>
            <div class="ml-4 mt-2 space-y-1">
              <p class="cursor-pointer hover:text-[#8c735a]">Fender</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Yamaha</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Others</p>
            </div>
          </details>
        </li>
        <li>
          <details class="group transition duration-300 ease-in-out">
            <summary class="cursor-pointer font-semibold group-open:text-[#8c735a] hover:underline">Price range</summary>
            <div class="ml-4 mt-2 space-y-1">
              <p class="cursor-pointer hover:text-[#8c735a]">Rp. 100.000 - 150.000</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Rp. 150.000 - 250.000</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Rp. 250.000 - 450.000</p>
              <p class="cursor-pointer hover:text-[#8c735a]">Rp. 450.000 - 999.999</p>
            </div>
          </details>
        </li>
      </ul>
    </aside>

    <!-- Products -->
    <main class="flex-1 p-8 animate-fade-in">
      <p class="mb-6 text-gray-500 italic">Menampilkan hasil pencarian "Electric Guitar dengan filter".</p>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Product Cards -->
        <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-transform transform hover:-translate-y-1 p-4 flex flex-col items-center">
          <img src="/images/saxophone.jpg" alt="Alto Saxophone" class="h-40 object-contain mb-4">
          <h3 class="font-bold text-lg text-center">Alto Saxophone</h3>
          <p class="text-sm text-gray-500">IDR 300.000 / Day</p>
          <button class="mt-3 px-5 py-1 text-sm bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full hover:brightness-110 transition-shadow shadow-md">Check</button>
        </div>

        <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-transform transform hover:-translate-y-1 p-4 flex flex-col items-center">
          <img src="/images/drum.jpg" alt="DW Drum Set" class="h-40 object-contain mb-4">
          <h3 class="font-bold text-lg text-center">DW Drum Set (Drum Workshop)</h3>
          <p class="text-sm text-gray-500">IDR 450.000 / Day</p>
          <button class="mt-3 px-5 py-1 text-sm bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full hover:brightness-110 transition-shadow shadow-md">Check</button>
        </div>

        <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-transform transform hover:-translate-y-1 p-4 flex flex-col items-center">
          <img src="/images/instrument.jpg" alt="Roland V-Accordion" class="h-40 object-contain mb-4">
          <h3 class="font-bold text-lg text-center">Roland V-Accordion</h3>
          <p class="text-sm text-gray-500">IDR 250.000 / Day</p>
          <button class="mt-3 px-5 py-1 text-sm bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full hover:brightness-110 transition-shadow shadow-md">Check</button>
        </div>

        <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-transform transform hover:-translate-y-1 p-4 flex flex-col items-center">
          <img src="/images/violin1.jpg" alt="Sonic grey Fender" class="h-40 object-contain mb-4">
          <h3 class="font-bold text-lg text-center">Sonic grey Fender</h3>
          <p class="text-sm text-gray-500">IDR 100.000 / Day</p>
          <button class="mt-3 px-5 py-1 text-sm bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full hover:brightness-110 transition-shadow shadow-md">Check</button>
        </div>

        <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-transform transform hover:-translate-y-1 p-4 flex flex-col items-center">
            <img src="/images/accordion.jpg" alt="Sonic grey Fender" class="h-40 object-contain mb-4">
            <h3 class="font-bold text-lg text-center">Accordion</h3>
            <p class="text-sm text-gray-500">IDR 250.000 / Day</p>
            <button class="mt-3 px-5 py-1 text-sm bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full hover:brightness-110 transition-shadow shadow-md">Check</button>
        </div>

        <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-transform transform hover:-translate-y-1 p-4 flex flex-col items-center">
          <img src="/images/gitar1.jpg" alt="Electric Guitar" class="h-40 object-contain mb-4">
          <h3 class="font-bold text-lg text-center">Electric Guitar</h3>
          <p class="text-sm text-gray-500">IDR 200.000 / Day</p>
          <button class="mt-3 px-5 py-1 text-sm bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full hover:brightness-110 transition-shadow shadow-md">Check</button>
        </div>
      </div>
    </main>
  </div>

  <script>
    // Custom fade-in animation on load
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
