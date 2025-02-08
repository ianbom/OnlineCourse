@extends('web.layouts.newAdmin_app')
@section('title')
    Edit User
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit User</h3>
                <p class="text-subtitle text-muted">Perbarui informasi user.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Daftar User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Nama -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                        class="form-control" placeholder="Masukkan nama user" required>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                        class="form-control" placeholder="Masukkan email user" required>
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="col-md-6 mb-3">
                                    <label for="birthday" class="form-label">Tanggal Lahir</label>
                                    <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $user->birthday) }}"
                                        class="form-control">
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                                        class="form-control" placeholder="Masukkan nomor telepon user">
                                </div>

                                <!-- Status Admin -->
                                <div class="col-md-6 mb-3">
                                    <label for="is_admin" class="form-label">Status Admin</label>
                                    <select id="is_admin" name="is_admin" class="form-control">
                                        <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>Bukan Admin</option>
                                        <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="text-end mt-4">
                                <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
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
