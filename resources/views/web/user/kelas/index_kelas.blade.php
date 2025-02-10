@extends('web.layouts.user_app')

@section('content')
    <div class="container mx-auto p-16">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-[40px] font-bold text-[#1A1A1A] mb-8 mt-16 uppercase"
            style="font-family: 'Libre Baskerville', serif;">
            KELAS
        </h1>

        <div class="mb-10">
            <div class="relative max-w-xl">
                <!-- Search icon on the left -->
                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-[#979797]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </span>

                <!-- Input field with placeholder "Temukan modul..." -->
                <input type="text" id="search-input" placeholder="Temukan modul..."
                    class="w-full px-12 py-4 rounded-[16px] border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#F58A44]">

                <!-- Cari button -->
                <button
                    class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-[#F58A44] text-white px-6 py-1.5 rounded-[12px] text-[14px] font-semibold focus:outline-none focus:ring-2 focus:ring-[#F58A44]">
                    Cari
                </button>
            </div>

            <div class="filter-dropdown relative w-1/5">
                <!-- Form untuk Filter -->
                <form action="#" method="GET">
                    <select id="filter-select" name="category_id"
                        class="form-control rounded-[12px] pl-4 pr-4 py-4 w-full border-2 border-transparent transition-all duration-300 focus:border-[#1E90FF] text-[#1E90FF]"
                        onchange="this.form.submit()">
                        <option value="">Semua Kategori</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id_category }}"
                                {{ request('id_category') == $item->id_category ? 'selected' : '' }}>
                                {{ $item->name_category }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>


        <!-- Book Search -->
        <div class="mb-10">
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-5 gap-8">
                @include('web.user.components.list_kelas', ['courses' => $courses])
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('#search-input');
            const resultsContainer = document.querySelector('.grid');

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value;

                fetch(`{{ route('kelas.search') }}?search=${searchTerm}`)
                    .then(response => response.json())
                    .then(data => {
                        resultsContainer.innerHTML = data.html;
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
@endsection
