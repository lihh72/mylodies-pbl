<div class="space-y-6">
    <!-- 🗓️ Date Range Picker Global -->
    <div class="bg-white border border-[#dfcdb3] p-6 rounded-xl shadow mb-6">
        <h4 class="font-semibold text-[#6b5742] mb-3">Set Rental Period for All Items</h4>

        <div id="date-range-picker"
             date-rangepicker
             datepicker-format="mm/dd/yyyy"
             datepicker-min-date="{{ $minDate }}"
             class="flex items-center gap-3">

            <!-- 📅 Start Date -->
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-[#a38f7a]" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6 2a1 1 0 0 1 1 1v1h6V3a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v2H2V6a2 2 0 0 1 2-2h1V3a1 1 0 1 1 2 0v1zm12 5v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7h16zm-3 3H5a1 1 0 0 0 0 2h10a1 1 0 1 0 0-2z"/>
                    </svg>
                </div>
                <input id="datepicker-range-start"
                       type="text"
                       autocomplete="off"
                       class="pl-10 w-full rounded-md border border-[#d6c5b3] py-2.5 bg-white/60 text-gray-700 placeholder:text-sm"
                       placeholder="Start date">
            </div>

            <span class="text-[#a38f7a] font-semibold">to</span>

            <!-- 📅 End Date -->
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-[#a38f7a]" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6 2a1 1 0 0 1 1 1v1h6V3a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v2H2V6a2 2 0 0 1 2-2h1V3a1 1 0 1 1 2 0v1zm12 5v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7h16zm-3 3H5a1 1 0 0 0 0 2h10a1 1 0 1 0 0-2z"/>
                    </svg>
                </div>
                <input id="datepicker-range-end"
                       type="text"
                       autocomplete="off"
                       class="pl-10 w-full rounded-md border border-[#d6c5b3] py-2.5 bg-white/60 text-gray-700 placeholder:text-sm"
                       placeholder="End date">
            </div>
        </div>

        <!-- ✅ Tombol Apply -->
        <div class="mt-4 flex justify-end">
            <button wire:click="updateRentalDates"
                    class="px-6 py-3 rounded-full bg-gradient-to-r from-[#b49875] to-[#8a7a6a] text-white font-bold shadow hover:opacity-90 transition">
                Apply Dates to All Items
            </button>
            <script>
    document.addEventListener("DOMContentLoaded", function () {
        const startInput = document.getElementById('datepicker-range-start');
        const endInput = document.getElementById('datepicker-range-end');
        const applyButton = document.querySelector('[wire\\:click="updateRentalDates"]');

        function syncToLivewire() {
            if (startInput.value) {
                Livewire.dispatch('inputDateChanged', { type: 'start', value: startInput.value });
            }
            if (endInput.value) {
                Livewire.dispatch('inputDateChanged', { type: 'end', value: endInput.value });
            }
        }

        // Kirim saat blur/change biasa
        [startInput, endInput].forEach(input => {
            input.addEventListener('change', syncToLivewire);
        });

        // JUGA kirim ulang saat klik tombol "Apply"
        applyButton.addEventListener('click', syncToLivewire);
    });
</script>
<!-- Trigger manual update setelah tanggal diset -->
<script>
    Livewire.hook('message.processed', (message, component) => {
        if (message.updateQueue.some(q => q.method === 'updateRentalDates')) {
            Livewire.dispatch('cartUpdated');
        }
    });
</script>


        </div>
    </div>

    <!-- 🛒 Daftar Item Cart -->
    @forelse ($cartItems as $item)
        <div class="item relative flex flex-col sm:flex-row sm:items-center gap-6 bg-white rounded-2xl border-l-[8px] border-[#d6bfa4] shadow-xl px-6 py-6 group">
            <!-- ❌ Tombol Hapus -->
            <button wire:click="deleteItem({{ $item->id }})"
                    class="absolute top-4 right-4 text-[#b98a65] hover:text-red-400 text-lg">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- 🖼️ Gambar Produk -->
            <img src="{{ isset($item->product->images[0]) ? asset('storage/' . $item->product->images[0]) : 'https://via.placeholder.com/100' }}"
                 class="w-24 h-24 sm:w-28 sm:h-28 rounded-xl object-cover border border-[#f0e8dc] shadow-md" />

            <!-- ℹ️ Detail Produk -->
            <div class="flex-1 space-y-2 text-[#41362c]">
                <h3 class="text-lg font-semibold">
                    {{ $item->product->name }}
                    <span class="ml-2 bg-[#f6e7d5] text-[#826c58] px-2 py-0.5 text-xs rounded-full">Rental</span>
                </h3>
                <p class="text-xs italic text-[#7e6a57]">
                    {{ \Carbon\Carbon::parse($item->start_date)->format('d/m/y') }}
                    –
                    {{ \Carbon\Carbon::parse($item->end_date)->format('d/m/y') }}
                </p>
            </div>

            <!-- 🔢 Quantity -->
            <div class="flex flex-col items-center w-24 text-sm text-[#4a3c30]">
                <p class="font-medium">Qty</p>
                <div class="flex gap-2 text-base mt-1">
                    <button wire:click="decrement({{ $item->id }})"
                            class="w-7 h-7 rounded-full bg-[#f3e5d7] hover:bg-[#e5d4c0]">−</button>

                    <span class="quantity font-semibold">{{ $quantities[$item->id] ?? 1 }}</span>

                    <button wire:click="increment({{ $item->id }})"
                            class="w-7 h-7 rounded-full bg-[#f3e5d7] hover:bg-[#e5d4c0] disabled:opacity-50 disabled:cursor-not-allowed"
                            @disabled($quantities[$item->id] >= $item->product->stock)>
                        +
                    </button>
                </div>
            </div>

            <!-- 💰 Harga -->
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

<!-- 🔁 Sinkronisasi tanggal dari Flowbite ke Livewire -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const startInput = document.getElementById('datepicker-range-start');
        const endInput = document.getElementById('datepicker-range-end');

        [startInput, endInput].forEach(input => {
            input.addEventListener('change', () => {
                if (startInput.value) {
                    Livewire.dispatch('inputDateChanged', {
                        type: 'start',
                        value: startInput.value
                    });
                }
                if (endInput.value) {
                    Livewire.dispatch('inputDateChanged', {
                        type: 'end',
                        value: endInput.value
                    });
                }
            });
        });
    });
</script>
