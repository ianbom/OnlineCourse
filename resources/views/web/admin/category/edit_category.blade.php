@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Edit Kategori</h1>

    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('category.update', $category->id_category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <!-- Nama Kategori -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Nama Kategori</span>
                <input
                    type="text"
                    name="name_category"
                    id="name_category"
                    value="{{ old('name_category', $category->name_category) }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan nama kategori"
                    required
                />
            </label>

            <!-- Subkategori -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Subkategori</span>
                <div id="subcategories-container">
                    <!-- Loop untuk subkategori yang ada -->
                    @foreach ($category->subCategories as $subCategory)
                        <div class="flex items-center mt-2">
                            <input
                                type="text"
                                name="sub_categories[{{ $subCategory->id_sub_category }}]"
                                value="{{ old('sub_categories.' . $subCategory->id_sub_category, $subCategory->name_category) }}"
                                class="block w-full text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                                placeholder="Masukkan nama subkategori"
                            />
                            <button
                                type="button"
                                class="ml-2 text-sm text-red-600 hover:text-red-800 delete-subcategory"
                                data-id="{{ $subCategory->id_sub_category }}"
                            >
                                Hapus
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- Tombol tambah subkategori baru -->
                <button
                    type="button"
                    id="add-subcategory"
                    class="px-4 py-2 mt-4 text-sm font-medium leading-5 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400"
                >
                    Tambah Subkategori Baru
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
    // Tambahkan input baru untuk subkategori
    document.getElementById('add-subcategory').addEventListener('click', function () {
        const container = document.getElementById('subcategories-container');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'new_sub_categories[]';
        input.className = 'block w-full mt-2 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:ring-purple-400';
        input.placeholder = 'Masukkan nama subkategori baru';
        container.appendChild(input);
    });

    // Hapus subkategori yang ada (opsional: kirim request delete melalui AJAX jika diperlukan)
    document.querySelectorAll('.delete-subcategory').forEach(button => {
    button.addEventListener('click', function () {
        // Tambahkan ID subkategori yang dihapus ke input tersembunyi
        const subcategoryId = this.getAttribute('data-id');
        const deletedInput = document.createElement('input');
        deletedInput.type = 'hidden';
        deletedInput.name = 'deleted_sub_categories[]';
        deletedInput.value = subcategoryId;

        // Tambahkan input ke form
        const form = document.querySelector('form');
        form.appendChild(deletedInput);

        // Hapus elemen subkategori dari tampilan
        this.closest('.flex').remove();
    });
});


</script>
@endsection
