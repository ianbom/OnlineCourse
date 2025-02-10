@extends('web.layouts.newAdmin_app')

@section('title')
    Daftar Course
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Kelas</h3>
                    <p class="text-subtitle text-muted">Kelola daftar kelas</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Kelas</li>
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
                                <h5 class="card-title">Data Kelas</h5>
                                <a href="{{ route('course.create') }}" class="btn btn-primary">Tambah Kelas</a>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="table-responsive">
                                <table id="courseTable" class="table table-striped table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kelas</th>

                                            <th>Deskripsi</th>
                                            <th>Created At</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($course as $key => $c)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $c->name_course }}</td>

                                                <td>{{ Str::limit($c->description, 50) }}</td>
                                                <td>{{ date('d M Y', strtotime($c->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('course.show', $c->id_course) }}" class="btn btn-info btn-sm">Detail</a>
                                                    <a href="{{ route('course.edit', $c->id_course) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('course.destroy', $c->id_course) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
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
            $('#courseTable').DataTable();
        });
    </script>
@endsection
