@extends('web.layouts.user_app')

@section('content')
<head>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
@php
    // Array of available images
    $images = [
        asset('img/paket1.png'),
        asset('img/paket2.png'),
        asset('img/paket3.png'),
    ];
@endphp

<div class="container mx-auto mt-10 p-10">
    <!-- Page Title -->
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-3xl font-bold text-left text-[1A1A1A]" style="font-family: 'Libre Baskerville', serif; color: #1A1A1A;">PAKET LANGGANAN</h1>
    </div>

    <!-- Package Cards -->
    @if($bundle->isEmpty())
        <p class="text-[#E46B61] py-2">No subscription packages available</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($bundle as $bundle)
                @php
                    // Select a random image
                    $randomImage = $images[array_rand($images)];
                @endphp
                <div class="bg-[#F58A44]  rounded-[16px] p-6 text-white">
                    <!-- Random Image -->
                    <div class="mb-4">
                        <img src="{{ $randomImage }}" alt="Package Image" class="rounded-lg w-full h-50 object-cover">
                    </div>

                    <h3 class="text-[16px] font-bold mb-2">{{ $bundle->name_bundle }}</h3>
                    <p class="mb-6 text-[14px] text-white">{{ $bundle->description }}</p>

                    <!-- Time and Price -->
                    <div class="flex justify-between items-center mb-6 p-3 border rounded-[8px] flex-wrap">
                        <div class="flex items-center space-x-2 w-full sm:w-auto">
                            <span class="text-[14px]">Time: {{ $bundle->duration }} Days</span>
                        </div>
                        <div class="text-[16px] font-bold w-full sm:w-auto">
                            <span>Rp. {{ number_format($bundle->price, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Tombol Subscribe Memanggil Modal -->
                    <button type="button"
                        onclick="showModal('{{ route('order.store', $bundle->id_bundle) }}', '{{ $bundle->name_bundle }}')"
                        class="w-full bg-white text-[#F58A44] py-2 rounded-lg font-medium hover:bg-[#FDE4D3]  transition">
                        Subscribe Now
                    </button>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Modal -->
<div id="orderModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
    <div class="bg-white rounded-[16px] p-6 w-[90%] sm:w-[80%] md:max-w-md">
        <h3 class="text-[16px] font-bold text-[#1A1A1A] mb-4" style="font-family: 'Inter', sans-serif;">Subscription Confirmation</h3>
        <p class="text-[#979797] mb-6 text-[14px]" style="font-family: 'Inter', sans-serif;">
            Are you sure you want to purchase <span id="modalPackageName" class="font-bold"></span>?
        </p>
        <div class="flex flex-col sm:flex-row justify-end sm:space-x-4 space-y-4 sm:space-y-0">
            <button type="button" class="px-4 py-2 text-bold bg-[#FFCFC2] text-[#E46B61] rounded-[12px] hover:bg-[#E46B61] hover:text-white" onclick="closeModal()">
                <strong>Cancel</strong>
            </button>
            <!-- Pastikan form memiliki id "orderForm" -->
            <form id="orderForm" action="{{ route('order.store', $bundle->id_bundle) }}" method="POST">
                @csrf
                <button type="submit"
                        class="w-full bg-white text-[#F58A44] py-2 px-2 rounded-lg font-medium hover:bg-[#FDE4D3]  transition">
                    Subscribe Now
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function showModal(actionUrl, packageName) {
        // Update action pada form di dalam modal
        document.getElementById('orderForm').action = actionUrl;
        // Update nama paket pada modal
        document.getElementById('modalPackageName').textContent = packageName;
        // Tampilkan modal dengan menghapus kelas 'hidden'
        document.getElementById('orderModal').classList.remove('hidden');
    }

    function closeModal() {
        // Sembunyikan modal dengan menambahkan kelas 'hidden'
        document.getElementById('orderModal').classList.add('hidden');
    }
</script>
@endsection
