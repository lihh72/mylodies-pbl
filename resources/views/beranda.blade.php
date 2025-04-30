<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyLodies - Rent Your Sound</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite('resources/js/app.js')
</head>

<body class="font-sans text-gray-800 bg-white">

<!-- Navbar -->
<header x-data="{ open: false }" class="fixed top-0 w-full z-50 bg-gradient-to-r from-[#b49875]/90 to-[#9c7b59]/90 shadow-lg backdrop-blur-md transition-transform duration-700 ease-in-out animate-fade-in-down">
  <div class="max-w-screen-xl mx-auto px-4 sm:px-6 py-4 flex justify-between items-center relative">

    <!-- Logo -->
    <div class="flex items-center space-x-3 shrink-0">
      <img src="{{ asset('images/logo.png') }}" alt="MyLodies Logo" class="h-9 drop-shadow-lg hover:scale-110 transition duration-300">
      <span class="text-xl font-bold text-white tracking-wide hover:text-[#f9e5c9] transition">MyLodies</span>
    </div>

    <!-- Search & Hamburger (Mobile Only) -->
    <div class="flex items-center gap-2 lg:hidden ml-auto">
      <!-- Search Bar (Mobile) -->
      <div x-data="{ focus: false, query: '' }" class="relative transition-all duration-300">
        <input type="text" placeholder="Search..."
               x-model="query"
               @focus="focus = true"
               @blur="focus = query !== ''"
               :class="(focus || query !== '') ? 'w-[180px]' : 'w-[130px] hover:w-[160px]'"
               class="bg-white/20 backdrop-blur-sm text-white placeholder-white/70 rounded-full pl-8 pr-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#f9e5c9] focus:bg-white/30 transition-all duration-300">
        <svg class="w-4 h-4 absolute left-2 top-1/2 transform -translate-y-1/2 text-white/80" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1116.65 2.5a7.5 7.5 0 010 14.15z"/>
        </svg>
      </div>

      <!-- Hamburger -->
      <button @click="open = !open" class="text-white focus:outline-none">
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
        </svg>
        <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Center Navigation (Desktop Only) -->
    <nav class="hidden lg:flex items-center space-x-6 absolute left-1/2 transform -translate-x-1/2">
      @foreach (['Home', 'About', 'Rentals', 'FAQ', 'Contact'] as $menu)
        <a href="#{{ strtolower($menu) }}"
           class="group relative inline-flex items-center gap-1 text-white font-medium transition-all duration-300 ease-in-out hover:text-black">
          <svg class="w-4 h-4 text-white group-hover:text-[#f9e5c9] transition-transform group-hover:rotate-12 duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v3m6.364 1.636l-2.121 2.121M21 12h-3m-1.636 6.364l-2.121-2.121M12 21v-3m-6.364-1.636l2.121-2.121M3 12h3m1.636-6.364l2.121 2.121" />
          </svg>
          {{ $menu }}
          <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
        </a>
      @endforeach
    </nav>

    <!-- Right Section (Desktop Only) -->
    <div class="hidden lg:flex items-center gap-3">
      <!-- Desktop Search -->
      <div x-data="{ focus: false, query: '' }" class="relative text-white">
        <input type="text" placeholder="Search..." 
               x-model="query"
               @focus="focus = true" 
               @blur="focus = query !== ''"
               class="bg-white/20 backdrop-blur-sm text-white placeholder-white/70 rounded-full pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#f9e5c9] focus:bg-white/30 transition-all duration-300"
               :class="(focus || query !== '') ? 'w-60' : 'w-40 hover:w-60'">
        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-white/80" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1116.65 2.5a7.5 7.5 0 010 14.15z"/>
        </svg>
      </div>

      <!-- Auth Links -->
      @auth
        <a href="#" class="px-5 py-2 text-sm font-semibold border border-white text-white rounded-full hover:bg-white hover:text-[#b49875] transition-all duration-300 shadow-md hover:shadow-lg">
          Logout →
        </a>
      @else
        <a href="{{ route('login') }}" class="px-5 py-2 text-sm font-semibold border border-white text-white rounded-full hover:bg-white hover:text-[#b49875] transition-all duration-300 shadow-md hover:shadow-lg">
          Login →
        </a>
      @endauth
    </div>
  </div>

  <!-- Mobile Menu -->
  <div x-show="open"
       x-transition:enter="transition ease-out duration-300"
       x-transition:enter-start="opacity-0 scale-95"
       x-transition:enter-end="opacity-100 scale-100"
       x-transition:leave="transition ease-in duration-200"
       x-transition:leave-start="opacity-100 scale-100"
       x-transition:leave-end="opacity-0 scale-95"
       class="lg:hidden bg-[#b49875]/95 backdrop-blur-lg px-6 pt-4 pb-6 space-y-4">

    <!-- Mobile Links -->
    @foreach (['Home', 'About', 'Rentals', 'FAQ', 'Contact'] as $menu)
      <a href="#{{ strtolower($menu) }}" @click="open = false"
         class="block text-white text-base font-medium hover:text-black transition duration-300 ease-in-out">
        {{ $menu }}
      </a>
    @endforeach

    <!-- Mobile Auth -->
    <div class="pt-2">
      @auth
        <a href="#"
           class="block text-white mt-4 px-4 py-2 border border-white rounded-full text-center hover:bg-white hover:text-[#b49875] transition">
          Logout
        </a>
      @else
        <a href="{{ route('login') }}"
           class="block text-white mt-4 px-4 py-2 border border-white rounded-full text-center hover:bg-white hover:text-[#b49875] transition">
          Login
        </a>
      @endauth
    </div>
  </div>
