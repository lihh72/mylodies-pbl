@extends('layouts.app')

@section('title', 'MyLodies - Payment')

@section('content')
<div class="light-stage min-h-screen flex flex-col pt-24">
    <div class="flex-1 flex items-center justify-center">
        <form action="{{ route('payment.address.confirm', $payment->code) }}" method="POST" class="w-full">
            @csrf
            {{-- Stepper Breadcrumb --}}
<div class="flex justify-center items-center gap-10 mb-4 select-none">
    {{-- Step 1: Payment (active) --}}
    <div class="flex flex-col items-center gap-2">
        <div class="w-10 h-10 flex items-center justify-center rounded-full bg-[#b49875] text-white font-bold shadow">
            1
        </div>
        <span class="text-sm font-semibold text-[#3c2f24]">Payment</span>
    </div>

    {{-- Line Between --}}
    <div class="h-1 w-12 bg-[#e7dbce] rounded-full"></div>

    {{-- Step 2: Confirmation (inactive) --}}
    <div class="flex flex-col items-center gap-2">
        <div class="w-10 h-10 flex items-center justify-center rounded-full bg-[#e7dbce] text-[#a19387] font-bold shadow-inner">
            2
        </div>
        <span class="text-sm font-semibold text-[#a19387]">Confirmation</span>
    </div>
