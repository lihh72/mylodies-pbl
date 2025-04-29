<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        button:focus {
            outline: none;
        }
    </style>
</head>

<body class="bg-white font-sans">

    <!-- Header -->
    <header class="flex items-center justify-between bg-[#a38f7f] px-6 py-4">
        <div class="flex items-center space-x-2">
            <img src="https://storage.googleapis.com/a1aa/image/cbaf4631-03a5-4353-df89-ef2a048998ec.jpg"
                alt="Company logo" class="h-10 w-10 rounded-full">
            <h1 class="font-extrabold text-lg text-black">Payment</h1>
        </div>
        <div class="flex items-center space-x-6 text-black text-xl">
            <i class="far fa-bell cursor-pointer"></i>
            <i class="fas fa-shopping-cart cursor-pointer"></i>
            <i class="far fa-user-circle cursor-pointer"></i>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-6 flex flex-col md:flex-row md:space-x-6">
        <!-- Left Section -->
        <section class="flex-1">
            <h2 class="font-semibold text-black mb-3">Alamat Pengiriman</h2>
            <div class="flex items-start space-x-3 border border-black rounded-lg bg-[#f7efe1] p-4 mb-6 max-w-4xl">
                <a href="https://www.google.com/maps/search/?api=1&query=Politeknik+Negeri+Batam" target="_blank"
                    rel="noopener noreferrer" class="text-black mt-1">
                    <i class="fas fa-map-marker-alt cursor-pointer"></i>
                </a>
                <div>
                    <p class="font-semibold text-black">Burgerita</p>
                    <p class="text-xs text-[#7a6f63] max-w-[400px]">
                        Lorem ipsum dolor sit amet consectetur. Nisl in pretium mattis nunc nisl mauris quis
                    </p>
                </div>
            </div>

            <!-- Items List -->
            <div class="bg-[#f7efe1] rounded-xl p-6 space-y-6 max-w-4xl">

                <!-- Item 1 -->
                <div class="flex items-center space-x-4 item" data-price="100000">
                    <div class="flex flex-col items-center space-y-2 pr-2 border-r border-black">
                        <button class="text-black text-lg cursor-pointer delete-btn"
                            aria-label="Delete Fender Sonic Grey">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <button class="text-black text-lg cursor-pointer" aria-label="Check Fender Sonic Grey">
                            <i class="fas fa-check-square"></i>
                        </button>
                    </div>
                    <img src="https://storage.googleapis.com/a1aa/image/24e6f889-e187-4ced-dc2d-7d6e757807ce.jpg"
                        alt="Fender Sonic Grey" class="rounded-lg" width="100" height="100">
                    <div class="flex-1">
                        <p class="font-semibold text-black">Fender Sonic Grey</p>
                        <p class="text-[9px] text-[#7a6f63]">Rental Begins: <span class="italic">dd/mm/yy</span></p>
                        <p class="text-[9px] text-[#7a6f63]">Rental Ends: <span class="italic">dd/mm/yy</span></p>
                    </div>
                    <div class="w-28 text-center">
                        <p class="text-xs font-semibold text-black mb-1">Quantity</p>
                        <div class="flex items-center justify-center space-x-3 text-black text-lg select-none">
                            <button class="quantity-btn cursor-pointer">−</button>
                            <span class="text-base font-semibold quantity">1</span>
                            <button class="quantity-btn cursor-pointer">+</button>
                        </div>
                    </div>
                    <div class="w-36 text-right text-xs text-[#7a6f63]">
                        <p class="font-semibold text-black mb-1">Price</p>
                        <p class="price">IDR 100.000 / Day</p>
                    </div>
                </div>


                <!-- Item 2 -->
                <div class="flex items-center space-x-4 item" data-price="150000">
                    <div class="flex flex-col items-center space-y-2 pr-2 border-r border-black">
                        <button class="text-black text-lg cursor-pointer delete-btn"
                            aria-label="Delete Cecilio CVN-100">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <button class="text-black text-lg cursor-pointer" aria-label="Check Cecilio CVN-100">
                            <i class="fas fa-check-square"></i>
                        </button>
                    </div>
                    <img src="https://storage.googleapis.com/a1aa/image/1eef423e-83af-4a2e-210f-85b2e74696bd.jpg"
                        alt="Cecilio CVN-100" class="rounded-lg" width="100" height="100">
                    <div class="flex-1">
                        <p class="font-semibold text-black">Cecilio CVN-100</p>
                        <p class="text-[9px] text-[#7a6f63]">Rental Begins: <span class="italic">dd/mm/yy</span></p>
                        <p class="text-[9px] text-[#7a6f63]">Rental Ends: <span class="italic">dd/mm/yy</span></p>
                    </div>
                    <div class="w-28 text-center">
                        <p class="text-xs font-semibold text-black mb-1">Quantity</p>
                        <div class="flex items-center justify-center space-x-3 text-black text-lg select-none">
                            <button class="quantity-btn cursor-pointer">−</button>
                            <span class="text-base font-semibold quantity">1</span>
                            <button class="quantity-btn cursor-pointer">+</button>
                        </div>
                    </div>
                    <div class="w-36 text-right text-xs text-[#7a6f63]">
                        <p class="font-semibold text-black mb-1">Price</p>
                        <p class="price">IDR 150.000 / Day</p>
                    </div>
                </div>


            </div>
        </section>

        <!-- Right Section -->
        <aside
            class="w-full md:w-72 bg-[#f7efe1] rounded-xl p-4 mt-6 md:mt-0 flex flex-col items-stretch gap-4 self-start">
            <div>
                <h3 class="font-semibold text-black mb-3">Ringkasan Transaksi</h3>
                <div class="flex justify-between text-[10px] text-[#7a6f63] mb-1">
                    <span>Total Harga</span>
                    <span id="total-price">Rp. 100.000</span>
                </div>
                <div class="flex justify-between text-[10px] text-[#7a6f63] mb-1">
                    <span>Total Ongkos Kirim</span>
                    <span>Rp. 24.000</span>
                </div>
                <div class="flex justify-between text-[10px] text-[#7a6f63] mb-3">
                    <span>Biaya Jasa Aplikasi</span>
                    <span>Rp. 1.000</span>
                </div>
                <hr class="border-[#7a6f63] mb-3" />
                <div class="flex justify-between font-semibold text-[12px] text-black mb-3">
                    <span>Total Tagihan</span>
                    <span id="total-bill">Rp. 125.000</span>
                </div>
            </div>
            <button
                class="bg-[#a38f7f] text-black font-extrabold rounded-md py-2 w-full hover:bg-[#8a7a6a] transition-colors">
                Bayar Sekarang
            </button>
        </aside>

    </main>

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

        function updatePriceDisplay(priceElement, qty, pricePerUnit) {
            priceElement.textContent = `IDR ${ (qty * pricePerUnit).toLocaleString('id-ID') } / Day`;
        }

        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', () => {
                const item = button.closest('.item');
                const qtySpan = item.querySelector('.quantity');
                const priceElement = item.querySelector('.price');
                const pricePerUnit = parseInt(item.getAttribute('data-price'));

                let currentQty = parseInt(qtySpan.textContent);
                if (button.textContent.trim() === '+') {
                    currentQty++;
                } else if (button.textContent.trim() === '−') {
                    if (currentQty > 1) currentQty--;
                }

                qtySpan.textContent = currentQty;
                updatePriceDisplay(priceElement, currentQty, pricePerUnit);
                updateTotals();
            });
        });

        // DELETE functionality
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', () => {
                const item = button.closest('.item');
                item.remove();
                updateTotals();
            });
        });

        window.addEventListener('DOMContentLoaded', () => {
            updateTotals();
        });
    </script>


</body>

</html>
