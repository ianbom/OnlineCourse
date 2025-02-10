@extends('web.layouts.newAdmin_app')

@section('title')
    Tambah Pertanyaan
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Pertanyaan</h3>
                    <p class="text-subtitle text-muted">Tambahkan pertanyaan untuk materi: {{ $materi->name_materi }}</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('question.index', $materi->id_materi) }}">Daftar Pertanyaan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Pertanyaan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('question.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_materi" value="{{ $materi->id_materi }}">

                                <div class="mb-3">
                                    <label for="question" class="form-label">Pertanyaan</label>
                                    <textarea name="question" id="question" rows="4" class="form-control" required>{{ old('question') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <h5 class="mb-2">Pilihan Jawaban</h5>
                                    <div id="options-container">
                                        <div class="input-group mb-2">
                                            <input type="text" name="option[]" class="form-control" placeholder="Pilihan jawaban" required>
                                            <span class="input-group-text">
                                                <input type="radio" name="is_correct" value="0" class="form-check-input">
                                            </span>
                                        </div>
                                    </div>
                                    <button type="button" id="add-option" class="btn btn-primary btn-sm">Tambah Pilihan</button>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-success">Simpan Pertanyaan</button>
                                    <a href="{{ route('question.index', $materi->id_materi) }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('add-option').addEventListener('click', function () {
            const container = document.getElementById('options-container');
            const newOption = document.createElement('div');
            newOption.classList.add('input-group', 'mb-2');
            newOption.innerHTML = `
                <input type="text" name="option[]" class="form-control" placeholder="Pilihan jawaban" required>
                <span class="input-group-text">
                    <input type="radio" name="is_correct" value="${container.children.length}" class="form-check-input">
                </span>
            `;
            container.appendChild(newOption);
        });
    </script>
@endsection
