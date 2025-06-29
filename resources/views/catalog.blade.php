@extends('layouts.app')

@section('title', 'MyLodies - Product')
@section('bg-[#fef8f2] text-[#5a4a3b] font-sans')

@section('content')
    <section id="rentals" class="light-stage bg-gradient-to-b from-[#fff8f2] to-[#f9f3ea] py-28 relative overflow-hidden">
        <!-- Background noise and decorations -->
        <div class="absolute inset-0 pointer-events-none">
            <img src="{{ asset('images/texture-noise.png') }}" class="w-full h-full object-cover opacity-5" alt="Texture">
        </div>
        <div class="absolute -top-10 -left-10 w-64 h-64 bg-[#f0e1ce] opacity-30 rounded-full blur-3xl pointer-events-none animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-40 h-40 bg-[#e9d4bd] opacity-20 rounded-full blur-2xl pointer-events-none"></div>

        <div class="max-w-8xl mx-auto px-6 relative z-10">
            
            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mb-14">
                @foreach([
                    ['icon' => 'keyboard', 'label' => 'Keyboards'],
                    ['icon' => 'guitar', 'label' => 'Guitars'],
                    ['icon' => 'music', 'label' => 'Aerophones'],
                    ['icon' => 'drum', 'label' => 'Traditional'],
                    ['icon' => 'heart', 'label' => 'Favorites']
                ] as $filter)
                    <button @click="category = '{{ $filter['label'] }}'"
                        class="flex items-center gap-3 px-5 py-3 rounded-full border border-[#d6b896] bg-gradient-to-r from-[#f6e8d6] to-[#d6b896] text-[#5a4a3b] text-sm font-medium transition-all transform hover:scale-105 shadow-lg hover:shadow-2xl focus:outline-none"
                        :class="{ 'ring-2 ring-[#b49875]': category === '{{ $filter['label'] }}' }">
                        <i class="fas fa-{{ $filter['icon'] }} text-[#b49875]"></i>
                        <span>{{ $filter['label'] }}</span>
                    </button>
                @endforeach
                <button @click="category = 'All'" class="px-5 py-3 rounded-full bg-white border border-[#d6b896] text-sm hover:bg-[#f6e8d6] transition">Show All</button>
            </div>

<x-card :products="$products" />
{{ $products->onEachSide(1)->links('components.pagination-custom') }}


        </div>
    </section>

 

</body>
</html>
@endsection