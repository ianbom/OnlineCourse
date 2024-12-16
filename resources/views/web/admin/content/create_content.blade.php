@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Buat Konten Baru</h1>

    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <!-- Pilih Course -->
            <label class="block text-sm">
                <span class="text-gray-700">Pilih Course</span>
                <select
                    name="id_course"
                    id="id_course"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-select focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    required
                >
                    <option value="">-- Pilih Course --</option>
                    @foreach ($course as $course)
                        <option value="{{ $course->id_course }}">{{ $course->name_course }}</option>
                    @endforeach
                </select>
            </label>

            <!-- Nama Konten -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Nama Konten</span>
                <input
                    type="text"
                    name="name_content"
                    id="name_content"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan nama konten"
                    required
                />
            </label>

            <!-- Submit -->
            <button
                type="submit"
                class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >
                Simpan
            </button>

            <a href="{{ route('content.index') }}" class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
