@extends('layouts.app')

@section('content')
<div class="bg-white min-h-screen">
    <!-- Navbar -->
    <div class="bg-[#b19d87] text-black py-4 px-6 flex items-center justify-between shadow">
        <div class="flex items-center space-x-6">
            <img src="/logo.png" alt="Logo" class="h-6" />
            <a href="#" class="font-semibold">Home</a>
            <a href="#" class="font-semibold">About Us</a>
            <a href="#" class="font-semibold">Contact</a>
        </div>
        <div class="flex items-center space-x-4">
            <i class="fas fa-bell"></i>
            <i class="fas fa-shopping-cart"></i>
            <i class="fas fa-user-circle"></i>
        </div>
    </div>

    <!-- Title -->
    <div class="text-center mt-8">
        <h1 class="text-3xl font-bold border-2 border-purple-500 inline-block px-6 py-2">Product Detail</h1>
    </div>

    <!-- Product Card -->
    <div class="bg-[#f6ecdf] mt-10 mx-auto max-w-5xl p-10 rounded-xl flex gap-10 items-center">
        <div class="w-1/2 flex justify-center">
            <img src="/images/sonic-grey-fender.png" alt="Sonic grey Fender" class="rounded-lg w-72">
        </div>
        <div class="w-1/2">
            <h2 class="text-3xl font-bold">Sonic grey Fender</h2>
            <p class="text-xl text-gray-600 mt-2">IDR 100.000 <span class="text-base">/ Hari</span></p>

            <div class="mt-6">
                <label class="block mb-1 font-medium">Rent Date</label>
                <div class="relative">
                    <input type="date" class="w-full border border-black rounded-xl p-2 pr-10">
                    <i class="fas fa-calendar absolute right-3 top-3 text-gray-500"></i>
                </div>
            </div>

            <div class="mt-4">
                <label class="block mb-1 font-medium">Return Date</label>
                <div class="relative">
                    <input type="date" class="w-full border border-black rounded-xl p-2 pr-10">
                    <i class="fas fa-calendar absolute right-3 top-3 text-gray-500"></i>
                </div>
            </div>

            <div class="mt-4">
                <label class="block mb-1 font-medium">Pickup Method</label>
                <div class="relative">
                    <select class="w-full border border-black rounded-xl p-2 appearance-none">
                        <option>choose method pickup</option>
                    </select>
                    <i class="fas fa-truck absolute left-3 top-3 text-gray-500"></i>
                </div>
            </div>

            <button class="mt-6 bg-[#b19d87] text-black px-5 py-2 rounded-xl font-semibold flex items-center hover:bg-[#a48a71]">
                <i class="fas fa-paper-plane mr-2"></i> Rent Now
            </button>
        </div>
    </div>
</div>
@endsection
