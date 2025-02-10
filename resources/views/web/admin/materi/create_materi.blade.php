@extends('web.layouts.newAdmin_app')

@section('title')
    Tambah Materi Baru
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Materi Baru</h3>
                <p class="text-subtitle text-muted">Tambahkan materi baru untuk platform.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('materi.index') }}">Materi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Materi</li>
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
                        <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Pilih Modul -->
                                <div class="col-md-6 mb-3">
                                    <label for="id_course" class="form-label">Pilih Kelas</label>
                                    <select name="id_course" id="id_course" class="form-select" required>
                                        <option value="">-- Pilih Kelas --</option>
                                        @foreach ($course as $courseItem)
                                            <option value="{{ $courseItem->id_course }}" {{ old('id_course') == $courseItem->id_course ? 'selected' : '' }}>{{ $courseItem->name_course }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Pilih Tipe -->
                                {{-- <div class="col-md-6 mb-3">
                                    <label for="type" class="form-label">Pilih Tipe</label>
                                    <select name="type" id="type" class="form-select" required>
                                        <option value="">-- Pilih Tipe --</option>
                                        <option value="materi">Materi</option>
                                        <option value="modul">Modul</option>
                                        <option value="quiz">Quiz</option>
                                    </select>
                                </div> --}}

                                <!-- Apakah Gratis? -->
                                <div class="col-md-6 mb-3">
                                    <label for="is_free" class="form-label">Apakah Gratis?</label>
                                    <select name="is_free" id="is_free" class="form-select" required>
                                        <option value="">-- Pilih Opsi --</option>
                                        <option value="1" {{ old('is_free') == '1' ? 'selected' : '' }}>Gratis</option>
                                        <option value="0" {{ old('is_free') == '0' ? 'selected' : '' }}>Berbayar</option>
                                    </select>
                                </div>

                                <!-- Nama Materi -->
                                <div class="col-md-6 mb-3">
                                    <label for="name_materi" class="form-label">Nama Materi</label>
                                    <input type="text" name="name_materi" id="name_materi" class="form-control" placeholder="Masukkan nama materi" value="{{ old('name_materi') }}" required>
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-md-12 mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea name="description" id="description" rows="4" class="form-control" placeholder="Masukkan deskripsi materi"></textarea>
                                </div>

                                <!-- Video -->
                                <div class="col-md-6 mb-3">
                                    <label for="video" class="form-label">Video</label>
                                    <input type="file" name="video" id="video" accept="video/*" class="form-control">
                                </div>

                                <!-- Textbook -->
                                <div class="col-md-6 mb-3">
                                    <label for="text_book" class="form-label">Text Book (PDF)</label>
                                    <input type="file" name="text_book" id="text_book" accept="application/pdf" class="form-control">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <a href="{{ route('materi.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Materi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
