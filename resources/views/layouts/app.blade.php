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
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mylodies - Your Favorite Music Platform">
    <meta name="twitter:description" content="Enjoy the best listening experience with curated music on Mylodies.">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
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

<body class="@yield('body_class', 'font-sans text-gray-800 bg-white')">
    @if(View::hasSection('loading_screen') && View::getSection('loading_screen'))
<!-- Loading Screen -->
<div id="loading-screen" class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-[#f9e5c9] transition-opacity duration-500">
  <!-- Logo dengan efek glow dan zoom-in subtle -->
  <img src="{{ asset('images/logo.png') }}" alt="MyLodies Logo"
    class="w-24 h-24 object-contain opacity-0 scale-90 animate-fadeZoom drop-shadow-[0_0_15px_#b49875]" />

  <!-- Teks branding -->
  <p class="mt-6 text-[#b49875] text-lg italic font-light animate-pulse tracking-widest">Crafting timeless harmony...</p>
</div>

<!-- Animasi Custom -->
<style>
  @keyframes fadeZoom {
    0% {
      opacity: 0;
      transform: scale(0.9);
    }
    100% {
      opacity: 1;
      transform: scale(1);
    }
  }

  .animate-fadeZoom {
    animation: fadeZoom 1.2s ease-out forwards;
  }
</style>
@endif



    <x-navbar />

    <main>
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
    loadingScreen.classList.add('opacity-0');
    setTimeout(() => loadingScreen.remove(), 500);
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
