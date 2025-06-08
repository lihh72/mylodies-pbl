@extends('layouts.app')

@section('title', 'MyLodies - Payment')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-12 grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-12 relative pt-32">

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
    <p id="total-price" class="text-2xl font-bold text-[#3c2f24]">IDR {{ number_format($order->total_price, 0, ',', '.') }}</p>
</div>
    </section>

    <aside class="bg-white rounded-3xl shadow-xl border border-[#d9cbb8] p-8 sticky top-32 self-start space-y-6">
        <h3 class="text-xl font-extrabold flex items-center gap-2">
            <i class="fa-solid fa-receipt text-[#b49875]"></i> Ringkasan
        </h3>
        <div class="text-sm text-[#7a6f63] space-y-3">
            <div class="flex justify-between">
                <span>Total Harga</span>
                <span>Rp. {{ number_format($order->total_price, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
                <span>Ongkos Kirim</span>
                <span>Rp. 24.000</span>
            </div>
            <div class="flex justify-between">
                <span>Biaya Aplikasi</span>
                <span>Rp. 1.000</span>
            </div>
            <hr>
            <div class="flex justify-between font-semibold text-[#3b2f28] pt-2">
                <span>Total Tagihan</span>
                <span id="total-bill">Rp. {{ number_format($order->total_price + 24000 + 1000, 0, ',', '.') }}</span>
            </div>
        </div>

        <button id="pay-button" class="w-full py-4 rounded-full font-bold text-white bg-gradient-to-r from-[#b49875] to-[#8a7a6a] hover:opacity-90 shadow-lg text-lg transition-all">
            Bayar Sekarang
        </button>
    </aside>
</div>
@endsection

@section('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script>
    const payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                alert('Payment success!');
                // Redirect ke route process untuk update status
                window.location.href = "{{ route('payment.process', $order->id) }}";
            },
            onPending: function(result){
                alert('Waiting for your payment!');
            },
            onError: function(result){
                alert('Payment failed!');
            }
        });
    });
</script>

<script>
    const shippingCost = 24000;
    const appFee = 1000;

    function formatIDR(amount) {
        return 'Rp. ' + amount.toLocaleString('id-ID');
    }

    function updateTotals() {
        let totalPrice = 0;
        document.querySelectorAll('.item').forEach(item => {
            // Kalau quantity ada, gunakan, kalau tidak, pakai 1
            const qtySpan = item.querySelector('.quantity');
            const qty = qtySpan ? parseInt(qtySpan.textContent) : 1;
            const pricePerUnit = parseInt(item.getAttribute('data-price'));
            totalPrice += qty * pricePerUnit;
        });
        document.getElementById('total-price').textContent = formatIDR(totalPrice);
        document.getElementById('total-bill').textContent = formatIDR(totalPrice + shippingCost + appFee);
    }

    window.addEventListener('DOMContentLoaded', updateTotals);
</script>
@endsection
