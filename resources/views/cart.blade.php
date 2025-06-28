@extends('layouts.app')

@section('title', 'MyLodies - Product')
@section('body_class', 'bg-[#f9f6f1] font-sans text-[#3b2f28] relative overflow-x-hidden')
@section('loading_screen', true)

<!-- Decorative Background -->
<div class="absolute -top-32 -left-32 w-96 h-96 rounded-full bg-[#f5e5d0] blur-3xl opacity-30"></div>
<div class="absolute top-0 right-0 w-80 h-80 rounded-bl-full bg-gradient-to-tr from-[#b49875]/30 to-transparent"></div>

<div class="min-h-screen flex flex-col">
    <x-navbar />

    <!-- Main -->
       <main class="flex-1 flex items-center justify-center">
        <div class="max-w-7xl w-full mx-auto px-8 py-12 grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-12 relative pt-32">
            <section class="space-y-14">
                <div class="relative rounded-[2rem] border border-[#decdb5] bg-[#fcf8f4] p-10 shadow-2xl">
                    <h2 class="text-3xl font-extrabold mb-6">Your Rental Items</h2>
                    <livewire:cart-component />
                </div>
            </section>

            <aside class="bg-white rounded-3xl shadow-xl border border-[#d9cbb8] p-8 sticky top-32 self-start space-y-6">
                <h3 class="text-xl font-extrabold flex items-center gap-2">
                    <i class="fa-solid fa-receipt text-[#b49875]"></i> Summary
                </h3>
                <livewire:cart-summary-component />

                <form method="POST" action="{{ route('order.storeFromCart') }}">
                    @csrf
                    <label for="notes" class="block text-sm font-semibold mb-2">Notes (optional)</label>
                    <textarea id="notes" name="notes" rows="4"
                              class="w-full bg-[#fffdf9] border border-[#eadbc3] rounded-xl p-4 text-sm shadow-inner focus:ring-2 focus:ring-[#d6bfa4] focus:outline-none resize-none mb-6"
                              placeholder="Add delivery info or special instructions…"></textarea>

                    <button type="submit"
                            class="w-full py-4 rounded-full font-bold text-white bg-gradient-to-r from-[#b49875] to-[#8a7a6a] hover:opacity-90 shadow-lg text-lg transition-all">
                        Proceed to Payment
                    </button>
                </form>
            </aside>
        </div>
    </main>
    


</body>

