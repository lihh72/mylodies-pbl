<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Rental Music Instruments</title>
    @vite('resources/js/app.js')
</head>

<body class="min-h-screen flex items-center justify-center bg-white">

    <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-6xl p-8">
        <x-logo>
            <h1 class="mb-4 text-4xl md:text-5xl font-serif  leading-snug text-black">
                Login and Rental!
            </h1>

            <p class=" text-2xl md:text-3xl font-serif leading-snug text-black">
                your favorite
            </p>

            <p class=" text-2xl md:text-3xl font-serif leading-snug text-black mt-4">
                music instruments<br>
            </p>
        </x-logo>

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
                    <x-input :field="$input['field']" :type="$input['type']" :label="$input['label']" />
                @endforeach


                <x-button text="Sign In" />

                <x-login-google-button text="Sign In With Google"/>

                <p class="text-center text-sm mt-4">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-indigo-600 underline">Sign Up</a>
                </p>
            </form>
        </div>
