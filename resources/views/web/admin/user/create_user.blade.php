@extends('web.layouts.template')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Buat User Baru</h1>

    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <!-- Nama User -->
            <label class="block text-sm">
                <span class="text-gray-700">Nama User</span>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan nama user"
                    required
                />
            </label>

            <!-- Tanggal Lahir -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Tanggal Lahir</span>
                <input
                    type="date"
                    name="birthday"
                    id="birthday"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                />
            </label>

            <!-- Nomor Telepon -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Nomor Telepon</span>
                <input
                    type="text"
                    name="phone"
                    id="phone"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan nomor telepon"
                />
            </label>

            <!-- Email -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Email</span>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                    placeholder="Masukkan email user"
                    required
                />
            </label>

            <!-- Password -->
            <label class="block mt-4 text-sm relative">
                <span class="text-gray-700">Password</span>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-input focus:border-purple-400 focus:outline-none focus:ring-purple-400 pr-10"
                    placeholder="Masukkan password"
                    required
                />
                <!-- Icon Mata -->
                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                    <i id="eyeIcon" class="fa fa-eye"></i>
                </button>
            </label>


            <!-- Apakah Admin -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Admin</span>
                <select
                    name="is_admin"
                    id="is_admin"
                    class="block w-full mt-1 text-sm border-gray-300 rounded-md form-select focus:border-purple-400 focus:outline-none focus:ring-purple-400"
                >
                    <option value="0">Bukan Admin</option>
                    <option value="1">Admin</option>
                </select>
            </label>

            <!-- Tombol Submit -->
            <button
                type="submit"
                class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >
                Simpan
            </button>

            <a href="{{ route('user.index') }}" class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Kembali
            </a>
        </div>
    </form>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#password');
    const eyeIcon = document.querySelector('#eyeIcon');

    togglePassword.addEventListener('click', function () {
        // Toggle between password and text
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);

        // Toggle eye icon
        eyeIcon.classList.toggle('fa-eye');
        eyeIcon.classList.toggle('fa-eye-slash');
    });
</script>

@endsection
