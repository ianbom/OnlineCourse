@extends('web.layouts.newAdmin_app')

@section('title')
    Daftar Paket Langganan
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Paket Langganan</h3>
                    <p class="text-subtitle text-muted">Kelola daftar paket langganan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Paket Langganan</li>
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
                                <h5 class="card-title">Data Paket Langganan</h5>
                                <a href="{{ route('bundle.create') }}" class="btn btn-primary">Tambah Paket</a>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="table-responsive">
                                <table id="bundleTable" class="table table-striped table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Paket</th>
                                            <th>Harga</th>
                                            <th>Durasi</th>
                                            <th>Deskripsi</th>
                                            <th>Created At</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bundle as $key => $b)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $b->name_bundle }}</td>
                                                <td>{{ number_format($b->price, 0, ',', '.') }}</td>
                                                <td>{{ $b->durasi }} hari</td>
                                                <td>{{ Str::limit($b->description, 50) }}</td>
                                                <td>{{ date('d M Y', strtotime($b->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('bundle.show', $b->id_bundle) }}" class="btn btn-info btn-sm">Detail</a>
                                                    <a href="{{ route('bundle.edit', $b->id_bundle) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('bundle.destroy', $b->id_bundle) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus?');">
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
            $('#bundleTable').DataTable();
        });
    </script>
@endsection
