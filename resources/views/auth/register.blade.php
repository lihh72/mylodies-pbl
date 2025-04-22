<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Rental Alat Musik</title>
  @vite('resources/js/app.js')
</head>
<body class="min-h-screen flex items-center justify-center bg-white">

  <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-6xl p-8">
    <!-- Logo dan Slogan -->
    <div class="flex flex-col items-center justify-center text-center mb-8 md:mb-0 md:mr-16">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Rental" class="w-25 mb-1" class="w-25 mb-1 select-none"
        oncontextmenu="return false"
        draggable="false">
        <p class="mb-4 text-2xl md:text-3xl font-serif leading-snug text-black">Make Your</p>
        <h1 class="text-4xl md:text-5xl font-serif font-semibold leading-snug text-black">MyLodies</h1>
        <p class="mt-4 text-2xl md:text-3xl font-serif leading-snug text-black">Account!!</p>
    </div>

    <!-- Form Register -->
    <div class="bg-cobawarna rounded-2xl shadow-lg p-10 w-full md:w-1/2">
      <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-6">
        @csrf

        <!-- Name -->
        <div>
          <label for="name" class="block text-lg font-semibold mb-2">Full Name</label>
          <input type="text" id="name" name="name" 
            value="{{ old('name') }}"
            class="bg-cobawarna w-full rounded-full border-2 border-black p-3 focus:outline-none focus:ring-2 focus:ring-amber-400">
          @error('name')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-lg font-semibold mb-2">Email</label>
          <input type="email" id="email" name="email"
            value="{{ old('email') }}"
            class="bg-cobawarna w-full rounded-full border-2 border-black p-3 focus:outline-none focus:ring-2 focus:ring-amber-400">
          @error('email')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-lg font-semibold mb-2">Password</label>
          <input type="password" id="password" name="password" 
            class="bg-cobawarna w-full rounded-full border-2 border-black p-3 focus:outline-none focus:ring-2 focus:ring-amber-400">
          @error('password')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- Confirm Password -->
        <div>
          <label for="password_confirmation" class="block text-lg font-semibold mb-2">Confirm Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" 
            class="bg-cobawarna w-full rounded-full border-2 border-black p-3 focus:outline-none focus:ring-2 focus:ring-amber-400">
          @error('password_confirmation')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- Google Button (non-functional) -->
        <button type="button"
          class="flex items-center justify-center gap-2 bg-neutral-700 hover:bg-neutral-800 text-white font-bold py-3 rounded-full transition duration-200 border-2 border-black">
          <img src="https://fonts.gstatic.com/s/i/productlogos/googleg/v6/24px.svg" alt="Google" class="w-6 h-6">
          Sign Up with Google
        </button>

        <!-- Submit -->
        <button type="submit"
          class="bg-amber-200 hover:bg-amber-300 text-black font-semibold rounded-full py-3 transition duration-200 border-2 border-black">
          Sign Up
        </button>

        <p class="text-center text-sm mt-4">
          Already have an account? 
          <a href="{{ route('login') }}" class="text-indigo-600 underline">Sign In</a>
        </p>
      </form>
    </div>
  </div>

</body>
</html>
