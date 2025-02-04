@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Edit Pemateri</h1>

    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('pemateri.update', $pemateri->id_pemateri) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            <!-- Nama Pemateri -->
            <label class="block text-sm">
                <span class="text-gray-700">Nama Pemateri</span>
                <input
                    type="text"
                    name="nama"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan nama pemateri"
                    value="{{ old('nama', $pemateri->nama) }}"
                    required
                />
                @error('nama')
                    <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
                @enderror
            </label>

            <!-- Foto Pemateri -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Foto Pemateri</span>
                <input
                    type="file"
                    name="foto"
                    accept="image/*"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                />
                @if ($pemateri->foto)
                    <img src="{{ asset('storage/' . $pemateri->foto) }}" alt="Foto Pemateri" class="mt-2 h-32 rounded-lg">
                @endif
                @error('foto')
                    <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
                @enderror
            </label>

            <!-- Deskripsi -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Deskripsi</span>
                <textarea
                    name="deskripsi"
                    rows="4"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-textarea focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan deskripsi pemateri"
                >{{ old('deskripsi', $pemateri->deskripsi) }}</textarea>
                @error('deskripsi')
                <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
                @enderror
            </label>

            <!-- Submit -->
            <button
                type="submit"
                class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >
                Update
            </button>

            <a href="{{ route('pemateri.index') }}" class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
