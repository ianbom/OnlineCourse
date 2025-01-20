@extends('web.layouts.user_app')

@section('content')
<div class="container mx-auto mt-8 px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <!-- Course Header -->
        <div class="mb-8">
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
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold mb-2">Kelas Pengembangan Diri: {{ $course->name_course }}</h1>
                        <div class="text-gray-600">
                            <p class="text-gray-600 mb-4">{{ $course->description }}</p>
                        </div>

                        <!-- Stats Bar -->
                        <div class="flex gap-4 mt-6">
                            <div class="flex items-center gap-2 bg-orange-100 px-4 py-2 rounded-lg">
                                <i class="fas fa-book text-orange-500"></i>
                                <span>{{ $course->materi->count() }} Bacaan</span>
                            </div>
                            <div class="flex items-center gap-2 bg-orange-100 px-4 py-2 rounded-lg">
                                <i class="fas fa-video text-orange-500"></i>
                                <span>{{ $course->materi->whereNotNull('video')->count() }} Video</span>
                            </div>
                            <div class="flex items-center gap-2 bg-orange-100 px-4 py-2 rounded-lg">
                                <i class="fas fa-question-circle text-orange-500"></i>
                                <span>Kuis</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Reviews and Ratings -->
        <div class="mb-8">
            <h2 class="text-xl font-bold mb-4">Rating dan Ulasan</h2>
            @forelse ($course->rating as $rating)
                <div class="mb-4 p-4 border rounded-lg bg-gray-50">
                    <div class="flex ">
                        <div>
                            <h4 class="font-semibold">{{ $rating->user->name }}</h4>
                            <p class="text-sm text-gray-500">{{ $rating->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $rating->rating ? 'text-yellow-500' : 'text-gray-300' }}"> ✩ </i>
                            @endfor
                        </div>
                    </div>
                    <p class="mt-2 text-gray-700">{{ $rating->comment }}</p>
                </div>
            @empty
                <p class="text-gray-500">Belum ada ulasan untuk kursus ini.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
