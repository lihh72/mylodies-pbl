<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Rental Alat Musik</title>
    @vite('resources/js/app.js')
  </head>
  <body class="min-h-screen flex items-center justify-center bg-white">
    <div class="min-h-screen flex items-center justify-center bg-white">
      <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-6xl p-8">
        
        <!-- KIRI: Logo & Slogan -->
        <div class="flex flex-col items-center justify-center text-center mb-8 md:mb-0 md:mr-16">
          <img src="{{ asset('images/logo.jpg') }}" alt="Logo Rental" class="w-32 mb-8">
          <h1 class="text-4xl md:text-5xl font-serif font-semibold leading-snug text-black">
            Masuk dan Rental!
          </h1>
          <p class="mt-4 text-2xl md:text-3xl font-serif leading-snug text-black">
            alat musik<br>favorit kamu
          </p>
        </div>
  
        <!-- KANAN: Form Login -->
        <div class="bg-cobawarna rounded-2xl shadow-lg p-10 w-full md:w-1/2">
  
          <!-- Status Sesi (misal login sukses atau gagal) -->
          <x-auth-session-status class="mb-4" :status="session('status')" />
  
          <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-6">
            @csrf
  
            <!-- Email -->
            <div>
              <label for="email" class="block text-lg font-semibold mb-2">Email</label>
              <input type="email" id="email" name="email" placeholder="Email"
                value="{{ old('email') }}"
                required autofocus autocomplete="username"
                class="w-full rounded-full border-2 border-black p-3 focus:outline-none focus:ring-2 focus:ring-amber-400">
              @error('email')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
              @enderror
            </div>
  
            <!-- Password -->
            <div>
              <label for="password" class="block text-lg font-semibold mb-2">Kata Sandi</label>
              <input type="password" id="password" name="password" placeholder="Kata Sandi"
                required autocomplete="current-password"
                class="w-full rounded-full border-2 border-black p-3 focus:outline-none focus:ring-2 focus:ring-amber-400">
              <div class="text-right mt-2">
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}" class="text-sm text-black underline">Lupa Kata Sandi?</a>
                @endif
              </div>
              @error('password')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
              @enderror
            </div>
  
            <!-- Remember Me -->
            <div class="block">
              <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember"
                  class="rounded border-gray-300 text-amber-500 shadow-sm focus:ring-amber-400">
                <span class="ml-2 text-sm text-gray-700">Ingat saya</span>
              </label>
            </div>
  
            <!-- Tombol Masuk -->
            <button type="submit"
              class="bg-amber-200 hover:bg-amber-300 text-black font-semibold rounded-full py-3 transition duration-200 border-2 border-black">
              Masuk
            </button>
  
            
  
            <!-- Daftar -->
            <p class="text-center text-sm mt-4">
              Belum punya akun?
              <a href="{{ route('register') }}" class="text-indigo-600 underline">Daftar</a>
            </p>
          </form>
        </div>
      </div>
    </div>

  