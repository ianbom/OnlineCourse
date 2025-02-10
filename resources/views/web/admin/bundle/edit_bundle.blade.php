@extends('web.layouts.newAdmin_app')
@section('title')
    Edit Paket Langganan
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Paket Langganan</h3>
                <p class="text-subtitle text-muted">Perbarui informasi paket langganan.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('bundle.index') }}">Daftar Paket</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Paket</li>
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
                        <form action="{{ route('bundle.update', $bundle->id_bundle) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Nama Paket -->
                                <div class="col-md-6 mb-3">
                                    <label for="name_bundle" class="form-label">Nama Paket</label>
                                    <input type="text" id="name_bundle" name="name_bundle" value="{{ old('name_bundle', $bundle->name_bundle) }}"
                                        class="form-control" placeholder="Masukkan Nama Paket" required>
                                </div>

                                <!-- Harga -->
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Harga</label>
                                    <input type="number" id="price" name="price" value="{{ old('price', $bundle->price) }}"
                                        class="form-control" placeholder="Masukkan Harga Paket" required>
                                </div>

                                <!-- Durasi -->
                                <div class="col-md-6 mb-3">
                                    <label for="duration" class="form-label">Durasi (hari)</label>
                                    <input type="number" id="duration" name="duration" value="{{ old('duration', $bundle->duration) }}"
                                        class="form-control" placeholder="Masukkan Durasi Paket" required>
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-md-12 mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea id="description" name="description" rows="4"
                                        class="form-control" placeholder="Masukkan Deskripsi Paket">{{ old('description', $bundle->description) }}</textarea>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="text-end mt-4">
                                <a href="{{ route('bundle.index') }}" class="btn btn-secondary">Batal</a>
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
