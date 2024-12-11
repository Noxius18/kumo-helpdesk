<div class="mt-4 flex justify-between items-center">
    <div class="text-sm text-gray-700">
        Menampilkan 
        {{ $tikets->firstItem() }} - 
        {{ $tikets->lastItem() }} 
        dari {{ $tikets->total() }} tiket
    </div>
    
    <div class="flex items-center space-x-2">
        {{-- Tombol Previous --}}
        @if ($tikets->onFirstPage())
            <span class="px-3 py-1 text-gray-400 cursor-not-allowed rounded-md bg-gray-100">
                &laquo; Sebelumnya
            </span>
        @else
            <a href="{{ $tikets->appends(request()->query())->previousPageUrl() }}" 
               class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                &laquo; Sebelumnya
            </a>
        @endif

        {{-- Nomor Halaman --}}
        @php
            $start = max(1, $tikets->currentPage() - 2);
            $end = min($tikets->lastPage(), $tikets->currentPage() + 2);
        @endphp

        @if($start > 1)
            <a href="{{ $tikets->appends(request()->query())->url(1) }}" 
               class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                1
            </a>
            @if($start > 2)
                <span class="px-3 py-1 text-gray-500">...</span>
            @endif
        @endif

        @for($page = $start; $page <= $end; $page++)
            @if($page == $tikets->currentPage())
                <span class="px-3 py-1 bg-blue-500 text-white rounded-md">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $tikets->appends(request()->query())->url($page) }}" 
                   class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                    {{ $page }}
                </a>
            @endif
        @endfor

        @if($end < $tikets->lastPage())
            @if($end < $tikets->lastPage() - 1)
                <span class="px-3 py-1 text-gray-500">...</span>
            @endif
            <a href="{{ $tikets->appends(request()->query())->url($tikets->lastPage()) }}" 
               class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                {{ $tikets->lastPage() }}
            </a>
        @endif

        {{-- Tombol Next --}}
        @if ($tikets->hasMorePages())
            <a href="{{ $tikets->appends(request()->query())->nextPageUrl() }}" 
               class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                Selanjutnya &raquo;
            </a>
        @else
            <span class="px-3 py-1 text-gray-400 cursor-not-allowed rounded-md bg-gray-100">
                Selanjutnya &raquo;
            </span>
        @endif
    </div>
</div>