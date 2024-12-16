@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Detail Materi: {{ $materi->name_materi }}</h1>

    <!-- Success Message -->
    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <!-- Materi Details -->
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Nama Materi</h2>
            <p class="text-gray-700">{{ $materi->name_materi }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Deskripsi</h2>
            <p class="text-gray-700">{{ $materi->description }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Content</h2>
            <p class="text-gray-700">{{ $materi->content->name_content }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Course</h2>
            <p class="text-gray-700">{{ $materi->content->course->name_course }}</p>
        </div>
    </div>

    <!-- Video Section -->
    @if ($materi->video)
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Video Materi</h2>
        <div class="relative w-full">
            <video class="w-full h-auto rounded-lg" controls>
                <source src="{{ asset('storage/' . $materi->video) }}" type="video/mp4">
                Browser Anda tidak mendukung tag video.
            </video>
        </div>
    </div>
@else
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Video Materi</h2>
        <p class="text-gray-700">Video materi tidak tersedia.</p>
    </div>
@endif


    <!-- Text Book Section -->
    @if ($materi->text_book)
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Text Book</h2>
        <a href="{{ asset('storage/' . $materi->text_book) }}" target="_blank" class="text-blue-600 hover:underline">
            Download Text Book (PDF)
        </a>
    </div>
    @else
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Text Book</h2>
        <p class="text-gray-700">Text Book tidak tersedia.</p>
    </div>
    @endif

    <!-- Actions -->
    <div class="flex space-x-4 mt-8">
        <!-- Edit Button -->
        <a href="{{ route('materi.edit', $materi->id_materi) }}"
            class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            Edit Materi
        </a>

        <!-- Delete Button -->
        <form action="{{ route('materi.destroy', $materi->id_materi) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus materi ini?');">
            @csrf
            @method('DELETE')
            <button
                type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400">
                Hapus Materi
            </button>
        </form>

         <!-- Back Button -->
    <a href="{{ route('materi.index') }}"
    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-400">
       Kembali
    </a>

    </div>


</div>
@endsection