</div>

          <div class="max-w-7xl w-full mx-auto px-8 pt-3 pb-12 grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-12 relative">


                <section class="space-y-14">
                    <div class="relative rounded-[2rem] border border-[#decdb5] bg-[#fcf8f4] p-10 shadow-2xl">
                        <div class="relative z-10 mb-10 flex items-center gap-4">
                            <div class="bg-[#d6bfa4] text-white rounded-xl px-3 py-2 shadow-md">
                                <i class="fa-solid fa-cart-shopping text-xl"></i>
                            </div>
                            <h2 class="text-3xl font-extrabold tracking-tight text-[#3c2f24]">Your Rental Items</h2>
                        </div>

                        <div class="space-y-6">
                            @foreach ($order->orderItems as $item)
                            <div class="item relative flex flex-col sm:flex-row sm:items-center gap-6 bg-white rounded-2xl border-l-[8px] border-[#d6bfa4] shadow-xl px-6 py-6 group" data-price="{{ $item->total_price }}">
                                <img src="{{ isset($item->product->images[0]) ? asset('storage/' . $item->product->images[0]) : 'https://via.placeholder.com/150' }}" 
                                    class="w-24 h-24 sm:w-28 sm:h-28 rounded-xl object-cover border border-[#f0e8dc] shadow-md" />

                                <div class="flex-1 space-y-2 text-[#41362c]">
                                    <h3 class="text-lg font-semibold">
                                        {{ $item->product->name }}
                                        <span class="ml-2 bg-[#f6e7d5] text-[#826c58] px-2 py-0.5 text-xs rounded-full">Rental</span>
                                    </h3>
                                    <p class="text-xs italic text-[#7e6a57]">
                                        {{ \Carbon\Carbon::parse($item->start_date)->format('d/m/Y') }} – {{ \Carbon\Carbon::parse($item->end_date)->format('d/m/Y') }}
                                    </p>
                                </div>

                                <div class="text-right w-28 text-[#5e5044]">
                                    <p class="text-xs uppercase">Price</p>
                                    <p class="price font-bold">IDR {{ number_format($item->total_price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-6 border-t border-[#eadbc3] pt-4 text-right">
                            <p class="text-sm text-[#7e6a57]">Subtotal (before tax & fees)</p>
                            <p id="total-price" class="text-2xl font-bold text-[#3c2f24]">IDR {{ number_format($order->base_price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </section>

                <aside class="bg-white rounded-3xl shadow-xl border border-[#d9cbb8] p-8 sticky top-32 self-start space-y-6">

                    {{-- Alamat Pengiriman --}}
                    <div class="bg-[#fcf8f4]/70 border border-[#eadccd] rounded-xl p-4 text-xs text-[#5f5042] leading-snug space-y-3">
                        <div class="flex items-center gap-3 text-sm font-medium text-[#3c2f24]">
                            <i class="fa-solid fa-location-dot text-[#b49875]"></i>
                            <span class="font-semibold">Alamat Pengiriman</span>
                        </div>

                        <div class="flex gap-3 mt-2 text-sm">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="address_option" value="user" checked class="accent-[#b49875]">
                                Gunakan Alamat Saya
                            </label>

                        </div>

                        <div id="address-display" class="text-[13px] bg-white/60 border border-[#e8dbcc] p-3 rounded-md leading-snug space-y-0.5 text-[#443b33] mt-2">
                            <p id="disp-name" class="font-semibold">{{ Auth::user()->name }}</p>
                            <p id="disp-address">{{ Auth::user()->address }}</p>
                            <p id="disp-city">{{ Auth::user()->district }}, {{ Auth::user()->city }}, {{ Auth::user()->province }} {{ Auth::user()->postal_code }}</p>
                            <p id="disp-phone">No. Telp: {{ Auth::user()->phone_number }}</p>
                        </div>

                        <div id="custom-address-form" class="hidden mt-3 space-y-2 text-xs">
                            <input type="text" name="new_name" id="new-name" class="w-full border rounded-md p-2" placeholder="Nama Penerima">
                            <textarea name="new_address" id="new-address" class="w-full border rounded-md p-2" rows="2" placeholder="Alamat Lengkap"></textarea>
                            <div class="flex gap-2">
                                <input type="text" name="new_city" id="new-city" class="w-1/2 border rounded-md p-2" placeholder="Kota">
                                <input type="text" name="new_province" id="new-province" class="w-1/2 border rounded-md p-2" placeholder="Provinsi">
                            </div>
                            <div class="flex gap-2">
                                <input type="text" name="new_postal" id="new-postal" class="w-1/2 border rounded-md p-2" placeholder="Kode Pos">
                                <input type="text" name="new_phone" id="new-phone" class="w-1/2 border rounded-md p-2" placeholder="No. Telp">
                            </div>
                        </div>
                    </div>

                    <h3 class="text-xl font-extrabold flex items-center gap-2">
                        <i class="fa-solid fa-receipt text-[#b49875]"></i> Ringkasan
                    </h3>
                    <div class="text-sm text-[#7a6f63] space-y-3">
                        <div class="flex justify-between">
                            <span>Total Harga</span>
                            <span>Rp. {{ number_format($order->base_price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Ongkos Kirim</span>
<span>Rp. {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>

                        </div>

                        <hr>
                        <div class="flex justify-between font-semibold text-[#3b2f28] pt-2">
                            <span>Total Tagihan</span>
                           @php

    $grandTotal = $order->total_price;
@endphp
<span id="total-bill">Rp. {{ number_format($grandTotal, 0, ',', '.') }}</span>


                        </div>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-full font-bold text-white bg-gradient-to-r from-[#b49875] to-[#8a7a6a] hover:opacity-90 shadow-lg text-lg transition-all">
                        Lanjut ke Pembayaran
                    </button>
                </aside>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')


<script>
document.addEventListener('DOMContentLoaded', function () {
    const radioUser = document.querySelector('input[value="user"]');
    const radioCustom = document.querySelector('input[value="custom"]');
    const form = document.getElementById('custom-address-form');
    const display = {
        name: document.getElementById('disp-name'),
        address: document.getElementById('disp-address'),
        city: document.getElementById('disp-city'),
        phone: document.getElementById('disp-phone')
    };

    function useUserAddress() {
        form.classList.add('hidden');
        display.name.textContent = @json(Auth::user()->name);
        display.address.textContent = @json(Auth::user()->address);
        display.city.textContent = @json(Auth::user()->city . ', ' . Auth::user()->province . ' ' . Auth::user()->postal_code);
        display.phone.textContent = 'No. Telp: ' + @json(Auth::user()->phone_number);
    }

    function useCustomAddress() {
        form.classList.remove('hidden');
        const update = () => {
            display.name.textContent = document.getElementById('new-name').value || '—';
            display.address.textContent = document.getElementById('new-address').value || '—';
            display.city.textContent = (document.getElementById('new-city').value || '') + ', ' +
                                       (document.getElementById('new-province').value || '') + ' ' +
                                       (document.getElementById('new-postal').value || '');
            display.phone.textContent = 'No. Telp: ' + (document.getElementById('new-phone').value || '—');
        };

        form.querySelectorAll('input, textarea').forEach(el => {
            el.addEventListener('input', update);
        });
        update();
    }

    radioUser.addEventListener('change', useUserAddress);
    radioCustom.addEventListener('change', useCustomAddress);
});
</script>
@endsection
