<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profile Page</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-white">

  <!-- Navigation -->
  <nav class="bg-[#a38c75] flex justify-between items-center p-6 flex-wrap shadow-md">
    <div class="flex items-center space-x-6">
      <i class="far fa-user-circle text-black text-5xl"></i>
      <span class="font-bold text-black text-2xl">Username</span>
    </div>
    <div class="flex items-center space-x-8">
      <div class="flex space-x-8">
        <a href="#" class="text-black font-medium hover:text-black text-lg">Home</a>
        <a href="#" class="text-black font-medium hover:text-black text-lg">Product</a>
        <a href="#" class="text-black font-medium hover:text-black text-lg">About Us</a>
      </div>
      <a href="#" class="text-black text-2xl"><i class="fas fa-cart-shopping"></i></a>
      <a href="#" class="text-black text-2xl"><i class="fas fa-bell"></i></a>
      <button class="border border-black rounded-full px-6 py-3 text-black font-bold text-lg flex items-center space-x-2">
        <i class="fas fa-sign-out-alt text-lg"></i><span>Logout</span>
      </button>
    </div>
  </nav>

  <div class="max-w-6xl mx-auto px-4">

    <!-- Orders Section -->
    <div class="bg-[#f7efe1] rounded-lg mt-8 mb-4 p-4 w-full shadow-md">
      <div class="font-bold text-lg border-b-2 border-[#c9bca7] text-[#7a5c46] pb-2" id="orders-header">
        My Orders
      </div>
      <div class="flex justify-around pt-4 flex-wrap">
        <!-- Unpaid Button -->
        <button class="text-center text-[#5a534d] flex-1 min-w-[150px] mb-4 py-4 px-2 rounded-lg bg-transparent hover:bg-[#f6e8d6] hover:text-black transition-all duration-300">
          <i class="fas fa-credit-card text-3xl"></i>
          <p class="mt-2 font-semibold text-sm">Unpaid</p>
        </button>
        <!-- Packed Button -->
        <button class="text-center text-[#5a534d] flex-1 min-w-[150px] mb-4 py-4 px-2 rounded-lg bg-transparent hover:bg-[#f6e8d6] hover:text-black transition-all duration-300">
          <i class="fas fa-box fa-2x"></i>
          <p class="mt-2 font-semibold text-sm">Packed</p>
        </button>
        <!-- Shipped Button -->
        <button class="text-center text-[#5a534d] flex-1 min-w-[150px] mb-4 py-4 px-2 rounded-lg bg-transparent hover:bg-[#f6e8d6] hover:text-black transition-all duration-300">
          <i class="fas fa-truck text-3xl"></i>
          <p class="mt-2 font-semibold text-sm">Shipped</p>
        </button>
        <!-- Give Rating Button -->
        <button class="text-center text-[#5a534d] flex-1 min-w-[150px] mb-4 py-4 px-2 rounded-lg bg-transparent hover:bg-[#f6e8d6] hover:text-black transition-all duration-300">
          <i class="fas fa-thumbs-up text-3xl"></i>
          <p class="mt-2 font-semibold text-sm">Give Rating / Review</p>
        </button>
      </div>
    </div>

    <!-- Activities Section -->
    <div class="flex justify-center">
      <div class="bg-[#f7efe1] rounded-lg mt-8 mb-4 p-4 w-full max-w-7xl shadow-md">
        <div class="font-bold text-lg border-b-2 border-[#c9bca7] text-[#7a5c46] pb-2" id="activities-header">
          My Activities
        </div>

        <!-- Product Cards -->
        <main class="flex-1 p-8 animate-fade-in">
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6">

            <!-- Produk 1 -->
            <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
              <img src="/images/gitarHitam.jpeg" alt="Electric Guitar" class="w-full h-32 object-cover mb-3 rounded-md">
              <h3 class="font-bold text-sm text-[#5c4633] mb-1">Gitar Electric Fender Original</h3>
              <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 370.000 / Day</p>
              <p class="text-[11px] text-gray-500 italic mt-1">Sewa tanggal: 27–28 Apr 2025</p>
              <div class="flex items-center justify-center gap-3 mt-3">
                <span class="px-2 py-1 text-[11px] rounded-full bg-green-100 text-green-700 font-medium">Selesai</span>
                <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Reorder</button>
              </div>
            </div>

            <!-- Produk 2 -->
            <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
              <img src="/images/saaxophone.jpeg" alt="Saxophone" class="w-full h-32 object-cover mb-3 rounded-md">
              <h3 class="font-bold text-sm text-[#5c4633] mb-1">Thomann Tenor Saxophone</h3>
              <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 280.000 / Day</p>
              <p class="text-[11px] text-gray-500 italic mt-1">Sewa tanggal: 25–26 Apr 2025</p>
              <div class="flex items-center justify-center gap-3 mt-3">
                <span class="px-2 py-1 text-[11px] rounded-full bg-green-100 text-green-700 font-medium">Selesai</span>
                <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Reorder</button>
              </div>
            </div>

            <!-- Produk 3 -->
            <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
              <img src="/images/biola.jpeg" alt="Violin" class="w-full h-32 object-cover mb-3 rounded-md">
              <h3 class="font-bold text-sm text-[#5c4633] mb-1">YAMAHA Violin (YVN00344)</h3>
              <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 300.000 / Day</p>
              <p class="text-[11px] text-gray-500 italic mt-1">Sewa tanggal: 26–27 Apr 2025</p>
              <div class="flex items-center justify-center gap-3 mt-3">
                <span class="px-2 py-1 text-[11px] rounded-full bg-green-100 text-green-700 font-medium">Selesai</span>
                <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Reorder</button>
              </div>
            </div>

            <!-- Produk 4 -->
            <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
              <img src="/images/drum.jpg" alt="Drum Set" class="w-full h-32 object-cover mb-3 rounded-md">
              <h3 class="font-bold text-sm text-[#5c4633] mb-1">PEARL DRUM SET EXX-725</h3>
              <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 500.000 / Day</p>
              <p class="text-[11px] text-gray-500 italic mt-1">Sewa tanggal: 24–25 Apr 2025</p>
              <div class="flex items-center justify-center gap-3 mt-3">
                <span class="px-2 py-1 text-[11px] rounded-full bg-green-100 text-green-700 font-medium">Selesai</span>
                <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Reorder</button>
              </div>
            </div>

            <!-- Produk 5 -->
            <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
              <img src="/images/paiolin.jpg" alt="Violin" class="w-full h-32 object-cover mb-3 rounded-md">
              <h3 class="font-bold text-sm text-[#5c4633] mb-1">YAMAHA violin v3ska</h3>
              <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 400.000 / Day</p>
              <p class="text-[11px] text-gray-500 italic mt-1">Sewa tanggal: 22–23 Apr 2025</p>
              <div class="flex items-center justify-center gap-3 mt-3">
                <span class="px-2 py-1 text-[11px] rounded-full bg-green-100 text-green-700 font-medium">Selesai</span>
                <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Reorder</button>
              </div>
            </div>

            <!-- Produk 6 -->
            <div class="bg-[#f5ede4] rounded-2xl border border-[#e0d5cb] shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 scale-105 p-4 flex flex-col items-center text-center">
              <img src="/images/triangle.jpg" alt="Triangle" class="w-full h-32 object-cover mb-3 rounded-md">
              <h3 class="font-bold text-sm text-[#5c4633] mb-1">YAMAHA Triangle</h3>
              <p class="text-xs text-[#6b5e53] font-semibold mb-2">IDR 200.000 / 2 Days</p>
              <p class="text-[11px] text-gray-500 italic mt-1">Sewa tanggal: 28–30 Apr 2025</p>
              <div class="flex items-center justify-center gap-3 mt-3">
                <span class="px-2 py-1 text-[11px] rounded-full bg-green-100 text-green-700 font-medium">Selesai</span>
                <button class="px-4 py-1 text-xs font-semibold bg-gradient-to-r from-[#8c735a] to-[#5c4633] text-white rounded-full shadow hover:shadow-md hover:brightness-110 transition">Reorder</button>
              </div>
            </div>
          </div>
        </main>

        <!-- My Favorites Button -->
        <div class="pt-6">
          <button class="border border-black rounded-lg bg-transparent text-[#5a534d] font-semibold px-4 py-2 text-sm flex items-center space-x-2 hover:bg-[#f3e6d3] hover:text-black">
            <i class="far fa-star text-sm"></i><span>My Favorite</span>
          </button>
        </div>

      </div>
    </div>
  </div>

</body>
</html>
