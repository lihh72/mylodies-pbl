@props(['action', 'fields' => [], 'submitText', 'googleText', 'linkText', 'linkRoute'])

<div
    class="bg-cobawarna backdrop-blur-md border border-white/20 rounded-2xl shadow-lg p-10 w-full md:w-1/2 animate-fade-in-up">
    <form method="POST" action="{{ $action }}" class="flex flex-col gap-6">
        @csrf

        @foreach ($fields as [$field, $type, $label])
            <x-input :field="$field" :type="$type" :label="$label" />
        @endforeach

        <x-button :text="$submitText" />
        <x-login-google-button :text="$googleText" />

        <p class="text-center text-sm mt-4">
            {{ $slot }}
            <a href="{{ $linkRoute }}" class="text-indigo-600 underline">{{ $linkText }}</a>
        </p>
    </form>
</div>
