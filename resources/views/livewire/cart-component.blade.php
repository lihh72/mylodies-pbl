<div class="space-y-6">
    @forelse ($cartItems as $item)
        <div class="item relative flex flex-col sm:flex-row sm:items-center gap-6 bg-white rounded-2xl border-l-[8px] border-[#d6bfa4] shadow-xl px-6 py-6 group">
            <button wire:click="deleteItem({{ $item->id }})" class="absolute top-4 right-4 text-[#b98a65] hover:text-red-400 text-lg">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <img src="{{ isset($item->product->images[0]) ? asset('storage/' . $item->product->images[0]) : 'https://via.placeholder.com/100' }}"
                 class="w-24 h-24 sm:w-28 sm:h-28 rounded-xl object-cover border border-[#f0e8dc] shadow-md" />

            <div class="flex-1 space-y-2 text-[#41362c]">
                <h3 class="text-lg font-semibold">
                    {{ $item->product->name }}
                    <span class="ml-2 bg-[#f6e7d5] text-[#826c58] px-2 py-0.5 text-xs rounded-full">Rental</span>
                </h3>
                <p class="text-xs italic text-[#7e6a57]">
                    {{ \Carbon\Carbon::parse($item->start_date)->format('d/m/y') }} –
                    {{ \Carbon\Carbon::parse($item->end_date)->format('d/m/y') }}
                </p>
            </div>

            <!-- Quantity -->
            <div class="flex flex-col items-center w-24 text-sm text-[#4a3c30]">
                <p class="font-medium">Qty</p>
                <div class="flex gap-2 text-base mt-1">
                    <button wire:click="decrement({{ $item->id }})"
                            class="w-7 h-7 rounded-full bg-[#f3e5d7] hover:bg-[#e5d4c0]">−</button>

                    <span class="quantity font-semibold">{{ $quantities[$item->id] ?? 1 }}</span>

                    <button wire:click="increment({{ $item->id }})"
                            class="w-7 h-7 rounded-full bg-[#f3e5d7] hover:bg-[#e5d4c0]">+</button>
                </div>
            </div>

            <div class="text-right w-28 text-[#5e5044]">
                <p class="text-xs uppercase">Price</p>
                <p class="font-bold">
                    IDR {{ number_format($item->total_price, 0, ',', '.') }}
                </p>
            </div>
        </div>
    @empty
        <p class="text-[#7e6a57] text-sm italic">Your cart is currently empty.</p>
    @endforelse
</div>
