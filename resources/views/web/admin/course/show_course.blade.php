@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Detail Course</h1>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <!-- Nama Course -->
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Nama Course</h2>
            <p class="text-gray-700">{{ $course->name_course }}</p>
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Deskripsi</h2>
            <p class="text-gray-700">{{ $course->description }}</p>
        </div>

        <!-- Gambar -->
        @if ($course->image)
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Gambar</h2>
            <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" class="h-64 w-auto mt-2 rounded">
        </div>
        @endif

        <!-- Video -->
        @if ($course->video)
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Video</h2>
            <video class="mt-2 w-full h-64" controls>
                <source src="{{ asset('storage/' . $course->video) }}" type="video/mp4">
                Browser Anda tidak mendukung tag video.
            </video>
        </div>
        @endif

        <!-- Tombol Aksi -->
        <div class="mt-6 flex space-x-4">
            <a href="{{ route('course.edit', $course->id_course) }}"
               class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Edit Course</a>
            <form action="{{ route('course.destroy', $course->id_course) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus course ini?')">Hapus Course</button>
            </form>
        </div>
    </div>

    <!-- Tabel Konten -->
    <div class="mt-8 px-4 py-3 bg-white rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Daftar Konten</h2>
        @if ($course->content && $course->content->isNotEmpty())
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Nama Konten</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                @foreach ($course->content as $index => $content)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 text-sm">{{ $content->name_content }}</td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex space-x-2">
                                <a href="{{ route('content.show', $content->id_content) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg focus:outline-none focus:shadow-outline-blue" aria-label="Detail">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.5 3.5C7 3.5 4 7 4 10s3 6.5 5.5 6.5S15 13 15 10 12 3.5 9.5 3.5zM9.5 5c1.5 0 4 3.5 4 5s-2.5 5-4 5-4-3.5-4-5 2.5-5 4-5zm0 1.5C8.67 6.5 8 7.17 8 8s.67 1.5 1.5 1.5S11 8.83 11 8s-.67-1.5-1.5-1.5z"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @else
        <p class="text-gray-600">Tidak ada konten untuk course ini.</p>
        @endif
    </div>



</div>
@endsection
