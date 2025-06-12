<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- Meta SEO --}}
    <meta name="description" content="Mylodies is a music platform that brings you the best tracks from various genres. Discover your favorite music here.">
    <meta name="author" content="Mylodies Team">
    <meta name="keywords" content="music, songs, streaming, Mylodies, pop, rock, jazz, indie, rent">

    {{-- Open Graph --}}
    <meta property="og:title" content="Mylodies - Your Favorite Music Platform">
    <meta property="og:description" content="Enjoy the best listening experience with curated music on Mylodies.">
    <meta property="og:image" content="{{ asset('images/logo-background.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mylodies - Your Favorite Music Platform">
    <meta name="twitter:description" content="Enjoy the best listening experience with curated music on Mylodies.">
    <meta name="twitter:image" content="{{ asset('images/logo-background.png') }}">
{{-- Font Awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    {{-- Page Title --}}
    <title>@yield('title', 'MyLodies - Rent Your Sound')</title>
    <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

    {{-- Alpine.js --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    @filamentStyles
    {{-- Vite --}}
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')

    {{-- Extra Head --}}
    @stack('head')
</head>

<body class="@yield('body_class', 'font-sans text-gray-800 bg-white') min-h-screen flex flex-col">
    @if(View::hasSection('loading_screen') && View::getSection('loading_screen'))
<!-- Loading Screen -->
<div id="loading-screen" class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-gradient-to-br from-[#f9e5c9] via-[#b49875]/20 to-[#fffaf3] transition-opacity duration-700 ease-in-out overflow-hidden">
    <!-- Animated Glow Circles -->
    <div class="absolute w-[600px] h-[600px] bg-[#b49875]/20 rounded-full blur-3xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 animate-pulse-glow"></div>
    <div class="absolute w-[300px] h-[300px] bg-[#f9e5c9]/40 rounded-full blur-2xl top-1/3 left-1/3 animate-pulse-glow2"></div>
    <!-- Animated Music Notes -->
    <div class="absolute left-10 top-1/2 -translate-y-1/2 animate-float-x">
        <svg class="w-12 h-12 text-[#b49875]/70" fill="currentColor" viewBox="0 0 24 24">
            <path d="M9 19V6h13M9 6L2 12l7 6" />
        </svg>
    </div>
    <div class="absolute right-10 top-1/3 animate-float-x2">
        <svg class="w-10 h-10 text-[#b49875]/60" fill="currentColor" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none" />
        </svg>
    </div>
    <!-- Logo dengan efek glow dan zoom-in subtle -->
    <img src="{{ asset('images/logo-background.png') }}" alt="MyLodies Logo"
        class="w-28 h-28 object-contain opacity-0 scale-90 animate-fadeZoom drop-shadow-[0_0_25px_#b49875]" />
    <!-- Animated Equalizer Bars -->
    <div class="flex gap-1 mt-8 mb-2">
        <div class="w-2 h-8 bg-[#b49875] rounded-full animate-eq delay-eq-0"></div>
        <div class="w-2 h-8 bg-[#b49875] rounded-full animate-eq delay-eq-1"></div>
        <div class="w-2 h-8 bg-[#b49875] rounded-full animate-eq delay-eq-2"></div>
        <div class="w-2 h-8 bg-[#b49875] rounded-full animate-eq delay-eq-3"></div>
        <div class="w-2 h-8 bg-[#b49875] rounded-full animate-eq delay-eq-4"></div>
    </div>
    <!-- Teks branding -->
    <p class="mt-2 text-[#b49875] text-lg italic font-light animate-pulse tracking-widest">Crafting timeless harmony...</p>
</div>

<!-- Animasi Custom -->
<style>
  @keyframes fadeZoom {
    0% { opacity: 0; transform: scale(0.9);}
    100% { opacity: 1; transform: scale(1);}
  }
  .animate-fadeZoom { animation: fadeZoom 1.2s cubic-bezier(.4,0,.2,1) forwards; }
  @keyframes pulse-glow {
    0%,100% { opacity: 0.7; }
    50% { opacity: 1; }
  }
  .animate-pulse-glow { animation: pulse-glow 2.5s infinite ease-in-out; }
  @keyframes pulse-glow2 {
    0%,100% { opacity: 0.5; }
    50% { opacity: 0.9; }
  }
  .animate-pulse-glow2 { animation: pulse-glow2 3.2s infinite ease-in-out; }
  @keyframes float-x {
    0%,100% { transform: translateY(-50%) translateX(0);}
    50% { transform: translateY(-50%) translateX(30px);}
  }
  .animate-float-x { animation: float-x 3s ease-in-out infinite; }
  @keyframes float-x2 {
    0%,100% { transform: translateY(0) translateX(0);}
    50% { transform: translateY(10px) translateX(-30px);}
  }
  .animate-float-x2 { animation: float-x2 3.5s ease-in-out infinite; }
  @keyframes eq {
    0%,100% { transform: scaleY(1);}
    50% { transform: scaleY(2.2);}
  }
  .animate-eq { animation: eq 1.3s infinite cubic-bezier(.4,0,.2,1); transform-origin: bottom;}
  .delay-eq-0 { animation-delay: 0ms;}
  .delay-eq-1 { animation-delay: 120ms;}
  .delay-eq-2 { animation-delay: 240ms;}
  .delay-eq-3 { animation-delay: 360ms;}
  .delay-eq-4 { animation-delay: 480ms;}
</style>
@endif

    <x-navbar />

    <main class="flex-1">
        @yield('content')
    </main>

    <x-footer />

    <!-- Logout Form Global -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>


    @filamentScripts
    @yield('scripts') 

<script>
  window.addEventListener('load', () => {
    const loadingScreen = document.getElementById('loading-screen');
    loadingScreen.classList.add('opacity-0', 'pointer-events-none');
    loadingScreen.style.transition = 'opacity 0.7s cubic-bezier(.4,0,.2,1)';
    setTimeout(() => {
      loadingScreen.style.display = 'none';
      document.body.classList.remove('overflow-hidden');
    }, 800);
  });
</script>

<script>
    window.addEventListener('load', function () {
        const skeleton = document.getElementById('product-skeleton');
        const content = document.getElementById('product-content');
        if (skeleton && content) {
            skeleton.style.display = 'none';
            content.classList.remove('hidden');
        }
    });
</script>


</body>
</html>
