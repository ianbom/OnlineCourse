@extends('web.layouts.baca_app')



@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
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

        <div class="bg-white rounded-xl shadow-lg p-8">
            <!-- Header Materi -->
            <div class="text-center border-b pb-6 mb-6">
                <h1 class="text-3xl font-bold text-gray-800">
                    {{ $materi->course->name_course ?? 'Nama Kursus Tidak Tersedia' }}
                </h1>
                <p class="text-gray-500 mt-2">{{ $materi->name_materi ?? 'Materi Tidak Ditemukan' }}</p>
            </div>

            <!-- Isi Materi -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Deskripsi Materi</h2>
                <p class="text-gray-600 leading-relaxed">{{ $materi->description ?? 'Deskripsi tidak tersedia.' }}</p>
                {{-- @if ($isFinished)
                <form action="{{ route('user.materi.unmark.finished', $materi->id_materi) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 rounded-md p-1 text-white">Hapus Tanda Selesai</button>
                </form>
                @else
                <form action="{{ route('user.materi.mark.finished', $materi->id_materi) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 rounded-md p-1 text-white">Tandai Selesai</button>
                </form>
                @endif --}}
            </div>

            <!-- Video Materi -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Video Materi</h2>
                @if (!empty($materi->video))
                    <video controls class="w-full rounded-md border">
                        <source src="{{ asset('storage/' . $materi->video) }}" type="video/mp4">
                        Browser Anda tidak mendukung pemutar video.
                    </video>
                @else
                    <p class="text-gray-500">Tidak ada video untuk materi ini.</p>
                @endif
            </div>

            <!-- Buku Materi -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Buku Pendukung</h2>
                @if (!empty($materi->text_book))
                    <a href="{{ asset('storage/' . $materi->text_book) }}" class="text-blue-500 underline" target="_blank">
                        Download Buku
                    </a>
                @else
                    <p class="text-gray-500">Tidak ada buku untuk materi ini.</p>
                @endif
            </div>

            @if ($question)
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Quiz </h2>
                    <a href="{{ route('quiz.kerjakan', $materi->id_materi) }}" class="bg-green-500 p-1 rounded-sm text-white"> Kerjakan quiz</a>
                    <p>Nilai anda {{ $nilai }} / {{ $totalSoal }}</p>
                </div>
                 @else
            @endif


            <!-- Tombol Navigasi -->
            <div class="flex justify-between items-center mt-8 pt-6 border-t">
                <a href="{{ route('kelas.show', $materi->id_course) }}" class="inline-flex items-center px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <button onclick="toggleModal(true)" class="bg-yellow-300 rounded-md p-2">Beri Catatan</button>

            </div>
        </div>
    </div>
</div>

<!-- Modal Form -->
<div id="noteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Beri Catatan</h2>
        <form action="{{ route('belajar.catat', $materi->id_materi) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="note" class="block text-gray-700 font-medium mb-2">Catatan</label>
                <textarea id="note" name="note" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" placeholder="Tulis catatan di sini..."></textarea>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="toggleModal(false)" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition-colors mr-2">Batal</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal(show) {
        const modal = document.getElementById('noteModal');
        modal.style.display = show ? 'flex' : 'none';
    }
</script>

@endsection
