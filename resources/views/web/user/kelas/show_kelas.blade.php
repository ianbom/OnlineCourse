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

                            @if ($checkSelesai)
                            <form action="{{ route('kelas.hapusSelesaikan', $course->id_course) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg bg-red-500 rounded-lg p-2">Hapus selesai</button>
                            </form>
                            @else
                            <form action="{{ route('kelas.selesaikan', $course->id_course) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg bg-blue-300 p-1 rounded-lg text-white">Selesaikan</button>
                            </form>
                            @endif


                            @if ($checkSimpan)
                            <form action="{{ route('delete.save', $course->id_course) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-800 text-white px-4 py-2 rounded-lg">
                                    Hapus dr simpan
                                </button>
                            </form>
                            @else
                            <form action="{{ route('belajar.save', $course->id_course) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-blue-800 text-white px-4 py-2 rounded-lg">
                                    SIMPAN
                                </button>
                            </form>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Course Content -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Konten tersedia</h2>
            <div class="space-y-4">
                @forelse ($course->materi as $index => $materi)
                    <div class="flex items-center justify-between bg-white rounded-lg p-4 border">
                        <div class="flex items-center gap-4">
                            @if ($materi->is_free)
                                {{-- Jika materi gratis (is_free = true), semua orang bisa melihat --}}
                                <div class="w-10 h-10 flex items-center justify-center bg-orange-500 rounded-full text-white">
                                    <i class="fas fa-play"></i>
                                </div>
                                <div>
                                    <a href="{{ route('kelas.belajar', $materi->id_materi) }}" class="font-medium">
                                        {{ $index + 1 }}. {{ $materi->name_materi }}
                                    </a>
                                </div>
                            @else

                                @if ($subscription)
                                    <div class="w-10 h-10 flex items-center justify-center bg-orange-500 rounded-full text-white">
                                        <i class="fas fa-play"></i>
                                    </div>
                                    <div>
                                        <a href="{{ route('kelas.belajar', $materi->id_materi) }}" class="font-medium">
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

            <!-- CTA Button -->
            <div class="mt-8 text-center">
                <a href="{{ route('kelas.belajar', $course->materi->first()->id_materi) }}" class="bg-orange-500 text-white px-8 py-3 rounded-lg inline-block hover:bg-orange-600">
                    BELAJAR SEKARANG
                </a>
            </div>
        </div>
    </div>
</div>
@endsection


