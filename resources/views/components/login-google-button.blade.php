@props([
    'text' => 'Submit', // Default text jika tidak diisi
])

<div class="relative inline-flex items-center justify-center group w-full">
    <!-- Efek gradient dan blur tetap di belakang tombol -->
    <div
        class="absolute inset-0 rounded-xl bg-gradient-to-r from-indigo-500 via-pink-500 to-yellow-400 blur-lg opacity-60 group-hover:opacity-100 transition-all duration-500">
    </div>

    <!-- Tombol dengan gaya utama button-jadi -->
    <button type="submit"
        class="relative inline-flex items-center justify-center gap-2 bg-neutral-700 hover:bg-neutral-800 text-white font-bold py-3 px-8 rounded-full transition-all duration-500 ease-in-out border-2 border-black w-full">
        
        <!-- Logo Google -->
        <img src="https://fonts.gstatic.com/s/i/productlogos/googleg/v6/24px.svg" alt="Google" class="w-6 h-6 transition-all duration-300 ease-in-out">

        <!-- Teks tombol -->
        {{ $text }}

        <!-- Ikon panah, transisi ke kanan saat hover -->
        <svg aria-hidden="true" viewBox="0 0 10 10" height="10" width="10" fill="none"
            class="mt-0.5 ml-2 -mr-1 stroke-white stroke-2 transition-all duration-300 ease-in-out">
            <!-- Path pertama: garis horizontal -->
            <path d="M0 5h7" class="transition-all opacity-0 group-hover:opacity-100"></path>
            <!-- Path kedua: panah -->
            <path d="M1 1l4 4-4 4" class="transition-all transform group-hover:translate-x-[3px]"></path>
        </svg>
    </button>
</div>
