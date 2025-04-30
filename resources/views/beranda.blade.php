<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyLodies - Rent Your Sound</title>
    @vite('resources/js/app.js')
</head>

<body class="font-sans text-gray-800 bg-white">

    <!-- Navbar -->
<header class="fixed top-0 w-full z-50 bg-gradient-to-r from-[#b49875] to-[#9c7b59] shadow-lg backdrop-blur-lg">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <!-- Logo & Brand -->
      <div class="flex items-center space-x-3">
          <img src="{{ asset('images/logo.png') }}" alt="MyLodies Logo" class="h-10 drop-shadow-md hover:scale-105 transition-transform duration-300 ease-in-out">
          <span class="text-xl font-extrabold text-white tracking-wide">MyLodies</span>
      </div>

      <!-- Navigation Links -->
      <nav class="hidden md:flex items-center space-x-6">
          @foreach (['Home', 'About', 'Rentals', 'FAQ', 'Contact'] as $menu)
              <a href="#{{ strtolower($menu) }}" 
                 class="relative text-white font-medium transition-all duration-300 ease-in-out hover:text-black hover:underline underline-offset-8">
                 {{ $menu }}
              </a>
          @endforeach
      </nav>

      <!-- Auth Buttons -->
      <div class="flex items-center gap-2">
          @auth
              <a href="#" class="text-sm font-semibold px-4 py-2 border border-white text-white rounded-full hover:bg-white hover:text-[#b49875] transition">Logout →</a>
          @else
              <a href="#" class="text-sm font-semibold px-4 py-2 border border-white text-white rounded-full hover:bg-white hover:text-[#b49875] transition">Login →</a>
          @endauth
      </div>
  </div>
</header>

<!-- Hero Section -->
<section class="relative h-[100vh] bg-cover bg-center flex items-center justify-center text-center overflow-hidden" style="background-image: url('{{ asset('images/bg.jpg') }}');">
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

  <!-- Animated Noise Background Effect -->
  <div class="absolute inset-0 bg-[url('/images/noise.png')] opacity-10 mix-blend-soft-light"></div>

  <!-- Hero Content -->
  <div class="relative z-10 max-w-4xl px-6 animate-fade-in-up">
      <h1 class="text-white text-5xl sm:text-6xl lg:text-7xl font-black leading-tight drop-shadow-lg">
          <span class="bg-gradient-to-r from-[#e0cbb3] via-[#d2ab7c] to-[#b49875] bg-clip-text text-transparent">Your Stage</span>,<br class="hidden sm:inline" />
          Your Sound.
      </h1>
      <h2 class="text-[#f5e4cf] text-2xl sm:text-3xl mt-4 font-medium tracking-wide drop-shadow-md">We provide the tools. You perform the magic.</h2>

      <a href="#rentals"
         class="inline-flex items-center justify-center mt-10 px-8 py-3 bg-[#b49875] text-white text-lg font-semibold rounded-full shadow-lg hover:bg-[#9a7b56] transition duration-300 ease-in-out hover:scale-105">
         Start Renting →
      </a>
  </div>

  <!-- Decorative Element -->
  <div class="absolute bottom-0 w-full h-40 bg-gradient-to-t from-white via-white/10 to-transparent"></div>
</section>



    <!-- About Section - Bright Brand Story -->
