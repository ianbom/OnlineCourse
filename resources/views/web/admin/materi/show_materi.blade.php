@extends('web.layouts.newAdmin_app')
@section('title', 'Detail Materi')

@section('content')
<div class="page-heading">
    <div class="page-title d-flex justify-content-between align-items-center">
        <div>
            <h3>Detail Materi</h3>
            <p class="text-subtitle text-muted">Informasi lengkap mengenai materi.</p>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('materi.index') }}">Daftar Materi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Materi</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h5>Nama Materi</h5>
                            <p class="fw-bold">{{ $materi->name_materi }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5>Deskripsi</h5>
                            <p>{{ $materi->description }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5>Kelas</h5>
                            <p class="fw-bold">{{ $materi->course->name_course }}</p>
                        </div>
                    </div>

                        @if ($materi->video)
                            <div class="mb-3 text-center">
                                <h5>Video Materi</h5>
                                @php
                                    // Ambil video ID dari URL YouTube
                                    if (preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $materi->video, $matches)) {
                                        $videoId = $matches[1];
                                        $embedUrl = "https://www.youtube.com/embed/$videoId";
                                    } else {
                                        $embedUrl = null;
                                    }
                                @endphp

                                @if ($embedUrl)
                                    <iframe class="w-100 rounded shadow-sm" height="400" src="{{ $embedUrl }}" frameborder="0" allowfullscreen></iframe>
                                @else
                                    <p>Video tidak valid. Silakan periksa URL video.</p>
                                @endif
                            </div>
                        @endif


                    @if ($materi->text_book)
                    <div class="mb-3">
                        <h5>Text Book</h5>
                        <a href="{{ asset('storage/' . $materi->text_book) }}" target="_blank" class="btn btn-primary">
                            <i class="bi bi-file-earmark-pdf"></i> Download Text Book
                        </a>
                    </div>
                    @endif

                    <div class="text-end mt-4">
                        <a href="{{ route('materi.edit', $materi->id_materi) }}" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('materi.destroy', $materi->id_materi) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                        <a href="{{ route('materi.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
