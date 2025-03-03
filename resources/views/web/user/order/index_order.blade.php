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
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-3xl font-bold text-left uppercase" style="font-family: 'Libre Baskerville', serif; color: #1A1A1A;">Profile Anda</h1>
    </div>

    <div class="flex flex-col md:flex-row gap-5">
        <!-- Profile Information (Left Card) -->
        <div class="flex-1 md:flex-none mb-4 md:w-2/3">
            <div class="bg-[#fbc29c] rounded-[16px] p-8">
                <h2 class="text-[20px] sm:text-[18px] font-bold text-white mb-6" style="font-family: 'Inter', sans-serif;">Profile Information</h2>
                <form action="{{ route('order.index') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Profile Picture -->
                    <div class="d-flex align-items-center mb-6">
                        <div class="relative w-24 h-24 mr-4">
                            <img src="{{ Auth::check() && Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('img/foto.JPG') }}"  alt="Profile Picture" class="w-full h-full rounded-full object-cover border-4 border-[#F1F8FF]">
                            <label for="foto" class="absolute bottom-0 right-0 bg-[#1A1A1A] text-white p-2 rounded-full cursor-pointer hover:bg-[#1E90FF] transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2l8 8-10 10H4v-8L14 2z" />
                                </svg>
                            </label>
                        </div>
                        <div class="flex flex-col">
                            <div class="relative mt-2">
                                <input type="file" name="foto" id="foto" class="opacity-0 absolute inset-0 w-full h-full cursor-pointer" onchange="updateFileName()" />
                                <div class="text-sm text-[#052D6E] font-semibold mt-2 p-2 rounded border border-[#F1F8FF] bg-[#F1F8FF] text-ellipsis overflow-hidden" id="fileName">
                                    Change Photo
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function updateFileName() {
                            const fileInput = document.getElementById('foto');
                            const fileNameDisplay = document.getElementById('fileName');

                            if (fileInput.files.length > 0) {
                                fileNameDisplay.textContent = fileInput.files[0].name;
                            }
                        }
                    </script>

                    <!-- Name -->
                    <div class="mb-6" style="font-family: 'Inter', sans-serif;">
                        <label for="nama" class="block text-sm font-semibold text-white">Name</label>
                        <input type="text" name="nama" id="nama" value="{{ Auth::user()->name }}" class="mt-2 block w-full rounded-[8px] border-none shadow-sm focus:border-[#6F2E03] focus:ring-[#6F2E03]">
                    </div>

                    <!-- Email -->
                    <div class="mb-6" style="font-family: 'Inter', sans-serif;">
                        <label for="email" class="block text-sm font-semibold text-white">Email</label>
                        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="mt-2 block w-full rounded-[8px] border-none shadow-sm focus:border-[#6F2E03] focus:ring-[#6F2E03]">
                    </div>

                    <!-- Password -->
                    <div class="mb-6" style="font-family: 'Inter', sans-serif;">
                        <label for="password" class="block text-sm font-semibold text-white">New Password</label>
                        <input type="password" name="password" id="password" class="mt-2 block w-full rounded-[8px] border-none shadow-sm focus:border-[#6F2E03] focus:ring-[#6F2E03]" placeholder="Leave empty if you don't want to change">
                    </div>

                    <!-- Save Button -->
                    <div class="flex justify-end" style="font-family: 'Inter', sans-serif;">
                        <button type="submit" class="px-4 py-2 bg-[#FFF7E9] text-bold text-[#6F2E03] rounded-[12px] hover:bg-[#F58A44] hover:text-white text-xs sm:text-sm md:text-base"><strong> Save Changes </strong></button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Latest Subscription Package (Right Card) -->
        <div class="flex-1 md:flex-none mb-4 md:w-1/3">
            <div class="bg-[#FFF7E9] rounded-[16px] p-8 border-[#fbc29c] border-2">
                <h2 class="text-[16px] sm:text-[18px] font-bold text-[#F58A44] mb-6">Latest Subscription Package</h2>

                @if($order->isEmpty())
                <!-- Message if no subscription -->
                <div class="flex flex-col sm:flex-row sm:justify-between items-start sm:items-center gap-4">
                    <p class="text-[#E46B61] text-xs sm:text-sm">You currently do not have any subscription packages</p>
                </div>
                @else
                <!-- Subscription List -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-6">
                    @foreach($order as $item)
                    <div class="bg-[#fbc29c] rounded-[16px] p-8">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-[#6F2E03] font-bold text-[14px] sm:text-[16px]">Package Name</h3>
                            <h3 class="text-[#979797] font-bold text-[12px] sm:text-[14px]">{{ $item->order->id_order ?? 'No Order Found' }}
                            </h3>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-[#6F2E03] font-bold text-[14px] sm:text-[16px]">Status</h3>
                            @if($item->status_subs)
                                <span class="text-[#4DAF84] font-bold text-[12px] sm:text-[14px]">ACTIVE</span>
                            @else
                                <span class="text-[#E46B61] font-bold text-[12px] sm:text-[14px]">INACTIVE</span>
                            @endif
                        </div>

                        <!-- Subscription Information -->
                        <div class="bg-[#F58A44] text-white text-[12px] sm:text-[14px] rounded-lg p-4">
                            <div class="flex justify-between items-center mb-2">
                                <span><strong>Start Date</strong></span>
                                <span>{{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span><strong> End Date</strong></span>
                                <span>{{ \Carbon\Carbon::parse($item->end_date)->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- "View Your Subscription" Button -->
                @if($order->isEmpty())
                <div class="mt-6 text-center">
                    <a href="{{ route('paket.index') }}" class="block w-full sm:w-auto px-3 py-3 bg-[#FFCFC2] text-white font-bold text-xs sm:text-sm md:text-base rounded-[12px] hover:bg-[#D3E9FF] hover:text-[#1E90FF]">
                        <strong>View Your Package</strong>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto mt-4 p-10">
     <!-- Page Title -->
     <div class="flex justify-between items-center mb-8">
        <h1 class="text-xl md:text-3xl font-bold text-left" style="font-family: 'Libre Baskerville', serif; color: #1A1A1A;">
            PESANAN
        </h1>
    </div>

    <!-- Search Bar -->
    <div class="search-wrapper mb-8">
        <div class="search-box relative rounded-full transition-all duration-300 w-full md:max-w-xl">
            <i class="fas fa-search search-icon absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
            <input id="search-input" type="text"
                class="form-control search-input rounded-[12px] pl-12 pr-4 py-3 md:py-4 w-full border-2 border-[#F58A44] transition-all duration-300 focus:border-[#F58A44] focus:ring-0"
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
        <div id="order-table-container" class="overflow-x-auto  rounded-2xl mt-6 border border-[#F58A44] border-2" style="font-family: 'Inter', sans-serif;">
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
        url = ${url}${separator}search=${encodeURIComponent(currentSearchTerm)};
    }

    fetch(url, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error(HTTP error! status: ${response.status});
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
                fetchOrders({{ route('order.search') }}?search=${encodeURIComponent(currentSearchTerm)});
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
