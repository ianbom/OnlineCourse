@extends('web.layouts.baca_app')

@section('content')
<div class="container mx-auto p-10 bg-white">

    <!-- Judul Halaman -->
    <div class="flex justify-between items-center mb-4 mt-10">
        <h1 class="text-3xl font-bold text-left text-[#052D6E]" style="font-family: 'Libre Baskerville', serif; color: #052D6E;">
            Quiz: {{ $materi->name_materi ?? '-' }}
        </h1>
    </div>

    <h2 class="font-bold text-[#979797] mb-4 italic" style="font-family: 'Libre Baskerville', serif;">
        " {{ $materi->description ?? 'No description available' }} "
    </h2>

    <!-- Quiz Content -->
    <form method="POST" action="{{ route('quiz.submit', $materi->id_materi) }}">
        @csrf
        <div class="bg-[#F1F8FF] rounded-[16px] mt-10">
            @foreach ($question as $index => $question)
                <div class="bg-[#D3E9FF] rounded-t-[16px] rounded-b-none">
                    <p class="text-sm text-[#052D6E] p-4 text-center">
                        {{ $index + 1 }}. {{ $question->question }}
                    </p>
                </div>
                <div class="bg-[#F1F8FF] p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($question->option as $option)
                            <label class="flex items-center rounded-lg">
                                <input
                                    type="radio"
                                    name="answers[{{ $question->id_question }}]"
                                    value="{{ $option->id_option }}"
                                    class="w-5 h-5 text-[#052D6E] border-white focus:ring-[#052D6E]"
                                    required
                                >
                                <span class="ml-5 text-[#979797]">{{ $option->option }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end mt-10">
            <button
                type="submit"
                class="flex items-center gap-2 px-12 py-3 text-white bg-[#1E90FF] rounded-[12px] hover:bg-[#D3E9FF] hover:text-[#1E90FF]">
                <strong>SUBMIT</strong>
            </button>
        </div>
    </form>
</div>
@endsection
