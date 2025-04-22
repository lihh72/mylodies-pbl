<div class="bg-cobawarna rounded-2xl shadow-lg p-10 w-full md:w-1/2">
    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-6">
      @csrf
      @php
    $formFields = [
        ['field' => 'email', 'type' => 'email', 'label' => 'Email'],
        ['field' => 'password', 'type' => 'password', 'label' => 'Password'],
    ];
@endphp

@foreach ($formFields as $input)
    <x-input 
        :field="$input['field']" 
        :type="$input['type']" 
        :label="$input['label']" 
    />
@endforeach

  
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
  