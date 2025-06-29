
<header 
x-cloak
x-data="{
    open: false,
    mode: localStorage.getItem('navbarMode') || 'dark',
    init() {
        const updateMode = (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const newMode = entry.target.classList.contains('light-stage') ? 'light' : 'dark';
                    if (this.mode !== newMode) {
                        this.mode = newMode;
                        localStorage.setItem('navbarMode', newMode);
                    }
                }
            });
        };

        const observer = new IntersectionObserver(updateMode, { threshold: 0.5 });
        document.querySelectorAll('.light-stage, .dark-stage').forEach(el => {
            observer.observe(el);
        });
    }
}"


x-bind:class="{
    'bg-white/20 text-black': mode === 'light',
    'bg-[#1f1f1f]/60 text-white': mode === 'dark'
}"
class="fixed top-4 left-1/2 -translate-x-1/2 w-[95vw] max-w-screen-xl z-50 
    backdrop-blur-2xl rounded-2xl transition-all duration-500 ease-in-out
    shadow-[0_8px_24px_rgba(0,0,0,0.15)]"
>

<style>[x-cloak]{ display: none !important }</style>

<div class="relative z-10 px-6 py-3 flex justify-between items-center">
    {{-- LEFT: Logo & Nav --}}
    <div class="flex items-center space-x-6">
        <a href="{{ route('landing') }}" class="flex items-center space-x-3">
    <img 
        :src="mode === 'light' 
            ? '{{ asset('images/logo.png') }}' 
            : '{{ asset('images/logo-background.png') }}'"
        alt="MyLodies Logo"
        class="h-8 drop-shadow-sm transition duration-300 ease-in-out"
    />
    <span
        :class="mode === 'light' ? 'text-black hover:text-[#b49875]' : 'text-white hover:text-[#f9e5c9]'"
        class="hidden lg:block text-[17px] font-semibold transition"
    >MyLodies</span>
</a>


        <nav class="hidden lg:flex items-center space-x-6">
            @foreach (['Home', 'About', 'Catalog'] as $menu)
                @php $url = strtolower($menu) === 'home' ? '/' : '/' . strtolower($menu); @endphp
                <a href="{{ $url }}"
                    :class="mode === 'light' 
                        ? 'text-black hover:text-neutral-700' 
                        : 'text-white hover:text-[#f9e5c9]'"
                    class="group relative inline-flex items-center gap-1 font-medium transition-all duration-300">
                    <svg class="w-4 h-4 text-inherit group-hover:rotate-12 duration-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 3v3m6.364 1.636l-2.121 2.121M21 12h-3m-1.636 6.364l-2.121-2.121M12 21v-3m-6.364-1.636l2.121-2.121M3 12h3m1.636-6.364l2.121 2.121" />
                    </svg>
                    {{ $menu }}
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-current transition-all duration-300 group-hover:w-full"></span>
                </a>
            @endforeach
        </nav>
    </div>

    {{-- RIGHT: Search + Cart + Auth --}}
    <div class="flex items-center gap-4">
        {{-- Search --}}
        <div x-data="{ focus: false, query: @js(request('q')) }" class="relative">
            <input
                type="text"
                placeholder="Search..."
                x-model="query"
                @focus="focus = true"
                @blur="focus = false"
                @keydown.enter="if (query) { window.location.href = '/search?q=' + encodeURIComponent(query) }"
                :class="[focus ? 'w-60' : 'w-40 hover:w-60',
                    mode === 'light' 
                        ? 'bg-white/30 text-black placeholder-black/50 ring-black/10' 
                        : 'bg-white/10 text-white placeholder-white/60 ring-white/10']"
                class="rounded-full pl-10 pr-4 py-2 ring-1 ring-inset backdrop-blur-sm focus:outline-none transition-all duration-300"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor"
                :class="mode === 'light' ? 'text-black/60' : 'text-white/60'"
                class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 transition duration-300"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1116.65 2.5a7.5 7.5 0 010 14.15z" />
            </svg>
        </div>

        {{-- Cart --}}
        <a href="/cart" class="hidden lg:inline-block relative group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="1.8"
                :class="mode === 'light' 
                    ? 'text-black group-hover:text-neutral-800' 
                    : 'text-white group-hover:text-[#f9e5c9]'"
                class="w-6 h-6 transition duration-300">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 3h2l.4 2M7 13h10l4-8H6.4M7 13L5.4 5M7 13l-2 9m14-9l2 9m-6-4a1 1 0 11-2 0 1 1 0 012 0zm-6 0a1 1 0 11-2 0 1 1 0 012 0z" />
            </svg>
            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-semibold rounded-full px-1.5 py-0.5 shadow-md">
                {{ $cartCount }}
            </span>
        </a>

        {{-- Auth --}}
        <div class="hidden lg:flex items-center gap-4">
            @auth
                <div class="relative inline-block text-left">
                    <button id="profileDropdownButton" type="button"
                        class="inline-flex justify-center items-center w-8 h-8 rounded-full ring-2 ring-[#b49875] hover:ring-[#f9e5c9] hover:scale-110 transition duration-300 focus:outline-none"
                        aria-expanded="true" data-dropdown-toggle="profileDropdown">
                        @if (Auth::user()->profile_picture)
                            <img src="{{ Str::startsWith(Auth::user()->profile_picture, 'http') 
                                ? Auth::user()->profile_picture 
                                : '/storage/' . Auth::user()->profile_picture }}"
                                alt="Profile" class="w-8 h-8 rounded-full object-cover">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor"
                                :class="mode === 'light' ? 'text-black' : 'text-white'" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 2a5 5 0 100 10 5 5 0 000-10zm-7 17a7 7 0 0114 0v1H5v-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        @endif
                    </button>
                    <div id="profileDropdown" class="hidden z-50 w-44 bg-white text-black rounded-xl shadow-xl py-3 border border-[#e2d5c1]">
                        <a href="/edit" class="block px-4 py-2 text-sm hover:bg-[#f3e6d3] hover:text-[#8a6c50] transition duration-200">Edit Profile</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="block px-4 py-2 text-sm hover:bg-[#f3e6d3] hover:text-[#b14c3c] transition duration-200">Logout</a>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="px-5 py-2 text-sm font-semibold border border-current rounded-full hover:bg-current hover:text-white transition-all duration-300">
                    Login →
                </a>
            @endauth
        </div>

        {{-- Hamburger --}}
        <div class="lg:hidden ml-2">
            <button @click="open = !open" class="focus:outline-none" aria-label="Toggle menu">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                </svg>
                <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-7 w-7"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>

</header>
