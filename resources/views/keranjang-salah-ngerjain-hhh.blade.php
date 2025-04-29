<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Shopping Cart</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-white font-sans">

  <!-- Header -->
  <header class="flex items-center justify-between bg-[#a38f7f] px-6 py-4">
    <div class="flex items-center space-x-2">
      <img src="https://storage.googleapis.com/a1aa/image/cbaf4631-03a5-4353-df89-ef2a048998ec.jpg" alt="Company logo" class="h-10 w-10 rounded-full" />
      <h1 class="font-extrabold text-lg text-black">Shopping Cart</h1>
    </div>
    <nav class="hidden md:flex space-x-8 font-semibold text-black text-md">
      <a href="#">Home</a>
      <a href="#">About Us</a>
      <a href="#">Contact</a>
    </nav>
    <div class="flex items-center space-x-6 text-black text-xl">
      <i class="far fa-bell cursor-pointer"></i>
      <i class="fas fa-shopping-cart cursor-pointer"></i>
      <i class="far fa-user-circle cursor-pointer"></i>
    </div>
  </header>

  <main class="max-w-7xl mx-auto px-4 py-6 flex flex-col md:flex-row md:space-x-6">

    <!-- Left: Cart Items -->
    <section class="flex-1">
      <div class="bg-[#f7efe1] rounded-xl p-6 space-y-6 max-w-4xl">

        <!-- Item: Fender -->
        <div class="flex items-center space-x-4 item" data-price="100000">
          <div class="flex flex-col items-center space-y-2 pr-2 border-r border-black">
            <button class="text-black text-lg cursor-pointer delete-btn" aria-label="Delete">
              <i class="fas fa-trash-alt"></i>
            </button>
            <button class="text-black text-lg cursor-pointer" aria-label="Select">
              <i class="fas fa-check-square"></i>
            </button>
          </div>
          <img src="https://storage.googleapis.com/a1aa/image/24e6f889-e187-4ced-dc2d-7d6e757807ce.jpg" alt="Fender" class="rounded-lg" width="100" />
          <div class="flex-1">
            <p class="font-semibold text-black">Fender Sonic Grey</p>
            <p class="text-[10px] text-[#7a6f63]">Rental Begins: <span class="italic">dd/mm/yy</span></p>
            <p class="text-[10px] text-[#7a6f63]">Rental Ends: <span class="italic">dd/mm/yy</span></p>
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

        <!-- Item: Cecilio -->
        <div class="flex items-center space-x-4 item" data-price="150000">
          <div class="flex flex-col items-center space-y-2 pr-2 border-r border-black">
            <button class="text-black text-lg cursor-pointer delete-btn" aria-label="Delete">
              <i class="fas fa-trash-alt"></i>
            </button>
            <button class="text-black text-lg cursor-pointer" aria-label="Select">
              <i class="fas fa-check-square"></i>
            </button>
          </div>
          <img src="https://storage.googleapis.com/a1aa/image/1eef423e-83af-4a2e-210f-85b2e74696bd.jpg" alt="Violin" class="rounded-lg" width="100" />
          <div class="flex-1">
            <p class="font-semibold text-black">Cecilio CVN-100</p>
            <p class="text-[10px] text-[#7a6f63]">Rental Begins: <span class="italic">dd/mm/yy</span></p>
            <p class="text-[10px] text-[#7a6f63]">Rental Ends: <span class="italic">dd/mm/yy</span></p>
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

    <!-- Right: Summary -->
    <aside class="w-full md:w-72 bg-[#f7efe1] rounded-xl p-4 mt-6 md:mt-0 flex flex-col items-stretch gap-4 self-start">
      <h3 class="font-semibold text-black text-lg mb-3">Total Price</h3>
      <div class="text-center">
        <p class="text-2xl font-bold text-[#7a6f63]" id="total-price">IDR 250.000</p>
      </div>
      <button class="bg-[#a38f7f] hover:bg-[#8a7a6a] text-black font-extrabold rounded-md py-2 w-full transition">
        Checkout
      </button>

      <label for="notes" class="text-sm text-black mt-4">Notes:</label>
      <textarea id="notes" rows="4" class="border border-black rounded-md p-2 resize-none"></textarea>
    </aside>
  </main>

  <script>
    function formatIDR(amount) {
      return 'IDR ' + amount.toLocaleString('id-ID');
    }

    function updateTotals() {
      let total = 0;
      document.querySelectorAll('.item').forEach(item => {
        const qty = parseInt(item.querySelector('.quantity').textContent);
        const unitPrice = parseInt(item.dataset.price);
        total += qty * unitPrice;
      });
      document.getElementById('total-price').textContent = formatIDR(total);
    }

    function updatePriceDisplay(el, qty, unitPrice) {
      el.textContent = `IDR ${ (qty * unitPrice).toLocaleString('id-ID') } / Day`;
    }

    document.querySelectorAll('.quantity-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const item = btn.closest('.item');
        const qtyEl = item.querySelector('.quantity');
        const priceEl = item.querySelector('.price');
        let qty = parseInt(qtyEl.textContent);
        const unitPrice = parseInt(item.dataset.price);

        if (btn.textContent.trim() === '+') {
          qty++;
        } else if (btn.textContent.trim() === '−' && qty > 1) {
          qty--;
        }

        qtyEl.textContent = qty;
        updatePriceDisplay(priceEl, qty, unitPrice);
        updateTotals();
      });
    });

    document.querySelectorAll('.delete-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        btn.closest('.item').remove();
        updateTotals();
      });
    });

    window.addEventListener('DOMContentLoaded', updateTotals);
  </script>

</body>

</html>
