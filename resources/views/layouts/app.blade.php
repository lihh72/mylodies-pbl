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

    {{-- Page Title --}}
    <title>@yield('title', 'MyLodies - Rent Your Sound')</title>
    <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

    {{-- Alpine.js --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @filamentStyles
    {{-- Vite --}}
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')

    {{-- Extra Head --}}
    @stack('head')
</head>

<body class="@yield('body_class', 'font-sans text-gray-800 bg-white')">

    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />

    @filamentScripts
    @vite('resources/js/app.js')
</body>
</html>
