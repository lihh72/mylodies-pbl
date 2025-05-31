@extends('layouts.app')

@section('title', 'MyLodies - Home')
@section('body_class', 'bg-[#f9f6f1] text-[#3b2e2a] font-sans')


  <!-- Main Section -->
  <main class="max-w-7xl mx-auto px-6 py-16 pt-24">
    
    <!-- Search Header -->
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-[#5c4633]">Search Results</h2>
      <p class="mt-2 text-sm italic text-[#7a6a59]">
        Menampilkan hasil pencarian: <strong>"Electric Guitar"</strong>
      </p>
    </div>

    <!-- Filter + Product Grid -->
<div class="grid grid-cols-1 lg:grid-cols-[300px_1fr] gap-14 items-start">

  <!-- Sidebar Filters -->
  <aside class="hidden lg:block bg-white p-8 rounded-3xl shadow-[0_10px_30px_-15px_rgba(0,0,0,0.1)] border border-[#f0e8e0] text-sm text-[#4e3d33] lg:sticky lg:top-28 lg:h-fit lg:max-h-[80vh] lg:overflow-y-auto scrollbar-hide">


    <h2 class="text-2xl font-semibold flex items-center gap-3 text-[#5c4633] mb-8 tracking-wide">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#a78c74]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707l-7 7V21l-4-4v-7l-7-7A1 1 0 013 4z" />
      </svg>
      Filters
    </h2>

    <div class="space-y-6">

      <!-- Filter section -->
      <details class="group">
        <summary class="cursor-pointer text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center font-medium text-base transition-colors duration-200 pb-3 border-b border-[#f0e8e0]">
          Lokasi
          <svg class="h-5 w-5 text-[#b49875] group-open:rotate-180 transition-transform duration-300 ease-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </summary>
        <ul class="mt-4 pl-2 space-y-3 text-[#4e3d33]">
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">Batam</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">Jawa Barat</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">Kalimantan</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">Others</li>
        </ul>
      </details>

      <details class="group">
        <summary class="cursor-pointer text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center font-medium text-base transition-colors duration-200 pb-3 border-b border-[#f0e8e0]">
          Rating
          <svg class="h-5 w-5 text-[#b49875] group-open:rotate-180 transition-transform duration-300 ease-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </summary>
        <ul class="mt-4 pl-2 space-y-3 text-[#4e3d33]">
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">★☆☆☆☆</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">★★☆☆☆</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">★★★☆☆</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">★★★★☆</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">★★★★★</li>
        </ul>
      </details>

      <details class="group">
        <summary class="cursor-pointer text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center font-medium text-base transition-colors duration-200 pb-3 border-b border-[#f0e8e0]">
          Brand
          <svg class="h-5 w-5 text-[#b49875] group-open:rotate-180 transition-transform duration-300 ease-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </summary>
        <ul class="mt-4 pl-2 space-y-3 text-[#4e3d33]">
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">Fender</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">Yamaha</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">Others</li>
        </ul>
      </details>

      <details class="group">
        <summary class="cursor-pointer text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center font-medium text-base transition-colors duration-200 pb-3 border-b border-[#f0e8e0]">
          Harga
          <svg class="h-5 w-5 text-[#b49875] group-open:rotate-180 transition-transform duration-300 ease-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </summary>
        <div class="mt-4 pl-2 space-y-4">
          <div class="flex justify-between text-xs text-[#7d6651] font-medium">
            <span>Rp100K</span>
            <span>Rp1jt</span>
          </div>
          <input type="range" min="100000" max="1000000" step="50000" value="250000"
            class="w-full accent-[#b49875] h-2 rounded-full bg-[#f0e8e0] focus:outline-none focus:ring-0 cursor-pointer" />
          <p class="text-xs text-[#4e3d33]">Selected: <span id="hargaValue" class="font-semibold text-[#7d6651]">Rp250K</span></p>
        </div>
      </details>
      

    </div>
  </aside>
  <script>
    const slider = document.querySelector('input[type="range"]');
    const hargaValue = document.getElementById('hargaValue');
  
    slider.addEventListener('input', function () {
      let val = parseInt(this.value);
      let formatted = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(val);
      hargaValue.textContent = formatted;
    });
  </script>
  
  <!-- Mobile Filter Toggle -->
<div class="lg:hidden mb-6 text-center">
  <button id="toggleFilterBtn" class="bg-[#b49875] text-white px-5 py-2 rounded-full text-sm font-medium shadow-md hover:bg-[#9a7b56] transition">
    <i class="fa-solid fa-sliders me-2"></i> Show Filters
  </button>
</div>

      <!-- Product Grid -->
      <section>
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">
          @foreach([
            ['img' => 'gitar7.jpeg', 'name' => 'Gitar Electric Aloha', 'price' => 'IDR 270.000 / Day', 'desc' => 'Nyaman untuk latihan dan pemula.'],
            ['img' => 'gitar8.jpg', 'name' => 'Fender American Deluxe', 'price' => 'IDR 280.000 / Day', 'desc' => 'Suara bright, suit blues & country.'],
            ['img' => 'guitar1.webp', 'name' => 'Gibson Flying V', 'price' => 'IDR 300.000 / Day', 'desc' => 'Powerful! rock & metal stage.'],
            ['img' => 'gitar9.jpeg', 'name' => 'Jackson Pro Signature', 'price' => 'IDR 500.000 / Day', 'desc' => 'High-gain untuk metal teknikal.'],
            ['img' => 'gitar5.jpeg', 'name' => 'Schecter Damien Elite', 'price' => 'IDR 260.000 / Day', 'desc' => 'Tone gelap, pas untuk metal modern.'],
            ['img' => 'gitar6.webp', 'name' => 'Gretsch G5232T Double Jet', 'price' => 'IDR 600.000 / Day', 'desc' => 'Retro vibe, for rockabilly & jazz.'],
          ] as $item)
          <div class="bg-white rounded-xl shadow-lg hover:shadow-xl overflow-hidden transition-all duration-300 group">
            <img src="{{ asset('images/' . $item['img']) }}" alt="{{ $item['name'] }}" class="w-full h-52 object-cover group-hover:scale-105 transition-transform">
            <div class="p-5">
              <h3 class="font-semibold text-lg text-[#4a3c31] mb-1">{{ $item['name'] }}</h3>
              <p class="text-sm text-[#6c5e53]">{{ $item['desc'] }}</p>
              <p class="mt-3 inline-block bg-[#f6e8d6] text-[#5c4633] px-3 py-1 rounded-full text-xs font-medium border border-[#d6b896]">{{ $item['price'] }}</p>
              <a href="/product"
           class="mt-4 block text-center bg-[#b49875] text-white py-2 rounded-full hover:bg-[#9a7b56] transition-all text-sm font-medium">
            Check Availability
        </a>
            </div>
          </div>
          @endforeach
        </div>
      </section>
    </div>
    <!-- Mobile Filter Modal -->
<div id="mobileFilter" class="fixed inset-0 z-50 bg-black/40 hidden">
  <div class="absolute bottom-0 w-full bg-white rounded-t-3xl p-6 max-h-[90vh] overflow-y-auto">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-lg font-semibold text-[#5c4633]">Filters</h2>
      <button id="closeFilterBtn" class="text-[#5c4633] hover:text-[#7d6651] text-xl">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <!-- Filter content reused from sidebar -->
    <div class="space-y-6">
      <!-- Copy semua <details> filter di sini dari sidebar -->
      <!-- contoh satu -->
      <details class="group">
        <summary class="cursor-pointer text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center font-medium text-base transition-colors duration-200 pb-3 border-b border-[#f0e8e0]">
          Lokasi
          <svg class="h-5 w-5 text-[#b49875] group-open:rotate-180 transition-transform duration-300 ease-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </summary>
        <ul class="mt-4 pl-2 space-y-3 text-[#4e3d33]">
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">Batam</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">Jawa Barat</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">Jabodetabek</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">Others</li>
        </ul>
      </details>
<details class="group">
        <summary class="cursor-pointer text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center font-medium text-base transition-colors duration-200 pb-3 border-b border-[#f0e8e0]">
          Rating
          <svg class="h-5 w-5 text-[#b49875] group-open:rotate-180 transition-transform duration-300 ease-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </summary>
        <ul class="mt-4 pl-2 space-y-3 text-[#4e3d33]">
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">★☆☆☆☆</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">★★☆☆☆</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">★★★☆☆</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">★★★★☆</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">★★★★★</li>
        </ul>
      </details>

      <details class="group">
        <summary class="cursor-pointer text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center font-medium text-base transition-colors duration-200 pb-3 border-b border-[#f0e8e0]">
          Brand
          <svg class="h-5 w-5 text-[#b49875] group-open:rotate-180 transition-transform duration-300 ease-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </summary>
        <ul class="mt-4 pl-2 space-y-3 text-[#4e3d33]">
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">Fender</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">Yamaha</li>
          <li class="cursor-pointer hover:text-[#a78c74] transition-colors">Others</li>
        </ul>
      </details>

      <details class="group">
        <summary class="cursor-pointer text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center font-medium text-base transition-colors duration-200 pb-3 border-b border-[#f0e8e0]">
          Harga
          <svg class="h-5 w-5 text-[#b49875] group-open:rotate-180 transition-transform duration-300 ease-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </summary>
        <div class="mt-4 pl-2 space-y-4">
          <div class="flex justify-between text-xs text-[#7d6651] font-medium">
            <span>Rp100K</span>
            <span>Rp1jt</span>
          </div>
          <input type="range" min="100000" max="1000000" step="50000" value="250000"
            class="w-full accent-[#b49875] h-2 rounded-full bg-[#f0e8e0] focus:outline-none focus:ring-0 cursor-pointer" />
          <p class="text-xs text-[#4e3d33]">Selected: <span id="hargaValue" class="font-semibold text-[#7d6651]">Rp250K</span></p>
        </div>
      </details>
      

    </div>
    </div>
  </div>
</div>

  </main>

  <script>
  const toggleBtn = document.getElementById('toggleFilterBtn');
  const mobileFilter = document.getElementById('mobileFilter');
  const closeBtn = document.getElementById('closeFilterBtn');

  toggleBtn.addEventListener('click', () => {
    mobileFilter.classList.remove('hidden');
  });

  closeBtn.addEventListener('click', () => {
    mobileFilter.classList.add('hidden');
  });

  // Optional: close modal when clicking outside
  mobileFilter.addEventListener('click', (e) => {
    if (e.target === mobileFilter) {
      mobileFilter.classList.add('hidden');
    }
  });
</script>

</body>
</html>
