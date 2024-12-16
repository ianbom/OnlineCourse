@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Tambah Paket Langganan</h1>

    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="px-4 py-3 mb-8 bg-red-100 text-red-700 rounded-lg">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('bundle.store') }}" method="POST">
        @csrf

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <!-- Nama Paket -->
            <label class="block text-sm">
                <span class="text-gray-700">Nama Paket</span>
                <input
                    type="text"
                    name="name_bundle"
                    id="name_bundle"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400 @error('name_bundle') border-red-500 @enderror"
                    placeholder="Masukkan nama paket"
                    value="{{ old('name_bundle') }}"
                    required
                />
                @error('name_bundle')
                <span class="text-xs text-red-600 mt-1">{{ $message }}</span>
                @enderror
            </label>

            <!-- Harga -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Harga</span>
                <input
                    type="number"
                    name="price"
                    id="price"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400 @error('price') border-red-500 @enderror"
                    placeholder="Masukkan harga paket"
                    value="{{ old('price') }}"
                    required
                />
                @error('price')
                <span class="text-xs text-red-600 mt-1">{{ $message }}</span>
                @enderror
            </label>

            <!-- Durasi -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Durasi (dalam hari)</span>
                <input
                    type="number"
                    name="duration"
                    id="duration"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400 @error('duration') border-red-500 @enderror"
                    placeholder="Masukkan durasi paket"
                    value="{{ old('duration') }}"
                    required
                />
                @error('duration')
                <span class="text-xs text-red-600 mt-1">{{ $message }}</span>
                @enderror
            </label>

            <!-- Deskripsi -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Deskripsi</span>
                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-textarea focus:border-purple-400 focus:outline-none focus:ring-purple-400 @error('description') border-red-500 @enderror"
                    placeholder="Masukkan deskripsi paket (Opsional)"
                >{{ old('description') }}</textarea>
                @error('description')
                <span class="text-xs text-red-600 mt-1">{{ $message }}</span>
                @enderror
            </label>

            <!-- Submit -->
            <button
                type="submit"
                class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >
                Simpan
            </button>

            <a href="{{ route('bundle.index') }}" class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
