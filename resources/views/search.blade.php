@extends('layouts.app')

@section('title', 'MyLodies - Home')
@section('body_class', 'bg-[#f9f6f1] text-[#3b2e2a] font-sans')

@section('content')
  <!-- Main Section -->
  <main class="light-stage max-w-7xl mx-auto px-6 py-16 pt-24">
    
    <!-- Search Header -->
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-[#5c4633]">Search Results</h2>
@if(request('q'))
  <p class="mt-2 text-sm italic text-[#7a6a59]">
    Showing search results for: <strong>"{{ $query }}"</strong>
  </p>
@else
  <p class="mt-2 text-sm italic text-[#7a6a59]">
    Showing all products
  </p>
@endif
</div>

    <!-- Filter + Product Grid -->
<div class="grid grid-cols-1 lg:grid-cols-[220px_1fr] gap-8 items-start">

  <!-- Sidebar Filters -->
  <aside class="hidden lg:block bg-white p-8 rounded-3xl shadow-[0_10px_30px_-15px_rgba(0,0,0,0.1)] border border-[#f0e8e0] text-sm text-[#4e3d33] lg:sticky lg:top-28 lg:h-fit lg:max-h-[80vh] lg:overflow-y-auto scrollbar-hide">
  <h2 class="text-2xl font-semibold flex items-center gap-3 text-[#5c4633] mb-8 tracking-wide">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#a78c74]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707l-7 7V21l-4-4v-7l-7-7A1 1 0 013 4z" />
    </svg>
    Filters
  </h2>

  {{-- Include reusable component --}}
<x-filters />

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

<!-- Main product area -->

  <x-card :products="$products" />

  <div class="flex justify-center">
    {{ $products->onEachSide(1)->links('components.pagination-custom') }}
  </div>
</div>



    <div id="mobileFilter" class="fixed inset-0 z-50 bg-black/40 hidden">
  <div class="absolute bottom-0 w-full bg-white rounded-t-3xl p-6 max-h-[90vh] overflow-y-auto">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-lg font-semibold text-[#5c4633]">Filters</h2>
      <button id="closeFilterBtn" class="text-[#5c4633] hover:text-[#7d6651] text-xl">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    {{-- Reuse the same component --}}
 <x-filters  />
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
@endsection