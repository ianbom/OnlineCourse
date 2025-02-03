@extends('web.layouts.user_app')


@section('content')
<head>
    <style>
        .pagination-info {
            display: none;
        }
    </style>
</head>
<div class="container mx-auto mt-10 p-10">
     <!-- Page Title -->
     <div class="flex justify-between items-center mb-8">
        <h1 class="text-xl md:text-3xl font-bold text-left" style="font-family: 'Libre Baskerville', serif; color: #1A1A1A;">
            Pesanan
        </h1>
    </div>

    <!-- Search Bar -->
    <div class="search-wrapper mb-8">
        <div class="search-box relative rounded-full transition-all duration-300 w-full md:max-w-xl">
            <i class="fas fa-search search-icon absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
            <input id="search-input" type="text"
                class="form-control search-input rounded-[12px] pl-12 pr-4 py-3 md:py-4 w-full border-2 border-transparent transition-all duration-300 focus:border-[#F58A44] focus:ring-0"
                placeholder="Cari order yang Anda inginkan...">
            <button
                class="btn btn-primary search-button absolute right-4 top-1/2 transform -translate-y-1/2 rounded-[12px] py-2 px-4 md:px-6 bg-[#F58A44] text-white hover:bg-[#6F2E03] transition duration-300">
                Cari
            </button>
        </div>
    </div>


    @if($order->isEmpty())
        <!-- Pesan jika tidak ada order -->
        <p class="text-[#E46B61] text-sm md:text-base">
            Belum ada order yang dilakukan.
        </p>
    @else
        <!-- Tabel Order -->
        <div id="order-table-container" class="overflow-x-auto shadow-lg rounded-2xl mt-6 border border-[#F58A44] border-2" style="font-family: 'Inter', sans-serif;">
           @include('web.user.components.table_order', ['order' => $order])
        </div>
    @endif
<!-- Pagination -->
<div class="pagination mt-8 flex flex-wrap justify-center space-y-2 sm:space-y-0 sm:space-x-4">
    @if ($order->hasPages())
        <nav>
            <ul class="flex flex-wrap justify-center space-x-2 md:space-x-4">
                {{-- Previous Page Link --}}
                @if ($order->onFirstPage())
                    <li class="disabled">
                        <span
                            class="px-3 md:px-4 py-2 bg-gray-300 text-gray-500 rounded-md cursor-not-allowed">
                            Previous
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $order->previousPageUrl() }}"
                            class="px-3 md:px-4 py-2 bg-[#F58A44] text-white rounded-md hover:bg-[#6F2E03]">
                            Previous
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($order->getUrlRange(1, $order->lastPage()) as $page => $url)
                    <li>
                        @if ($page == $order->currentPage())
                            <span
                                class="px-3 md:px-4 py-2 bg-[#6F2E03] text-white rounded-md">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="px-3 md:px-4 py-2 bg-[#FDE4D3] text-[#6F2E03] rounded-md hover:bg-[#F58A44] hover:text-white">
                                {{ $page }}
                            </a>
                        @endif
                    </li>
                @endforeach

                {{-- Next Page Link --}}
                @if ($order->hasMorePages())
                    <li>
                        <a href="{{ $order->nextPageUrl() }}"
                            class="px-3 md:px-4 py-2 bg-[#F58A44] text-white rounded-md hover:bg-[#6F2E03]">
                            Next
                        </a>
                    </li>
                @else
                    <li class="disabled">
                        <span
                            class="px-3 md:px-4 py-2 bg-gray-300 text-gray-500 rounded-md cursor-not-allowed">
                            Next
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
</div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.querySelector('#search-input');
        const tableContainer = document.querySelector('#order-table-container');
        let currentSearchTerm = '';

    function fetchOrders(url) {
    if (currentSearchTerm && !url.includes('search=')) {
        const separator = url.includes('?') ? '&' : '?';
        url = `${url}${separator}search=${encodeURIComponent(currentSearchTerm)}`;
    }

    fetch(url, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            if (data.html) {
                tableContainer.innerHTML = data.html;
                const newUrl = new URL(url, window.location.origin);
                window.history.pushState({ path: newUrl.href }, '', newUrl.href);
            } else {
                console.error('Response did not contain "html" key:', data);
            }
        })
        .catch((error) => {
            console.error('Error during fetch:', error);
        });
}


        // Handle search input with debounce
        let searchTimer;
        searchInput.addEventListener('input', function () {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(() => {
                currentSearchTerm = searchInput.value;
                fetchOrders(`{{ route('order.search') }}?search=${encodeURIComponent(currentSearchTerm)}`);
            }, 300);
        });

        // Handle pagination clicks
        tableContainer.addEventListener('click', function (event) {
            const link = event.target.closest('.pagination a');
            if (link) {
                event.preventDefault();
                fetchOrders(link.href);
            }
        });

        // Handle browser back/forward buttons
        window.addEventListener('popstate', function () {
            fetchOrders(window.location.href);
        });
    });

    </script>

@endsection
