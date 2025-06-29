@extends('layouts.app')

@section('title', 'MyLodies - Product')
@section('bg-[#faf5ee] text-[#1e1b16] font-sans antialiased')
@section('loading_screen', true)

@section('content')
  <!-- Hero Section: Cinematic & Creative -->
  <section class="dark-stage relative h-screen bg-[#1e1b16] text-white overflow-hidden flex items-center">
    <!-- Background Video with Cinematic Mask -->
    <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover opacity-20"></video>
    <div class="absolute inset-0 bg-gradient-to-br from-[#1e1b16]/90 to-[#312820]/95 z-10"></div>
  
    <!-- Text Content -->
    <div class="relative z-20 max-w-7xl mx-auto px-6 md:px-12 lg:px-20 w-full grid md:grid-cols-2 items-center gap-20">
      <!-- Left: Heading and CTA -->
      <div>
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight leading-tight text-white mb-6">
          <span class="block text-[#f7e7d7]">We Don’t Just Rent</span>
          <span class="block text-[#b4926d]">We Compose Experiences</span>
        </h1>
        <p class="text-lg text-[#d2c1b2] max-w-lg mb-8">
          From the heart of our studio to your stage — MyLodies brings sound to life with curated instruments for passionate creators.
        </p>
      </div>
  
      <!-- Right: Cinematic Instrument Feature Image with Border -->
      <div class="hidden md:block relative w-full max-w-lg aspect-[3/2] border-4 border-[#574537] rounded-3xl overflow-hidden shadow-2xl">
        <img src="https://www.polibatam.ac.id/wp-content/uploads/2023/05/Gedung-2048x1366.jpg" alt="Creative Instrument" class="w-full h-full object-cover" />
          <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <div class="absolute bottom-0 left-0 bg-gradient-to-t from-[#1e1b16]/90 to-transparent p-4 text-white text-sm font-light tracking-wide">
          Politeknik Negeri Batam - Where The All Start...
        </div>
      </div>
    </div>
  
    <!-- Grain Texture Overlay -->
    <div class="absolute inset-0 z-30 pointer-events-none mix-blend-soft-light opacity-[0.06]"
         style="background-image: url('/images/grain.png'); background-size: cover;"></div>
  </section>

  <section class="light-stage relative bg-[#fff9f1] py-36 overflow-hidden">
    <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-[#a87c5f] opacity-10 rounded-full blur-[150px] -z-10"></div>
    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-[#f7efe1] opacity-20 rounded-full blur-[100px] -z-10"></div>
  
    <div class="max-w-7xl mx-auto px-6">
  <!-- Title -->
  <div class="text-center mb-20">
    <h2 class="text-5xl font-bold text-[#3b2e1c] tracking-tight">Our Impact in Numbers</h2>
    <p class="text-[#5a4e3d] mt-4 text-lg max-w-2xl mx-auto">
      Through every note and transaction, we shape a meaningful journey. Here's a snapshot of our achievements:
    </p>
  </div>

  <!-- Dynamic Layout -->
  <div class="grid md:grid-cols-2 gap-16 relative z-10">
    @foreach ([
      ['+5K', 'Instrument Rentals', 'We have rented out thousands of musical instruments across Indonesia.', 'music-note'],
      ['98%', 'Positive Feedback', 'Customer satisfaction is our top priority.', 'thumbs-up'],
      ['12+', 'Provinces Reached', 'Present in more than 12 provinces and continuing to grow.', 'map'],
      ['24/7', 'Customer Support', 'Our team is ready to help whenever needed.', 'headset']
    ] as [$num, $title, $desc, $icon])

        <div
          x-data="{ visible: false }"
          x-intersect.once="visible = true"
          x-transition:enter="transition-all duration-700 delay-200"
          x-transition:enter-start="opacity-0 translate-y-10"
          x-transition:enter-end="opacity-100 translate-y-0"
          class="flex items-start gap-6 bg-white/60 backdrop-blur-lg border border-[#e5d3c2] shadow-xl rounded-3xl p-8 hover:scale-[1.03] hover:shadow-2xl transition transform duration-500"
        >
          <!-- Icon Circle -->
          <div class="flex-shrink-0 w-14 h-14 flex items-center justify-center bg-[#a87c5f]/10 rounded-full">
            <svg class="w-7 h-7 text-[#a87c5f]" fill="currentColor">
              <use xlink:href="#icon-{{ $icon }}"></use>
            </svg>
          </div>
  
          <div>
            <h3 class="text-4xl font-extrabold text-[#a87c5f] leading-none">{{ $num }}</h3>
            <p class="mt-1 text-lg font-semibold text-[#3b2e1c]">{{ $title }}</p>
            <p class="mt-2 text-sm text-[#5a4e3d]">{{ $desc }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  
    <!-- SVG Icons -->
    <svg style="display: none">
      <symbol id="icon-music-note" viewBox="0 0 24 24"><path d="M9 17.6V3h2v12.6a4 4 0 1 1-2 0Z"/></symbol>
      <symbol id="icon-thumbs-up" viewBox="0 0 24 24"><path d="M2 10h4v12H2zM22 10c0-1.1-.9-2-2-2h-5.2l.3-1.3.1-.6c0-.4-.2-.8-.5-1L13 3 8 8.1V20h9c.8 0 1.5-.5 1.8-1.2l3-7c.1-.3.2-.6.2-.8Z"/></symbol>
      <symbol id="icon-map" viewBox="0 0 24 24"><path d="M9 2 3 5v17l6-3 6 3 6-3V2l-6 3-6-3Zm0 2.3 6 3V20l-6-3V4.3Z"/></symbol>
      <symbol id="icon-headset" viewBox="0 0 24 24"><path d="M12 1a9 9 0 0 0-9 9v8a4 4 0 0 0 4 4h2v-8H6v-4a6 6 0 0 1 12 0v4h-3v8h2a4 4 0 0 0 4-4v-8a9 9 0 0 0-9-9Z"/></symbol>
    </svg>
  </section>
  
  

  <section id="journey" class=" dark-stage relative bg-[#1e1b16] text-white py-36 overflow-hidden">
    <!-- Background Blobs -->
    <img src="/images/blob3.svg" class="absolute top-0 right-0 w-[600px] opacity-10 pointer-events-none animate-float" />
    <img src="/images/blob3.svg" class="absolute bottom-0 left-0 w-[400px] opacity-5 rotate-180 pointer-events-none animate-float-slow" />
  
    <div class="max-w-7xl mx-auto px-6">
      <!-- Heading -->
      <div class="text-center mb-24">
        <h2 class="text-5xl font-bold tracking-tight">Our Journey</h2>
        <p class="text-[#d6c4b3] mt-4 text-lg max-w-2xl mx-auto">Discover how we turned dreams into melodies across the nation.</p>
      </div>
  
      <!-- Timeline Track -->
      <div class="relative">
        <!-- Animated Line -->
        <div class="absolute top-1/2 left-0 right-0 h-[4px] bg-gradient-to-r from-[#b4926d]/0 via-[#b4926d]/60 to-[#b4926d]/0 animate-pulse transform -translate-y-1/2 z-0"></div>
  
        <!-- Scrollable Cards -->
        <div class="flex space-x-20 overflow-x-auto no-scrollbar pb-4 relative z-10">
          @foreach ([['February 2025', 'Kick-Off', 'Focused on concept planning, user research, and forming the development team.', 'lightbulb'],
                    ['March 2025', 'Development Phase', 'Began building core features such as the rental system, music gear catalog, and product detail pages.', 'rocket'],
                    ['April 2025', 'Refinement & Testing', 'Worked on UI/UX improvements, feature testing, and preparation for early implementation and presentation.', 'globe']] as [$year, $title, $desc, $icon])
          <div class="min-w-[260px] flex-shrink-0 text-center transition-all duration-300">
            <!-- Icon Circle -->
            <div class="mx-auto mb-6 w-20 h-20 flex items-center justify-center bg-[#b4926d]/20 border-2 border-[#b4926d] rounded-full shadow-md backdrop-blur-md">
              <svg class="w-8 h-8 text-[#b4926d]" fill="currentColor">
                <use xlink:href="#icon-{{ $icon }}"></use>
              </svg>
            </div>
            <!-- Dot -->
            <div class="w-4 h-4 bg-[#b4926d] rounded-full mx-auto mb-4"></div>
            <!-- Text -->
            <h3 class="text-xl font-semibold">{{ $year }} — {{ $title }}</h3>
            <p class="text-[#d6c4b3] text-sm mt-2 max-w-[220px] mx-auto">{{ $desc }}</p>
          </div>
          @endforeach
        </div>
      </div>
  
      <!-- Inspiring Quote -->
      <div class="mt-24 text-center max-w-xl mx-auto">
        <p class="italic text-[#d6c4b3] text-lg">“We don’t just rent instruments — we build memories, one melody at a time.”</p>
      </div>
  
    <!-- SVG Icons -->
    <svg style="display: none">
      <symbol id="icon-lightbulb" viewBox="0 0 24 24"><path d="M9 21h6v-1H9v1Zm3-20a7 7 0 0 0-4 12.7V17a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3.3A7 7 0 0 0 12 1Z"/></symbol>
      <symbol id="icon-rocket" viewBox="0 0 24 24"><path d="M13 2a9 9 0 0 1 9 9c0 3-1 5-3 7l-1.5 1.5a2 2 0 0 1-2.5.3L12 19.2l-3 3a1 1 0 0 1-1.5-1.3l2.5-2.5L9 15l-2.4.7-2.5-2.5a2 2 0 0 1 .3-2.5L6 8c2-2 4-3 7-3Zm-1 4h2v4h-2V6Z"/></symbol>
      <symbol id="icon-globe" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm1 17.9v-1.9H11v1.9a8 8 0 0 1 2 0ZM4 12c0-.7.1-1.4.3-2H7v4H4.3c-.2-.6-.3-1.3-.3-2Zm16 0c0 .7-.1 1.4-.3 2H17v-4h2.7c.2.6.3 1.3.3 2Zm-8-8a8 8 0 0 1 2 .3V7h-2V4.3ZM8 6h1v4H6.1a7.8 7.8 0 0 1 1.9-4Zm8 0c.8 1.1 1.4 2.5 1.9 4H15V6h1ZM6 14h2v4H7.9A7.9 7.9 0 0 1 6 14Zm10 4h2a8 8 0 0 1-2 2v-2Z"/></symbol>
    </svg>
  </section>
  
  
<section class="relative py-40 bg-[#1e1b16] text-white overflow-hidden">
  <div class="absolute top-0 left-0 w-[800px] h-[800px] bg-gradient-radial from-[#a87c5f]/30 to-transparent rounded-full blur-3xl opacity-30"></div>

  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-24">
      <h2 class="text-5xl font-bold mb-4">The Dreamers Behind the Sound</h2>
      <p class="text-[#c4b4a5] max-w-xl mx-auto text-lg">Each one brings a different note, but together—it's harmony.</p>
    </div>

    <div class="relative grid md:grid-cols-4 sm:grid-cols-2 gap-10">
      @php
  $team = [
    ['name' => 'Lidya Nur Raudhatul', 'role' => 'Designer & Frontend Dev', 'desc' => 'Crafts visuals that sing in silence.', 'img' => '/images/team/lidya.png'],
    ['name' => 'Bunga Citra Lestari S.', 'role' => 'designer & Frontend Dev', 'desc' => 'Brings melody to motion on screen.', 'img' => '/images/team/bunga.webp'],
    ['name' => 'Birgita Anastasya H.', 'role' => 'Designer & Frontend Dev', 'desc' => 'Orchestrates user flow with elegance.', 'img' => '/images/team/birgita.webp'],
    ['name' => 'M. Falih Hilmy', 'role' => 'Backend Engineer', 'desc' => 'Builds the backbone of performance.', 'img' => '/images/team/falih.png'],
  ];
@endphp

      @foreach ($team as $member)
      <div class="group relative bg-[#2c241d] border border-[#3e342c] rounded-3xl p-8 overflow-hidden shadow-xl hover:shadow-2xl transition transform hover:-translate-y-2 perspective">
        <div class="absolute inset-0 pointer-events-none">
          <svg class="absolute top-0 right-0 w-20 h-20 opacity-10" fill="none" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="40" stroke="#b4926d" stroke-dasharray="6 10"/>
          </svg>
        </div>
  
          <!-- Avatar image -->
        <div class="w-24 h-24 mx-auto mb-6 rounded-full overflow-hidden border-4 border-[#b4926d] shadow-lg group-hover:scale-110 transition duration-300">
          <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover" />
        </div>

        <!-- Info -->
        <h3 class="text-xl font-semibold mb-1">{{ $member['name'] }}</h3>
        <p class="text-[#d6c4b3] text-sm mb-4">{{ $member['role'] }}</p>
        <p class="text-[#aa9886] text-xs italic">“{{ $member['desc'] }}”</p>

        <!-- Shine -->
        <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- Parallax Blob -->
  <img src="/images/blob3.svg" class="absolute -bottom-10 left-1/2 -translate-x-1/2 w-[600px] opacity-5 animate-float-slow pointer-events-none" />

  <style>
    .animate-float-slow {
      animation: floatSlow 12s ease-in-out infinite;
    }
    @keyframes floatSlow {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-20px); }
    }
  </style>
</section>
  

</body>
</html>
@endsection