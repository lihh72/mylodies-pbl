@extends('layouts.app')

@section('title', 'Change Password')
@section('body_class', 'bg-[#fdfaf6] text-[#2c1a0f] font-sans pt-[60px]')

@section('content')

<!-- Decorative Blobs -->
<div class="absolute -top-40 -left-32 w-[500px] h-[500px] bg-[#e6d1be] opacity-25 rounded-full blur-[140px] animate-pulse-slow z-0"></div>
<div class="absolute top-[30%] right-[-100px] w-[360px] h-[360px] bg-[#f0e2d4] opacity-20 rounded-full blur-[120px] animate-pulse-slow z-0"></div>

<!-- Layout Container -->
<div class="relative z-10 grid lg:grid-cols-[280px_1fr] items-stretch min-h-[calc(100vh-60px)] px-4 md:px-8 gap-6 py-16">

    <!-- Sidebar -->
    <aside class="bg-white/40 backdrop-blur-lg border border-[#e5d5c2]/40 rounded-3xl shadow-xl px-6 py-10 flex flex-col items-center text-center">

        @if (Auth::user()->profile_picture)
                            <img
  src="{{ Str::startsWith(Auth::user()->profile_picture, 'http') 
        ? Auth::user()->profile_picture 
        : asset(Auth::user()->profile_picture) }}" alt="Profile Picture"
                 class="w-24 h-24 rounded-full object-cover ring-4 ring-[#eee1d2] shadow-md hover:scale-105 transition-transform duration-300" />
        @else
            <i class="bx bxs-user-circle text-[90px] text-[#67574b] drop-shadow-md"></i>
        @endif

        <div class="mt-4 text-lg font-semibold">{{ $user->name ?? 'User' }}</div>
        <div class="text-sm text-[#887466] mb-6">{{ $user->email }}</div>

        <nav class="w-full space-y-2 mt-4">
            @foreach([
                ['#', 'Rent History', 'bx-history'],
                ['#', 'Transaction', 'bx-credit-card'],
                ['#', 'Change Password', 'bx-lock'],
                ['#', 'Settings', 'bx-cog'],
            ] as [$url, $label, $icon])
                <a href="{{ $url }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium 
                   {{ $label == 'Change Password' ? 'bg-[#ae8e73] text-white shadow' : 'hover:bg-[#e6d8cb]/50 text-[#49392d]' }} 
                   transition-all duration-300">
                    <i class="bx {{ $icon }} text-[18px]"></i> {{ $label }}
                </a>
            @endforeach
        </nav>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="mt-8 text-sm text-[#a08b78] hover:underline">Logout</a>
    </aside>

    <!-- Main Section -->
    <main class="flex items-center justify-center">
        <div class="relative w-full max-w-[860px] bg-white/40 backdrop-blur-xl border border-[#e5d3c1]/50 rounded-3xl p-12 shadow-2xl overflow-hidden">

            <!-- Accent -->
            <div class="absolute -top-20 -right-20 w-[220px] h-[220px] bg-[#e2ccbc] opacity-30 rounded-full blur-[100px] z-0"></div>

            <!-- Heading -->
            <h1 class="text-[30px] md:text-[34px] font-bold text-[#3e2f22] mb-10 relative z-10 tracking-wide text-center">
                Change Your Password
            </h1>

            <!-- Alerts -->
            @if(session('success'))
                <div class="flex items-center gap-3 bg-green-100 border-l-4 border-green-500 text-green-800 px-4 py-3 mb-6 rounded-xl shadow animate-fade-in">
                    <i class="bx bx-check-circle text-xl"></i> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-800 px-4 py-3 mb-6 rounded-xl shadow animate-fade-in">
                    <ul class="space-y-1">
                        @foreach($errors->all() as $error)
                            <li><i class="bx bx-error-circle mr-1"></i>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('password.force.post') }}" class="space-y-8 relative z-10">
                @csrf
@foreach([
    ['new_password', 'New Password', 'bx-lock-open'],
    ['new_password_confirmation', 'Confirm New Password', 'bx-check-shield'],
] as [$name, $label, $icon])

                    <div class="relative">
                        <input type="password" name="{{ $name }}" id="{{ $name }}" required
                               placeholder="{{ $label }}"
                               class="peer w-full px-4 pt-6 pb-2 bg-white/30 backdrop-blur-lg border border-[#d5c4b0] text-[#2c1a0f] placeholder-transparent rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#bfa78d] transition-all" />
                        <label for="{{ $name }}"
                               class="absolute left-4 top-3 text-sm text-[#7a6654] font-medium transition-all 
                               peer-placeholder-shown:top-4 peer-placeholder-shown:text-base 
                               peer-placeholder-shown:text-[#a08c79] peer-focus:top-2 peer-focus:text-sm peer-focus:text-[#8f735c]">
                            {{ $label }}
                        </label>
                        <i class="bx {{ $icon }} absolute top-1/2 right-4 transform -translate-y-1/2 text-[#a18b76] text-lg"></i>
                    </div>
                @endforeach

                <div class="text-center pt-6">
                    <button type="submit"
                            class="group relative inline-flex items-center gap-2 px-8 py-3 rounded-full font-semibold text-sm text-white bg-gradient-to-r from-[#c4a48a] to-[#8c6b59] shadow-md hover:shadow-xl hover:scale-105 transition-transform duration-300 overflow-hidden">
                        <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity rounded-full"></span>
                        <i class="bx bx-refresh text-lg"></i> Update Password
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>

@endsection
