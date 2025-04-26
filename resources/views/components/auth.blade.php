<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'MyLodies Auth' }}</title>
    @vite('resources/js/app.js')
</head>
<body class="min-h-screen flex items-center justify-center bg-white relative">
    <div class="aurora-glow pointer-events-none"></div>

    <div class="relative z-10 flex flex-col md:flex-row items-center justify-center w-full max-w-6xl p-8">
        {{ $slot }}
    </div>
</body>
</html>
