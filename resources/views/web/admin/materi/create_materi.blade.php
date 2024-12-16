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
                <span class="text-gray-700">Pilih Content</span>
                <select
                    name="id_content"
                    id="id_content"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-select focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    required
                >
                    <option value="">-- Pilih Content --</option>
                    @foreach ($content as $contentItem)
                        <option value="{{ $contentItem->id_content }}" {{ old('id_content') == $contentItem->id_content ? 'selected' : '' }}>{{ $contentItem->name_content }}</option>
                    @endforeach
                </select>
                @error('id_content')
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
