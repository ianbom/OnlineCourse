@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Edit User</h1>

    @if (session('success'))
        <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <!-- Nama -->
            <label class="block text-sm">
                <span class="text-gray-700">Nama</span>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan nama user"
                    required
                />
            </label>

            <!-- Email -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Email</span>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan email user"
                    required
                />
            </label>

            <!-- Tanggal Lahir -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Tanggal Lahir</span>
                <input
                    type="date"
                    name="birthday"
                    value="{{ old('birthday', $user->birthday) }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                />
            </label>

            <!-- Nomor Telepon -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Nomor Telepon</span>
                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $user->phone) }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan nomor telepon user"
                />
            </label>

            <!-- Status Admin -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Status Admin</span>
                <select
                    name="is_admin"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-lg focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                >
                    <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>Bukan Admin</option>
                    <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Admin</option>
                </select>
            </label>

            <!-- Submit -->
            <div class="flex justify-start mt-6">
                <button
                    type="submit"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                >
                    Simpan
                </button>

                <a
                    href="{{ route('user.index') }}"
                    class="px-4 py-2 ml-4 text-sm font-medium leading-5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400"
                >
                    Kembali
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
