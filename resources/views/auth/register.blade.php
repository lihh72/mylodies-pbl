<x-auth title="Daftar Rental Alat Musik">
    <x-logo>
        <p class="mb-4 text-2xl md:text-3xl font-serif leading-snug text-black">Make Your</p>
        <h1 class="text-4xl md:text-5xl font-serif font-semibold leading-snug text-black">MyLodies</h1>
        <p class="mt-4 text-2xl md:text-3xl font-serif leading-snug text-black">Account!!</p>
    </x-logo>

    <x-auth-form :action="route('register')" :fields="[
        ['name', 'text', 'Full Name'],
        ['email', 'email', 'Email'],
        ['password', 'password', 'Password'],
        ['password_confirmation', 'password', 'Confirm Password'],
    ]" submitText="Sign Up" googleText="Sign Up With Google"
        linkText="Sign In" :linkRoute="route('login')">
        Already have an account?
    </x-auth-form>

</x-auth>
