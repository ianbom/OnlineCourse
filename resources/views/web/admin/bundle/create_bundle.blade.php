@extends('web.layouts.newAdmin_app')

@section('title')
    Tambah Paket Langganan
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Paket Langganan</h3>
                <p class="text-subtitle text-muted">Tambahkan paket langganan baru untuk platform.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('bundle.index') }}">Paket Langganan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Paket</li>
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
                        <form action="{{ route('bundle.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Nama Paket -->
                                <div class="col-md-6 mb-3">
                                    <label for="name_bundle" class="form-label">Nama Paket</label>
                                    <input type="text" name="name_bundle" id="name_bundle" required
                                        class="form-control @error('name_bundle') is-invalid @enderror"
                                        placeholder="Masukkan nama paket" value="{{ old('name_bundle') }}">
                                    @error('name_bundle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Harga -->
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Harga</label>
                                    <input type="number" name="price" id="price" required
                                        class="form-control @error('price') is-invalid @enderror"
                                        placeholder="Masukkan harga paket" value="{{ old('price') }}">
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Durasi -->
                                <div class="col-md-6 mb-3">
                                    <label for="duration" class="form-label">Durasi (dalam hari)</label>
                                    <input type="number" name="duration" id="duration" required
                                        class="form-control @error('duration') is-invalid @enderror"
                                        placeholder="Masukkan durasi paket" value="{{ old('duration') }}">
                                    @error('duration')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-md-12 mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea name="description" id="description" rows="5"
                                        class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Masukkan deskripsi paket (Opsional)">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <a href="{{ route('bundle.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Paket</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