<section id="about" class="relative py-32 bg-white text-gray-800 overflow-hidden">

  <!-- Decorative top waveform -->
  <div class="absolute top-0 left-0 w-full h-16 bg-[url('/images/wave-top-light.svg')] bg-repeat-x bg-top z-10 opacity-10"></div>

  <!-- Content Container -->
  <div class="relative z-20 max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center gap-16">
    
    <!-- Left: Image Collage -->
    <div class="flex-1 grid grid-cols-2 gap-4">
        <img src="{{ asset('images/instrument.jpg') }}" class="rounded-2xl shadow-md hover:scale-105 transition-all duration-300" alt="Instrument">
        <img src="{{ asset('images/studio.jpg') }}" class="rounded-2xl shadow-md hover:scale-105 transition-all duration-300" alt="Studio">
        <img src="{{ asset('images/microphone.jpg') }}" class="rounded-2xl shadow-md hover:scale-105 transition-all duration-300 col-span-2" alt="Microphone">
    </div>

    <!-- Right: Story Text -->
    <div class="flex-1 space-y-6">
        <h2 class="text-4xl md:text-5xl font-black leading-tight text-[#5a4a3b]">
            We’re Not Just Rental,<br><span class="text-[#b49875]">We’re Stage Ready.</span>
        </h2>
        <p class="text-lg leading-relaxed text-gray-700">
            MyLodies is more than a platform — it's a creative ally. We empower 
            <strong>indie artists</strong>, <strong>festival organizers</strong>, and <strong>studio professionals</strong> 
            with trusted tools, fast access, and peace of mind.
        </p>

        <!-- Key Points -->
        <div class="grid grid-cols-2 gap-4 mt-6 text-sm text-gray-600">
            <div class="flex items-center space-x-3">
                <span class="inline-block w-3 h-3 bg-[#b49875] rounded-full"></span>
                <span>Next-day delivery</span>
            </div>
            <div class="flex items-center space-x-3">
                <span class="inline-block w-3 h-3 bg-[#b49875] rounded-full"></span>
                <span>Studio-tested quality</span>
            </div>
            <div class="flex items-center space-x-3">
                <span class="inline-block w-3 h-3 bg-[#b49875] rounded-full"></span>
                <span>Flexible return</span>
            </div>
            <div class="flex items-center space-x-3">
                <span class="inline-block w-3 h-3 bg-[#b49875] rounded-full"></span>
                <span>24/7 tech support</span>
            </div>
        </div>

        <!-- CTA -->
        <a href="#rentals" class="inline-block mt-8 bg-[#b49875] text-white px-6 py-3 rounded-full font-semibold hover:bg-[#9a7b56] transition">
            Browse Instruments →
        </a>
    </div>
  </div>
