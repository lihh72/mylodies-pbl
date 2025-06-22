<div class="relative inline-flex items-center justify-center group w-full">
    <div
        class="absolute inset-0 rounded-xl bg-gradient-to-r from-indigo-500 via-pink-500 to-yellow-400 blur-lg opacity-60 group-hover:opacity-100 transition-all duration-500">
    </div>

    <button type="button" onclick="handleGoogleLogin()"
        class="relative inline-flex items-center justify-center gap-2 bg-neutral-700 hover:bg-neutral-800 text-white font-bold py-3 px-8 rounded-full transition-all duration-500 ease-in-out border-2 border-black w-full">

        <img src="https://fonts.gstatic.com/s/i/productlogos/googleg/v6/24px.svg" alt="Google"
            class="w-6 h-6 transition-all duration-300 ease-in-out">

        {{ $text }}

        <svg aria-hidden="true" viewBox="0 0 10 10" height="10" width="10" fill="none"
            class="mt-0.5 ml-2 -mr-1 stroke-white stroke-2 transition-all duration-300 ease-in-out">
            <path d="M0 5h7" class="transition-all opacity-0 group-hover:opacity-100"></path>
            <path d="M1 1l4 4-4 4" class="transition-all transform group-hover:translate-x-[3px]"></path>
        </svg>
    </button>
</div>
