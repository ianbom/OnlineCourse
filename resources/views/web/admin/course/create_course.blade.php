@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Buat Course Baru</h1>

    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <!-- Nama Course -->
            <label class="block text-sm">
                <span class="text-gray-700">Nama Course</span>
                <input
                    type="text"
                    name="name_course"
                    id="name_course"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan nama course"
                    required
                />
            </label>

            <!-- Deskripsi -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Deskripsi</span>
                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-textarea focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan deskripsi course"
                ></textarea>
            </label>

            <!-- Upload Gambar -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Gambar</span>
                <input
                    type="file"
                    name="image"
                    id="image"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    accept="image/jpeg,image/png"
                />
            </label>

            <!-- Upload Video -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Video</span>
                <input
                    type="file"
                    name="video"
                    id="video"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    accept="video/mp4, video/mkv, video/webm, video/avi, video/mpeg"
                />
            </label>

            {{-- Category --}}
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Pilih Kategori</span>
            </label>
            <div class="grid grid-cols-2 gap-4 mt-2">
                @foreach ($category as $cat)
                    <label class="flex items-center">
                        <input
                            type="checkbox"
                            name="category[]"
                            value="{{ $cat->id_category }}"
                            class="form-checkbox h-4 w-4 text-indigo-600"
                        >
                        <span class="ml-2 text-gray-700">{{ $cat->name_category }}</span>
                    </label>
                @endforeach
            </div>



            <!-- Submit -->
            <button
                type="submit"
                class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >
                Simpan
            </button>

            <a href="{{ route('course.index') }}" class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-400">Kembali</a>
        </div>
    </form>
</div>


@endsection
