@extends('web.layouts.user_app')

@section('content')
<div class="container mx-auto mt-8 px-4 py-8">
    <div class="max-w-6xl mx-auto">

        <!-- Course Header -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row gap-8">

                <!-- Left Column - Course Image -->
                <div class="w-full md:w-1/3 relative">
                    <div class="bg-[#F58A44] rounded-[16px] p-4 shadow-lg flex items-center justify-center">
                        @if($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}"
                                alt="{{ $course->name_course }}"
                                class="w-full aspect-[9/9] object-cover rounded-[16px]">
                        @endif
                    </div>
                </div>

                <!-- Right Column - Course Info -->
                <div class="w-full md:w-2/3">
                    <h2 class="text-3xl md:text-[40px] font-bold text-gray-800 mb-4" style="font-family: 'Libre Baskerville', serif;">
                        Kelas Pengembangan Diri:
                        <span class="text-[#F58A44]">{{ $course->name_course }}</span>
                    </h2>
                    <p class="text-base md:text-[18px] text-[#484848] leading-relaxed font-regular" style="font-family: 'Inter', sans-serif;">
                        {{ $course->description }}
                    </p>

                    <!-- Stats Bar -->
                    <div class="flex flex-col md:flex-row gap-3 mt-12">
                        <!-- Bacaan -->
                        <div class="flex items-center justify-center gap-2 bg-[#FDE4D3] px-4 py-2 rounded-[16px] border border-[#F58A44]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F58A44" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                            <span class="text-[#F58A44] font-inter text-center">{{ $course->materi->count() }} Bacaan</span>
                        </div>

                        <!-- Video -->
                        <div class="flex items-center justify-center gap-2 bg-[#C5AB9A] px-4 py-2 rounded-[16px] border border-[#6F2E03]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6F2E03" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                            <span class="text-[#6F2E03] font-inter text-center">{{ $course->materi->whereNotNull('video')->count() }} Video</span>
                        </div>

                        <!-- Video (duplicate, mungkin perlu diperbaiki) -->
                        <div class="flex items-center justify-center gap-2 bg-[#FFEED0] px-4 py-2 rounded-[16px] border border-[#957F2E]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#957F2E" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                            </svg>
                            <span class="text-[#957F2E] font-inter font-medium text-[16px] text-center">{{ $course->materi->whereNotNull('video')->count() }} Video</span>
                        </div>
                    </div>

                    <!-- Course completion and saving actions -->
                    <div class="flex flex-col    md:flex-row gap-3 mt-4 w-full md:w-auto">
                        @if ($checkSelesai)
                            <form action="{{ route('kelas.hapusSelesaikan', $course->id_course) }}" method="POST" class="w-full md:w-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full flex items-center justify-center gap-2 bg-[#946C51] px-4 py-2 rounded-[16px] border border-[#946C51] text-white font-inter font-medium text-[16px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Batal selesai
                                </button>
                            </form>
                        @else
                            <form action="{{ route('kelas.selesaikan', $course->id_course) }}" method="POST" class="w-full md:w-auto">
                                @csrf
                                <button type="submit" class="w-full flex items-center justify-center gap-2 bg-[#B8805B] px-4 py-2 rounded-[16px] border border-[#B8805B] text-white font-inter font-medium text-[16px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Selesaikan
                                </button>
                            </form>
                        @endif

                        @if ($checkSimpan)
                            <form action="{{ route('delete.save', $course->id_course) }}" method="POST" class="w-full md:w-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full flex items-center justify-center gap-2 bg-[#6F2E03] text-white px-4 py-2 rounded-[16px] border border-[#6F2E03] font-inter font-medium text-[16px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                    </svg>
                                    Batal Simpan
                                </button>
                            </form>
                        @else
                            <form action="{{ route('belajar.save', $course->id_course) }}" method="POST" class="w-full md:w-auto">
                                @csrf
                                <button type="submit" class="w-full flex items-center justify-center gap-2 bg-[#6F2E03] text-white px-4 py-2 rounded-[16px] border border-[#6F2E03] font-inter font-medium text-[16px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                    </svg>
                                    Simpan
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Course Content -->
        <div class="mt-16">
            <div class="flex flex-col md:flex-row justify-between items-center mb-4">
                <h2 class="font-semibold mb-4 text-2xl md:text-[28px]" style="font-family: 'Libre Baskerville', serif; font-weight: bold; color: #1A1A1A;">Konten tersedia</h2>
                <!-- CTA Button -->
                <a href="{{ route('kelas.belajar', $course->materi->first()->id_materi) }}" class="w-full md:w-auto bg-[#F58A44] px-8 py-3 rounded-lg inline-block hover:bg-[#6F2E03] mt-4 md:mt-0 text-center" style="font-family: 'Inter', sans-serif; font-size: 16px; color: white; font-weight: semibold;">
                    BELAJAR SEKARANG
                </a>
            </div>
            <div class="space-y-4">
                @forelse ($course->materi as $index => $materi)
                    <div class="flex items-center justify-between bg-white rounded-lg p-4 border">
                        <div class="flex items-center gap-4">
                            @if ($materi->is_free)
                                <div class="w-10 h-10 flex items-center justify-center bg-[#F58A44] rounded-full text-white">
                                    <!-- Icon SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                                    </svg>
                                </div>
                                <div>
                                    <a href="{{ route('kelas.belajar', $materi->id_materi) }}" class="font-medium" style="font-family: 'Inter', sans-serif; font-weight: 500; font-size: 18px; color: #484848;">
                                        {{ $index + 1 }}. {{ $materi->name_materi }}
                                    </a>
                                </div>
                            @else
                                @if ($subscription)
                                    <div class="w-10 h-10 flex items-center justify-center bg-[#F58A44] rounded-full text-white">
                                        <!-- Icon SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <a href="{{ route('kelas.belajar', $materi->id_materi) }}" class="font-medium" style="font-family: 'Inter', sans-serif; font-weight: 500; font-size: 18px; color: #484848;">
                                            {{ $index + 1 }}. {{ $materi->name_materi }}
                                        </a>
                                    </div>
                                @else
                                    <span>Anda harus langganan untuk melihat materi ini.</span>
                                @endif
                            @endif
                        </div>
                    </div>
                @empty
                    <p>No materials available for this course.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
