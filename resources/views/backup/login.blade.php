<x-auth title="Login and Rental Music Instruments">
    <x-logo>
        <h1 class="mb-4 text-4xl md:text-5xl font-serif leading-snug text-black">Login and Rental!</h1>
        <p class="text-2xl md:text-3xl font-serif leading-snug text-black">your favorite</p>
        <p class="text-2xl md:text-3xl font-serif leading-snug text-black mt-4">music instruments</p>
    </x-logo>

    <x-auth-form :action="route('login')" :fields="[['email', 'email', 'Email'], ['password', 'password', 'Password']]" submitText="Sign In" googleText="Sign In With Google"
        linkText="Sign Up" :linkRoute="route('register')">
        Don't have an account?
    </x-auth-form>

</x-auth>
