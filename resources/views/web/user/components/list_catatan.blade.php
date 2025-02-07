@forelse($course as $course)
    <div class="bg-white rounded-lg overflow-hidden flex flex-col">
        @if($course->image)
        <a href="{{ route('kelas.show', $course->id_course) }}">
            <img src="{{ asset('storage/' . $course->image) }}"
                 alt="{{ $course->name_course }}"
                 class="w-full aspect-[9/9] object-cover rounded-xl">
        </a>
        @endif
        <div class="p-1 flex-1 flex flex-col justify-between mt-4">
            <h3 class="font-semibold text-[15px] text-[#484848]" style="font-family: 'Inter', sans-serif;">
                {{ $course->name_course }}
            </h3>

            <!-- Display number of video materials -->
            <p class="text-[#F58A44] font-sm text-[14px] mb-2 mt-1" style="font-family: 'Inter', sans-serif;">
                {{ $course->materi->whereNotNull('video')->count() }} Video Materi
            </p>

            <div class="flex items-center justify-between mt-2 font-medium text-[12px] text-[#979797]" style="font-family: 'Inter', sans-serif;">
                <span class="flex items-center">
                    <span class="flex items-center bg-[#FDE4D3] rounded-xl p-2 mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                    </span>
                    {{ $course->materi->count() }} Modul
                </span>
                <span class="flex items-center">
                    <span class="flex items-center bg-[#FAFAD8] rounded-xl p-2 mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>
                    </span>
                    {{ $course->materi->count() }} Kuis
                </span>
            </div>

            {{-- <p class="text-gray-600 text-xs">{{ Str::limit($course->description, limit: 50) }}</p> --}}
            {{-- <div class="flex items-center justify-between mt-2 text-xs text-gray-500">
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
            </div> --}}
        </div>
    </div>
@empty
    <h1 class="text-gray-500 text-center">Tidak ada course yang tersedia saat ini.</h1>
@endforelse
