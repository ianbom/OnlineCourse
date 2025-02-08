@extends('web.layouts.newAdmin_app')

@section('title')
    Daftar Pertanyaan - {{ $materi->name_materi }}
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Pertanyaan</h3>
                    <p class="text-subtitle text-muted">Kelola pertanyaan untuk materi: {{ $materi->name_materi }}</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('materi.index') }}">Daftar Materi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Pertanyaan</li>
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
                                <h5 class="card-title">Data Pertanyaan</h5>
                                <a href="{{ route('question.create', $materi->id_materi) }}" class="btn btn-primary">Tambah Pertanyaan</a>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="table-responsive">
                                <table id="questionTable" class="table table-striped table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Pertanyaan</th>
                                            <th>Opsi Jawaban</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($question as $key => $q)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $q->question }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($q->option as $option)
                                                            <li class="{{ $option->is_correct ? 'text-success font-weight-bold' : '' }}">
                                                                {{ $option->option }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <a href="{{ route('question.edit', $q->id_question) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('question.delete', $q->id_question) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus?');">
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
            $('#questionTable').DataTable();
        });
    </script>
@endsection
