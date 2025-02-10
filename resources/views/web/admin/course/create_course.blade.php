@extends('web.layouts.newAdmin_app')

@section('title')
    Tambah Course Baru
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Course Baru</h3>
                <p class="text-subtitle text-muted">Tambahkan course baru untuk platform.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Course</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Course</li>
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
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Nama Course -->
                                <div class="col-md-6 mb-3">
                                    <label for="name_course" class="form-label">Nama Course</label>
                                    <input type="text" name="name_course" id="name_course" required
                                        class="form-control" placeholder="Masukkan nama course">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="id_pemateri" class="form-label">Pilih Pemateri</label>
                                    <select name="id_pemateri" id="id_pemateri" class="form-select" required>
                                        <option value="">-- Pilih Pemateri --</option>
                                        @foreach ($pemateri as $item)
                                            <option value="{{ $item->id_pemateri }}" {{ old('id_course') == $item->id_pemateri ? 'selected' : '' }}>{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Gambar -->
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Gambar</label>
                                    <input type="file" name="image" id="image" accept="image/jpeg,image/png"
                                        class="form-control">
                                </div>

                                <!-- Video -->
                                <div class="col-md-12 mb-3">
                                    <label for="video" class="form-label">Video</label>
                                    <input type="file" name="video" id="video" accept="video/mp4, video/mkv, video/webm, video/avi, video/mpeg"
                                        class="form-control">
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-md-12 mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea name="description" id="description" rows="4" required
                                        class="form-control" placeholder="Masukkan deskripsi course"></textarea>
                                </div>

                                <!-- Kategori -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Pilih Kategori</label>
                                    <div class="row">
                                        @foreach ($category as $cat)
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="category[]" value="{{ $cat->id_category }}">
                                                    <label class="form-check-label">{{ $cat->name_category }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <a href="{{ route('course.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Course</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