</header>

<section id="home" class="relative h-screen bg-cover bg-center flex items-center justify-center text-center overflow-hidden" style="background-image: url('{{ asset('images/bg.jpg') }}');">
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/60 backdrop-blur-sm z-0"></div>

  <!-- Noise & Particles -->
  <div class="absolute inset-0 bg-[url('/images/texture-noise.png')] opacity-10 mix-blend-soft-light z-0"></div>
  <div id="particles-js" class="absolute inset-0 z-0 pointer-events-none"></div>

  <!-- Light Glow -->
  <div class="absolute w-[120vw] h-[120vw] bg-[#b49875]/20 rounded-full blur-3xl top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-0"></div>

  <!-- Hero Content -->
  <div class="relative z-10 px-6 max-w-4xl animate-fade-in-up">
    <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-[#ffdfbf] via-[#d2ab7c] to-[#b49875] animate-text-gradient drop-shadow-lg min-h-[5.5rem] sm:min-h-[6.5rem] lg:min-h-[8rem] flex items-center justify-center">
      <span>Your</span>
      <span id="typewriter" class="inline-block whitespace-nowrap transition-all duration-300"></span>
    </h1>
    
    <h2 class="mt-4 text-xl sm:text-2xl text-[#f5e4cf] tracking-wide animate-slide-in-fade">
      Instruments that Perform. Experiences that Resonate.
    </h2>

    <a href="#rentals" class="inline-flex mt-10 px-8 py-3 bg-[#b49875] text-white text-lg font-semibold rounded-full shadow-xl hover:bg-[#9a7b56] transition duration-300 ease-in-out hover:scale-110 animate-pulse-glow">
      Explore Rentals →
    </a>
  </div>

  <!-- Equalizer Bars -->
  <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 flex gap-1 z-10">
    <div class="w-1 h-8 bg-[#b49875] animate-eq delay-[0ms]"></div>
    <div class="w-1 h-6 bg-[#b49875] animate-eq delay-[150ms]"></div>
    <div class="w-1 h-10 bg-[#b49875] animate-eq delay-[300ms]"></div>
    <div class="w-1 h-7 bg-[#b49875] animate-eq delay-[450ms]"></div>
    <div class="w-1 h-9 bg-[#b49875] animate-eq delay-[600ms]"></div>
  </div>
</section>

<!-- Scripts and Styles -->
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
  // ParticlesJS background
  particlesJS("particles-js", {
    particles: {
      number: { value: 60 },
      color: { value: "#ffffff" },
      shape: { type: "circle" },
      opacity: { value: 0.15 },
      size: { value: 3 },
      move: { enable: true, speed: 0.6 }
    },
    interactivity: { events: { onhover: { enable: false } } },
    retina_detect: true
  });

  // Typewriter effect
  const text = ["Stage,", "Sound.", "Moment."];
  let i = 0, j = 0, current = "", isDeleting = false;
  const speed = 100;
  function type() {
    current = text[i];
    let display = isDeleting ? current.substring(0, j--) : current.substring(0, j++);
    document.getElementById("typewriter").innerHTML = "&nbsp;" + display;
    if (!isDeleting && j === current.length + 1) {
      isDeleting = true; setTimeout(type, 1000);
    } else if (isDeleting && j === 0) {
      isDeleting = false; i = (i + 1) % text.length; setTimeout(type, 400);
    } else {
      setTimeout(type, speed);
    }
  }
  window.addEventListener("load", type);
</script>

<style>
  @keyframes text-gradient {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
  }
  .animate-text-gradient {
    background-size: 200% 200%;
    animation: text-gradient 5s ease-in-out infinite;
  }

  @keyframes fade-in-up {
    from { transform: translateY(30px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
  }
  .animate-fade-in-up {
    animation: fade-in-up 1.2s ease-out forwards;
  }

  @keyframes slide-in-fade {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
  }
  .animate-slide-in-fade {
    animation: slide-in-fade 1.5s ease-out forwards;
  }

  .animate-pulse-glow {
    animation: pulse-glow 2.5s infinite ease-in-out;
  }
  @keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 0px #b49875; }
    50% { box-shadow: 0 0 20px #b49875aa; }
  }

  @keyframes eq {
    0%, 100% { height: 0.75rem; }
    50% { height: 2rem; }
  }
  .animate-eq {
    animation: eq 1.5s ease-in-out infinite;
  }
</style>
</section>

    <!-- About Section - Bright Brand Story -->
<section id="about" class="relative py-32 bg-white text-gray-800 overflow-hidden">

  <!-- Decorative top waveform -->
  <div class="absolute top-0 left-0 w-full h-16 bg-[url('/images/wave-top-light.svg')] bg-repeat-x bg-top z-10 opacity-10"></div>

  <!-- Content Container -->
  <div class="relative z-20 max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center gap-16">
    
    <!-- Left: Creative Collage -->
<div class="flex-1 relative h-[460px] w-full">
    <!-- Base image - large -->
    <img src="{{ asset('images/instrument.jpg') }}" 
         class="absolute top-0 left-0 w-[60%] h-[60%] object-cover rounded-xl shadow-xl z-10" 
         alt="Instrument">
  
    <!-- Smaller image top right -->
    <img src="{{ asset('images/studio.jpg') }}" 
         class="absolute top-0 right-0 w-[40%] h-[40%] object-cover rounded-lg shadow-md rotate-3 z-20" 
         alt="Studio">
  
    <!-- Wide image bottom center -->
    <img src="{{ asset('images/microphone.jpg') }}" 
         class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[70%] h-[35%] object-cover rounded-xl shadow-md -rotate-2 z-0" 
         alt="Microphone">
  
    <!-- Decorative circle -->
    <div class="absolute -top-6 -left-6 w-12 h-12 bg-[#b49875]/30 rounded-full blur-md"></div>
    <div class="absolute -bottom-6 -right-6 w-16 h-16 bg-[#b49875]/20 rounded-full blur-lg"></div>
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
  <!-- Artistic Wave Transition to Rentals Section -->
<div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] z-0">
  <svg class="relative block w-full h-[80px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
    <path fill="#fef8f2" fill-opacity="1" d="M0,64L40,96C80,128,160,192,240,208C320,224,400,192,480,192C560,192,640,224,720,229.3C800,235,880,213,960,213.3C1040,213,1120,235,1200,224C1280,213,1360,171,1400,149.3L1440,128L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
  </svg>
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
                    <div class="mt-4">
                      <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-[#f6e8d6] to-[#e2cbb3] text-[#5a4a3b] font-semibold text-sm shadow-inner border border-[#d6b896] transition-transform duration-300 group-hover:scale-105">
                         {{ $item['price'] }}
                      </span>
                    </div>
                    
            
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
            <a href="{{ route('katalog') }}" class="inline-block bg-[#b49875] text-white px-10 py-4 rounded-full text-lg font-semibold hover:bg-[#9a7b56] transition">Explore Full Catalog →</a>
        </div>
    </div>
</section>

<section class="bg-[#f9f3ea] py-20 relative overflow-hidden">
  <div class="absolute top-0 left-0 w-full h-full bg-[url('/images/pattern.svg')] opacity-5 bg-repeat pointer-events-none"></div>

  <div class="max-w-7xl mx-auto px-6 relative z-10">
    <h2 class="text-3xl md:text-4xl font-extrabold text-center text-gray-900 mb-10 tracking-tight">
      Trusted by Industry Leaders
    </h2>

    <!-- Running Slider Container -->
    <div class="overflow-hidden relative">
      <div class="flex gap-16 animate-scroll-x items-center min-w-max">
        <!-- Duplikat agar loop terlihat seamless -->
        @for($i = 0; $i < 2; $i++)
        <a href="https://www.yamaha.com/" target="_blank" rel="noopener noreferrer">
          <div class="grayscale hover:grayscale-0 transition-all duration-300 ease-in-out">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Yamaha_logo.svg/330px-Yamaha_logo.svg.png" class="h-14 md:h-16" alt="Yamaha Logo" />
          </div>
        </a>
        <a href="https://intl.fender.com/" target="_blank" rel="noopener noreferrer">
          <div class="grayscale hover:grayscale-0 transition-all duration-300 ease-in-out">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Fender_guitars_logo.svg/295px-Fender_guitars_logo.svg.png" class="h-14 md:h-16" alt="Fender Logo" />
          </div>
        </a>
        <a href="https://www.shure.com/" target="_blank" rel="noopener noreferrer">
          <div class="grayscale hover:grayscale-0 transition-all duration-300 ease-in-out">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Shure_Logo_2024.svg/960px-Shure_Logo_2024.svg.png" class="h-14 md:h-16" alt="Shure Logo" />
          </div>
        </a>
        @endfor
      </div>
    </div>

    <p class="mt-10 text-center text-sm text-gray-600">
      We’re proud to collaborate with innovators across entertainment, tech, and beyond.
    </p>
  </div>

  <!-- Tailwind custom animation -->
  <style>
    @keyframes scroll-x {
      0% { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    .animate-scroll-x {
      animation: scroll-x 30s linear infinite;
    }
  </style>
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

    <!-- FAQ Section -->
<section id="faq" class="bg-white py-24 px-6">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-14">Frequently Asked Questions</h2>
  
      <div class="space-y-6">
        <!-- FAQ Item 1 -->
        <details class="group border border-gray-200 rounded-lg p-5 transition-all">
          <summary class="flex justify-between items-center cursor-pointer text-lg font-semibold text-gray-800 group-open:text-[#b49875]">
            <span>How does the rental process work?</span>
            <svg class="w-5 h-5 transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </summary>
          <p class="text-gray-600 mt-4 leading-relaxed">
            Choose your instrument, pick a date, and we’ll handle the delivery and pickup. Simple as that.
          </p>
        </details>
  
        <!-- FAQ Item 2 -->
        <details class="group border border-gray-200 rounded-lg p-5 transition-all">
          <summary class="flex justify-between items-center cursor-pointer text-lg font-semibold text-gray-800 group-open:text-[#b49875]">
            <span>Is a deposit required?</span>
            <svg class="w-5 h-5 transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </summary>
          <p class="text-gray-600 mt-4 leading-relaxed">
            Yes, we require a refundable deposit based on the instrument value.
          </p>
        </details>
  
        <!-- FAQ Item 3 -->
        <details class="group border border-gray-200 rounded-lg p-5 transition-all">
          <summary class="flex justify-between items-center cursor-pointer text-lg font-semibold text-gray-800 group-open:text-[#b49875]">
            <span>Can I cancel my reservation?</span>
            <svg class="w-5 h-5 transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </summary>
          <p class="text-gray-600 mt-4 leading-relaxed">
            Cancellations are free up to 24 hours before the scheduled date.
          </p>
        </details>
      </div>
    </div>
    
  </section>
  
  


<!-- Newsletter -->

<section id="contact" class="bg-[#b49875] text-white py-16 px-6 relative">
  
  <!-- Decorative wave transition to footer -->
  <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-[0]">
    <svg class="relative block w-full h-[40px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
      <path fill="#9c7b59" d="M0,160L1440,32L1440,320L0,320Z"></path>
    </svg>
  </div>

  <div class="max-w-4xl mx-auto text-center relative z-10">
    <h2 class="text-3xl font-bold mb-4">Stay in Tune</h2>
    <p class="mb-6">Subscribe for updates, discounts, and new arrivals.</p>
    <form class="flex flex-col md:flex-row items-center gap-4 justify-center">
      <input type="email" placeholder="Your Email"
        class="px-4 py-3 w-full md:w-auto rounded-full text-gray-900 focus:outline-none">
      <button type="submit"
        class="bg-white text-[#b49875] font-semibold px-6 py-3 rounded-full hover:bg-gray-200 transition">Subscribe</button>
    </form>
  </div>
</section>

<!-- Footer -->
<footer class="bg-gradient-to-br from-[#9c7b59] via-[#8d6f50] to-[#7e6447] text-white py-16 relative overflow-hidden">
  <!-- Subtle texture -->
  <div class="absolute inset-0 bg-[url('/images/noise.png')] opacity-5 pointer-events-none"></div>

  <div class="relative max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-12 z-10">
    <!-- Logo & Brand -->
    <div>
      <div class="flex items-center space-x-3 mb-4">
        <img src="{{ asset('images/logo.png') }}" alt="MyLodies Logo" class="h-10 drop-shadow-lg" />
        <h3 class="text-2xl font-extrabold tracking-wide">MyLodies</h3>
      </div>
      <p class="text-sm text-white/90">Your reliable partner in sound & performance — where every artist finds their stage.</p>
      <div class="flex space-x-3 mt-4">
        <a href="#" class="hover:text-white/80 transition"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="hover:text-white/80 transition"><i class="fab fa-instagram"></i></a>
        <a href="#" class="hover:text-white/80 transition"><i class="fab fa-youtube"></i></a>
      </div>
    </div>

    <!-- Explore -->
    <div>
      <h4 class="text-lg font-semibold mb-4">Explore</h4>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:underline hover:text-white/80 transition">Home</a></li>
        <li><a href="#" class="hover:underline hover:text-white/80 transition">About</a></li>
        <li><a href="#" class="hover:underline hover:text-white/80 transition">Rentals</a></li>
        <li><a href="#" class="hover:underline hover:text-white/80 transition">Contact</a></li>
      </ul>
    </div>

    <!-- Help -->
    <div>
      <h4 class="text-lg font-semibold mb-4">Help</h4>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:underline hover:text-white/80 transition">FAQ</a></li>
        <li><a href="#" class="hover:underline hover:text-white/80 transition">Terms & Conditions</a></li>
        <li><a href="#" class="hover:underline hover:text-white/80 transition">Privacy Policy</a></li>
      </ul>
    </div>

    <!-- Contact -->
    <div>
      <h4 class="text-lg font-semibold mb-4">Get in Touch</h4>
      <ul class="space-y-2 text-sm">
        <li class="flex items-start space-x-2">
          <i class="fas fa-envelope mt-1"></i>
          <span>mylodies@gmail.com</span>
        </li>
        <li class="flex items-start space-x-2">
          <i class="fas fa-phone mt-1"></i>
          <span>0822 3001 9821</span>
        </li>
        <li class="flex items-start space-x-2">
          <i class="fas fa-map-marker-alt mt-1"></i>
          <span>Batam, Kepulauan Riau</span>
        </li>
      </ul>
    </div>
  </div>

  <!-- Footer Bottom -->
  <div class="border-t border-white/20 mt-12 pt-6 text-center text-sm text-white/80 relative z-10">
    &copy; 2025 <span class="font-semibold">MyLodies</span>. All rights reserved. <span class="italic">Built with rhythm & soul.</span>
  </div>
</footer>

