@forelse($course as $course)
    <div class="bg-white rounded-lg overflow-hidden flex flex-col">
        @if($course->image)
        <a href="{{ route('kelas.show', $course->id_course) }}">
            <img src="{{ asset('storage/' . $course->image) }}"
                 alt="{{ $course->name_course }}"
                 class="w-full aspect-[9/16] object-cover rounded-xl">
        </a>
        @endif
        <div class="p-3 flex-1 flex flex-col justify-between">
            <h3 class="font-medium text-sm">{{ $course->name_course }}</h3>
            <p class="text-gray-600 text-xs">{{ Str::limit($course->description, 50) }}</p>
            <div class="flex items-center justify-between mt-2 text-xs text-gray-500">
                <span class="flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $course->created_at->diffForHumans() }}
                </span>
                @if($course->video)
                <span class="flex items-center">
                    <svg class="w-3 h-3 mr-1 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm-1 11V7l5 3-5 3z"/>
                    </svg>
                    Video Tersedia
                </span>
                @endif
            </div>
        </div>
    </div>
@empty
    <h1 class="text-gray-500 text-center">Tidak ada course yang tersedia saat ini.</h1>
@endforelse
