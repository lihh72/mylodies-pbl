<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    @vite('resources/js/app.js')
</head>

<body class="bg-[#f7f6f3] text-gray-800 font-inter antialiased">

    <div class="flex h-screen overflow-hidden animate-fadeInSlow">

        <!-- Sidebar -->
        <aside
            class="w-64 bg-[#e9e0d2] border-r border-gray-200 flex flex-col justify-between shadow-sm transition-all duration-500">
            <div>
                <!-- Branding -->
                <div class="flex items-center gap-3 px-6 py-5 bg-[#b49875] shadow-inner">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24"></svg>
                    <img src="{{ asset('images/logo-background.png') }}" alt="MyLodies Logo" class="w-8 h-8 object-contain" />
                    <span class="text-white text-lg font-semibold tracking-wide">MyLodies</span>
                </div>

                <!-- Nav -->
                <nav class="mt-8 px-4 space-y-2 text-sm text-gray-700 font-medium">
                    @php
                        $menus = [
                            ['Dashboard', 'M3 12l2-2m0 0l7-7 7 7m-9 2v6m4-6v6m-4 0h4'],
                            ['Instrument Data', 'M9 17v-6h13V7a2 2 0 00-2-2H4a2 2 0 00-2 2v14l4-4h5z'],
                            [
                                'User Data',
                                'M5.121 17.804A5 5 0 0112 15a5 5 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z',
                            ],
                            [
                                'Transaction',
                                'M12 8c-1.333 0-4 .667-4 2s2.667 2 4 2 4 .667 4 2-2.667 2-4 2M12 12v-2m0 10V4',
                            ],
                            [
                                'Notifications',
                                'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 01-6 0v-1',
                            ],
                            [
                                'Report',
                                'M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-6 0h6m-6 0v2m6-2v2M7 5h10M7 9h10M7 13h10',
                            ],
                            [
                                'Setting',
                                'M10.325 4.317a1 1 0 011.35-.936l.4.15a1 1 0 01.53.53l.15.4a1 1 0 01-.936 1.35l-.15.036a8.003 8.003 0 00-3.832 2.012l-.26.26A8.003 8.003 0 004.317 13.7l.036.15a1 1 0 011.35.936l.15-.4a1 1 0 01.53-.53l.4-.15a1 1 0 01.936 1.35l.036.15a8.003 8.003 0 002.012 3.832l.26.26A8.003 8.003 0 0013.7 19.683l.15-.036a1 1 0 01.936-1.35l-.4-.15a1 1 0 01-.53-.53l-.15-.4a1 1 0 01-1.35-.936l-.036-.15a8.003 8.003 0 00-2.012-3.832l-.26-.26A8.003 8.003 0 0010.325 4.317z',
                            ],
                        ];
                    @endphp

                    @foreach ($menus as [$label, $path])
                        <a href="#"
                            class="group flex items-center gap-3 px-3 py-2 rounded-md hover:bg-[#d6c7b5] transition-all duration-300 ease-in-out transform hover:scale-[1.03]">
                            <svg class="w-5 h-5 text-[#b49875] group-hover:text-[#9e7c5f]" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="{{ $path }}" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="group-hover:text-[#9e7c5f]">{{ $label }}</span>
                        </a>
                    @endforeach
                </nav>
            </div>

            <!-- Logout -->
            <div class="px-4 py-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-[#b49875] text-white rounded-full hover:bg-[#9e7c5f] transition duration-150">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M17 16l4-4m0 0l-4-4m4 4H7" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Log Out
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto p-8 bg-gradient-to-br from-[#fcfaf7] to-[#f1ece6] animate-slideUp">

            <!-- Topbar -->
            <header class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
                <div class="flex items-center gap-4">
                    <button class="text-gray-500 hover:text-[#b49875] transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M15 17h5l-1.405-1.405M18 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>
                    <button class="text-gray-500 hover:text-[#b49875] transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M5.121 17.804A5 5 0 0112 15a5 5 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>
                    <span class="bg-[#b49875] text-white px-4 py-1 rounded-full font-medium text-sm">Admin</span>
                </div>
            </header>

            <!-- Welcome Banner -->
            <section
                class="mb-8 p-6 bg-white rounded-xl shadow-md border border-[#e5ded2] relative overflow-hidden transition-all duration-500 hover:shadow-lg hover:scale-[1.01]">
                <div class="relative z-10">
                    <h2 class="text-xl font-bold mb-1">Welcome, Admin 👋</h2>
                    <p class="text-sm text-gray-600">Manage musical instruments, monitor transactions, and analyze user
                        activity with ease.</p>
                </div>
            </section>

            <!-- Status Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $statuses = ['Waiting for Confirmation', 'Waiting for Payment', 'Return Confirmation'];
                @endphp
                @foreach ($statuses as $status)
                    <div
                        class="p-6 bg-white rounded-xl border border-[#e4ded4] shadow-md group hover:shadow-xl transition duration-300 transform hover:-translate-y-1 hover:scale-[1.02]">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-[#f3ede4] flex items-center justify-center group-hover:bg-[#b49875] transition-all duration-300 animate-pulse-slow">
                                <svg class="w-5 h-5 text-[#b49875] group-hover:text-white" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path
                                        d="M12 8c-1.333 0-4 .667-4 2s2.667 2 4 2 4 .667 4 2-2.667 2-4 2M12 12v-2m0 10V4"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Status</p>
                                <p class="font-semibold text-gray-800 group-hover:text-[#b49875] transition">
                                    {{ $status }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </main>
    </div>

</body>

</html>
