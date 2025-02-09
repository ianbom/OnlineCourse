@extends('web.layouts.newAdmin_app')

@section('title')
    Daftar Pemateri
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Pemateri</h3>
                    <p class="text-subtitle text-muted">Kelola daftar pemateri</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Pemateri</li>
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
                                <h5 class="card-title">Data Pemateri</h5>
                                <a href="{{ route('pemateri.create') }}" class="btn btn-primary">Tambah Pemateri</a>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="table-responsive">
                                <table id="pemateriTable" class="table table-striped table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Pemateri</th>
                                            <th>Foto</th>
                                            <th>Deskripsi</th>
                                            <th>Created At</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pemateri as $key => $p)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $p->nama }}</td>
                                                <td>
                                                    @if($p->foto)
                                                        <img src="{{ asset('storage/' . $p->foto) }}" alt="Foto Pemateri" class="w-50 rounded">
                                                    @else
                                                        <span class="text-muted">Tidak ada foto</span>
                                                    @endif
                                                </td>
                                                <td>{{ Str::limit($p->deskripsi, 50) }}</td>
                                                <td>{{ date('d M Y', strtotime($p->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('pemateri.show', $p->id_pemateri) }}" class="btn btn-info btn-sm">Detail</a>
                                                    <a href="{{ route('pemateri.edit', $p->id_pemateri) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('pemateri.destroy', $p->id_pemateri) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus?');">
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
            $('#pemateriTable').DataTable();
        });
    </script>
@endsection
