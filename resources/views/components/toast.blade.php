@if (session('success') || session('warning') || session('error') || session('info'))
<div 
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-2"
    class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-sm sm:max-w-md px-4"
>
    <div class="relative w-full flex items-start gap-4 bg-[#fcf8f4] border border-[#e6d5c1] rounded-xl shadow-lg px-5 py-4 text-sm sm:text-base text-[#3b2f28] font-medium tracking-tight">

        <!-- Icon -->
        <div class="mt-0.5 text-lg">
            @if (session('success'))
                <i class="fa-solid fa-check-circle text-green-500"></i>
            @elseif (session('warning'))
                <i class="fa-solid fa-circle-exclamation text-yellow-500"></i>
            @elseif (session('error'))
                <i class="fa-solid fa-xmark-circle text-red-500"></i>
            @elseif (session('info'))
                <i class="fa-solid fa-info-circle text-blue-500"></i>
            @endif
        </div>

        <!-- Message -->
        <div class="flex-1">
            {!! session('success') ?? session('warning') ?? session('error') ?? session('info') !!}
        </div>

        <!-- Close -->
        <button @click="show = false" class="text-xl leading-none text-[#b49875] hover:text-[#8c6a4f] focus:outline-none">
            &times;
        </button>

        <!-- Bottom Bar -->
        <div class="absolute bottom-0 left-0 h-1 w-full bg-gradient-to-r from-[#b49875] via-[#d2ab7c] to-[#f9e5c9] animate-[shrink_4s_linear_forwards] rounded-b-xl"></div>
    </div>
</div>
@endif