@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-700">Daftar Paket Langganan</h1>
        <a href="{{ route('bundle.create') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            Tambah Paket
        </a>
    </div>

    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Nama Paket</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3">Durasi (hari)</th>
                    <th class="px-4 py-3">Deskripsi</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                @forelse ($bundle as $index => $item)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 text-sm font-semibold">{{ $item->name_bundle }}</td>
                        <td class="px-4 py-3 text-sm">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-sm">{{ $item->duration }} Hari</td>
                        <td class="px-4 py-3 text-sm">{{ Str::limit($item->description, 50) }}</td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex space-x-2">
                                <a href="{{ route('bundle.edit', $item->id_bundle) }}"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg focus:outline-none focus:shadow-outline-blue"
                                    aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('bundle.destroy', $item->id_bundle) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus paket ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-red"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-3 text-center text-sm text-gray-500">
                            Tidak ada data paket langganan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection