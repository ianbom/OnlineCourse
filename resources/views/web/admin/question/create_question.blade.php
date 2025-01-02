@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Tambah Pertanyaan untuk Materi: {{ $materi->name_materi }}</h1>

    <!-- Success Message -->
    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <!-- Error Messages -->
    @if ($errors->any())
    <div class="px-4 py-3 mb-8 bg-red-100 text-red-700 rounded-lg">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form Create Question -->
    <form action="{{ route('question.store') }}" method="POST">
        @csrf
        <input type="hidden" name="id_materi" value="{{ $materi->id_materi }}">

        <!-- Question Input -->
        <div class="mb-4">
            <label for="question" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
            <textarea name="question" id="question" rows="4" required
                class="w-full px-4 py-2 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">{{ old('question') }}</textarea>
        </div>

        <!-- Options Input -->
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Pilihan Jawaban</h2>
            <div id="options-container">
                <div class="flex items-center mb-2">
                    <input type="text" name="option[]" placeholder="Pilihan jawaban" required
                        class="w-full px-4 py-2 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
                    <label class="ml-4 flex items-center text-gray-600">
                        <input type="radio" name="is_correct" value="0" class="form-radio">
                        <span class="ml-2">Benar</span>
                    </label>
                </div>
            </div>
            <button type="button" id="add-option"
                class="mt-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Tambah Pilihan
            </button>
        </div>

        <!-- Submit Button -->
        <div class="mt-8">
            <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400">
                Simpan Pertanyaan
            </button>
            <a href="{{ route('question.index', $materi->id_materi) }}"
                class="ml-4 px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400">
                Batal
            </a>
        </div>
    </form>
</div>

<!-- Add Option Script -->
<script>
    document.getElementById('add-option').addEventListener('click', function () {
        const container = document.getElementById('options-container');
        const newOption = document.createElement('div');
        newOption.classList.add('flex', 'items-center', 'mb-2');
        newOption.innerHTML = `
            <input type="text" name="option[]" placeholder="Pilihan jawaban" required
                class="w-full px-4 py-2 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
            <label class="ml-4 flex items-center text-gray-600">
                <input type="radio" name="is_correct" value="${container.children.length}" class="form-radio">
                <span class="ml-2">Benar</span>
            </label>
        `;
        container.appendChild(newOption);
    });
</script>
@endsection
