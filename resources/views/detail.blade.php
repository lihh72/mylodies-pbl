<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sonic Grey Fender - Product Detail</title>
  @vite('resources/js/app.js')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <style>
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background: radial-gradient(circle at top left, #f9e5c9 0%, transparent 60%), radial-gradient(circle at bottom right, #f9e5c9 0%, transparent 60%);
      z-index: -1;
    }
  </style>
</head>
<body class="bg-[#fdfaf5] text-gray-800 font-sans">

  <!-- Navbar -->
  <nav class="flex items-center justify-between px-8 py-5 bg-[#a38f7a]/90 backdrop-blur shadow-lg sticky top-0 z-50">
    <div class="flex items-center gap-6">
      <img src="https://storage.googleapis.com/a1aa/image/5665a903-c073-44a6-c5f1-68c977566a33.jpg" alt="Logo" class="h-10 w-10 rounded-full shadow">
      <a href="#" class="text-black font-semibold hover:underline">Home</a>
      <a href="#" class="text-black font-semibold hover:underline">About</a>
      <a href="#" class="text-black font-semibold hover:underline">Contact</a>
    </div>
    <div class="flex items-center gap-5 text-black text-xl">
      <i class="far fa-bell hover:text-white cursor-pointer"></i>
      <i class="fas fa-shopping-cart hover:text-white cursor-pointer"></i>
      <i class="far fa-user-circle hover:text-white cursor-pointer"></i>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="relative bg-[#fdfaf5] py-20 overflow-hidden">
    <div class="absolute -top-10 -left-10 w-72 h-72 bg-[#f9e5c9] rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-pulse"></div>
    <div class="absolute -bottom-16 right-0 w-96 h-96 bg-[#d2bfa4] rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>

    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-start px-6 md:px-12 relative z-10">

     <!-- Gallery -->
<div class="space-y-6">
  <div class="relative group overflow-hidden rounded-3xl shadow-xl transition-transform duration-500 transform hover:scale-[1.02]">
    <img id="mainImage" src="https://storage.googleapis.com/a1aa/image/22f99f54-be24-403e-28cf-b80d31ba8e34.jpg" alt="Fender Hero" class="object-cover w-full h-[420px] transition duration-300" />
    <span class="absolute top-5 left-5 bg-white/80 px-3 py-1 rounded-full text-sm font-medium text-[#3e2d1f] shadow-sm">
      ⭐ 4.8 / 5.0
    </span>
    <span class="absolute bottom-5 right-5 bg-gradient-to-r from-[#a38f7a] to-[#816c59] text-white px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wide animate-pulse">
      ⚡ Limited Edition
    </span>
  </div>
  <div class="flex gap-3">
    <img onclick="document.getElementById('mainImage').src=this.src" src="https://storage.googleapis.com/a1aa/image/22f99f54-be24-403e-28cf-b80d31ba8e34.jpg" class="w-20 h-20 object-cover rounded-xl shadow-md cursor-pointer hover:scale-110 transition" />
    <img onclick="document.getElementById('mainImage').src=this.src" src="https://guitarvillage.co.uk/wp-content/uploads/2023/04/Fender_AmProHSS_Strat_SonicGrey_411_01-scaled.jpg" class="w-20 h-20 object-cover rounded-xl shadow-md cursor-pointer hover:scale-110 transition" />
    <img onclick="document.getElementById('mainImage').src=this.src" src="https://guitarvillage.co.uk/wp-content/uploads/2023/04/Fender_AmProHSS_Strat_SonicGrey_411_05-scaled.jpg" class="w-20 h-20 object-cover rounded-xl shadow-md cursor-pointer hover:scale-110 transition" />
  </div>
</div>


      <!-- Rental Form -->
      <div class="bg-white/90 backdrop-blur-xl p-10 rounded-3xl shadow-2xl space-y-6 relative animate-fadeIn">
        <h2 class="text-4xl font-extrabold text-[#3e2d1f]">Sonic Grey Fender</h2>
        <p class="text-lg text-[#7a6650] font-semibold">IDR 100.000 <span class="text-sm text-gray-500">/ day</span></p>
        <p class="text-sm text-gray-600">Crafted for pros, trusted by legends. Clean tone, smooth feel — rent it for your moment on stage or in studio.</p>

        <form id="rentalForm" class="space-y-4 text-sm">
          <div class="relative">
            <i class="far fa-calendar-alt absolute left-3 top-3.5 text-[#a38f7a]"></i>
            <input type="date" id="rent_date" name="rent_date" class="pl-10 w-full rounded-lg border border-gray-300 py-3 focus:ring-[#a38f7a] focus:border-[#a38f7a]" required>
          </div>
          <div class="relative">
            <i class="far fa-calendar-check absolute left-3 top-3.5 text-[#a38f7a]"></i>
            <input type="date" id="return_date" name="return_date" class="pl-10 w-full rounded-lg border border-gray-300 py-3 focus:ring-[#a38f7a] focus:border-[#a38f7a]" required>
          </div>
          <div class="relative">
            <i class="fas fa-truck absolute left-3 top-3.5 text-[#a38f7a]"></i>
            <select id="pickup_method" name="pickup_method" class="pl-10 w-full rounded-lg border border-gray-300 py-3 text-gray-700 focus:ring-[#a38f7a] focus:border-[#a38f7a]" required>
              <option disabled selected value="">Choose Pickup Method</option>
              <option value="pickup">Pickup</option>
              <option value="delivery">Delivery</option>
            </select>
          </div>

          <div class="text-sm bg-[#f9e5c9]/50 text-[#3e2d1f] px-4 py-2 rounded-lg flex justify-between items-center font-semibold shadow-inner">
            Total Estimate:
            <span id="priceEstimation">—</span>
          </div>

          <button type="submit"
            class="w-full bg-[#a38f7a] hover:bg-[#8c7a65] text-white font-semibold py-3 rounded-full shadow-md transition-transform hover:-translate-y-1 flex justify-center gap-2">
            <i class="fas fa-paper-plane"></i> Rent Now
          </button>
        </form>

        <div class="absolute -top-6 right-6 bg-[#3e2d1f] text-white text-xs px-4 py-1 rounded-full uppercase tracking-widest font-bold shadow-lg animate-pulse">
          Book Today → Only 3 Left!
        </div>
      </div>
    </div>
    
  </section>

  <!-- Price Estimator Script -->
  <script>
    const rentInput = document.getElementById('rent_date');
    const returnInput = document.getElementById('return_date');
    const priceDisplay = document.getElementById('priceEstimation');

    function calculatePrice() {
      const rentDate = new Date(rentInput.value);
      const returnDate = new Date(returnInput.value);
      const diffTime = returnDate - rentDate;
      const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
      if (diffDays > 0) {
        const price = diffDays * 100000;
        priceDisplay.textContent = `IDR ${price.toLocaleString()}`;
      } else {
        priceDisplay.textContent = "—";
      }
    }

    rentInput.addEventListener('change', calculatePrice);
    returnInput.addEventListener('change', calculatePrice);
  </script>
