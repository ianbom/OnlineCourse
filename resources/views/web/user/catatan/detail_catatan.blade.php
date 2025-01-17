@extends('web.layouts.user_app')

@section('content')
<div class="container mx-auto mt-8 px-4 py-8">
    <div class="max-w-6xl mx-auto  p-8">
        <!-- Header -->
        <h1 class="text-3xl font-bold mb-8 text-orange-500">CATATAN</h1>

        <!-- Course Header -->
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Left Column - Course Image -->
            <div class="w-full md:w-1/3">
                @if($course->image)
                    <div class="rounded-lg overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/' . $course->image) }}"
                            alt="{{ $course->name_course }}"
                            class="w-full object-cover">
                    </div>
                @endif
            </div>

            <!-- Right Column - Course Info -->
            <div class="w-full md:w-2/3">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">
                    Kelas Pengembangan Diri:
                    <span class="text-orange-500">{{ $course->name_course }}</span>
                </h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    {{ $course->description }}
                </p>
            </div>
        </div>

        <!-- Notes Section -->
        <div class="mt-8">
            <h2 class="text-xl font-bold mb-4 text-gray-800">Catatan Anda</h2>
            @if($note->isNotEmpty())
                <div class="bg-orange-100 rounded-lg p-4 shadow-md">
                    @foreach($note as $noteItem)
                        <div class="mb-4 border-b pb-4">
                            <p class="text-gray-800">{{ $noteItem->note }}</p>
                            <p class="text-sm text-gray-500">
                                Ditulis pada: {{ $noteItem->created_at->format('d M Y, H:i') }}
                            </p>
                            <form action="{{ route('catatan.delete', $noteItem->id_note) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                    Hapus Catatan
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 italic">Tidak ada catatan untuk kursus ini.</p>
            @endif
        </div>
    </div>
</div>
@endsection
