@extends('layouts.app')

@section('title', 'MyLodies - Home')
@section('body_class', 'font-sans text-gray-800 bg-white')
@section('loading_screen', true)


@section('content')

<section id="home"
    class="relative h-screen bg-cover bg-center flex items-center justify-center text-center overflow-hidden">

    <!-- Gradient & Glow Background -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute inset-0 bg-gradient-to-br from-[#f9e5c9]/80 via-[#b49875]/10 to-[#fdfaf5]"></div>

        <!-- Hanya tampil di desktop -->
        <div class="hidden sm:block absolute left-1/2 top-0 -translate-x-1/2 w-[120vw] h-[120vw] bg-[#b49875]/10 rounded-full blur-3xl"></div>
        <div class="hidden sm:block absolute right-0 top-1/4 w-80 h-80 bg-[#d2bfa4]/40 rounded-full blur-2xl"></div>
        <div class="hidden sm:block absolute left-0 bottom-0 w-72 h-72 bg-[#f9e5c9]/40 rounded-full blur-2xl"></div>

        <!-- Texture -->
        <div class="absolute inset-0 opacity-10 pointer-events-none bg-[url('{{ asset('images/texture-noise.png') }}')] bg-repeat bg-cover"></div>
    </div>

    <!-- Video Desktop / Gambar Mobile -->
    <picture>
        <source srcset="{{ asset('videos/Video_Musik_Siap_Ini_Tautan.mp4') }}" type="video/mp4" media="(min-width: 640px)">
        <img src="{{ asset('images/bg1.jpg') }}" alt="Mylodies Background" class="sm:hidden absolute inset-0 w-full h-full object-cover z-[-1]" loading="lazy">
    </picture>

    <video autoplay muted loop playsinline class="hidden sm:block absolute inset-0 w-full h-full object-cover z-[-1]" poster="{{ asset('images/bg1.jpg') }}">
        <source src="{{ asset('videos/Video_Musik_Siap_Ini_Tautan.mp4') }}" type="video/mp4">
    </video>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm z-0"></div>

    <!-- Particles (desktop only) -->
    <div id="particles-js" class="hidden sm:block absolute inset-0 z-0 pointer-events-none"></div>

    <!-- Light Glow Center -->
    <div class="hidden sm:block absolute w-[120vw] h-[120vw] bg-[#b49875]/20 rounded-full blur-3xl top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-0"></div>

    <!-- Hero Content -->
    <div class="relative z-10 px-6 max-w-4xl motion-safe:animate-fade-in-up">
        <h1
            class="text-4xl sm:text-6xl lg:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-[#ffdfbf] via-[#d2ab7c] to-[#b49875] animate-text-gradient drop-shadow-lg min-h-[5rem] sm:min-h-[6.5rem] lg:min-h-[8rem] flex items-center justify-center">
            <span>Your</span>
            <span id="typewriter" class="inline-block whitespace-nowrap transition-all duration-300"></span>
        </h1>
        <h2 class="mt-4 text-lg sm:text-2xl text-[#f5e4cf] tracking-wide motion-safe:animate-slide-in-fade">
            Instruments that Perform. Experiences that Resonate.
        </h2>

        <a href="#rentals"
            class="inline-flex mt-10 px-8 py-3 bg-[#b49875] text-white text-lg font-semibold rounded-full shadow-xl hover:bg-[#9a7b56] transition duration-300 ease-in-out hover:scale-110 motion-safe:animate-pulse-glow">
            Explore Rentals →
        </a>
    </div>

    <!-- Equalizer Bars -->
    <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 flex gap-1 z-10">
        @for ($i = 0; $i < 5; $i++)
            <div class="w-1 h-4 bg-[#b49875] animate-eq delay-eq-{{ $i }}"></div>
        @endfor
    </div>
</section>


<!-- Scripts and Styles -->
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
    // Aktifkan hanya jika > 640px
    if (window.innerWidth > 640) {
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
    }

    // Typewriter effect (tetap ringan, tapi bisa dimatikan untuk mobile ekstrem)
    if (window.innerWidth > 480) {
        const text = ["Stage,", "Sound.", "Moment."];
        let i = 0, j = 0, current = "", isDeleting = false;
        const speed = 100;
        function type() {
            current = text[i];
            let display = isDeleting ? current.substring(0, j--) : current.substring(0, j++);
            document.getElementById("typewriter").innerHTML = "&nbsp;" + display;
            if (!isDeleting && j === current.length + 1) {
                isDeleting = true;
                setTimeout(type, 1000);
            } else if (isDeleting && j === 0) {
                isDeleting = false;
                i = (i + 1) % text.length;
                setTimeout(type, 400);
            } else {
                setTimeout(type, speed);
            }
        }
        window.addEventListener("load", type);
    }
</script>
<style>

</style>
</section>

<section id="about" class="relative py-24 sm:py-40 bg-[#1e1b16] text-white overflow-hidden">
    <!-- Spotlight Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-[#1e1b16]/80 to-transparent z-0"></div>

    <!-- Particle Layer -->
    <div class="absolute inset-0 z-10 pointer-events-none">
        <canvas id="particles-bg" class="w-full h-full opacity-10"></canvas>
    </div>

    <!-- Main Grid Layout -->
    <div class="relative z-20 max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-12 items-center gap-12">

        <!-- Left Column: Image Grid (6 cols on desktop) -->
        <div class="intersect-once intersect:motion-preset-slide-right motion-blur-in-md sm:col-span-6 grid grid-cols-2 grid-rows-2 gap-4 motion-delay-300">

            <!-- Gambar 1 -->
            <div class="row-span-2 group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition duration-700">
                <img src="{{ asset('images/instrument1.jpg') }}" alt="Instrument" loading="lazy"
                    class="w-full h-full object-cover transform sm:group-hover:scale-110 transition duration-700 ease-out" />
                <div class="absolute inset-0 bg-black/30 opacity-0 sm:group-hover:opacity-100 backdrop-blur-sm transition duration-700"></div>
            </div>

            <!-- Gambar 2 -->
            <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition duration-700">
                <img src="{{ asset('images/studio.jpg') }}" alt="Studio" loading="lazy"
                    class="w-full h-full object-cover transform sm:group-hover:scale-110 transition duration-700 ease-out" />
                <div class="absolute inset-0 bg-black/30 opacity-0 sm:group-hover:opacity-100 backdrop-blur-sm transition duration-700"></div>
            </div>

            <!-- Gambar 3 -->
            <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition duration-700">
                <img src="{{ asset('images/piano2.jpg') }}" alt="Piano" loading="lazy"
                    class="w-full h-full object-cover transform sm:group-hover:scale-110 transition duration-700 ease-out" />
                <div class="absolute inset-0 bg-black/30 opacity-0 sm:group-hover:opacity-100 backdrop-blur-sm transition duration-700"></div>
            </div>
        </div>

        <!-- Right Column: Text & Features (6 cols on desktop) -->
        <div class="sm:col-span-6 space-y-10">
            <h2 class="text-3xl sm:text-5xl font-extrabold leading-tight text-[#f9e5c9] drop-shadow-[0_2px_4px_rgba(0,0,0,0.5)] intersect-once intersect:motion-preset-slide-left motion-blur-in-md motion-delay-100">
                This is <span class="text-[#b49875]">More Than Rental</span> —<br class="hidden sm:block">It’s A Production.
            </h2>

            <p class="text-base sm:text-lg leading-relaxed text-[#ddd] max-w-xl intersect-once intersect:motion-preset-slide-left motion-blur-in-md motion-delay-300">
                Our stage-ready equipment powers indie acts, global festivals, and experimental studios. Whether
                you're setting up a basement jam or a festival stage — we are your unseen crew.
            </p>

            <!-- Features Grid -->
            <div class="relative grid grid-cols-2 gap-4 max-w-md">
                <div class="intersect-once intersect:motion-preset-fade motion-blur-in-md feature-pod animate-in motion-delay-500">
                    <svg class="w-5 h-5 text-[#f9e5c9]" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24">
                        <path d="M3 16V6a1 1 0 011-1h11v11H4a1 1 0 01-1-1z" />
                        <path d="M14 9h5l3 3v4a1 1 0 01-1 1h-2" />
                        <circle cx="6" cy="18" r="2" />
                        <circle cx="18" cy="18" r="2" />
                    </svg>
                    <p>Next-day delivery</p>
                </div>

                <div class="intersect-once intersect:motion-preset-fade motion-blur-in-md feature-pod animate-in motion-delay-500">
                    <svg class="w-5 h-5 text-[#f9e5c9]" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24">
                        <path d="M4 21v-4m0-4v-4m0-4V3m8 18v-6m0-4V3m8 18v-10m0-4V3" />
                    </svg>
                    <p>Studio-tested quality</p>
                </div>

                <div class="intersect-once intersect:motion-preset-fade motion-blur-in-md feature-pod animate-in motion-delay-700">
                    <svg class="w-5 h-5 text-[#f9e5c9]" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24">
                        <path d="M3 12h15a3 3 0 013 3v0a3 3 0 01-3 3h-4" />
                        <path d="M7 16l-4-4 4-4" />
                    </svg>
                    <p>Flexible return</p>
                </div>

                <div class="intersect-once intersect:motion-preset-fade motion-blur-in-md feature-pod animate-in motion-delay-700">
                    <svg class="w-5 h-5 text-[#f9e5c9]" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24">
                        <path d="M14.7 6.3a4 4 0 01-5.4 5.4l-5.3 5.3a2 2 0 102.8 2.8l5.3-5.3a4 4 0 015.4-5.4z" />
                    </svg>
                    <p>24/7 tech support</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Wave Transition -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] z-0">
        <svg class="relative block w-full h-[80px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
            preserveAspectRatio="none">
            <path fill="#fef8f2" fill-opacity="1"
                d="M0,64L40,96C80,128,160,192,240,208C320,224,400,192,480,192C560,192,640,224,720,229.3C800,235,880,213,960,213.3C1040,213,1120,235,1200,224C1280,213,1360,171,1400,149.3L1440,128L1440,320L0,320Z">
            </path>
        </svg>
    </div>
</section>


<!-- Featured Rentals Section - With Hover Descriptions -->
<section id="rentals" class="bg-gradient-to-b from-[#fef8f2] to-[#f9f3ea] py-24 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <img src="{{ asset('images/texture-noise.png') }}" class="w-full h-full object-cover opacity-5"
            alt="Texture">
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-[#5a4a3b]">Our Most Wanted Gears</h2>
            <p class="mt-4 text-lg text-[#7a6a59]">Crafted by legends. Tuned for your stage.</p>
        </div>

<x-card :products="$products" />

        <div class="text-center mt-16">
            <a href="{{ route('catalog') }}"
                class="inline-block bg-[#b49875] text-white px-10 py-4 rounded-full text-lg font-semibold hover:bg-[#9a7b56] transition">Explore
                Full Catalog →</a>
        </div>
    </div>
</section>

<section class="bg-[#f9f3ea] py-20 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full opacity-5 bg-repeat pointer-events-none"
 style="background-image: url('{{ asset('images/pattern1.svg') }}')">
</div>


    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <h2 class="text-3xl md:text-4xl font-extrabold text-center text-gray-900 mb-10 tracking-tight">
            Trusted by Industry Leaders
        </h2>

        <!-- Running Slider Container -->
        <div class="overflow-hidden relative">
            <div class="flex gap-16 animate-scroll-x items-center min-w-max">
                <!-- Duplikat agar loop terlihat seamless -->
                @for ($i = 0; $i < 2; $i++)
                    <a href="https://www.yamaha.com/" target="_blank" rel="noopener noreferrer">
                        <div class="grayscale hover:grayscale-0 transition-all duration-300 ease-in-out">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Yamaha_logo.svg/330px-Yamaha_logo.svg.png"
                                class="h-14 md:h-16" alt="Yamaha Logo" />
                        </div>
                    </a>
                    <a href="https://intl.fender.com/" target="_blank" rel="noopener noreferrer">
                        <div class="grayscale hover:grayscale-0 transition-all duration-300 ease-in-out">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Fender_guitars_logo.svg/295px-Fender_guitars_logo.svg.png"
                                class="h-14 md:h-16" alt="Fender Logo" />
                        </div>
                    </a>
                    <a href="https://www.shure.com/" target="_blank" rel="noopener noreferrer">
                        <div class="grayscale hover:grayscale-0 transition-all duration-300 ease-in-out">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Shure_Logo_2024.svg/960px-Shure_Logo_2024.svg.png"
                                class="h-14 md:h-16" alt="Shure Logo" />
                        </div>
                    </a>
                    <a href="https://www.shure.com/" target="_blank" rel="noopener noreferrer">
                        <div class="grayscale hover:grayscale-0 transition-all duration-300 ease-in-out">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Stradivarius_logo.svg/512px-Stradivarius_logo.svg.png"
                                class="h-14 md:h-16" alt="Stradivarius Logo" />
                        </div>
                    </a>
                    <a href="https://www.shure.com/" target="_blank" rel="noopener noreferrer">
                        <div class="grayscale hover:grayscale-0 transition-all duration-300 ease-in-out">
                            <img src="images/KL2_Politeknik Negeri Batam.svg" class="h-14 md:h-16"
                                alt="Stradivarius Logo" />
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
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
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
        @foreach ([['name' => 'Sarah K.', 'text' => 'The grand piano rental made my recital unforgettable. Amazing service!'], ['name' => 'Dimas R.', 'text' => 'Fast delivery and high-quality instruments. I’ll definitely rent again!'], ['name' => 'Anita L.', 'text' => 'As a violinist, I found everything I needed, hassle-free. Highly recommended.']] as $review)
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
                <summary
                    class="flex justify-between items-center cursor-pointer text-lg font-semibold text-gray-800 group-open:text-[#b49875]">
                    <span>How does the rental process work?</span>
                    <svg class="w-5 h-5 transform group-open:rotate-180 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </summary>
                <p class="text-gray-600 mt-4 leading-relaxed">
                    Choose your instrument, pick a date, and we’ll handle the delivery and pickup. Simple as that.
                </p>
            </details>

            <!-- FAQ Item 2 -->
            <details class="group border border-gray-200 rounded-lg p-5 transition-all">
                <summary
                    class="flex justify-between items-center cursor-pointer text-lg font-semibold text-gray-800 group-open:text-[#b49875]">
                    <span>Is a deposit required?</span>
                    <svg class="w-5 h-5 transform group-open:rotate-180 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </summary>
                <p class="text-gray-600 mt-4 leading-relaxed">
                    Yes, we require a refundable deposit based on the instrument value.
                </p>
            </details>

            <!-- FAQ Item 3 -->
            <details class="group border border-gray-200 rounded-lg p-5 transition-all">
                <summary
                    class="flex justify-between items-center cursor-pointer text-lg font-semibold text-gray-800 group-open:text-[#b49875]">
                    <span>Can I cancel my reservation?</span>
                    <svg class="w-5 h-5 transform group-open:rotate-180 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
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
@endsection