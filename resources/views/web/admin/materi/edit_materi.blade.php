@extends('web.layouts.newAdmin_app')
@section('title')
    Edit Materi
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Materi</h3>
                <p class="text-subtitle text-muted">Perbarui informasi materi.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('materi.index') }}">Daftar Materi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Materi</li>
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
                        <form action="{{ route('materi.update', $materi->id_materi) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Nama Materi -->
                                <div class="col-md-6 mb-3">
                                    <label for="name_materi" class="form-label">Nama Materi</label>
                                    <input type="text" id="name_materi" name="name_materi" value="{{ old('name_materi', $materi->name_materi) }}"
                                        class="form-control" placeholder="Masukkan Nama Materi" required>
                                </div>

                                <!-- Pilih Modul -->
                                <div class="col-md-6 mb-3">
                                    <label for="id_course" class="form-label">Pilih Modul</label>
                                    <select name="id_course" id="id_course" class="form-control" required>
                                        <option value="">Pilih Modul</option>
                                        @foreach ($course as $item)
                                            <option value="{{ $item->id_course }}" {{ old('id_course', $materi->id_course) == $item->id_course ? 'selected' : '' }}>
                                                {{ $item->name_course }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-md-12 mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea id="description" name="description" rows="4" class="form-control" placeholder="Masukkan Deskripsi Materi" required>{{ old('description', $materi->description) }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Upload Video -->
                                <div class="col-md-6 mb-3">
                                    <label for="video" class="form-label">Video</label>
                                    <input type="file" id="video" name="video" class="form-control" accept="video/*">
                                    @if($materi->video)
                                        <video class="mt-2 w-100 rounded" controls>
                                            <source src="{{ asset('storage/' . $materi->video) }}" type="video/mp4">
                                            Browser Anda tidak mendukung tag video.
                                        </video>
                                    @endif
                                </div>

                                <!-- Upload Text Book -->
                                <div class="col-md-6 mb-3">
                                    <label for="text_book" class="form-label">Text Book</label>
                                    <input type="file" id="text_book" name="text_book" class="form-control" accept="application/pdf">
                                    @if($materi->text_book)
                                        <p class="mt-2">
                                            <a href="{{ asset('storage/' . $materi->text_book) }}" class="text-primary" target="_blank">Lihat Text Book</a>
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="text-end mt-4">
                                <a href="{{ route('materi.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
