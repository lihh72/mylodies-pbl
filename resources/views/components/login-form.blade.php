<div class="bg-cobawarna rounded-2xl shadow-lg p-10 w-full md:w-1/2">
    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-6">
      @csrf
      <div>
        <label for="email" class="block text-lg font-semibold mb-2">Email</label>
        <input type="text" id="email" name="email" 
          class="bg-cobawarna w-full rounded-full border-2 border-black p-3 focus:outline-none focus:ring-2 focus:ring-amber-400">
      </div>
  
      <div>
        <label for="password" class="block text-lg font-semibold mb-2">Password</label>
        <input type="password" id="password" name="password" 
          class="bg-cobawarna w-full rounded-full border-2 border-black p-3 focus:outline-none focus:ring-2 focus:ring-amber-400">
        <div class="text-right mt-2">
          <a href="#" class="text-sm text-black underline">forgot your password?</a>
        </div>
      </div>
  
      <button type="submit"
        class="bg-amber-200 hover:bg-amber-300 text-black font-semibold rounded-full py-3 transition duration-200 border-2 border-black">
        Sign In
      </button>
  
      <x-login-google-button />
  
      <p class="text-center text-sm mt-4">
        Don't have an account? 
        <a href="{{ route('register') }}" class="text-indigo-600 underline">Sign Up</a>
      </p>
    </form>
  </div>
  