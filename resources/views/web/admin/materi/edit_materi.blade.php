@extends('web.layouts.newAdmin_app')
@section('title')
    Edit Materi
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="fw-bold">Edit Materi</h3>
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
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4">
                        <form action="{{ route('materi.update', $materi->id_materi) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <!-- Nama Materi -->
                                <div class="col-md-6">
                                    <label for="name_materi" class="form-label fw-semibold">Nama Materi</label>
                                    <input type="text" id="name_materi" name="name_materi"
                                        value="{{ old('name_materi', $materi->name_materi) }}"
                                        class="form-control" placeholder="Masukkan Nama Materi" required>
                                </div>

                                <!-- Pilih Kelas -->
                                <div class="col-md-6">
                                    <label for="id_course" class="form-label fw-semibold">Pilih Kelas</label>
                                    <select name="id_course" id="id_course" class="form-select" required>
                                        <option value="">Pilih Kelas</option>
                                        @foreach ($course as $item)
                                            <option value="{{ $item->id_course }}"
                                                {{ old('id_course', $materi->id_course) == $item->id_course ? 'selected' : '' }}>
                                                {{ $item->name_course }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-md-12">
                                    <label for="description" class="form-label fw-semibold">Deskripsi</label>
                                    <textarea id="description" name="description" rows="4"
                                        class="form-control" placeholder="Masukkan Deskripsi Materi" required>{{ old('description', $materi->description) }}</textarea>
                                </div>
                            </div>

                            <div class="row g-4 mt-3">
                                <!-- Video Upload -->
                                <div class="col-md-6">
                                    <label for="video" class="form-label fw-semibold">Video</label>
                                    <input type="file" id="video" name="video" class="form-control" accept="video/*">
                                    @if ($materi->video)
                                        @php
                                            if (preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $materi->video, $matches)) {
                                                $videoId = $matches[1];
                                                $embedUrl = "https://www.youtube.com/embed/$videoId";
                                            } else {
                                                $embedUrl = null;
                                            }
                                        @endphp

                                        @if ($embedUrl)
                                            <div class="mt-3">
                                                <iframe class="w-100 rounded shadow-sm" height="250" src="{{ $embedUrl }}" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        @else
                                            <p class="text-danger mt-2">Video tidak valid. Silakan periksa URL video.</p>
                                        @endif
                                    @endif
                                </div>

                                <!-- Text Book Upload -->
                                <div class="col-md-6">
                                    <label for="text_book" class="form-label fw-semibold">Text Book</label>
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
                                <a href="{{ route('materi.index') }}" class="btn btn-secondary me-2">Batal</a>
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
