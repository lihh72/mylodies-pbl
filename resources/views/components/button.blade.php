@props([
    'text' => 'Submit', // default text kalau tidak diisi
])

<button 
    type="submit"
    class="bg-amber-200 hover:bg-amber-300 text-black font-semibold rounded-full py-3 transition duration-200 border-2 border-black"
>
    {{ $text }}
</button>
