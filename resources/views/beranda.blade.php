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

  <x-navbar />


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
   <section id="about" class="relative py-56 bg-[#1e1b16] text-white overflow-hidden">
  <!-- Spotlight Background -->
  <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-[#1e1b16]/80 to-transparent z-0"></div>

  <!-- Particle Layer -->
  <div class="absolute inset-0 z-10 pointer-events-none">
    <canvas id="particles-bg" class="w-full h-full opacity-10"></canvas> <!-- (diisi dengan JS particles.js misalnya) -->
  </div>

  <!-- Main Content -->
  <div class="relative z-20 max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center gap-24">

    <!-- Left: Hero Visual Layered -->
    <div class="flex-1 relative h-[600px] w-full">
      <img src="/images/instrument1.jpg"
           class="absolute top-0 left-0 w-[60%] object-cover rounded-2xl rounded-xl shadow-xl z-20 blur-sm hover:blur-0 transition"
           alt="Instrument">
      <img src="/images/studio.jpg"
           class="absolute bottom-10 right-0 w-[50%] object-cover rounded-xl shadow-xl z-20 blur-sm hover:blur-0 transition" alt="Studio">
      <img src="/images/piano2.jpg"
           class="absolute top-1/3 left-1/2 -translate-x-1/2 w-[70%] object-cover rounded-xl z-10 opacity-40 hover:opacity-100 transition" alt="Mic">

      <!-- Badges -->
     
    </div>

    <!-- Right: Message & Floating Elements -->
    <div class="flex-1 space-y-10">
      <h2 class="text-5xl font-extrabold leading-tight text-[#f9e5c9] drop-shadow-[0_2px_4px_rgba(0,0,0,0.5)]">
        This is <span class="text-[#b49875]">More Than Rental</span> —<br>It’s A Production.
      </h2>

      <p class="text-lg leading-relaxed text-[#ddd] max-w-xl">
        Our stage-ready equipment powers indie acts, global festivals, and experimental studios. Whether you're setting up a basement jam or a festival stage — we are your unseen crew.
      </p>

<!-- Feature Pods Cluster with SVG Icons -->
<div class="relative grid grid-cols-2 gap-4 max-w-md">
  <div class="feature-pod animate-in delay-[100ms]">
    <!-- Delivery Icon -->
    <svg class="w-5 h-5 text-[#f9e5c9]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
      <path d="M3 16V6a1 1 0 011-1h11v11H4a1 1 0 01-1-1z" />
      <path d="M14 9h5l3 3v4a1 1 0 01-1 1h-2" />
      <circle cx="6" cy="18" r="2" />
      <circle cx="18" cy="18" r="2" />
    </svg>
    <p>Next-day delivery</p>
  </div>

  <div class="feature-pod animate-in delay-[200ms]">
    <svg class="w-5 h-5 text-[#f9e5c9]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
      <path d="M4 21v-4m0-4v-4m0-4V3m8 18v-6m0-4V3m8 18v-10m0-4V3" />
    </svg>
    <p>Studio-tested quality</p>
  </div>

  <div class="feature-pod animate-in delay-[300ms]">
    <svg class="w-5 h-5 text-[#f9e5c9]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
      <path d="M3 12h15a3 3 0 013 3v0a3 3 0 01-3 3h-4" />
      <path d="M7 16l-4-4 4-4" />
    </svg>
    <p>Flexible return</p>
  </div>

  <div class="feature-pod animate-in delay-[400ms]">
    <svg class="w-5 h-5 text-[#f9e5c9]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
      <path d="M14.7 6.3a4 4 0 01-5.4 5.4l-5.3 5.3a2 2 0 102.8 2.8l5.3-5.3a4 4 0 015.4-5.4z" />
    </svg>
    <p>24/7 tech support</p>
  </div>
</div>


      <!-- CTA -->
      <a href="#rentals" class="inline-block bg-[#b49875] text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-[#a58262] transition-all">
        🚚 Explore Gear Lineup
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
  <div class="absolute top-0 left-0 w-full h-full bg-[url('/images/pattern1.svg')] opacity-5 bg-repeat pointer-events-none"></div>

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
        <a href="https://www.shure.com/" target="_blank" rel="noopener noreferrer">
          <div class="grayscale hover:grayscale-0 transition-all duration-300 ease-in-out">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Stradivarius_logo.svg/512px-Stradivarius_logo.svg.png" class="h-14 md:h-16" alt="Stradivarius Logo" />
          </div>
        </a>
        <a href="https://www.shure.com/" target="_blank" rel="noopener noreferrer">
          <div class="grayscale hover:grayscale-0 transition-all duration-300 ease-in-out">
            <img src="images/KL2_Politeknik Negeri Batam.svg" class="h-14 md:h-16" alt="Stradivarius Logo" />
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
  <div class="absolute inset-0 bg-[url('/images/texture-noise.png')] opacity-5 pointer-events-none"></div>

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

