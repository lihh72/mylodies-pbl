<!-- Navbar -->
<header x-data="{ open: false }" class="fixed top-0 w-full z-50 bg-gradient-to-r from-[#b49875]/90 to-[#9c7b59]/90 shadow-lg backdrop-blur-md transition-transform duration-700 ease-in-out animate-fade-in-down">
  <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 py-4 flex justify-between items-center relative">

    <!-- Left Side: Navigation & Logo -->
    <div class="flex items-center space-x-6">
      
      <!-- Logo -->
      <a href="{{ route('landing') }}" class="flex items-center space-x-3 shrink-0">
        <img src="{{ asset('images/logo.png') }}" alt="MyLodies Logo" class="h-9 drop-shadow-lg hover:scale-110 transition duration-300">
        <span class="text-xl font-bold text-white tracking-wide hover:text-[#f9e5c9] transition">MyLodies</span>
      </a>
      
      
      <!-- Navigation (Desktop Only) -->
      <nav class="hidden lg:flex items-center space-x-6">
        @foreach (['Home', 'About', 'Rentals', 'FAQ', 'Contact'] as $menu)
          <a href="/{{ strtolower($menu) }}"
             class="group relative inline-flex items-center gap-1 text-white font-medium transition-all duration-300 ease-in-out hover:text-black">
            <svg class="w-4 h-4 text-white group-hover:text-[#f9e5c9] transition-transform group-hover:rotate-12 duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v3m6.364 1.636l-2.121 2.121M21 12h-3m-1.636 6.364l-2.121-2.121M12 21v-3m-6.364-1.636l2.121-2.121M3 12h3m1.636-6.364l2.121 2.121" />
            </svg>
            {{ $menu }}
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
          </a>
        @endforeach
      </nav>

      

    </div>

    <!-- Search & Hamburger (Mobile Only) -->
    <div class="flex items-center gap-2 lg:hidden ml-auto">

      <!-- Search Bar (Mobile) -->
      <div x-data="{ focus: false, query: '' }" class="relative transition-all duration-300">
        <input type="text" placeholder="Search..."
               x-model="query"
               @focus="focus = true"
               @blur="focus = query !== ''"
               :class="(focus || query !== '') ? 'w-[180px]' : 'w-[130px] hover:w-[160px]'"
               class="bg-white/20 backdrop-blur-sm text-white placeholder-white/70 rounded-full pl-8 pr-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#f9e5c9] focus:bg-white/30 transition-all duration-300">
        <svg class="w-4 h-4 absolute left-2 top-1/2 transform -translate-y-1/2 text-white/80" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1116.65 2.5a7.5 7.5 0 010 14.15z"/>
        </svg>
      </div>

      <!-- Shopping Cart Icon (Mobile) -->
      <a href="{{ route('cart') }}" class="text-white relative">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-6 h-6 text-white hover:text-[#f9e5c9] transition duration-300"
             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 3h2l.4 2M7 13h10l4-8H6.4M7 13L5.4 5M7 13l-2 9m14-9l2 9m-6-4a1 1 0 11-2 0 1 1 0 012 0zm-6 0a1 1 0 11-2 0 1 1 0 012 0z"/>
        </svg>
        <span class="absolute -top-1.5 -right-1.5 bg-red-500 text-white text-[10px] font-semibold rounded-full px-1 py-0.5 shadow-md">2</span>
      </a>

      <!-- Hamburger -->
      <button @click="open = !open" class="text-white focus:outline-none">
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
        </svg>
        <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Right Section (Desktop Only) -->
    <div class="hidden lg:flex items-center gap-3">
      

      <!-- Desktop Search -->
      <div x-data="{ focus: false, query: '' }" class="relative text-white">
        <input type="text" placeholder="Search..." 
               x-model="query"
               @focus="focus = true" 
               @blur="focus = query !== ''"
               class="bg-white/20 backdrop-blur-sm text-white placeholder-white/70 rounded-full pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#f9e5c9] focus:bg-white/30 transition-all duration-300"
               :class="(focus || query !== '') ? 'w-60' : 'w-40 hover:w-60'">
        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-white/80" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1116.65 2.5a7.5 7.5 0 010 14.15z"/>
        </svg>
      </div>

      <!-- Shopping Cart Icon -->
      <a href="/cart" class="relative group">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-6 h-6 text-white group-hover:text-[#f9e5c9] transition duration-300 drop-shadow-sm"
             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 3h2l.4 2M7 13h10l4-8H6.4M7 13L5.4 5M7 13l-2 9m14-9l2 9m-6-4a1 1 0 11-2 0 1 1 0 012 0zm-6 0a1 1 0 11-2 0 1 1 0 012 0z"/>
        </svg>
        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-semibold rounded-full px-1.5 py-0.5 shadow-md">2</span>
      </a>

      <!-- Auth Links -->
      @auth
        <a href="#" class="px-5 py-2 text-sm font-semibold border border-white text-white rounded-full hover:bg-white hover:text-[#b49875] transition-all duration-300 shadow-md hover:shadow-lg">
          Logout →
        </a>
      @else
        <a href="{{ route('login') }}" class="px-5 py-2 text-sm font-semibold border border-white text-white rounded-full hover:bg-white hover:text-[#b49875] transition-all duration-300 shadow-md hover:shadow-lg">
          Login →
        </a>
      @endauth
    </div>
  </div>

  <!-- Mobile Menu -->
  <div x-show="open"
       x-transition:enter="transition ease-out duration-300"
       x-transition:enter-start="opacity-0 scale-95"
       x-transition:enter-end="opacity-100 scale-100"
       x-transition:leave="transition ease-in duration-200"
       x-transition:leave-start="opacity-100 scale-100"
       x-transition:leave-end="opacity-0 scale-95"
       class="lg:hidden bg-[#b49875]/95 backdrop-blur-lg px-6 pt-4 pb-6 space-y-4">

    <!-- Mobile Links -->
    @foreach (['Home', 'About', 'Rentals', 'FAQ', 'Contact'] as $menu)
      <a href="#{{ strtolower($menu) }}" @click="open = false"
         class="block text-white text-base font-medium hover:text-black transition duration-300 ease-in-out">
        {{ $menu }}
      </a>
    @endforeach

    <!-- Mobile Auth -->
    <div class="pt-2">
      @auth
        <a href="#"
           class="block text-white mt-4 px-4 py-2 border border-white rounded-full text-center hover:bg-white hover:text-[#b49875] transition">
          Logout
        </a>
      @else
        <a href="{{ route('login') }}"
           class="block text-white mt-4 px-4 py-2 border border-white rounded-full text-center hover:bg-white hover:text-[#b49875] transition">
          Login
        </a>
      @endauth
    </div>
  </div>
</header>