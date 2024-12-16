@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-700">Daftar Content</h1>
        <a href="{{ route('content.create') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            Buat Content
        </a>
    </div>

    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <!-- Inputan Search -->
    {{-- <div class="flex items-center mb-4">
        <input id="search-input" type="text" placeholder="Cari Nama Konten..."
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400"
        >
        <button id="search-btn" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-400">
            Cari
        </button>
    </div> --}}

    <!-- Table Content -->
    <div id="content-table" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Nama Course</th>
                    <th class="px-4 py-3">Nama Konten</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y" id="content-body">
                @include('web.admin.content.table_content', ['content' => $content])
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $content->links() }}
        </div>
    </div>

</div>

<script>
    let searchInput = document.getElementById('search-input');
    let debounceTimeout;

    searchInput.addEventListener('input', function () {
        let searchValue = searchInput.value;

        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
            fetch(`{{ route('content.search') }}?search=${encodeURIComponent(searchValue)}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('content-body').innerHTML = data.html;
                })
                .catch(error => console.error('Error:', error));
        }, 300);
    });
</script>


@endsection
