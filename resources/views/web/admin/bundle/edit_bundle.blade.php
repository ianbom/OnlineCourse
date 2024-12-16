@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Edit Paket Langganan</h1>

    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('bundle.update', $bundle->id_bundle) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <!-- Nama Paket -->
            <label class="block text-sm">
                <span class="text-gray-700">Nama Paket</span>
                <input
                    type="text"
                    name="name_bundle"
                    id="name_bundle"
                    value="{{ old('name_bundle', $bundle->name_bundle) }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan nama paket"
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
                    value="{{ old('price', $bundle->price) }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan harga paket"
                    required
                />
                @error('price')
                <span class="text-xs text-red-600 mt-1">{{ $message }}</span>
                @enderror
            </label>

            <!-- Durasi -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Durasi (hari)</span>
                <input
                    type="number"
                    name="duration"
                    id="duration"
                    value="{{ old('duration', $bundle->duration) }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan durasi paket"
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
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan deskripsi paket (Opsional)"
                >{{ old('description', $bundle->description) }}</textarea>
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
