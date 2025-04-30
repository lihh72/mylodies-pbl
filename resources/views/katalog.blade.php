<!-- ... (head tetap sama) -->
<style>
    .active-filter {
        background-color: #F4E6D4; /* atau ganti dengan bg-gray-200 jika lebih netral */
        border-radius: 0.5rem;
        padding: 0.25rem 0.5rem;
    }
</style>
</head>

<body class="bg-white">
    <!-- Header -->
    <!-- (tidak berubah) -->

    <!-- Filters -->
    <section
        class="flex justify-center gap-16 py-8 px-4 max-w-6xl mx-auto text-[#3A3A3A] text-sm font-semibold font-sans">
        @foreach ([['icon' => 'keyboard', 'label' => 'Keyboard'], ['icon' => 'guitar', 'label' => 'Guitar'], ['icon' => 'music', 'label' => 'Aerophones'], ['icon' => 'drum', 'label' => 'Traditional Instruments'], ['icon' => 'heart', 'label' => 'Favorites']] as $filter)
            <button type="button" data-filter="{{ $filter['label'] }}"
                class="filter-btn flex flex-col items-center space-y-2 focus:outline-none"
                aria-label="Filter by {{ $filter['label'] }}">
                <i class="fas fa-{{ $filter['icon'] }} fa-2x"></i>
                <span>{{ $filter['label'] }}</span>
            </button>
        @endforeach
    </section>

    <!-- Carousel -->
    <!-- (tidak berubah) -->

    <!-- Script untuk aktifkan filter -->
    <script>
        const buttons = document.querySelectorAll('.filter-btn');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                // Hapus semua class aktif dulu
                buttons.forEach(b => b.classList.remove('active-filter'));

                // Tambahkan class aktif pada tombol yang diklik
                btn.classList.add('active-filter');
            });
        });
    </script>
</body>
