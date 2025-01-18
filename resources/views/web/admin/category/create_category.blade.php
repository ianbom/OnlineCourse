@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Buat Kategori Baru</h1>

    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('category.store') }}" method="POST">
        @csrf

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <!-- Nama Kategori -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Nama Kategori</span>
                <input
                    type="text"
                    name="name_category"
                    id="name_category"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan nama kategori"
                    required
                />
            </label>

            <!-- Subkategori -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Subkategori</span>
                <div id="subcategories-container">
                    <input
                        type="text"
                        name="sub_categories[]"
                        class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                        placeholder="Masukkan nama subkategori"
                    />
                </div>
                <button
                    type="button"
                    id="add-subcategory"
                    class="px-4 py-2 mt-4 text-sm font-medium leading-5 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400"
                >
                    Tambah Subkategori
                </button>
            </label>

            <!-- Submit -->
            <button
                type="submit"
                class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >
                Simpan
            </button>

            <a href="{{ route('category.index') }}" class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                Kembali
            </a>
        </div>
    </form>



</div>

<script>
    document.getElementById('add-subcategory').addEventListener('click', function () {
        const container = document.getElementById('subcategories-container');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'sub_categories[]';
        input.className = 'block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400';
        input.placeholder = 'Masukkan nama subkategori';
        container.appendChild(input);
    });
</script>

@endsection
