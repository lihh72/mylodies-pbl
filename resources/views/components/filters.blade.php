{{-- components/filters.blade.php --}}

<div class="space-y-6">
  {{-- Filter Rating --}}
  <details class="group">
    <summary class="cursor-pointer text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center font-medium text-base transition-colors duration-200 pb-3 border-b border-[#f0e8e0]">
      Rating
      <svg class="h-5 w-5 text-[#b49875] group-open:rotate-180 transition-transform duration-300 ease-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </summary>
    <ul class="mt-4 pl-2 space-y-3 text-[#4e3d33]">
      @foreach (['★☆☆☆☆','★★☆☆☆','★★★☆☆','★★★★☆','★★★★★'] as $star)
        <li class="cursor-pointer hover:text-[#a78c74] transition-colors">{{ $star }}</li>
      @endforeach
    </ul>
  </details>

  {{-- Filter Category --}}
  <details class="group">
    <summary class="cursor-pointer text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center font-medium text-base transition-colors duration-200 pb-3 border-b border-[#f0e8e0]">
      Category
      <svg class="h-5 w-5 text-[#b49875] group-open:rotate-180 transition-transform duration-300 ease-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </summary>
    <ul class="mt-4 pl-2 space-y-3 text-[#4e3d33]">
      @foreach (['Guitar', 'Drum', 'Keyboard', 'Bass', 'Others'] as $cat)
        <li>
          <a href="{{ route('search', ['q' => request('q'), 'category' => $cat]) }}"
             class="block hover:text-[#a78c74] transition-colors {{ request('category') === $cat ? 'font-semibold text-[#b49875]' : '' }}">
            {{ $cat }}
          </a>
        </li>
      @endforeach
    </ul>
  </details>

  {{-- Filter Harga --}}
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
