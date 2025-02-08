@extends('web.layouts.newAdmin_app')

@section('title')
    Tambah User Baru
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah User Baru</h3>
                <p class="text-subtitle text-muted">Tambahkan user baru ke sistem.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
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
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Nama User -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama User</label>
                                    <input type="text" name="name" id="name" required
                                        class="form-control" placeholder="Masukkan nama user">
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="col-md-6 mb-3">
                                    <label for="birthday" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="birthday" id="birthday"
                                        class="form-control">
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="text" name="phone" id="phone"
                                        class="form-control" placeholder="Masukkan nomor telepon">
                                </div>

                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" required
                                        class="form-control" placeholder="Masukkan email user">
                                </div>

                                <!-- Password -->
                                <div class="col-md-6 mb-3 position-relative">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" required
                                        class="form-control" placeholder="Masukkan password">
                                    <button type="button" id="togglePassword" class="btn btn-outline-secondary position-absolute top-50 end-0 translate-middle-y me-2">
                                        <i id="eyeIcon" class="fa fa-eye"></i>
                                    </button>
                                </div>

                                <!-- Admin Status -->
                                <div class="col-md-6 mb-3">
                                    <label for="is_admin" class="form-label">Admin</label>
                                    <select name="is_admin" id="is_admin" class="form-select">
                                        <option value="0">Bukan Admin</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        const type = passwordField.type === 'password' ? 'text' : 'password';
        passwordField.type = type;
        eyeIcon.classList.toggle('fa-eye');
        eyeIcon.classList.toggle('fa-eye-slash');
    });
</script>
@endsection
