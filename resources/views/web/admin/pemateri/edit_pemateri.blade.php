@extends('web.layouts.newAdmin_app')
@section('title')
    Edit Pemateri
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Pemateri</h3>
                <p class="text-subtitle text-muted">Perbarui informasi pemateri.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pemateri.index') }}">Daftar Pemateri</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Pemateri</li>
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
                        <form action="{{ route('pemateri.update', $pemateri->id_pemateri) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Nama Pemateri -->
                                <div class="col-md-6 mb-3">
                                    <label for="nama" class="form-label">Nama Pemateri</label>
                                    <input type="text" id="nama" name="nama" value="{{ old('nama', $pemateri->nama) }}"
                                        class="form-control" placeholder="Masukkan Nama Pemateri" required>
                                </div>

                                <!-- Foto -->
                                <div class="col-md-6 mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" id="foto" name="foto" class="form-control">
                                    @if($pemateri->foto)
                                        <img src="{{ asset('storage/' . $pemateri->foto) }}" alt="Foto Pemateri" class="w-50 rounded mt-2">
                                    @endif
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-md-12 mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea id="deskripsi" name="deskripsi" rows="4"
                                        class="form-control" placeholder="Masukkan Deskripsi Pemateri" required>{{ old('deskripsi', $pemateri->deskripsi) }}</textarea>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="text-end mt-4">
                                <a href="{{ route('pemateri.index') }}" class="btn btn-secondary">Batal</a>
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
