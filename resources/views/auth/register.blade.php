<x-auth title="Daftar Rental Alat Musik">
    <x-logo>
        <p class="mb-4 text-2xl md:text-3xl font-serif leading-snug text-black">Make Your</p>
        <h1 class="text-4xl md:text-5xl font-serif font-semibold leading-snug text-black">MyLodies</h1>
        <p class="mt-4 text-2xl md:text-3xl font-serif leading-snug text-black">Account!!</p>
    </x-logo>

    <div class="bg-cobawarna/70 backdrop-blur-md border border-white/20 rounded-2xl shadow-lg p-10 w-full md:w-1/2 animate-fade-in-up">
        <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-6">
            @csrf

            @foreach ([['name', 'text', 'Full Name'], ['email', 'email', 'Email'], ['password', 'password', 'Password'], ['password_confirmation', 'password', 'Confirm Password']] as [$field, $type, $label])
                <x-input :field="$field" :type="$type" :label="$label" />
            @endforeach

            <x-login-google-button text="Sign Up With Google"/>
            <x-button text="Sign Up" />
            <p class="text-center text-sm mt-4">
                Already have an account?
                <a href="{{ route('login') }}" class="text-indigo-600 underline">Sign In</a>
            </p>
        </form>
    </div>
</x-layouts.auth>
