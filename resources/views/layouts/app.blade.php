<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#b49875" />
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

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
    <meta property="fb:app_id" content="1214107493842933" />

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mylodies - Your Favorite Music Platform">
    <meta name="twitter:description" content="Enjoy the best listening experience with curated music on Mylodies.">
    <meta name="twitter:image" content="{{ asset('images/logo-background.png') }}">

    {{-- Fonts & Icons --}}
    <link rel="preload" as="image" href="{{ asset('images/logo-background.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    {{-- Title --}}
    <title>@yield('title', 'MyLodies - Rent Your Sound')</title>

    {{-- Hide Alpine Elements Before Init --}}
    <style>[x-cloak] { display: none !important; }</style>

    {{-- Filament & Vite --}}
    @filamentStyles
    @vite(['resources/js/app.js', 'resources/css/app.css'])

    {{-- Custom Head Injections --}}
    @stack('head')
</head>

<body class="@yield('body_class', 'font-sans text-gray-800 bg-white') min-h-screen flex flex-col">

    {{-- Loading Screen (optional) --}}
    @if(View::hasSection('loading_screen') && View::getSection('loading_screen'))
        @include('partials.loading-screen')
    @endif

    {{-- Main Layout --}}
    <x-navbar />

    {{-- Toast Alerts --}}
    @include('components.toast')

    {{-- Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    <x-footer />

    {{-- Logout Fallback --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>

    {{-- Scripts --}}
    @filamentScripts
    @yield('scripts')

    {{-- Loading Transition --}}
    <script>
      window.addEventListener('load', () => {
        const loadingScreen = document.getElementById('loading-screen');
        if (loadingScreen) {
            loadingScreen.classList.add('opacity-0', 'pointer-events-none');
            loadingScreen.style.transition = 'opacity 0.7s cubic-bezier(.4,0,.2,1)';
            setTimeout(() => {
              loadingScreen.style.display = 'none';
              document.body.classList.remove('overflow-hidden');
            }, 800);
        }
      });
    </script>

    {{-- Skeleton Cleanup --}}
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

    {{-- Chatbot Embed --}}
    <script async
        src="https://xfomasa55tircp52ktxbzmgy.agents.do-ai.run/static/chatbot/widget.js"
        data-agent-id="152d5c78-4d9b-11f0-bf8f-4e013e2ddde4"
        data-chatbot-id="BL-Hj1I9TI14sJJo5-8DzMRA4pM1qYvJ"
        data-name="Mylodies Agent"
        data-primary-color="#b49875"
        data-secondary-color="#f9e5c9"
        data-button-background-color="#8b6f4d"
        data-starting-message="Jangan spam ges, tokennya mahal"
        data-logo="https://mylodies.xyz/images/logo-background.png">
    </script>

</body>
</html>
