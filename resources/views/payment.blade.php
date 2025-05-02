<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Payment Page</title>
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        button:focus { outline: none; }
        .bg-pattern {
            background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');
        }
    </style>
</head>

<body class="bg-[#f9f6f1] font-sans text-[#3b2f28] relative overflow-x-hidden">

    <!-- DECORATIVE BACKGROUND SHAPES -->
    <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full bg-[#f5e5d0] blur-3xl opacity-30"></div>
    <div class="absolute top-0 right-0 w-80 h-80 rounded-bl-full bg-gradient-to-tr from-[#b49875]/30 to-transparent"></div>

    <!-- HEADER -->
    <x-navbar />
    
    <main class="max-w-7xl mx-auto px-8 py-12 grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-12 relative pt-32">

        <section class="space-y-14">
            <div class="relative rounded-[2rem] border border-[#decdb5] bg-[#fcf8f4] p-10 shadow-2xl">
              <div class="absolute -top-20 -left-24 w-80 h-80 bg-[#f3e2c9] rounded-full blur-[100px] opacity-30 pointer-events-none z-0"></div>
      
              <!-- Title -->
              <div class="relative z-10 mb-10 flex items-center gap-4">
                <div class="bg-[#d6bfa4] text-white rounded-xl px-3 py-2 shadow-md">
                  <i class="fa-solid fa-cart-shopping text-xl"></i>
                </div>
                <h2 class="text-3xl font-extrabold tracking-tight text-[#3c2f24]">Your Rental Items</h2>
              </div>
      
              <!-- Items -->
              <div class="space-y-6">
      
                <!-- Item -->
                <div class="item relative flex flex-col sm:flex-row sm:items-center gap-6 bg-white rounded-2xl border-l-[8px] border-[#d6bfa4] shadow-xl px-6 py-6 group" data-price="100000">
                  <button class="delete-btn absolute top-4 right-4 text-[#b98a65] hover:text-red-400 text-lg transition">
                    <i class="fa-solid fa-xmark"></i>
                  </button>
                  <img src="https://storage.googleapis.com/a1aa/image/24e6f889-e187-4ced-dc2d-7d6e757807ce.jpg" class="w-24 h-24 sm:w-28 sm:h-28 rounded-xl object-cover border border-[#f0e8dc] shadow-md" />
                  <div class="flex-1 space-y-2 text-[#41362c]">
                    <h3 class="text-lg font-semibold">Fender Sonic Grey <span class="ml-2 bg-[#f6e7d5] text-[#826c58] px-2 py-0.5 text-xs rounded-full">Rental</span></h3>
                    <p class="text-xs italic text-[#7e6a57]">01/06/25 – 07/06/25</p>
                  </div>
                  <div class="flex flex-col items-center w-24 text-sm text-[#4a3c30]">
                    <p class="font-medium">Qty</p>
                    <div class="flex gap-2 text-base mt-1">
                      <button class="quantity-btn w-7 h-7 rounded-full bg-[#f3e5d7] hover:bg-[#e5d4c0]">−</button>
                      <span class="quantity font-semibold">1</span>
                      <button class="quantity-btn w-7 h-7 rounded-full bg-[#f3e5d7] hover:bg-[#e5d4c0]">+</button>
                    </div>
                  </div>
                  <div class="text-right w-28 text-[#5e5044]">
                    <p class="text-xs uppercase">Price</p>
                    <p class="price font-bold">IDR 100.000</p>
                  </div>
                </div>
      
                <!-- Item -->
                <div class="item relative flex flex-col sm:flex-row sm:items-center gap-6 bg-white rounded-2xl border-l-[8px] border-[#d6bfa4] shadow-xl px-6 py-6 group" data-price="150000">
                  <button class="delete-btn absolute top-4 right-4 text-[#b98a65] hover:text-red-400 text-lg transition">
                    <i class="fa-solid fa-xmark"></i>
                  </button>
                  <img src="https://storage.googleapis.com/a1aa/image/1eef423e-83af-4a2e-210f-85b2e74696bd.jpg" class="w-24 h-24 sm:w-28 sm:h-28 rounded-xl object-cover border border-[#f0e8dc] shadow-md" />
                  <div class="flex-1 space-y-2 text-[#41362c]">
                    <h3 class="text-lg font-semibold">Cecilio CVN-100 <span class="ml-2 bg-[#f6e7d5] text-[#826c58] px-2 py-0.5 text-xs rounded-full">Rental</span></h3>
                    <p class="text-xs italic text-[#7e6a57]">05/06/25 – 12/06/25</p>
                  </div>
                  <div class="flex flex-col items-center w-24 text-sm text-[#4a3c30]">
                    <p class="font-medium">Qty</p>
                    <div class="flex gap-2 text-base mt-1">
                      <button class="quantity-btn w-7 h-7 rounded-full bg-[#f3e5d7] hover:bg-[#e5d4c0]">−</button>
                      <span class="quantity font-semibold">1</span>
                      <button class="quantity-btn w-7 h-7 rounded-full bg-[#f3e5d7] hover:bg-[#e5d4c0]">+</button>
                    </div>
                  </div>
                  <div class="text-right w-28 text-[#5e5044]">
                    <p class="text-xs uppercase">Price</p>
                    <p class="price font-bold">IDR 150.000</p>
                  </div>
                </div>
              </div>
<!-- Total -->
<div class="mt-6 border-t border-[#eadbc3] pt-4 text-right">
    <p class="text-sm text-[#7e6a57]">Subtotal (before tax & fees)</p>
    <p id="total-price" class="text-2xl font-bold text-[#3c2f24]">IDR 0</p>
  </div>
</div>
</section>
        <!-- RIGHT: SUMMARY -->
        <aside class="bg-white rounded-3xl shadow-xl border border-[#d9cbb8] p-8 sticky top-32 self-start space-y-6">
            <h3 class="text-xl font-extrabold flex items-center gap-2">
                <i class="fa-solid fa-receipt text-[#b49875]"></i> Ringkasan
            </h3>
            <div class="text-sm text-[#7a6f63] space-y-3">
                <div class="flex justify-between">
                    <span>Total Harga</span>
                    <span id="total-price">Rp. 100.000</span>
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
                    <span id="total-bill">Rp. 125.000</span>
                </div>
            </div>
            <button class="w-full py-4 rounded-full font-bold text-white bg-gradient-to-r from-[#b49875] to-[#8a7a6a] hover:opacity-90 shadow-lg text-lg transition-all">
                Bayar Sekarang
            </button>
        </aside>

    </main>

    <!-- JavaScript sama seperti sebelumnya -->
    <script>
        const shippingCost = 24000;
        const appFee = 1000;

        function formatIDR(amount) {
            return 'Rp. ' + amount.toLocaleString('id-ID');
        }

        function updateTotals() {
            let totalPrice = 0;
            document.querySelectorAll('.item').forEach(item => {
                const qty = parseInt(item.querySelector('.quantity').textContent);
                const pricePerUnit = parseInt(item.getAttribute('data-price'));
                totalPrice += qty * pricePerUnit;
            });
            document.getElementById('total-price').textContent = formatIDR(totalPrice);
            document.getElementById('total-bill').textContent = formatIDR(totalPrice + shippingCost + appFee);
        }

        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', () => {
                const item = button.closest('.item');
                const qtySpan = item.querySelector('.quantity');
                const priceElement = item.querySelector('.price');
                const pricePerUnit = parseInt(item.getAttribute('data-price'));

                let currentQty = parseInt(qtySpan.textContent);
                if (button.textContent.trim() === '+') currentQty++;
                else if (button.textContent.trim() === '−' && currentQty > 1) currentQty--;

                qtySpan.textContent = currentQty;
                priceElement.textContent = `IDR ${ (currentQty * pricePerUnit).toLocaleString('id-ID') } / Day`;
                updateTotals();
            });
        });

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', () => {
                button.closest('.item').remove();
                updateTotals();
            });
        });

        window.addEventListener('DOMContentLoaded', updateTotals);
    </script>
</body>

</html>
