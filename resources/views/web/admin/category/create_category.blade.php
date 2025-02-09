@extends('web.layouts.newAdmin_app')

@section('title')
    Tambah Kategori Baru
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Kategori Baru</h3>
                <p class="text-subtitle text-muted">Tambahkan kategori baru untuk platform.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Kategori</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Kategori</li>
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
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Nama Kategori -->
                                <div class="col-md-6 mb-3">
                                    <label for="name_category" class="form-label">Nama Kategori</label>
                                    <input type="text" name="name_category" id="name_category" required
                                        class="form-control" placeholder="Masukkan nama kategori">
                                </div>

                                <!-- Subkategori -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Subkategori</label>
                                    <div id="subcategories-container">
                                        <input type="text" name="sub_categories[]" class="form-control mb-2"
                                            placeholder="Masukkan nama subkategori">
                                    </div>
                                    <button type="button" id="add-subcategory" class="btn btn-success btn-sm mt-2">
                                        Tambah Subkategori
                                    </button>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <a href="{{ route('category.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Kategori</button>
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
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'sub_categories[]';
        input.className = 'form-control mb-2';
        input.placeholder = 'Masukkan nama subkategori';
        container.appendChild(input);
    });
</script>
@endsection
