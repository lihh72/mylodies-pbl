{{-- components/filters.blade.php --}}


<form method="GET" action="{{ route('search') }}" class="space-y-6"
      x-data="{ 
        min: @json(request('min')), 
        max: @json(request('max')),
        activeRating: '{{ request('rating') }}'
      }"
>

{{-- Filter Rating --}}
<details class="group" open
         x-data="{
           activeRating: '{{ request('rating') }}',
           toggle(val) {
             this.activeRating = (this.activeRating === val) ? '' : val;
           }
         }">
  <summary class="cursor-pointer text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center font-medium text-base transition-colors duration-200 pb-3 border-b border-[#f0e8e0]">
    Rating
    <svg class="h-5 w-5 text-[#b49875] group-open:rotate-180 transition-transform duration-300 ease-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
    </svg>
  </summary>

  <ul class="mt-4 pl-2 space-y-3 text-[#4e3d33]">
    @for ($i = 5; $i >= 1; $i--)
      @php
        $stars = str_repeat('★', $i) . str_repeat('☆', 5 - $i);
      @endphp
      <li>
        <label class="cursor-pointer hover:text-[#a78c74] transition-colors flex items-center gap-2"
               @click.prevent="toggle('{{ $i }}')">
          <span :class="activeRating === '{{ $i }}' ? 'font-semibold text-[#b49875]' : ''">
            {{ $stars }}
          </span>
        </label>
      </li>
    @endfor
  </ul>

  {{-- Only one clean input --}}
  <input type="hidden" name="rating" :value="activeRating">
</details>



  {{-- Filter Category --}}
  <details class="group" open>
    <summary class="cursor-pointer text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center font-medium text-base transition-colors duration-200 pb-3 border-b border-[#f0e8e0]">
      Category
      <svg class="h-5 w-5 text-[#b49875] group-open:rotate-180 transition-transform duration-300 ease-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </summary>
    <ul class="mt-4 pl-2 space-y-3 text-[#4e3d33]">
      @foreach (['Guitar', 'Drum', 'Keyboard', 'Bass', 'Others'] as $cat)
        <li>
          <label class="cursor-pointer hover:text-[#a78c74] transition-colors flex items-center gap-2">
            <input type="radio" name="category" value="{{ $cat }}" {{ request('category') === $cat ? 'checked' : '' }} class="accent-[#b49875]">
            {{ $cat }}
          </label>
        </li>
      @endforeach
    </ul>
  </details>

  {{-- Filter Harga --}}
  <details class="group" open>
    <summary class="cursor-pointer text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center font-medium text-base transition-colors duration-200 pb-3 border-b border-[#f0e8e0]">
      Harga
      <svg class="h-5 w-5 text-[#b49875] group-open:rotate-180 transition-transform duration-300 ease-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </summary>
    <div class="mt-4 pl-2 space-y-4">
      <div class="flex items-center gap-2">
        <label class="text-xs text-[#7d6651]">Min</label>
        <input type="number" name="min" x-model="min"
          class="w-full text-sm px-3 py-1.5 border border-[#e0d2c2] rounded-md focus:ring-[#b49875] focus:border-[#b49875]"
          min="0" step="50000" placeholder="Misal: 100000">
      </div>

      <div class="flex items-center gap-2">
        <label class="text-xs text-[#7d6651]">Max</label>
        <input type="number" name="max" x-model="max"
          class="w-full text-sm px-3 py-1.5 border border-[#e0d2c2] rounded-md focus:ring-[#b49875] focus:border-[#b49875]"
          min="0" step="50000" placeholder="Misal: 1000000">
      </div>
    </div>
  </details>

  {{-- Hidden query --}}
  <input type="hidden" name="q" value="{{ request('q') }}">

  {{-- Tombol Terapkan --}}
  <button type="submit"
    class="w-full mt-4 bg-[#b49875] text-white py-2 rounded-md hover:bg-[#a78c74] transition-colors">
    Terapkan Filter
  </button>
</form>
