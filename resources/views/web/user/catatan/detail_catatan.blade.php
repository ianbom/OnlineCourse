@extends('web.layouts.user_app')

@section('content')
<div class="container mx-auto mt-8 px-4 py-8">
    <div class="max-w-6xl mx-auto p-2">
        <!-- Header -->
        <h1 class="text-[40px] font-bold text-[#1A1A1A] mb-8" style="font-family: 'Libre Baskerville', serif;">
            CATATAN
        </h1>

        <!-- Course Header -->
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Left Column - Course Image -->
            <div class="w-full md:w-1/3 relative">
                <div class="bg-[#F58A44] rounded-[16px] p-4 shadow-lg">
                    @if($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}"
                            alt="{{ $course->name_course }}"
                            class="w-full aspect-[9/9] object-cover rounded-[16px]">
                    @endif
                </div>
            </div>

            <!-- Right Column - Course Info -->
            <div class="w-full md:w-2/3">
                <h2 class="text-[40px] font-bold text-gray-800 mb-4" style="font-family: 'Libre Baskerville', serif;">
                    Kelas Pengembangan Diri:
                    <span class="text-[#F58A44]">{{ $course->name_course }}</span>
                </h2>
                <p class="text-[18px] text-[#484848] leading-relaxed" style="font-family: 'Inter', sans-serif;">
                    {{ $course->description }}
                </p>
            </div>
        </div>

        <!-- Notes Section -->
        <div class="mt-8">
            <h2 class="text-[18px] font-semibold text-[#484848] mb-4" style="font-family: 'Inter', sans-serif;">
                Catatan Anda
            </h2>
            @if($note->isNotEmpty())
                <div class="space-y-4">
                    @foreach($note as $noteItem)
                        <div class="bg-[#FDE4D3] rounded-lg p-6 shadow-md">
                            <p class="text-[16px] font-semibold text-[#484848]" style="font-family: 'Inter', sans-serif;">
                                {{ $noteItem->note }}
                            </p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-[12px] text-[#979797] font-medium" style="font-family: 'Inter', sans-serif;">
                                    Dibuat pada {{ $noteItem->created_at->format('d M Y, H:i') }}
                                </p>
                                <div class="flex gap-2">
                                    <!-- Delete Button (Icon) -->
                                    <form action="{{ route('catatan.delete', $noteItem->id_note) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-[#F58A44] text-white text-[14px] font-medium px-2 py-2 rounded-[8px] hover:bg-[#e0793c] flex items-center">
                                            <!-- Delete Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>

                                    <!-- Copy Button (Icon) -->
                                    <button onclick="copyNote('{{ $noteItem->note }}')" class="bg-[#F58A44] text-white text-[14px] font-medium px-2 py-2 rounded-[8px] hover:bg-[#e0793c] flex items-center">
                                        <!-- Copy Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 italic">Tidak ada catatan untuk kursus ini.</p>
            @endif
        </div>
    </div>
</div>

<script>
    function copyNote(noteContent) {
        // Create a hidden text area element
        var textArea = document.createElement('textarea');
        textArea.value = noteContent;
        document.body.appendChild(textArea);

        // Select the text inside the text area
        textArea.select();
        textArea.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text to the clipboard
        document.execCommand('copy');

        // Remove the text area element
        document.body.removeChild(textArea);

        // Optionally, show a success message (you can customize this)
        alert("Catatan telah disalin ke clipboard!");
    }
</script>
@endsection
