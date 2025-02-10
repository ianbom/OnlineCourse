@extends('web.layouts.newAdmin_app')

@section('title')
    Daftar Materi
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Materi</h3>
                    <p class="text-subtitle text-muted">Kelola daftar materi yang tersedia</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Materi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title">Data Materi</h5>
                                <a href="{{ route('materi.create') }}" class="btn btn-primary">Tambah Materi</a>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="table-responsive">
                                <table id="materiTable" class="table table-striped table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Materi</th>
                                            <th>Deskripsi</th>
                                            <th>Created At</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($materi as $key => $m)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $m->name_materi }}</td>
                                                <td>{{ Str::limit($m->description, 50) }}</td>
                                                <td>{{ date('d M Y', strtotime($m->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('materi.show', $m->id_materi) }}" class="btn btn-info btn-sm">Detail</a>
                                                    <a href="{{ route('materi.edit', $m->id_materi) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('materi.destroy', $m->id_materi) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                    <a href="{{ route('question.index', $m->id_materi) }}" class="btn btn-sm btn-secondary">Quiz</a>
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
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#materiTable').DataTable();
        });
    </script>
@endsection
