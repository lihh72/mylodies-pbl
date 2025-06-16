@extends('layouts.app')

@section('title', '403 – Access Denied')
@section('body_class', 'overflow-hidden bg-gradient-to-br from-[#fef8f2] via-[#f9e5c9] to-[#ecd3b3] text-[#5a4633]')

@section('content')
<section class="relative min-h-screen flex flex-col items-center justify-center px-6 text-center">

    {{-- Glow Bulatan Artistik --}}
    <div class="absolute w-[80vw] h-[80vw] bg-[#b49875]/15 rounded-full blur-[160px] top-[30%] left-[10%] z-0"></div>
    <div class="absolute w-[60vw] h-[60vw] bg-[#f9e5c9]/20 rounded-full blur-[130px] bottom-[-10%] right-[-10%] z-0"></div>
    <div class="absolute inset-0 bg-[url('{{ asset('images/texture-noise.png') }}')] opacity-5 bg-cover z-0"></div>
    <div id="particles-js" class="absolute inset-0 z-0 pointer-events-none"></div>

    {{-- Floating Notes Canvas --}}
    <canvas id="floating-notes" class="absolute inset-0 w-full h-full pointer-events-none z-0"></canvas>

    {{-- Konten Utama --}}
    <div class="relative z-10 max-w-3xl animate-fade-in-up">
        <h1 class="text-[5rem] sm:text-[7rem] font-black text-transparent bg-clip-text bg-gradient-to-br from-[#a37750] via-[#b49875] to-[#f9e5c9] animate-text-gradient drop-shadow-[0_2px_4px_rgba(0,0,0,0.25)]">
            403
        </h1>

        <h2 class="text-2xl sm:text-3xl font-semibold tracking-wide text-[#5a4633] mt-4 drop-shadow-sm">
            Stage Not Accessible
        </h2>

        <p class="mt-4 text-[#4a3a29] text-base sm:text-lg leading-relaxed max-w-xl mx-auto drop-shadow-sm">
            This part of the concert is invitation-only.<br>
            You don’t have permission to enter this movement.
        </p>

        <a href="{{ url('/') }}"
           class="inline-block mt-8 px-8 py-3 rounded-full bg-[#b49875] text-white font-semibold tracking-wide hover:bg-[#a78262] transition hover:scale-105 shadow-md">
            Return to Main Stage →
        </a>
    </div>

    {{-- Echo --}}
    <div class="absolute bottom-8 text-sm italic text-[#bca68a] opacity-30 animate-ghost-pulse select-none">
        access fades... fades...
    </div>
</section>

{{-- Style Animasi --}}
<style>
    @keyframes fade-in-up {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    .animate-fade-in-up {
        animation: fade-in-up 1s ease-out forwards;
    }

    @keyframes text-gradient {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    .animate-text-gradient {
        background-size: 200% 200%;
        animation: text-gradient 6s ease-in-out infinite;
    }

    @keyframes ghost-pulse {
        0%, 100% { opacity: 0.2; transform: translateY(0); }
        50% { opacity: 0.5; transform: translateY(-4px); }
    }
    .animate-ghost-pulse {
        animation: ghost-pulse 4s ease-in-out infinite;
    }
</style>

{{-- Partikel & Floating Notes --}}
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
    particlesJS("particles-js", {
        particles: {
            number: { value: 35 },
            color: { value: "#b49875" },
            shape: { type: "circle" },
            opacity: { value: 0.1 },
            size: { value: 2 },
            move: { enable: true, speed: 0.6 }
        },
        interactivity: {
            events: { onhover: { enable: false } }
        },
        retina_detect: true
    });

    // Floating Notes Canvas
    const canvas = document.getElementById('floating-notes');
    const ctx = canvas.getContext('2d');
    resizeCanvas();

    window.addEventListener('resize', resizeCanvas);

    const notes = ['♯','𝄞','♭','𝄐','♬','𝄢'];
    const noteObjs = [];

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        noteObjs.length = 40;
        for (let i = 0; i < noteObjs.length; i++) {
            noteObjs[i] = {
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                size: 16 + Math.random() * 10,
                speed: 0.2 + Math.random() * 0.4,
                symbol: notes[Math.floor(Math.random() * notes.length)]
            };
        }
    }

    function drawNotes() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        for (let note of noteObjs) {
            ctx.font = `${note.size}px serif`;
            ctx.fillStyle = `rgba(90, 70, 50, 0.08)`;
            ctx.fillText(note.symbol, note.x, note.y);
            note.y += note.speed;
            if (note.y > canvas.height) {
                note.y = -note.size;
                note.x = Math.random() * canvas.width;
            }
        }
        requestAnimationFrame(drawNotes);
    }

    drawNotes();
</script>
@endsection
