@props([
    'field' => '',     // nama field (ex: 'email', 'password')
    'type' => 'text',  // tipe input
    'label' => '',     // label tampilannya
])

<div>
    <label for="{{ $field }}" class="block text-lg font-semibold mb-2">
        {{ $label }}
    </label>

    <input 
        type="{{ $type }}" 
        id="{{ $field }}" 
        name="{{ $field }}" 
        @if ($type !== 'password') value="{{ old($field) }}" @endif
        class="bg-cobawarna w-full rounded-full border-2 border-black p-3 focus:outline-none focus:ring-2 focus:ring-amber-400"
    >

    @error($field)
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>
