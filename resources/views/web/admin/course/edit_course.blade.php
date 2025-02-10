@extends('web.layouts.newAdmin_app')

@section('title')
    Edit Course
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Course</h3>
                <p class="text-subtitle text-muted">Perbarui informasi course.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Daftar Course</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
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

                        <form action="{{ route('course.update', $course->id_course) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Nama Course -->
                                <div class="col-md-6 mb-3">
                                    <label for="name_course" class="form-label">Nama Course</label>
                                    <input type="text" name="name_course" id="name_course" value="{{ old('name_course', $course->name_course) }}" class="form-control" placeholder="Masukkan Nama Course" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="id_pemateri" class="form-label">Pilih Pemateri</label>
                                    <select name="id_pemateri" id="id_pemateri" class="form-control" required>
                                        <option value="">Pilih Pemateri</option>
                                        @foreach ($pemateri as $item)
                                            <option value="{{ $item->id_pemateri }}" {{ old('id_pemateri', $course->id_pemateri) == $item->id_pemateri ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Gambar -->
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Gambar</label>
                                    <input type="file" name="image" id="image" accept="image/jpeg,image/png" class="form-control">
                                    @if ($course->image)
                                        <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" class="w-50 rounded mt-2">
                                    @endif
                                </div>

                                <!-- Video -->
                                <div class="col-md-12 mb-3">
                                    <label for="video" class="form-label">Video</label>
                                    <input type="file" name="video" id="video" accept="video/*" class="form-control">
                                    @if ($course->video)
                                    <video class="mt-2 w-100 rounded" controls>
                                        <source src="{{ asset('storage/' . $course->video) }}" type="video/mp4">
                                        Browser Anda tidak mendukung tag video.
                                    </video>
                                    @endif
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-md-12 mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea name="description" id="description" rows="4" class="form-control" placeholder="Masukkan Deskripsi Course" required>{{ old('description', $course->description) }}</textarea>
                                </div>

                                <!-- Kategori -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Pilih Kategori</label>
                                    <div class="row">
                                        @foreach ($category as $cat)
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="category[]" value="{{ $cat->id_category }}" @if ($course->category->contains($cat->id_category)) checked @endif>
                                                    <label class="form-check-label">{{ $cat->name_category }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="text-end mt-4">
                                <a href="{{ route('course.index') }}" class="btn btn-secondary">Batal</a>
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
