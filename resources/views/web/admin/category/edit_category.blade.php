@extends('web.layouts.newAdmin_app')

@section('title')
    Edit Kategori
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Kategori</h3>
                <p class="text-subtitle text-muted">Perbarui informasi kategori.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Daftar Kategori</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Kategori</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="form-section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('category.update', $category->id_category) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Nama Kategori -->
                                <div class="col-md-6 mb-3">
                                    <label for="name_category" class="form-label">Nama Kategori</label>
                                    <input type="text" id="name_category" name="name_category" value="{{ old('name_category', $category->name_category) }}"
                                        class="form-control" placeholder="Masukkan Nama Kategori" required>
                                </div>
                            </div>

                            <!-- Subkategori -->
                            <div class="mb-3">
                                <label class="form-label">Subkategori</label>
                                <div id="subcategories-container">
                                    @foreach ($category->subCategories as $subCategory)
                                        <div class="d-flex align-items-center mb-2">
                                            <input type="text" name="sub_categories[{{ $subCategory->id_sub_category }}]" value="{{ old('sub_categories.' . $subCategory->id_sub_category, $subCategory->name_category) }}"
                                                class="form-control me-2" placeholder="Masukkan nama subkategori">
                                            <button type="button" class="btn btn-danger delete-subcategory" data-id="{{ $subCategory->id_sub_category }}">Hapus</button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" id="add-subcategory" class="btn btn-success mt-2">Tambah Subkategori Baru</button>
                            </div>

                            <!-- Action Buttons -->
                            <div class="text-end mt-4">
                                <a href="{{ route('category.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.getElementById('add-subcategory').addEventListener('click', function () {
        const container = document.getElementById('subcategories-container');
        const div = document.createElement('div');
        div.className = 'd-flex align-items-center mb-2';
        div.innerHTML = `
            <input type="text" name="new_sub_categories[]" class="form-control me-2" placeholder="Masukkan nama subkategori baru">
            <button type="button" class="btn btn-danger remove-subcategory">Hapus</button>
        `;
        container.appendChild(div);

        div.querySelector('.remove-subcategory').addEventListener('click', function () {
            div.remove();
        });
    });

    document.querySelectorAll('.delete-subcategory').forEach(button => {
        button.addEventListener('click', function () {
            const subcategoryId = this.getAttribute('data-id');
            const deletedInput = document.createElement('input');
            deletedInput.type = 'hidden';
            deletedInput.name = 'deleted_sub_categories[]';
            deletedInput.value = subcategoryId;

            document.querySelector('form').appendChild(deletedInput);
            this.closest('.d-flex').remove();
        });
    });
</script>
@endsection
