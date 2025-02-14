@extends('web.layouts.newAdmin_app')
@section('title', 'Detail Kelas')

@section('content')
<div class="page-heading">
    <div class="page-title d-flex justify-content-between align-items-center">
        <div>
            <h3>Detail Kelas</h3>
            <p class="text-subtitle text-muted">Informasi lengkap mengenai Kelas.</p>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Daftar Kelas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Kelas</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h5>Nama Kelas</h5>
                            <p class="fw-bold">{{ $course->name_course }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5>Deskripsi</h5>
                            <p>{{ $course->description }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5>Pemateri</h5>
                            <p>{{ $course->pemateri->nama ?? 'Tidak ada'}}</p>
                        </div>
                    </div>
                    @if ($course->image)
                    <div class="mb-3 text-center">
                        <h5>Gambar</h5>
                        <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" class="img-fluid rounded shadow-sm" style="max-width: 400px;">
                    </div>
                    @endif
                    @if ($course->video)
                    <div class="mb-3 text-center">
                        <h5>Video</h5>
                        <video class="w-100 rounded shadow-sm" controls>
                            <source src="{{ asset('storage/' . $course->video) }}" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                    </div>
                    @endif
                    <div class="text-end mt-4">
                        <a href="{{ route('course.edit', $course->id_course) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                        <form action="{{ route('course.destroy', $course->id_course) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Kelas ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="datatable">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title">Data Materi</h5>
                        <a href="{{ route('materi.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Materi</a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table id="materiTable" class="table table-hover table-bordered text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Materi</th>
                                    <th>Deskripsi</th>
                                    <th>Created At</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course->materi as $key => $m)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="fw-bold">{{ $m->name_materi }}</td>
                                        <td>{{ Str::limit($m->description, 50) }}</td>
                                        <td>{{ date('d M Y', strtotime($m->created_at)) }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('materi.show', $m->id_materi) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Detail</a>
                                            <a href="{{ route('materi.edit', $m->id_materi) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                                            <form action="{{ route('materi.destroy', $m->id_materi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
                                            </form>
                                            <a href="{{ route('question.index', $m->id_materi) }}" class="btn btn-secondary btn-sm"><i class="bi bi-question-circle"></i> Quiz</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#materiTable').DataTable();
        });
    </script>
@endsection
