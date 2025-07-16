@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran - MyLodies')

@section('content')
<div class="light-stage min-h-screen flex flex-col items-center justify-center py-20 px-4 bg-[#fdfaf5]">
    <div class="max-w-3xl w-full bg-white border border-[#e4d3c0] rounded-3xl shadow-2xl p-10 space-y-8">

        <h1 class="text-3xl font-extrabold text-[#3e2d1f] flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-[#b49875]"></i>
            Konfirmasi Pembayaran
        </h1>

        {{-- Ringkasan Pesanan --}}
        <div class="space-y-4 text-[#4a3c30]">
            <div class="flex justify-between">
                <span class="font-medium">Kode Order:</span>
                <span>{{ $order->code }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium">Jumlah Item:</span>
                <span>{{ $order->orderItems->count() }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium">Total Harga:</span>
                <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium">Ongkos Kirim:</span>
                <span>Rp 24.000</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium">Biaya Aplikasi:</span>
                <span>Rp 1.000</span>
            </div>
            <hr>
            <div class="flex justify-between font-bold text-[#3c2f24] text-lg">
                <span>Total Tagihan:</span>
                <span>Rp {{ number_format($order->total_price + 24000 + 1000, 0, ',', '.') }}</span>
            </div>
        </div>

        {{-- Alamat Shipping --}}
        <div class="mt-6 bg-[#fcf8f4] border border-[#eadccd] rounded-xl p-4 text-sm leading-snug space-y-1 text-[#443b33]">
            <p class="font-semibold">Alamat Shipping</p>
            <p>{{ $order->shipping_address }}</p>
        </div>

        {{-- Tombol Bayar Sekarang --}}
        <button id="pay-button" class="w-full py-4 rounded-full font-bold text-white bg-gradient-to-r from-[#b49875] to-[#8a7a6a] hover:opacity-90 shadow-md text-lg transition-all">
            Bayar Sekarang
        </button>

    </div>
</div>
@endsection

@section('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script>
    const payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                window.location.href = "{{ route('payment.process', $order->id) }}?redirect_to=order_detail";
            },
            onPending: function(result){
                alert('Menunggu pembayaran Anda.');
            },
            onError: function(result){
                alert('Pembayaran gagal. Silakan coba lagi.');
            }
        });
    });
</script>
@endsection
