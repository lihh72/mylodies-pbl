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
        <x-logo>
            <p class="mb-4 text-2xl md:text-3xl font-serif leading-snug text-black">Make Your</p>
            <h1 class="text-4xl md:text-5xl font-serif font-semibold leading-snug text-black">MyLodies</h1>
            <p class="mt-4 text-2xl md:text-3xl font-serif leading-snug text-black">Account!!</p>
        </x-logo>

        <!-- Form Register -->
        <div class="bg-cobawarna rounded-2xl shadow-lg p-10 w-full md:w-1/2">
            <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-6">
                @csrf

                @php
                    $formFields = [
                        ['field' => 'name', 'type' => 'text', 'label' => 'Full Name'],
                        ['field' => 'email', 'type' => 'email', 'label' => 'Email'],
                        ['field' => 'password', 'type' => 'password', 'label' => 'Password'],
                        ['field' => 'password_confirmation', 'type' => 'password', 'label' => 'Confirm Password'],
                    ];
                @endphp

                @foreach ($formFields as $input)
                    <x-input :field="$input['field']" :type="$input['type']" :label="$input['label']" />
                @endforeach


                <x-login-google-button text="Sign Up With Google"/>
                <!-- Submit -->
                <x-button text="Sign Up" />


                <p class="text-center text-sm mt-4">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-indigo-600 underline">Sign In</a>
                </p>
            </form>
        </div>
    </div>

</body>

</html>