</section>



   <!-- Featured Rentals Section - With Hover Descriptions -->
   <section id="rentals" class="bg-gradient-to-b from-[#fef8f2] to-[#f9f3ea] py-24 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <img src="{{ asset('images/texture-noise.png') }}" class="w-full h-full object-cover opacity-5" alt="Texture">
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-[#5a4a3b]">Our Most Wanted Gears</h2>
            <p class="mt-4 text-lg text-[#7a6a59]">Crafted by legends. Tuned for your stage.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach([
                ['img' => 'piano1.jpg', 'name' => 'Yamaha Grand Piano', 'price' => 'IDR 400.000 / Day', 'desc' => 'A premium grand piano with rich tonal quality, ideal for concerts and recordings.'],
                ['img' => 'gitar1.jpg', 'name' => 'Fender Precision Bass', 'price' => 'IDR 290.000 / Day', 'desc' => 'Legendary bass tone for rock, jazz, and funk performances.'],
                ['img' => 'violin1.jpg', 'name' => 'Classic Acoustic Violin', 'price' => 'IDR 400.000 / Day', 'desc' => 'Handcrafted violin with warm, mellow sound. Perfect for orchestras.'],
                ['img' => 'saxophone.jpg', 'name' => 'Saxophone', 'price' => 'IDR 350.000 / Day', 'desc' => 'Smooth and expressive tone, great for jazz sessions and solos.'],
                ['img' => 'drum.jpg', 'name' => 'Drum Set', 'price' => 'IDR 380.000 / Day', 'desc' => 'Full professional drum set with crisp snare and booming bass.'],
                ['img' => 'accordion.jpg', 'name' => 'Accordion', 'price' => 'IDR 330.000 / Day', 'desc' => 'Versatile and traditional, adds color to classical or folk music.'],
            ] as $item)
            <div class="relative bg-white rounded-3xl overflow-hidden shadow-lg transform group hover:shadow-2xl transition-all duration-300 hover:scale-[1.02]">
                <div class="relative">
                    <img src="{{ asset('images/' . $item['img']) }}" alt="{{ $item['name'] }}" class="w-full h-52 object-cover transition-transform duration-500 ease-in-out group-hover:scale-105">
                    <div class="absolute top-4 right-4 bg-[#b49875] text-white px-3 py-1 text-xs rounded-full shadow">Top Pick</div>
                </div>

                <div class="p-6">
                    <h3 class="text-xl font-bold text-[#5a4a3b] mb-1">{{ $item['name'] }}</h3>
                    <p class="text-[#7a6a59] text-sm">{{ $item['price'] }}</p>

                    <!-- Animated Description -->
                    <p class="mt-3 text-sm text-gray-600 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                        {{ $item['desc'] }}
                    </p>

                    <button class="mt-4 inline-block px-5 py-2 border border-[#b49875] text-[#b49875] font-medium rounded-full hover:bg-[#b49875] hover:text-white transition-all duration-300">Check Availability</button>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-16">
            <a href="#all-instruments" class="inline-block bg-[#b49875] text-white px-10 py-4 rounded-full text-lg font-semibold hover:bg-[#9a7b56] transition">Explore Full Catalog →</a>
        </div>
    </div>
</section>



    <!-- Testimonials -->
    <section class="bg-white py-20">
        <div class="max-w-5xl mx-auto text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">What Our Customers Say</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-10 px-6 max-w-6xl mx-auto">
            @foreach([
                ['name' => 'Sarah K.', 'text' => 'The grand piano rental made my recital unforgettable. Amazing service!'],
                ['name' => 'Dimas R.', 'text' => 'Fast delivery and high-quality instruments. I’ll definitely rent again!'],
                ['name' => 'Anita L.', 'text' => 'As a violinist, I found everything I needed, hassle-free. Highly recommended.'],
            ] as $review)
            <div class="bg-[#f9f3ea] p-6 rounded-xl shadow-md">
                <p class="italic text-gray-700 mb-4">“{{ $review['text'] }}”</p>
                <h4 class="font-semibold text-[#b49875]">— {{ $review['name'] }}</h4>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Newsletter -->
    <section class="bg-[#b49875] text-white py-16 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Stay in Tune</h2>
            <p class="mb-6">Subscribe for updates, discounts, and new arrivals.</p>
            <form class="flex flex-col md:flex-row items-center gap-4 justify-center">
                <input type="email" placeholder="Your Email" class="px-4 py-3 w-full md:w-auto rounded-full text-gray-900 focus:outline-none">
                <button type="submit" class="bg-white text-[#b49875] font-semibold px-6 py-3 rounded-full hover:bg-gray-200 transition">Subscribe</button>
            </form>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">Frequently Asked Questions</h2>
            <div class="space-y-8">
                <div>
                    <h4 class="font-bold text-gray-900">How does the rental process work?</h4>
                    <p class="text-gray-700 mt-2">Choose your instrument, pick a date, and we’ll handle the delivery and pickup. Simple as that.</p>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900">Is a deposit required?</h4>
                    <p class="text-gray-700 mt-2">Yes, we require a refundable deposit based on the instrument value.</p>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900">Can I cancel my reservation?</h4>
                    <p class="text-gray-700 mt-2">Cancellations are free up to 24 hours before the scheduled date.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners -->
    <section class="bg-[#f9f3ea] py-16">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-6 text-gray-900">Trusted by</h2>
            <div class="flex flex-wrap justify-center items-center gap-8">
                <img src="{{ asset('images/partner1.png') }}" class="h-12" alt="Partner 1">
                <img src="{{ asset('images/partner2.png') }}" class="h-12" alt="Partner 2">
                <img src="{{ asset('images/partner3.png') }}" class="h-12" alt="Partner 3">
            </div>
        </div>
    </section>

    <!-- Contact + Map section already included above -->

    <!-- Footer -->
    <footer class="bg-[#b49875] text-white py-12">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-4 gap-10">
            <div>
                <h3 class="font-bold mb-4">MyLodies</h3>
                <p>Your reliable partner in sound & performance.</p>
            </div>
            <div>
                <h4 class="font-semibold mb-3">Explore</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:underline">Home</a></li>
                    <li><a href="#" class="hover:underline">About</a></li>
                    <li><a href="#" class="hover:underline">Rentals</a></li>
                    <li><a href="#" class="hover:underline">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-3">Help</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:underline">FAQ</a></li>
                    <li><a href="#" class="hover:underline">Terms & Conditions</a></li>
                    <li><a href="#" class="hover:underline">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-3">Contact</h4>
                <p>Email: mylodies@gmail.com</p>
                <p>Phone: 0822 3001 9821</p>
                <p>Location: Batam, Kepulauan Riau</p>
            </div>
        </div>
        <div class="text-center mt-12 text-sm">
            &copy; 2025 MyLodies. All rights reserved.
        </div>
    </footer>

</body>
</html>
