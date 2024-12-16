@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-700">Daftar User</h1>
        <a href="{{ route('user.create') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            Tambah User
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
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Tanggal Lahir</th>
                    <th class="px-4 py-3">Nomor Telepon</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Status Subs</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                @forelse ($user as $item)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-sm">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 text-sm">{{ $item->name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $item->birthday ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-sm">{{ $item->phone ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-sm">{{ $item->email }}</td>
                        <td class="px-4 py-3 text-sm">{{ $item->subscription->first()->id_subscription ?? 'Not-Buy' }}</td>
                        <td class="px-4 py-3 text-sm">
                            @if ($item->is_admin)
                                <span class="text-green-600 font-semibold">Admin</span>
                            @else
                                <span class="text-gray-600">User</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('user.edit', $item->id) }}"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline-blue"
                                    aria-label="Edit">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('user.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline-red"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-3 text-center text-sm text-gray-500">
                            Tidak ada user yang tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection