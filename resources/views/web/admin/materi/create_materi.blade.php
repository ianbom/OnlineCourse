@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Buat Materi Baru</h1>

    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <!-- Pilih Content -->
            <label class="block text-sm">
                <span class="text-gray-700">Pilih Modul</span>
                <select
                    name="id_course"
                    id="id_course"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-select focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    required
                >
                    <option value="">-- Pilih Modul --</option>
                    @foreach ($course as $courseItem)
                        <option value="{{ $courseItem->id_course }}" {{ old('id_course') == $courseItem->id_course ? 'selected' : '' }}>{{ $courseItem->name_course }}</option>
                    @endforeach
                </select>
                @error('id_course')
                    <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
                @enderror
            </label>

            <label class="block text-sm">
                <span class="text-gray-700">Pilih Tipe</span>
                <select
                    name="type"
                    id="type"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-select focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    required
                >
                    <option value="">-- Pilih Tipe --</option>
                    <option value="materi">Materi</option>
                    <option value="modul">Modul</option>
                    <option value="quiz">Quiz</option>
                </select>
                @error('type')
                    <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
                @enderror
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700">Apakah Gratis?</span>
                <select
                    name="is_free"
                    id="is_free"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-select focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    required
                >
                    <option value="">-- Pilih Opsi --</option>
                    <option value="1" {{ old('is_free') == '1' ? 'selected' : '' }}>Gratis</option>
                    <option value="0" {{ old('is_free') == '0' ? 'selected' : '' }}>Berbayar</option>
                </select>
                @error('is_free')
                    <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
                @enderror
            </label>

            <!-- Nama Materi -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Nama Materi</span>
                <input
                    type="text"
                    name="name_materi"
                    id="name_materi"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan nama materi"
                    value="{{ old('name_materi') }}"
                    required
                />
                @error('name_materi')
                    <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
                @enderror
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Deskripsi</span>
                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-textarea focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan deskripsi materi"
                ></textarea>
                @error('description')
                <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
                @enderror
            </label>

            <!-- Video -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Video</span>
                <input
                    type="file"
                    name="video"
                    id="video"
                    accept="video/mp4, video/mkv, video/webm, video/avi, video/mpeg"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                />
                @error('video')
                    <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
                @enderror
            </label>

            <!-- Textbook -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Text Book (PDF)</span>
                <input
                    type="file"
                    name="text_book"
                    id="text_book"
                    accept="application/pdf"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                />
                @error('text_book')
                    <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
                @enderror
            </label>

            <!-- Submit -->
            <button
                type="submit"
                class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >
                Simpan
            </button>

            <a href="{{ route('materi.index') }}" class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                Kembali
            </a>
        </div>
    </form>

</div>
@endsection