<!-- Stylish Product Description with SVGs -->
<section class="relative max-w-6xl mx-auto px-6 py-20">
  <!-- Decorative Background SVGs -->
  <svg class="absolute top-0 left-0 w-40 h-40 text-[#f9e5c9] opacity-30 animate-spin-slow" fill="currentColor" viewBox="0 0 24 24">
    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none" />
  </svg>

  <div class="bg-white/80 backdrop-blur-xl p-10 rounded-3xl shadow-xl relative z-10">
    <h2 class="text-3xl font-extrabold text-[#3e2d1f] mb-6 flex items-center gap-2">
      <svg class="w-7 h-7 text-[#a38f7a]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6h13M9 6L2 12l7 6" />
      </svg>
      About This Gear
    </h2>

    <p class="text-sm md:text-base text-gray-700 leading-relaxed mb-6">
      Meet the <strong>Fender American Professional II Stratocaster HSS</strong> in sleek Sonic Grey — a guitar designed for stage, studio, and standout moments. With a bold yet refined aesthetic, this Strat delivers crisp highs, defined mids, and a growling humbucker bite, all wrapped in an American classic form.
    </p>

    <div class="grid md:grid-cols-2 gap-8 text-sm md:text-base text-gray-600">
      <div>
        <h3 class="font-bold text-[#3e2d1f] mb-3 flex items-center gap-2">
          <svg class="w-5 h-5 text-[#a38f7a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M12 4v16m8-8H4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Highlights
        </h3>
        <ul class="list-disc list-inside space-y-1">
          <li>Deep “C” maple neck for enhanced comfort</li>
          <li>V-Mod II single coils + Double Tap™ Humbucker</li>
          <li>Modern 2-point tremolo with smooth action</li>
          <li>Premium Alder body & satin finish</li>
          <li>Professional-grade build & resonance</li>
        </ul>
      </div>
      <div>
        <h3 class="font-bold text-[#3e2d1f] mb-3 flex items-center gap-2">
          <svg class="w-5 h-5 text-[#a38f7a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M3 7h18M3 12h18M3 17h18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          What's Included
        </h3>
        <ul class="list-disc list-inside space-y-1">
          <li>Fender Hard Case</li>
          <li>Premium Guitar Strap</li>
          <li>High-quality Instrument Cable</li>
          <li>Guitar Picks (x3)</li>
        </ul>
      </div>
    </div>

    <!-- Stylish Badge -->
    <div class="absolute -top-5 right-5 bg-gradient-to-r from-[#a38f7a] to-[#816c59] text-white text-xs px-4 py-1 rounded-full font-semibold shadow-md animate-pulse">
      <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path d="M5 13l4 4L19 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      Limited Sonic Grey Drop
    </div>
  </div>
</section>

  <!-- Testimonials -->
  <section class="max-w-7xl mx-auto py-20 text-center space-y-10">
    <h2 class="text-3xl font-bold text-[#3e2d1f]">What Our Customers Say</h2>
    <div class="grid md:grid-cols-3 gap-10">
      <div class="bg-white/80 backdrop-blur rounded-2xl shadow-xl p-6 hover:-translate-y-1 hover:shadow-2xl transition">
        <p class="italic text-sm">"Amazing guitar quality. Sounded incredible at my live show!"</p>
        <div class="mt-4 flex justify-center gap-1 text-[#a38f7a] text-sm">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
        </div>
        <p class="mt-2 text-xs text-gray-500">— Alex, Musician</p>
      </div>
      <div class="bg-white/80 backdrop-blur rounded-2xl shadow-xl p-6 hover:-translate-y-1 hover:shadow-2xl transition">
        <p class="italic text-sm">"Smooth rental process, fast delivery, great support."</p>
        <div class="mt-4 flex justify-center gap-1 text-[#a38f7a] text-sm">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        </div>
        <p class="mt-2 text-xs text-gray-500">— Jamie, Producer</p>
      </div>
      <div class="bg-white/80 backdrop-blur rounded-2xl shadow-xl p-6 hover:-translate-y-1 hover:shadow-2xl transition">
        <p class="italic text-sm">"Looks brand new. Loved the whole experience!"</p>
        <div class="mt-4 flex justify-center gap-1 text-[#a38f7a] text-sm">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        </div>
        <p class="mt-2 text-xs text-gray-500">— Mia, Performer</p>
      </div>
    </div>
  </section>

</body>
</html>
