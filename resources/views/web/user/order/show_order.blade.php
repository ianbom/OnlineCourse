@extends('web.layouts.user_app')


@section('content')
<div class="container mx-auto mt-10 p-10">
    <!-- Judul Halaman -->
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-3xl font-bold text-left text-[052D6E]" style="font-family: 'Libre Baskerville', serif; color: #052D6E;">Detail Pesanan</h1>
    </div>

    <!-- Card Detail Order -->
    <div class="bg-white shadow-lg rounded-3xl p-6 border-2 border-[#1E90FF] style="font-family: 'Libre Baskerville', serif;">
        <!-- Tombol Kembali Icon -->
        <div class="flex items-center mb-5 mt-2">
            <!-- Tombol Kembali Icon -->
            <a href="{{ url()->previous() }}" class="text-[#052D6E] hover:text-[#1E90FF] mr-4">
                <i class="fa fa-angle-left text-xl"></i> <!-- Back Arrow Icon -->
            </a>

            <!-- Judul -->
            <h1 class="text-xl font-bold text-left text-[#052D6E]" style="font-family: 'Inter', sans-serif;">Detail Pesanan</h1>
        </div>

                <!-- Section Order Details -->
        <div class="bg-[#D3E9FF] p-6 rounded-2xl mb-6" style="font-family: 'Inter', sans-serif;">
            <div class="grid grid-cols-1 gap-3">

               <!-- ID Order -->
                    <div class="flex justify-between items-start">
                        <h2 class="text-xl font-bold text-[#052D6E]">No. {{ $order->id_order }}</h2>
                    </div>

                    <!-- Nama Paket -->
                    <div class="flex justify-between items-center">
                        <p class="text-[#052D6E] font-bold">Nama Paket</p>
                        <p class="text-[#979797] font-semibold">{{ $order->bundle->name_bundle }}</p>
                    </div>

                    <!-- Pembeli -->
                    <div class="flex justify-between items-center">
                        <p class="text-[#052D6E] font-bold">Nama Pembeli</p>
                        <p class="text-[#979797] font-semibold">{{ $order->user->name }}</p>
                    </div>

                    <!-- Tanggal Order -->
                    <div class="flex justify-between items-center">
                        <p class="text-[#052D6E] font-bold">Tanggal Order</p>
                        <p class="text-[#979797] font-semibold">{{ $order->created_at->format('d M Y, H:i') }}</p>
                    </div>

                    <!-- Total Bayar -->
                    <div class="flex justify-between items-center">
                        <p class="text-[#052D6E] font-bold">Total Bayar</p>
                        <p class="text-[#979797] font-semibold">Rp{{ number_format($order->price_total, 0, ',', '.') }}</p>
                    </div>

                    <!-- Status Order -->
                    <div class="flex justify-between items-center">
                        <p class="text-[#052D6E] font-bold">Status Pesanan</p>
                        <span class="py-1 px-2 rounded font-bold" style="text-transform: uppercase; color:
                            {{ $order->status_order === 'success' ? '#4DAF84' : ($order->status_order === 'cancelled' ? '#DC3545' : '#1E90FF') }}">
                            {{ $order->status_order }}
                        </span>
                    </div>

            </div>
        </div>


        <!-- Aksi -->
        <div class="flex flex-wrap gap-3 justify-end mt-6">
            <!-- Tombol Kembali -->
            {{-- <a href="{{ url()->previous() }}" class="bg-gray-500 text-white py-2 px-4 rounded-xl shadow-md hover:bg-transparent hover:border-gray-500 hover:text-gray-500 border-2 transition-all duration-300">
                Kembali
            </a> --}}

            <!-- Cetak Invoice -->


            <!-- Tombol Batalkan Order -->
            @if ($order->status_order == 'pending')
                <form action="{{ route('order.cancel', $order->id_order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="bg-[#982B1C] text-white py-2 px-4 rounded-2xl shadow-md hover:bg-transparent hover:border-[#982B1C] hover:text-[#982B1C] border-2 transition-all duration-300">
                        Batalkan Pesanan
                    </button>
                </form>

                <form action="{{ route('order.bayar', $order->id_order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="bg-[#FDA403] text-white py-2 px-4 rounded-2xl shadow-md hover:bg-transparent hover:border-[#FDA403] hover:text-[#FDA403] border-2 transition-all duration-300">
                        Bayar Sekarang
                    </button>
                </form>

            @endif

            @if ( $order->status_order == 'success')
            <a href="#" class="bg-[#1E90FF] text-white py-2 px-4 rounded-2xl shadow-md hover:bg-transparent hover:border-[#1E90FF] hover:text-[#1E90FF] border-2 transition-all duration-300">
                Cetak Invoice
            </a>
            @endif

            @if ($order->status_order == 'cancelled' )
            <a href="{{ url()->previous() }}" class="bg-gray-500 text-white py-2 px-4 rounded-xl shadow-md hover:bg-transparent hover:border-gray-500 hover:text-gray-500 border-2 transition-all duration-300">
                Kembali
            </a>
            @endif


        </div>

    </div>
</div>
@endsection
