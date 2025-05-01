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
      <span class="font-bold text-black text-2xl">Nama Pengguna</span>
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
      <div class="font-bold text-lg border-b-2 border-[#c9bca7] pb-2" id="orders-header">
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
        <div class="font-bold text-lg border-b-2 border-[#c9bca7] pb-2" id="activities-header">
          My Activities
        </div>

        <!-- Product Cards inside Activities Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-8">
          <!-- Product Card 1 -->
          <div class="relative bg-white rounded-3xl overflow-hidden shadow-lg transform group hover:shadow-2xl transition-all duration-300 hover:scale-[1.02]">
            <div class="relative">
              <img src="{{ asset('images/sxophone.jpeg') }}" alt="Sonic grey Fender" class="w-full h-52 object-cover transition-transform duration-500 ease-in-out group-hover:scale-105">
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold text-[#5a4a3b] mb-1">Yamaha Saxophone</h3>
              <button class="mt-4 inline-block px-5 py-2 border border-[#b49875] text-[#b49875] font-medium rounded-full hover:bg-[#b49875] hover:text-white transition-all duration-300">Check Details</button>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="relative bg-white rounded-3xl overflow-hidden shadow-lg transform group hover:shadow-2xl transition-all duration-300 hover:scale-[1.02]">
            <div class="relative">
              <img src="{{ asset('images/gitarblack.jpeg') }}" alt="Fender Precision Bass" class="w-full h-52 object-cover transition-transform duration-500 ease-in-out group-hover:scale-105">
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold text-[#5a4a3b] mb-1">Fender Precision Bass</h3>
              <button class="mt-4 inline-block px-5 py-2 border border-[#b49875] text-[#b49875] font-medium rounded-full hover:bg-[#b49875] hover:text-white transition-all duration-300">Check Availability</button>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="relative bg-white rounded-3xl overflow-hidden shadow-lg transform group hover:shadow-2xl transition-all duration-300 hover:scale-[1.02]">
            <div class="relative">
              <img src="{{ asset('images/violin1.jpg') }}" alt="Classic Acoustic Violin" class="w-full h-52 object-cover transition-transform duration-500 ease-in-out group-hover:scale-105">
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold text-[#5a4a3b] mb-1">Classic Acoustic Violin</h3>
              <div class="mt-2">
              <button class="mt-4 inline-block px-5 py-2 border border-[#b49875] text-[#b49875] font-medium rounded-full hover:bg-[#b49875] hover:text-white transition-all duration-300">Check Availability</button>
            </div>
          </div>
        </div>

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
