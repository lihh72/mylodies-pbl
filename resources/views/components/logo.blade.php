<div class="flex flex-col items-center justify-center text-center mb-8 md:mb-0 md:mr-16 animate-fade-in-up relative">
    <img src="{{ asset('images/logo.png') }}" alt="Logo Rental" class="w-64 h-auto mb-1 select-none"
        oncontextmenu="return false" draggable="false" style="pointer-events: none; user-select: none;">

    {{ $slot }}

    <!-- Tombol Scroll dengan SVG Panah ke Bawah -->
    <button id="scroll-button" class="md:hidden mt-6 px-6 py-3 bg-gradient-to-r from-indigo-600 to-blue-500 text-white rounded-full shadow-lg transform transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl focus:outline-none animate-pulse">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
</div>
