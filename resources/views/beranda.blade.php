<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLodies</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans">

    <!-- Navbar -->
    <nav class="bg-[#b49875] flex items-center justify-between px-6 py-4">
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 mr-4">
        </div>
        <ul class="flex space-x-6">
            <li><a href="#" class="text-black font-bold">Home</a></li>
            <li><a href="#" class="text-black font-bold">About Us</a></li>
            <li><a href="#" class="text-black font-bold">Contact</a></li>
        </ul>
        @auth
            <a href="#"
                class="flex items-center border border-black rounded-full px-4 py-1 font-bold hover:bg-black hover:text-white transition">
                Logout →
            </a>
        @else
            <a href="#"
                class="flex items-center border border-black rounded-full px-4 py-1 font-bold hover:bg-black hover:text-white transition">
                Login →
            </a>
        @endauth
    </nav>

    <!-- Hero Section -->
    <section class="relative h-[400px] flex flex-col items-center justify-center bg-cover bg-center text-center"
        style="background-image: url('{{ asset('images/background.png') }}');">
        <h1 class="text-white text-3xl font-bold">Your stage, your sound</h1>
        <h2 class="text-[#5b4526] text-2xl font-bold mt-2">our support</h2>
    </section>

    <!-- Content Section -->
    <section class="flex flex-col md:flex-row items-center justify-between p-10 gap-8">
        <div class="text-2xl font-bold max-w-md text-center md:text-left">
            <p>MyLodies<br>Supporting Great<br>Performances with<br>World-Class Equipment</p>
        </div>
        <div>
            <img src="{{ asset('images/background.png') }}" alt="Instruments" class="h-48 object-contain">
        </div>
    </section>

</body>

</html>
