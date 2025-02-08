@extends('web.layouts.newAdmin_app')

@section('title')
    Daftar User
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar User</h3>
                    <p class="text-subtitle text-muted">Kelola daftar user</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar User</li>
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
                                <h5 class="card-title">Data User</h5>
                                <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="table-responsive">
                                <table id="userTable" class="table table-striped table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Nomor Telepon</th>
                                            <th>Email</th>
                                            <th>Status Subs</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->birthday ?? 'N/A' }}</td>
                                                <td>{{ $item->phone ?? 'N/A' }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->subscription->first()->id_subscription ?? 'Not-Buy' }}</td>
                                                <td>
                                                    @if ($item->is_admin)
                                                        <span class="badge bg-success">Admin</span>
                                                    @else
                                                        <span class="badge bg-secondary">User</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('user.destroy', $item->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
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
            $('#userTable').DataTable();
        });
    </script>
@endsection
