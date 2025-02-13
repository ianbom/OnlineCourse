@extends('web.layouts.newAdmin_app')
@section('title')
    Edit Pertanyaan
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Pertanyaan</h3>
                <p class="text-subtitle text-muted">Perbarui informasi pertanyaan.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('question.index', $question->id_materi) }}">Daftar Pertanyaan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Pertanyaan</li>
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
                        <form action="{{ route('question.update', $question->id_question) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Materi Selection -->
                                <div class="col-md-6 mb-3">
                                    <label for="id_materi" class="form-label">Materi</label>
                                    <select name="id_materi" id="id_materi" class="form-control" required>
                                        @foreach ($materi as $m)
                                            <option value="{{ $m->id_materi }}" {{ $m->id_materi == $question->id_materi ? 'selected' : '' }}>
                                                {{ $m->name_materi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Question Input -->
                                <div class="col-md-12 mb-3">
                                    <label for="question" class="form-label">Pertanyaan</label>
                                    <textarea name="question" id="question" class="form-control" rows="4" required>{{ old('question', $question->question) }}</textarea>
                                </div>

                                <!-- Options Input -->
                                <div class="col-md-12 mb-3">
                                    <h5>Pilihan Jawaban</h5>
                                    <div id="options-container">
                                        @foreach ($question->option as $index => $option)
                                            <div class="input-group mb-2 option-item">
                                                <input type="text" name="option[{{ $index }}][option]" value="{{ $option->option }}" class="form-control" required>
                                                <div class="input-group-text">
                                                    <input type="radio" name="is_correct" value="{{ $index }}" {{ $option->is_correct ? 'checked' : '' }}>
                                                    <label class="ms-2">Benar</label>
                                                </div>
                                                <button type="button" class="btn btn-danger delete-option">Hapus</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" id="add-option" class="btn btn-primary mt-2">Tambah Pilihan</button>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="text-end mt-4">
                                <a href="{{ route('question.index', $question->id_materi) }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.getElementById('add-option').addEventListener('click', function () {
        const container = document.getElementById('options-container');
        const newOptionIndex = container.children.length;
        const newOption = document.createElement('div');
        newOption.classList.add('input-group', 'mb-2', 'option-item');
        newOption.innerHTML = `
            <input type="text" name="option[${newOptionIndex}][option]" class="form-control" placeholder="Pilihan jawaban" required>
            <div class="input-group-text">
                <input type="radio" name="is_correct" value="${newOptionIndex}">
                <label class="ms-2">Benar</label>
            </div>
            <button type="button" class="btn btn-danger delete-option">Hapus</button>
        `;
        container.appendChild(newOption);
    });

    document.getElementById('options-container').addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('delete-option')) {
            e.target.closest('.option-item').remove();
        }
    });
</script>
@endsection
