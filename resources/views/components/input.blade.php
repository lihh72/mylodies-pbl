@props([
    'field' => '', // nama field (ex: 'email', 'password')
    'type' => 'text', // tipe input
    'label' => '', // label tampilannya
])

<div class="relative">
    <label for="{{ $field }}" class="block text-lg font-semibold mb-2">
        {{ $label }}
    </label>

    <div class="relative">
        <input type="{{ $type }}" id="{{ $field }}" name="{{ $field }}"
            @if ($type !== 'password') value="{{ old($field) }}" @endif
            class="bg-cobawarna w-full rounded-full border-2 border-black p-3 focus:outline-none focus:ring-2 focus:ring-amber-400
                   transition-all duration-500 ease-in-out hover:border-amber-400 hover:bg-amber-50 focus:border-amber-500 pr-10">

        @if ($type === 'password')
            <button type="button"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none"
                onclick="togglePassword('{{ $field }}')">
                <svg id="eye-icon-{{ $field }}" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <svg id="eye-slash-icon-{{ $field }}" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
            </button>
        @endif
    </div>

    @error($field)
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>

@if ($type === 'password')
    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const eyeIcon = document.getElementById(`eye-icon-${fieldId}`);
            const eyeSlashIcon = document.getElementById(`eye-slash-icon-${fieldId}`);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeSlashIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeSlashIcon.classList.add('hidden');
            }
        }
    </script>
@endif
