<header x-data="{ open: false }"
    class="fixed top-0 w-full z-50 bg-gradient-to-r from-[#b49875]/90 to-[#9c7b59]/90 shadow-lg backdrop-blur-md transition-transform duration-700 ease-in-out animate-fade-in-down">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 py-4 flex justify-between items-center relative">

        <!-- Left Side: Logo + Desktop Nav -->
        <div class="flex items-center space-x-6">

            <!-- Logo -->
            <a href="{{ route('landing') }}" class="flex items-center space-x-3 shrink-0">
                <img src="{{ asset('images/logo-background.png') }}" alt="MyLodies Logo"
                    class="h-9 drop-shadow-lg hover:scale-110 transition duration-300">
                <span
                    class="hidden lg:flex text-xl font-bold text-white tracking-wide hover:text-[#f9e5c9] transition">MyLodies</span>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden lg:flex items-center space-x-6">
                @foreach (['Home', 'About', 'Catalog'] as $menu)
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
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                    </a>
                @endforeach
            </nav>

        </div>

        <!-- Right Side: Search + Cart + Profile/Login -->
        <div class="flex items-center gap-4">

            <!-- Search Bar (Visible on all screen sizes) -->
            <div x-data="{ focus: {{ request('q') ? 'true' : 'false' }}, query: @js(request('q')) }" class="relative text-white">
                <input
                    type="text"
                    placeholder="Search..."
                    x-model="query"
                    @focus="focus = true"
                    @blur="focus = false"
                    @keydown.enter="if (query) { window.location.href = '/search?q=' + encodeURIComponent(query) }"
                    class="bg-white/20 backdrop-blur-sm text-white placeholder-white/70 rounded-full pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#f9e5c9] focus:bg-white/30 transition-all duration-300"
                    :class="focus ? 'w-60' : 'w-40 hover:w-60'"
                >
                <svg
                    class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-white/80"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1116.65 2.5a7.5 7.5 0 010 14.15z"
                    />
                </svg>
            </div>

            <!-- Cart (hidden on mobile, shown on lg) -->
<a href="/cart" class="hidden lg:inline-block relative group">
    <svg xmlns="http://www.w3.org/2000/svg"
        class="w-6 h-6 text-white group-hover:text-[#f9e5c9] transition duration-300 drop-shadow-sm"
        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M3 3h2l.4 2M7 13h10l4-8H6.4M7 13L5.4 5M7 13l-2 9m14-9l2 9m-6-4a1 1 0 11-2 0 1 1 0 012 0zm-6 0a1 1 0 11-2 0 1 1 0 012 0z" />
    </svg>
    <span
        class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-semibold rounded-full px-1.5 py-0.5 shadow-md">
        {{ $cartCount }}
    </span>
</a>


            <!-- Profile/Login -->
            <div class="hidden lg:flex items-center gap-4">
                @auth
                <div class="relative inline-block text-left">
                    <button id="profileDropdownButton" type="button"
                        class="inline-flex justify-center items-center w-8 h-8 rounded-full ring-2 ring-[#b49875] hover:ring-[#f9e5c9] hover:scale-110 shadow-lg transition duration-300 focus:outline-none"
                        aria-expanded="true" data-dropdown-toggle="profileDropdown">
                        @if (Auth::user()->profile_picture)
                            <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture" class="w-8 h-8 rounded-full object-cover">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white group-hover:text-[#f9e5c9]" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 2a5 5 0 100 10 5 5 0 000-10zm-7 17a7 7 0 0114 0v1H5v-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        @endif
                    </button>

                    <!-- Dropdown menu -->
                    <div id="profileDropdown"
                        class="hidden z-50 w-44 bg-[#fef8f2] rounded-xl shadow-xl py-3 border border-[#e2d5c1]"
                        role="menu" aria-orientation="vertical" aria-labelledby="profileDropdownButton" tabindex="-1">
                        <a href="/edit"
                            class="block px-4 py-2 text-sm text-[#5a4a3b] hover:bg-[#f3e6d3] hover:text-[#8a6c50] transition duration-200"
                            role="menuitem" tabindex="-1">
                            <i class='bx bx-user-circle text-lg'></i> Edit Profile
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="block px-4 py-2 text-sm text-[#5a4a3b] hover:bg-[#f3e6d3] hover:text-[#b14c3c] transition duration-200"
                            role="menuitem" tabindex="-1">
                            <i class='bx bx-log-out text-lg'></i> Logout
                        </a>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}"
                    class="px-5 py-2 text-sm font-semibold border border-white text-white rounded-full hover:bg-white hover:text-[#b49875] transition-all duration-300 shadow-md hover:shadow-lg">
                    Login →
                </a>
                @endauth
            </div>

            <!-- Hamburger (mobile only) -->
            <div class="lg:hidden ml-2">
                <button @click="open = !open" class="text-white focus:outline-none" aria-label="Toggle menu">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 transition duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                    </svg>
                    <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 transition duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
<!-- Mobile Menu -->
<div x-show="open" x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-6 scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
    x-transition:leave-end="opacity-0 translate-y-6 scale-95"
    class="lg:hidden bg-[#b49875]/70 backdrop-blur-xl shadow-2xl rounded-3xl p-6 text-white border border-[#e4d2b8]/30 space-y-6">

    <!-- Navigation -->
    <div class="grid grid-cols-2 gap-4 text-[15px] font-medium tracking-wide">

        @foreach (['Home', 'About', 'Catalog'] as $menu)
            @php
                $url = strtolower($menu) === 'home' ? '/' : '/' . strtolower($menu);
            @endphp
            <a href="{{ $url }}"
                class="block px-4 py-3 text-center rounded-xl bg-white/10 hover:bg-[#f9e5c9]/90 hover:text-[#9c7b59] shadow-inner ring-1 ring-inset ring-white/10 transition-all duration-300 backdrop-blur-md">
                {{ $menu }}
            </a>
        @endforeach

        <!-- Cart -->
        <a href="/cart"
            class="flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-white/10 hover:bg-[#f9e5c9]/90 hover:text-[#9c7b59] shadow-inner ring-1 ring-inset ring-white/10 transition-all duration-300 backdrop-blur-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 3h2l.4 2M7 13h10l4-8H6.4M7 13L5.4 5M7 13l-2 9m14-9l2 9m-6-4a1 1 0 11-2 0 1 1 0 012 0zm-6 0a1 1 0 11-2 0 1 1 0 012 0z" />
            </svg>
            Cart (2)
        </a>
    </div>

    <!-- Auth Area -->
    <div class="grid grid-cols-1 gap-3">
        @auth
            <a href="/edit"
                class="block px-4 py-3 text-center rounded-xl bg-white/10 hover:bg-[#f9e5c9]/90 hover:text-[#9c7b59] shadow-inner ring-1 ring-inset ring-white/10 transition-all duration-300 backdrop-blur-md">
                Edit Profile
            </a>

            <a href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                class="block px-4 py-3 text-center rounded-xl bg-[#b14c3c] hover:bg-[#e55b4d] text-white font-semibold shadow-md transition-all duration-300">
                Logout
            </a>
            <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
        @else
            <a href="{{ route('login') }}"
                class="block px-4 py-3 text-center font-semibold rounded-xl bg-white/10 hover:bg-[#f9e5c9]/90 hover:text-[#9c7b59] shadow-inner ring-1 ring-inset ring-white/10 transition-all duration-300 backdrop-blur-md">
                Login →
            </a>
        @endauth
    </div>
</div>


</header>