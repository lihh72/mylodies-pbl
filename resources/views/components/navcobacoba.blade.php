<!-- Navbar -->
<header x-data="{ open: false }"
    class="fixed top-0 w-full z-50 bg-gradient-to-r from-[#b49875]/90 to-[#9c7b59]/90 shadow-lg backdrop-blur-md transition-transform duration-700 ease-in-out animate-fade-in-down">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 py-4 flex justify-between items-center relative">

        <!-- Left Side: Navigation & Logo -->
        <div class="flex items-center space-x-6">
            <!-- Logo -->
            <a href="{{ route('landing') }}" class="flex items-center space-x-3 shrink-0">
                <img src="{{ asset('images/logo.png') }}" alt="MyLodies Logo"
                    class="h-9 drop-shadow-lg hover:scale-110 transition duration-300">
                <span class="text-xl font-bold text-white tracking-wide hover:text-[#f9e5c9] transition">MyLodies</span>
            </a>

            <!-- Navigation (Desktop Only) -->
             <!-- Navigation (Desktop Only) -->
            <nav class="hidden lg:flex items-center space-x-6">
    @foreach (['Home', 'About', 'Catalog'] as $menu)
        @if ($menu === '')
            @continue
        @endif

        @php
            $url = strtolower($menu) === 'home' ? '/' : '/' . strtolower($menu);
        @endphp

        <a href="{{ $url }}"
            class="group relative inline-flex items-center gap-1 text-white font-medium transition-all duration-300 ease-in-out hover:text-black">
            <svg class="w-4 h-4 text-white group-hover:text-[#f9e5c9] transition-transform group-hover:rotate-12 duration-300"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M12 3v3m6.364 1.636l-2.121 2.121M21 12h-3m-1.636 6.364l-2.121-2.121M12 21v-3m-6.364-1.636l2.121-2.121M3 12h3m1.636-6.364l2.121 2.121" />
            </svg>
            {{ $menu }}
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
        </a>
    @endforeach
</nav>
        </div>

        <!-- Mobile Controls -->
        <div class="flex items-center gap-2 lg:hidden ml-auto">
            <!-- Shopping Cart Icon (Mobile) -->
            <a href="{{ route('cart') }}" class="text-white relative">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-white hover:text-[#f9e5c9] transition duration-300" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 3h2l.4 2M7 13h10l4-8H6.4M7 13L5.4 5M7 13l-2 9m14-9l2 9m-6-4a1 1 0 11-2 0 1 1 0 012 0zm-6 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>
                <span
                    class="absolute -top-1.5 -right-1.5 bg-red-500 text-white text-[10px] font-semibold rounded-full px-1 py-0.5 shadow-md">2</span>
            </a>

            <!-- Hamburger -->
            <button @click="open = !open" class="text-white focus:outline-none">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 transition duration-300"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                </svg>
                <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 transition duration-300"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Right Section (Desktop Only) -->
        <div class="hidden lg:flex items-center gap-3">
            <!-- Shopping Cart Icon -->
            <a href="/cart" class="relative group">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-white group-hover:text-[#f9e5c9] transition duration-300 drop-shadow-sm"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 3h2l.4 2M7 13h10l4-8H6.4M7 13L5.4 5M7 13l-2 9m14-9l2 9m-6-4a1 1 0 11-2 0 1 1 0 012 0zm-6 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>
                <span
                    class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-semibold rounded-full px-1.5 py-0.5 shadow-md">2</span>
            </a>

<!-- Profile Icon -->
<a href="/edit" class="group">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white group-hover:text-[#f9e5c9] transition duration-300" fill="currentColor" viewBox="0 0 24 24">
        <path fill-rule="evenodd" d="M12 2a5 5 0 100 10 5 5 0 000-10zm-7 17a7 7 0 0114 0v1H5v-1z" clip-rule="evenodd" />
    </svg>
</a>
            <!-- Logout Button -->
            <a href="{{ route('logout') }}"
                class="px-5 py-2 text-sm font-semibold border border-white text-white rounded-full hover:bg-white hover:text-[#b49875] transition-all duration-300 shadow-md hover:shadow-lg">
                Logout →
            </a>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="lg:hidden bg-[#b49875]/95 backdrop-blur-lg px-6 pt-4 pb-6 space-y-4">

<!-- Mobile Links -->
@foreach (['Home', 'About', 'Catalog'] as $menu)
    @php
        $url = strtolower($menu) === 'home' ? '/' : '/' . strtolower($menu);
    @endphp
    <a href="{{ $url }}" @click="open = false"
        class="block text-white text-base font-medium hover:text-black transition duration-300 ease-in-out">
        {{ $menu }}
    </a>
@endforeach

        <!-- Logout Button (Mobile) -->
        <div class="pt-2">
            <a href="{{ route('logout') }}"
                class="block text-white mt-4 px-4 py-2 border border-white rounded-full text-center hover:bg-white hover:text-[#b49875] transition">
                Logout
            </a>
        </div>
    </div>
</header>
