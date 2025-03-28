@extends('web.layouts.user_app')

@section('content')
<div class="container mx-auto p-16">
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('success') }}
    </div>
@endif
    <h1 class="text-[40px] font-bold text-[#1A1A1A] mb-8 mt-16 uppercase" style="font-family: 'Libre Baskerville', serif;">
        ULASAN
    </h1>

    {{-- <div class="mb-10">

        <div class="relative max-w-xl">
            <input type="text"
                   id="search-input"
                   placeholder="Find a book you like..."
                   class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                   <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white px-6 py-1.5 rounded-lg">
                    Cari
                </button>
        </div>
    </div> --}}

    <!-- Book Search -->
    <div class="mb-10">
        {{-- <h2 class="text-lg font-semibold mb-4"></h2> --}}
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-5 gap-8">
           @include('web.user.components.list_ulasan', ['course'])
        </div>
    </div>
</div>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.querySelector('#search-input');
        const resultsContainer = document.querySelector('.grid');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value;

            fetch(`{{ route('ulasan.search') }}?search=${searchTerm}`)
                .then(response => response.json())
                .then(data => {
                    resultsContainer.innerHTML = data.html;
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>


@endsection
