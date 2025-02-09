@extends('web.layouts.newAdmin_app')

@section('title')
    Tambah Pemateri Baru
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Pemateri Baru</h3>
                <p class="text-subtitle text-muted">Tambahkan pemateri baru untuk platform.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pemateri.index') }}">Pemateri</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Pemateri</li>
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
                        <form action="{{ route('pemateri.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Nama Pemateri -->
                                <div class="col-md-6 mb-3">
                                    <label for="nama" class="form-label">Nama Pemateri</label>
                                    <input type="text" name="nama" id="nama" required
                                        class="form-control" placeholder="Masukkan nama pemateri">
                                </div>

                                <!-- Foto Pemateri -->
                                <div class="col-md-6 mb-3">
                                    <label for="foto" class="form-label">Foto Pemateri</label>
                                    <input type="file" name="foto" id="foto" accept="image/*"
                                        class="form-control">
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-md-12 mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="5" required
                                        class="form-control" placeholder="Masukkan deskripsi pemateri"></textarea>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <a href="{{ route('pemateri.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Pemateri</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
