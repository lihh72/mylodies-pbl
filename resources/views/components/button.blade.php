@props([
    'text' => 'Submit', // default text kalau tidak diisi
])

<div class="relative inline-flex items-center justify-center group w-full">
    <!-- Efek gradient dan blur tetap di belakang tombol -->
    <div
        class="absolute inset-0 duration-1000 opacity-60 transition-all bg-gradient-to-r from-indigo-500 via-pink-500 to-yellow-400 rounded-xl blur-lg filter group-hover:opacity-100 group-hover:duration-200">
    </div>

    <!-- Tombol dengan gaya utama button-jadi -->
    <button type="submit"
        class="relative inline-flex items-center justify-center gap-2 bg-amber-200 hover:bg-amber-300 text-black font-semibold py-3 px-8 transition duration-200 border-2 border-black w-full rounded-full">
        {{ $text }}
        <svg aria-hidden="true" viewBox="0 0 10 10" height="10" width="10" fill="none"
            class="mt-0.5 ml-2 -mr-1 stroke-black stroke-2">
            <path d="M0 5h7" class="transition opacity-0 group-hover:opacity-100"></path>
            <path d="M1 1l4 4-4 4" class="transition group-hover:translate-x-[3px]"></path>
        </svg>
    </button>
</div>
