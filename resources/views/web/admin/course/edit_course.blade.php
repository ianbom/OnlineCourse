@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Edit Course</h1>

    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('course.update', $course->id_course) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <!-- Nama Course -->
            <label class="block text-sm">
                <span class="text-gray-700">Nama Course</span>
                <input
                    type="text"
                    name="name_course"
                    id="name_course"
                    value="{{ old('name_course', $course->name_course) }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
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
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                    placeholder="Masukkan deskripsi course"
                >{{ old('description', $course->description) }}</textarea>
            </label>

            <!-- Upload Gambar -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Gambar</span>
                <input
                    type="file"
                    name="image"
                    id="image"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                    accept="image/jpeg,image/png"
                />
                @if ($course->image)
                <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" class="mt-2 h-32 rounded-md">
                @endif
            </label>

            <!-- Upload Video -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Video</span>
                <input
                    type="file"
                    name="video"
                    id="video"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                    accept="video/*"
                />
                @if ($course->video)
                <video class="mt-2 w-full h-48 rounded-md" controls>
                    <source src="{{ asset('storage/' . $course->video) }}" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
                @endif
            </label>

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
                            @if ($course->category->contains($cat->id_category)) checked @endif
                        >
                        <span class="ml-2 text-gray-700">{{ $cat->name_category }}</span>
                    </label>
                @endforeach
                
            </div>

            <!-- Submit -->
            <button
                type="submit"
                class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:shadow-outline-purple"
            >
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
