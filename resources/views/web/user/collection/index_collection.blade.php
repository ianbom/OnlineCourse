@extends('web.layouts.user_app')

@section('content')

    <div class="container mx-auto p-10">

        <!-- Header Section -->
        <div class="mb-4">
            <h1 class="text-[40px] font-bold text-left text-[#052D6E] mb-10" style="font-family: 'Libre Baskerville', serif;">
                Perpustakaan</h1>

            <!-- Last Read Section -->
            @if ($lastRead)
                <h2 class="text-[18px] font-semibold mb-4 text-[#052D6E]" style="font-family: 'Inter', sans-serif;">Terakhir Dibaca</h2>
                <div class="bg-[#D3E9FF] rounded-[16px] p-4 inline-block mb-10">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $lastRead->image) }}" alt="Last Course" class="w-32 h-280 object-cover rounded-[16px]">
                        <div>
                            <p class="text-[#052D6E] font-bold mb-2 ">{{ $lastRead->name_course }}</p>
                            <p class="text-sm text-[#979797] font-bold">{{ $lastRead->description }}</p>

                            @if ($lastRead->video)
                                <!-- Video Player -->
                                <div class="mt-4 bg-white rounded-[16px] h-16 flex items-center px-4 w-full">
                                    <video controls controlsList="nodownload" class="custom-video">
                                        <source src="{{ asset('storage/' . $lastRead->video) }}" type="video/mp4">
                                        Browser Anda tidak mendukung pemutar video.
                                    </video>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <p class="text-[#979797]">Tidak ada kursus yang terakhir dibaca.</p>
            @endif
        </div>

        <!-- Saved Courses Section -->
        <div class="mb-20">
            <div class="flex mt-6 mb-6 items-center">
                <div class="text-center bg-[#052D6E] p-2 rounded-[6px] mr-4 flex items-center justify-center">
                    <i class="fas fa-save text-white text-[18px]"></i>
                </div>
                <h2 class="text-[18px] font-semibold text-[#052D6E]" style="font-family: 'Inter', sans-serif;">Tersimpan</h2>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach ($savedCourse as $course)
                    <div class="bg-white rounded-[16px] overflow-hidden border-2 border-transparent hover:border-[#D3E9FF] transition-all">
                        <a href="{{ route('kelas.show', $course->id_course) }}">
                            <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" class="w-full h-128 object-cover rounded-[16px]">
                        </a>
                        <div class="p-4">
                            <h3 class="text-[#052D6E] text-[14px] font-semibold mb-2" style="font-family: 'Inter', sans-serif;">{{ $course->name_course }}</h3>
                            <p class="text-[#979797] font-medium text-[14px]" style="font-family: 'Inter', sans-serif;">{{ $course->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Finished Courses Section -->
        <div class="mt-10">
            <div class="flex mt-6 mb-6 items-center">
                <div class="text-center bg-[#052D6E] p-2 rounded-[6px] mr-4 flex items-center justify-center">
                    <i class="fas fa-check-circle text-white text-[18px]"></i>
                </div>
                <h2 class="text-[18px] font-semibold text-[#052D6E]" style="font-family: 'Inter', sans-serif;">Selesai</h2>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach ($finishedCourse as $course)
                    <div class="bg-white rounded-[16px] overflow-hidden border-2 border-transparent hover:border-[#D3E9FF] transition-all">
                        <a href="{{ route('kelas.show', $course->id_course) }}">
                            <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" class="w-full h-128 object-cover rounded-[16px]">
                        </a>
                        <div class="p-4">
                            <h3 class="text-[#052D6E] text-[14px] font-semibold mb-2" style="font-family: 'Inter', sans-serif;">{{ $course->name_course }}</h3>
                            <p class="text-[#979797] font-medium text-[14px]" style="font-family: 'Inter', sans-serif;">{{ $course->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
