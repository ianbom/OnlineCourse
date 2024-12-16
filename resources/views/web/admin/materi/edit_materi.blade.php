@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Edit Materi</h1>

    <!-- Success Message -->
    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <!-- Error Message -->
    @if (session('error'))
    <div class="px-4 py-3 mb-8 bg-red-100 text-red-700 rounded-lg">
        {{ session('error') }}
    </div>
    @endif

    <!-- Materi Edit Form -->
    <form action="{{ route('materi.update', $materi->id_materi) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <!-- Nama Materi -->
            <label class="block text-sm">
                <span class="text-gray-700">Nama Materi</span>
                <input
                    type="text"
                    name="name_materi"
                    id="name_materi"
                    value="{{ old('name_materi', $materi->name_materi) }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:shadow-outline-purple @error('name_materi') border-red-500 @enderror"
                    placeholder="Masukkan nama materi"
                    required
                />
                @error('name_materi')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </label>

            <!-- Deskripsi -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Deskripsi</span>
                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:shadow-outline-purple @error('description') border-red-500 @enderror"
                    placeholder="Masukkan deskripsi materi"
                >{{ old('description', $materi->description) }}</textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </label>

            <!-- Materi Content (Choose Content) -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Pilih Content</span>
                <select
                    name="id_content"
                    id="id_content"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:shadow-outline-purple @error('id_content') border-red-500 @enderror"
                    required
                >
                    <option value="">Pilih Content</option>
                    @foreach ($content as $item)
                        <option value="{{ $item->id_content }}"
                            {{ old('id_content', $materi->id_content) == $item->id_content ? 'selected' : '' }}>
                            {{ $item->name_content }}
                        </option>
                    @endforeach
                </select>
                @error('id_content')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </label>

            <!-- Upload Video -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Video</span>
                <input
                    type="file"
                    name="video"
                    id="video"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:shadow-outline-purple @error('video') border-red-500 @enderror"
                    accept="video/*"
                />
                @error('video')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                @if ($materi->video)
                <video class="mt-2 w-full h-48 rounded-md" controls>
                    <source src="{{ asset('storage/' . $materi->video) }}" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
                @endif
            </label>

            <!-- Upload Text Book -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Text Book</span>
                <input
                    type="file"
                    name="text_book"
                    id="text_book"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:shadow-outline-purple @error('text_book') border-red-500 @enderror"
                    accept="application/pdf"
                />
                @error('text_book')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                @if ($materi->text_book)
                <p class="mt-2 text-sm text-gray-600">
                    <a href="{{ asset('storage/' . $materi->text_book) }}" class="text-blue-600 hover:underline" target="_blank">Lihat Text Book</a>
                </p>
                @endif
            </label>

            <!-- Submit Button -->
            <button
                type="submit"
                class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:shadow-outline-purple"
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
