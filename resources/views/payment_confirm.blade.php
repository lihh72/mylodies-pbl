@extends('layouts.app')

@section('title', 'MyLodies - Konfirmasi Pembayaran')

@section('content')
<div class="light-stage min-h-screen flex flex-col">
    {{-- Offset untuk navbar --}}
    <div class="pt-24 px-6">
        {{-- Stepper Breadcrumb --}}
        <div class="flex justify-center items-center gap-10 mb-2 select-none">
            {{-- Step 1: Payment --}}
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-[#b49875] text-white font-bold shadow">
                    1
                </div>
                <span class="text-sm font-semibold text-[#3c2f24]">Payment</span>
            </div>

            {{-- Divider --}}
            <div class="h-1 w-12 bg-[#b49875] rounded-full"></div>

            {{-- Step 2: Confirmation --}}
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-[#b49875] text-white font-bold shadow">
                    2
                </div>
                <span class="text-sm font-semibold text-[#3c2f24]">Confirmation</span>
            </div>
        </div>

        {{-- Main content --}}
        <div class="max-w-3xl w-full pt-1 mx-auto px-8 py-16 space-y-10 text-[#3c2f24]">


            <div class="text-center space-y-4">
                <h2 class="text-4xl font-extrabold">Konfirmasi Pembayaran</h2>
                <p class="text-sm text-[#7e6a57] max-w-md mx-auto">Silakan cek kembali detail penyewaan dan tekan tombol di bawah untuk menyelesaikan pembayaran.</p>
            </div>

            <div class="bg-[#fcf8f4] border border-[#e6d7c2] rounded-2xl shadow-xl p-8 space-y-6">
                <h3 class="text-xl font-bold flex items-center gap-2">
                    <i class="fa-solid fa-box-open text-[#b49875]"></i> Detail Pesanan
                </h3>

<div class="space-y-4">
    @foreach ($order->orderItems as $item)
    <div class="flex items-center gap-4">
        <img src="{{ isset($item->product->images[0]) ? asset('storage/' . $item->product->images[0]) : 'https://via.placeholder.com/100' }}"
             class="w-16 h-16 object-cover rounded-lg border border-[#e6d7c2] shadow-sm" />
        <div class="flex-1">
            <p class="font-semibold">{{ $item->product->name }}</p>
            <p class="text-sm text-[#7e6a57] italic">
                {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }} – {{ \Carbon\Carbon::parse($item->end_date)->format('d M Y') }}
            </p>
            <p class="text-xs text-[#8a7a6a]">Jumlah: <span class="font-semibold">{{ $item->quantity }}</span></p>
        </div>
        <div class="text-right text-sm">
            <p>IDR {{ number_format($item->total_price, 0, ',', '.') }}</p>
        </div>
    </div>
    @endforeach
</div>


                <div class="border-t pt-4 text-sm text-[#5f5042]">
                    <div class="flex justify-between">
                        <span>Subtotal</span>
                        <span>IDR {{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Ongkos Kirim</span>
                        <span>IDR 24.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Biaya Aplikasi</span>
                        <span>IDR 1.000</span>
                    </div>
                    <div class="flex justify-between font-bold text-[#3c2f24] pt-2 border-t mt-3">
                        <span>Total</span>
                        <span>IDR {{ number_format($order->total_price + 24000 + 1000, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <button id="pay-button"
                            class="inline-block px-8 py-4 bg-gradient-to-r from-[#b49875] to-[#8a7a6a] text-white font-bold rounded-full shadow-lg hover:opacity-90 transition-all text-lg">
                        Bayar Sekarang
                    </button>
                    <p class="text-xs text-[#7e6a57] mt-2">Dengan menekan tombol ini, Anda akan diarahkan ke halaman pembayaran Midtrans.</p>
                </div>
            </div>
        </div>
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
                alert('Pembayaran berhasil!');
                window.location.href = "{{ route('payment.process', $order->id) }}?redirect_to=order_detail";
            },
            onPending: function(result){
                alert('Menunggu pembayaran selesai...');
            },
            onError: function(result){
                alert('Pembayaran gagal. Silakan coba lagi.');
            }
        });
    });
</script>
@endsection
