<x-auth title="Login and Rental Music Instruments">
    <x-logo>
        <h1 class="mb-4 text-4xl md:text-5xl font-serif leading-snug text-black">Login and Rental!</h1>
        <p class="text-2xl md:text-3xl font-serif leading-snug text-black">your favorite</p>
        <p class="text-2xl md:text-3xl font-serif leading-snug text-black mt-4">music instruments</p>
    </x-logo>

    <div
        class="bg-cobawarna/70 backdrop-blur-md border border-white/20 rounded-2xl shadow-lg p-10 w-full md:w-1/2 animate-fade-in-up">
        <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-6">
            @csrf

            @foreach ([['email', 'email', 'Email'], ['password', 'password', 'Password']] as [$field, $type, $label])
                <x-input :field="$field" :type="$type" :label="$label" />
            @endforeach

            <x-button text="Sign In" />
            <x-login-google-button text="Sign In With Google" />
            <p class="text-center text-sm mt-4">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-indigo-600 underline">Sign Up</a>
            </p>
        </form>
    </div>
    </x-auth>
