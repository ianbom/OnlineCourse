@extends('web.layouts.newAdmin_app')

@section('title')
    Daftar Kategori
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Kategori</h3>
                    <p class="text-subtitle text-muted">Kelola daftar kategori</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Kategori</li>
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
                                <h5 class="card-title">Data Kategori</h5>
                                <a href="{{ route('category.create') }}" class="btn btn-primary">Tambah Kategori</a>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="table-responsive">
                                <table id="categoryTable" class="table table-striped table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name_category }}</td>
                                                <td>
                                                    <a href="{{ route('category.edit', $item->id_category) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('category.destroy', $item->id_category) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
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
            $('#categoryTable').DataTable();
        });
    </script>
@endsection
