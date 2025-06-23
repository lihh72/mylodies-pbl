<!-- Loading Screen -->
<div id="loading-screen" class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-gradient-to-br from-[#f9e5c9] via-[#b49875]/20 to-[#fffaf3] transition-opacity duration-700 ease-in-out overflow-hidden">
    <!-- Animated Glow Circles -->
    <div class="absolute w-[600px] h-[600px] bg-[#b49875]/20 rounded-full blur-3xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 animate-pulse-glow"></div>
    <div class="absolute w-[300px] h-[300px] bg-[#f9e5c9]/40 rounded-full blur-2xl top-1/3 left-1/3 animate-pulse-glow2"></div>
    <!-- Animated Music Notes -->
    <div class="absolute left-10 top-1/2 -translate-y-1/2 animate-float-x">
        <svg class="w-12 h-12 text-[#b49875]/70" fill="currentColor" viewBox="0 0 24 24">
            <path d="M9 19V6h13M9 6L2 12l7 6" />
        </svg>
    </div>
    <div class="absolute right-10 top-1/3 animate-float-x2">
        <svg class="w-10 h-10 text-[#b49875]/60" fill="currentColor" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none" />
        </svg>
    </div>
    <!-- Logo dengan efek glow dan zoom-in subtle -->
    <img src="{{ asset('images/logo-background.png') }}" alt="MyLodies Logo"
        class="w-28 h-28 object-contain opacity-0 scale-90 animate-fadeZoom drop-shadow-[0_0_25px_#b49875]" />
    <!-- Teks branding -->
    <p class="mt-2 text-[#b49875] text-lg italic font-light animate-pulse tracking-widest">Crafting timeless harmony...</p>
</div>

<!-- Animasi Custom -->
<style>
  @keyframes fadeZoom {
    0% { opacity: 0; transform: scale(0.9);}
    100% { opacity: 1; transform: scale(1);}
  }
  .animate-fadeZoom { animation: fadeZoom 1.2s cubic-bezier(.4,0,.2,1) forwards; }
  @keyframes pulse-glow {
    0%,100% { opacity: 0.7; }
    50% { opacity: 1; }
  }
  .animate-pulse-glow { animation: pulse-glow 2.5s infinite ease-in-out; }
  @keyframes pulse-glow2 {
    0%,100% { opacity: 0.5; }
    50% { opacity: 0.9; }
  }
  .animate-pulse-glow2 { animation: pulse-glow2 3.2s infinite ease-in-out; }
  @keyframes float-x {
    0%,100% { transform: translateY(-50%) translateX(0);}
    50% { transform: translateY(-50%) translateX(30px);}
  }
  .animate-float-x { animation: float-x 3s ease-in-out infinite; }
  @keyframes float-x2 {
    0%,100% { transform: translateY(0) translateX(0);}
    50% { transform: translateY(10px) translateX(-30px);}
  }
  .animate-float-x2 { animation: float-x2 3.5s ease-in-out infinite; }
  @keyframes eq {
    0%,100% { transform: scaleY(1);}
    50% { transform: scaleY(2.2);}
  }
</style>