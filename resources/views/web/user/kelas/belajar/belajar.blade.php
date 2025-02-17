@extends('web.layouts.baca_app')

@section('content')
<div class="container mx-auto px-4 py-4">
    <div class="max-w-4xl mx-auto relative">

        @if (session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-200 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="p-4 mb-4 text-red-800 bg-red-200 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <!-- Nama Course -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <!-- Header Materi -->
            <div class="text-left border-b pb-6 mb-4">
                <div class="text-[#F58A44] font-semibold text-right mb-10" style="font-family: 'Inter', sans-serif; font-size: 16px;">{{ $materi->course->name_course ?? 'Nama Kursus Tidak Tersedia' }}</div>
                <h1 class="text-[40px] font-bold text-[#1A1A1A]" style="font-family: 'Libre Baskerville', serif; font-weight: bold; font-size: 40px;">
                    {{ $materi->name_materi ?? 'Materi Tidak Ditemukan' }}
                </h1>
            </div>

            {{-- <!-- Isi Materi -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Deskripsi Materi</h2>
                <p class="text-gray-600 leading-relaxed">{{ $materi->description ?? 'Deskripsi tidak tersedia.' }}</p>
            </div> --}}

            <!-- Buku Materi -->
            <div class="w-[365px] max-w-2xl bg-[#FDE4D3] rounded-[16px] p-6">
                {{-- <!-- Judul -->
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Buku Pendukung</h2> --}}

                <!-- Ikon & Nama Buku -->
                <div class="flex items-center">
                    <!-- Icon Buku -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 48 48">
                        <path fill="#FF8A65" d="M41,10H25v28h16c0.553,0,1-0.447,1-1V11C42,10.447,41.553,10,41,10z"></path>
                        <path fill="#FBE9E7" d="M24 29H38V31H24zM24 33H38V35H24zM30 15c-3.313 0-6 2.687-6 6s2.687 6 6 6 6-2.687 6-6h-6V15z"></path>
                        <path fill="#FBE9E7" d="M32,13v6h6C38,15.687,35.313,13,32,13z"></path>
                        <path fill="#E64A19" d="M27 42L6 38 6 10 27 6z"></path>
                        <path fill="#FFF" d="M16.828,17H12v14h3v-4.823h1.552c1.655,0,2.976-0.436,3.965-1.304c0.988-0.869,1.484-2.007,1.482-3.412C22,18.487,20.275,17,16.828,17z M16.294,23.785H15v-4.364h1.294c1.641,0,2.461,0.72,2.461,2.158C18.755,23.051,17.935,23.785,16.294,23.785z"></path>
                    </svg>

                    <!-- Nama Buku -->
                    <div class="ml-4 flex-grow" style="font-family: 'Inter', sans-serif; font-size: 16px; color: #484848;">
                        @if (!empty($materi->text_book))
                            <p class="text-gray-600">{{ $materi->name_materi }}</p>
                        @else
                            <p class="text-gray-500">Tidak ada buku untuk materi ini.</p>
                        @endif
                    </div>
                </div>

                <!-- Button Download di kanan bawah -->
                @if (!empty($materi->text_book))
                    <div class="flex justify-end mt-4">
                        <a href="{{ asset('storage/' . $materi->text_book) }}"
                        class="bg-white text-[#F58A44] px-6 py-2 rounded-[12px] uppercase font-medium
                                hover:bg-[#F58A44] hover:text-white transition-all duration-300"
                        style="font-family: 'Inter', sans-serif; font-size: 14px;">
                            Unduh
                        </a>
                    </div>
                @endif
            </div>


            <!-- Garis Pemisah -->
            <hr class="border-t-1 border-[#F58A44] mb-6 mt-12">

            <!-- Header Video -->
            {{-- <div class="text-left border-b pb-6 mb-4">
                <div class="text-[#F58A44] font-semibold text-right mb-10" style="font-family: 'Inter', sans-serif; font-size: 16px;">{{ $materi->course->name_course ?? 'Nama Kursus Tidak Tersedia' }}</div>
                <h1 class="text-[40px] font-bold text-[#1A1A1A]" style="font-family: 'Libre Baskerville', serif; font-weight: bold; font-size: 40px;">
                    {{ $materi->name_materi ?? 'Materi Tidak Ditemukan' }}
                </h1>
            </div> --}}

            <!-- Video Materi -->
            <div class="mb-8 bg-[#FDE4D3] p-6 rounded-[16px] relative mt-12">
                {{-- <h2 class="text-xl font-semibold text-gray-800 mb-4">Video Materi</h2> --}}
                @if (!empty($materi->video))
                    <div class="relative">
                        <video id="materiVideo" controls class="w-full rounded-[16px] border">
                            <source src="{{ asset('storage/' . $materi->video) }}" type="video/mp4">
                            Browser Anda tidak mendukung pemutar video.
                        </video>
                        <!-- Tombol Play Custom -->
                        <button
                            id="playButton"
                            class="absolute inset-0 flex items-center justify-center"
                            onclick="playVideo()">
                            <div class="bg-[#F58A44] w-20 h-20 rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6 4l10 6-10 6V4z"></path>
                                </svg>
                            </div>
                        </button>
                    </div>
                @else
                    <p class="text-gray-500">Tidak ada video untuk materi ini.</p>
                @endif
            </div>

            <button type="submit" class="flex items-center gap-2 bg-[#6F2E03] px-4 py-2 rounded-[12px] text-white font-inter font-semibold text-[14px]" style="font-family: 'Inter', sans-serif;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>
                Tandai Selesai
            </button>

            {{-- @if ($checkSelesai)
                <form action="{{ route('materi.hapusSelesaikan', $course->id_course) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center gap-2 bg-[#946C51] px-4 py-2 rounded-[16px] border border-[#946C51] text-white font-inter font-medium text-[16px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Batal selesai
                    </button>
                </form>
            @else
                <form action="{{ route('materi.selesaikan', $course->id_course) }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 bg-[#B8805B] px-4 py-2 rounded-[16px] text-white">
                        Tandai Selesai
                    </button>
                </form>
            @endif --}}



            @if ($question)
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Quiz </h2>
                    <a href="{{ route('quiz.kerjakan', $materi->id_materi) }}" class="bg-green-500 p-2 rounded-md text-white">Kerjakan quiz</a>
                    <p>Nilai anda {{ $nilai }} / {{ $totalSoal }}</p>
                </div>
            @endif

            <!-- Garis Pemisah -->
            <hr class="border-t-1 border-[#F58A44] mb-6 mt-12">

            <!-- Tombol Navigasi -->
<div class="flex justify-between items-center mt-8 pt-6 border-t">
    <a href="{{ route('kelas.show', $materi->id_course) }}"
        class="inline-flex items-center px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
        <i class="fas fa-arrow-left mr-2"></i>Kembali
    </a>

    <!-- Button untuk membuka modal -->
    <button onclick="toggleModal('noteModal')"
        class="mt-2 text-white bg-[#F58A44] hover:bg-[#EA6A17] focus:outline-none focus:ring-2 focus:ring-[#EA6A17] focus:ring-offset-2 text-[18px] font-bold py-3 px-12 rounded-[50px] flex items-left justify-between w-[200px] relative">
        <span>Beri Catatan</span>
        <span class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F58A44" class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
            </svg>
        </span>
    </button>
</div>

        </div>
    </div>
</div>

<!-- Modal Form -->
<div id="noteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-[16px] p-6 w-full max-w-md mx-4 shadow-lg">
        <form action="{{ route('belajar.catat', $materi->id_materi) }}" method="POST">
            @csrf

            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-[16px] font-semibold text-[#484848]" style="font-family: 'Inter', sans-serif;">
                    Beri Catatan
                </h3>
                <button type="button" onclick="toggleModal('noteModal')"
                    class="w-8 h-8 flex items-center justify-center rounded-full bg-[#F58A44] text-white hover:bg-[#EA6A17] transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Textarea Input -->
            <div class="mb-6 relative">
                <textarea id="note" name="note" rows="3"
                    placeholder="Tulis catatan di sini..."
                    class="block w-full p-4 text-[14px] border rounded-[16px] text-[#979797] border-[#F58A44] focus:outline-none focus:ring-1 focus:ring-[#F58A44] resize-none"></textarea>
                <button type="submit"
                    class="absolute right-4 bottom-4 p-2 bg-[#F58A44] rounded-full text-white shadow-lg hover:bg-[#EA6A17] focus:outline-none focus:ring-2 focus:ring-[#EA6A17]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>



<script>
    function toggleModal(show) {
        const modal = document.getElementById('noteModal');
        modal.style.display = show ? 'flex' : 'none';
    }

    function playVideo() {
        const video = document.getElementById("materiVideo");
        const button = document.getElementById("playButton");

        if (video.paused) {
            video.play();
            button.style.display = "none"; // Hilangkan tombol play saat video berjalan
        }
    }

    // Menghilangkan tombol play bawaan dan titik tiga
    document.addEventListener("DOMContentLoaded", function () {
        const video = document.getElementById("materiVideo");
        video.controlsList = "nodownload noplaybackrate nopictureinpicture"; // Hilangkan download & speed control
    });

    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }


</script>
@endsection
