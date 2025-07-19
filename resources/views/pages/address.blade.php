@extends('layouts.app')

@section('title', 'Shipping Address')
@section('body_class', 'bg-[#fdfaf6] text-[#2c1a0f] font-sans pt-[60px] overflow-x-hidden')

@section('content')
<div class="light-stahe relative z-10 w-full max-w-[1280px] mx-auto px-4 md:px-6 py-16">
    <div class="flex flex-col lg:flex-row gap-8 items-start">

        <!-- Sidebar (Sama seperti di settings) -->
       <aside class="w-full lg:w-[280px] shrink-0 bg-white/40 backdrop-blur-lg border border-[#e5d5c2]/40 rounded-3xl shadow-xl px-6 py-10 flex flex-col items-center text-center">
    @if (Auth::user()->profile_picture)
        <img
            src="{{ Str::startsWith(Auth::user()->profile_picture, 'http') 
                ? Auth::user()->profile_picture 
                : '/storage/' . Auth::user()->profile_picture }}"
            alt="Profile Picture"
            class="w-24 h-24 rounded-full object-cover ring-4 ring-[#eee1d2] shadow-md hover:scale-105 transition-transform duration-300" />
    @else
        <i class="bx bxs-user-circle text-[90px] text-[#67574b] drop-shadow-md"></i>
    @endif

    <div class="mt-4 text-lg font-semibold">{{ $user->name ?? 'User' }}</div>
    <div class="text-sm text-[#887466] mb-6">{{ $user->email }}</div>

    <nav class="w-full space-y-2 mt-4">
        @foreach([
            ['/history', 'Rent History', 'bx-history'],
            ['/edit', 'Change Password', 'bx-lock'],
            ['/settings', 'Settings', 'bx-cog'],
            ['/address', 'Shipping Address', 'bx-map'],
        ] as [$url, $label, $icon])
            <a href="{{ url($url) }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
               {{ request()->is(ltrim($url, '/')) ? 'bg-[#ae8e73] text-white shadow' : 'hover:bg-[#e6d8cb]/50 text-[#49392d]' }}
               transition-all duration-300">
                <i class="bx {{ $icon }} text-[18px]"></i> {{ $label }}
            </a>
        @endforeach
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       class="mt-8 text-sm text-[#a08b78] hover:underline">Logout</a>
</aside>


        <!-- Main Content -->
        <main class="w-full flex-1">
            <div class="relative bg-white/40 backdrop-blur-xl border border-[#e5d3c1]/50 rounded-3xl p-12 shadow-2xl overflow-hidden">

                <!-- Accent -->
                <div class="absolute -top-20 -right-20 w-[220px] h-[220px] bg-[#e2ccbc] opacity-30 rounded-full blur-[100px] z-0"></div>

                <h1 class="text-[30px] md:text-[34px] font-bold text-[#3e2f22] mb-10 relative z-10 tracking-wide text-center">
                    Update Shipping Address
                </h1>

                @if(session('success'))
                    <div class="flex items-center gap-3 bg-green-100 border-l-4 border-green-500 text-green-800 px-4 py-3 mb-6 rounded-xl shadow animate-fade-in">
                        <i class="bx bx-check-circle text-xl"></i> {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-800 px-4 py-3 mb-6 rounded-xl shadow">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-800 px-4 py-3 mb-6 rounded-xl shadow">
                        <ul class="space-y-1">
                            @foreach($errors->all() as $error)
                                <li><i class="bx bx-error-circle mr-1"></i>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('address.update') }}" class="space-y-8 relative z-10">
                    @csrf
                    @method('PUT')

                    <!-- Full Address -->
                    <div class="relative">
                        <textarea name="address" id="address" rows="3" required
                            class="peer w-full px-4 pt-6 pb-2 bg-white/30 backdrop-blur-lg border border-[#d5c4b0] text-[#2c1a0f] placeholder-transparent rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#bfa78d] transition-all resize-none"
                            placeholder="Full Address">{{ old('address', $user->address) }}</textarea>
                        <label for="address"
                            class="absolute left-4 top-3 text-sm text-[#7a6654] font-medium transition-all
                            peer-placeholder-shown:top-4 peer-placeholder-shown:text-base
                            peer-placeholder-shown:text-[#a08c79] peer-focus:top-2 peer-focus:text-sm peer-focus:text-[#8f735c]">
                            Full Address
                        </label>
                    </div>

                    <!-- City + Province -->
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="relative flex-1">
                            <input type="text" name="city" id="city" required value="{{ old('city', $user->city) }}"
                                placeholder="City"
                                class="peer w-full px-4 pt-6 pb-2 bg-white/30 border border-[#d5c4b0] text-[#2c1a0f] placeholder-transparent rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#bfa78d]" />
                            <label for="city"
                                class="absolute left-4 top-3 text-sm text-[#7a6654] font-medium transition-all
                                peer-placeholder-shown:top-4 peer-placeholder-shown:text-base
                                peer-placeholder-shown:text-[#a08c79] peer-focus:top-2 peer-focus:text-sm peer-focus:text-[#8f735c]">
                                City
                            </label>
                        </div>

                        <div class="relative flex-1">
                            <input type="text" name="province" id="province" required value="{{ old('province', $user->province) }}"
                                placeholder="Province"
                                class="peer w-full px-4 pt-6 pb-2 bg-white/30 border border-[#d5c4b0] text-[#2c1a0f] placeholder-transparent rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#bfa78d]" />
                            <label for="province"
                                class="absolute left-4 top-3 text-sm text-[#7a6654] font-medium transition-all
                                peer-placeholder-shown:top-4 peer-placeholder-shown:text-base
                                peer-placeholder-shown:text-[#a08c79] peer-focus:top-2 peer-focus:text-sm peer-focus:text-[#8f735c]">
                                Province
                            </label>
                        </div>
                    </div>

                    <!-- Postal + District -->
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="relative flex-1">
                            <input type="text" name="postal_code" id="postal_code" required value="{{ old('postal_code', $user->postal_code) }}"
                                placeholder="Postal Code"
                                class="peer w-full px-4 pt-6 pb-2 bg-white/30 border border-[#d5c4b0] text-[#2c1a0f] placeholder-transparent rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#bfa78d]" />
                            <label for="postal_code"
                                class="absolute left-4 top-3 text-sm text-[#7a6654] font-medium transition-all
                                peer-placeholder-shown:top-4 peer-placeholder-shown:text-base
                                peer-placeholder-shown:text-[#a08c79] peer-focus:top-2 peer-focus:text-sm peer-focus:text-[#8f735c]">
                                Postal Code
                            </label>
                        </div>

                        <div class="relative flex-1">
                            <input type="text" name="district" id="district" required value="{{ old('district', $user->district) }}"
                                placeholder="District"
                                class="peer w-full px-4 pt-6 pb-2 bg-white/30 border border-[#d5c4b0] text-[#2c1a0f] placeholder-transparent rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#bfa78d]" />
                            <label for="district"
                                class="absolute left-4 top-3 text-sm text-[#7a6654] font-medium transition-all
                                peer-placeholder-shown:top-4 peer-placeholder-shown:text-base
                                peer-placeholder-shown:text-[#a08c79] peer-focus:top-2 peer-focus:text-sm peer-focus:text-[#8f735c]">
                                District
                            </label>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="text-center pt-6">
                        <button type="submit"
                            class="group relative inline-flex items-center gap-2 px-8 py-3 rounded-full font-semibold text-sm text-white bg-gradient-to-r from-[#c4a48a] to-[#8c6b59] shadow-md hover:shadow-xl hover:scale-105 transition-transform duration-300">
                            <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity rounded-full"></span>
                            <i class="bx bx-save text-lg"></i> Save Address
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
