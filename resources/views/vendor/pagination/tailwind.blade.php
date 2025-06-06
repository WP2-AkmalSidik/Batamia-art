<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-6 gap-4">
    <div class="text-sm text-gray-600 dark:text-gray-400">
        @if ($paginator->total() > 0)
            Menampilkan {{ $paginator->firstItem() }} sampai {{ $paginator->lastItem() }} dari {{ $paginator->total() }} hasil
        @else
            Tidak ada data yang ditampilkan
        @endif
    </div>

    <nav class="flex items-center space-x-1 pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button disabled class="px-3 py-2 text-sm font-medium text-gray-500 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-l-lg hover:bg-gray-50 dark:hover:bg-gray-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-200">
                <i class="fas fa-chevron-left mr-1"></i> Previous
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-l-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-chevron-left mr-1"></i> Previous
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-3 py-2 text-sm font-medium text-gray-500 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600">...</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-2 text-sm font-medium text-white bg-amber-600 border border-amber-600 hover:bg-amber-700 transition-colors duration-200">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-r-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                Next <i class="fas fa-chevron-right ml-1"></i>
            </a>
        @else
            <button disabled class="px-3 py-2 text-sm font-medium text-gray-500 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-r-lg hover:bg-gray-50 dark:hover:bg-gray-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-200">
                Next <i class="fas fa-chevron-right ml-1"></i>
            </button>
        @endif
    </nav>
</div>
