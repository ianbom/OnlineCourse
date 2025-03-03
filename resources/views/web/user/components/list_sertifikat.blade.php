@forelse($course as $course)
    <div class="bg-[#F58A44] p-5 rounded-lg overflow-hidden flex flex-col">

        {{-- GAMBAR INI GANTI JADI IMAGE SERTIF YA --}}
        <img src="{{ asset('img/bg_ustad1.png') }}"
        alt="{{ $course->name_course }}"
        class="w-full h-[200px] object-cover rounded-xl">


        <div class="p-1 flex-1 flex flex-col justify-between mt-4">
            <h3 class="font-semibold text-[15px] text-[#FFFFFFFF]" style="font-family: 'Inter', sans-serif;">
                Sertifikat Kelas {{ $course->name_course }}
            </h3>

            <button
            onclick="window.location.href='{{ route('sertifikat.show', $course->id_course) }}'"
            class="mt-4 text-[#F58A44] bg-[#FFFFFFFF] hover:text-white hover:bg-[#EA6A17] focus:outline-none focus:ring-2 focus:ring-[#EA6A17] focus:ring-offset-2 text-[16px] font-bold py-2 px-4 rounded-[50px] relative"
        >
            Unduh Sekarang
            <span class="absolute top-1/2 right-3 transform -translate-y-1/2 bg-[#EA6A17] p-1 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFFFF" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                </svg>
            </span>
        </button>
        </div>
    </div>

@empty
    <h1 class="text-gray-500 text-center">Tidak ada course yang tersedia saat ini.</h1>
@endforelse
