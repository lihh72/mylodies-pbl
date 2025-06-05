@if ($paginator->hasPages())
    <nav class="flex justify-center mt-8">
        <ul class="inline-flex items-center space-x-2 text-sm font-medium rounded-full bg-white p-2 shadow-md border border-[#e6d8c4]">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-1 text-[#b49875] opacity-50 cursor-not-allowed">&laquo;</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-3 py-1 text-[#b49875] hover:bg-[#f9e5c9] rounded-full transition">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="px-3 py-1 text-gray-400">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-3 py-1 bg-[#b49875] text-white rounded-full shadow">{{ $page }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-3 py-1 text-[#b49875] hover:bg-[#f9e5c9] rounded-full transition">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-3 py-1 text-[#b49875] hover:bg-[#f9e5c9] rounded-full transition">&raquo;</a>
                </li>
            @else
                <li class="px-3 py-1 text-[#b49875] opacity-50 cursor-not-allowed">&raquo;</li>
            @endif
        </ul>
    </nav>
@endif
