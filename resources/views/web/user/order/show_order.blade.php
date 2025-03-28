@extends('web.layouts.user_app')

@section('content')
    <div class="container mx-auto mt-10 p-10">
        <!-- Judul Halaman -->
        <div class="flex justify-between items-center mb-12">
            <h1 class="text-3xl font-bold text-left text-[#1A1A1A]"
                style="font-family: 'Libre Baskerville', serif; color: #1A1A1A;">Detail Pesanan</h1>
        </div>

        <!-- Card Detail Order -->
        <div class="bg-white  rounded-3xl p-6 border-2 border-[#F58A44] style="font-family: 'Libre Baskerville' , serif;">
            <!-- Tombol Kembali Icon -->
            <div class="flex items-center mb-5 mt-2">
                <!-- Tombol Kembali Icon -->
                <a href="{{ url()->previous() }}" class="text-[#1A1A1A] hover:text-[#F58A44] mr-4">
                    <i class="fa fa-angle-left text-xl"></i> <!-- Back Arrow Icon -->
                </a>

                <!-- Judul -->
                <h1 class="text-xl font-bold text-left text-[#1A1A1A]" style="font-family: 'Inter', sans-serif;">Detail
                    Pesanan</h1>
            </div>

            <!-- Section Order Details -->
            <div class="bg-[#FDE4D3] p-6 rounded-2xl mb-6" style="font-family: 'Inter', sans-serif;">
                <div class="grid grid-cols-1 gap-3">

                    <!-- ID Order -->
                    <div class="flex justify-between items-start">
                        <h2 class="text-xl font-bold text-[#1A1A1A]">No. {{ $order->id_order }}</h2>
                    </div>
                    <hr class="my-1 border-t-2 border-[#F58A44]">

                    <!-- Nama Paket -->
                    <div
                        class="flex flex-col items-center text-center sm:flex-row sm:justify-between sm:text-left sm:items-center">
                        <p class="text-[#1A1A1A] font-bold mb-1 sm:mb-0">Nama Paket</p>
                        <p class="text-[#979797] font-semibold">{{ $order->bundle->name_bundle }}</p>
                    </div>

                    <!-- Pembeli -->
                    <div
                        class="flex flex-col items-center text-center sm:flex-row sm:justify-between sm:text-left sm:items-center">
                        <p class="text-[#1A1A1A] font-bold mb-1 sm:mb-0">Nama Pembeli</p>
                        <p class="text-[#979797] font-semibold">{{ $order->user->name }}</p>
                    </div>

                    <!-- Tanggal Order -->
                    <div
                        class="flex flex-col items-center text-center sm:flex-row sm:justify-between sm:text-left sm:items-center">
                        <p class="text-[#1A1A1A] font-bold mb-1 sm:mb-0">Tanggal Order</p>
                        <p class="text-[#979797] font-semibold">{{ $order->created_at->format('d M Y, H:i') }}</p>
                    </div>

                    <!-- Total Bayar -->
                    <div
                        class="flex flex-col items-center text-center sm:flex-row sm:justify-between sm:text-left sm:items-center">
                        <p class="text-[#1A1A1A] font-bold mb-1 sm:mb-0">Total Bayar</p>
                        <p class="text-[#979797] font-semibold">Rp{{ number_format($order->price_total, 0, ',', '.') }}</p>
                    </div>

                    <hr class="my-1 border-t-2 border-[#F58A44]">

                    <!-- Status Order -->
                    <div
                        class="flex flex-col items-center text-center sm:flex-row sm:justify-between sm:text-left sm:items-center">
                        <p class="text-[#1A1A1A] font-bold mb-1 sm:mb-0">Status Pesanan</p>
                        <span class="py-1 px-2 rounded font-bold uppercase"
                            style="color:
        {{ $order->status_order === 'success' ? '#4DAF84' : ($order->status_order === 'cancelled' ? '#DC3545' : '#F58A44') }}">
                            {{ $order->status_order }}
                        </span>
                    </div>


                </div>
            </div>


            <!-- Aksi -->
            <div class="flex flex-wrap gap-3 justify-end mt-6">
                <!-- Tombol Batalkan Order -->
                @if ($order->status_order == 'pending')
                    <form action="{{ route('order.cancel', $order->id_order) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="bg-[#E46B61] text-white py-2 px-4 rounded-2xl  hover:bg-[#FFCFC2]  hover:text-[#E46B61] border-2 transition-all duration-300">
                            Batalkan Pesanan
                        </button>
                    </form>

                    <form action="{{ route('order.bayar', $order->id_order) }}" method="POST" id="payment_form">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="bg-[#FDA403] text-white py-2 px-4 rounded-2xl  hover:bg-[#FAD89AFF] hover:text-[#FDA403] border-2 transition-all duration-300">
                            Bayar Sekarang
                        </button>
                    </form>
                @endif

                @if ($order->status_order == 'cancelled')
                    <a href="{{ url()->previous() }}"
                        class="bg-gray-500 text-white py-2 px-4 rounded-xl  hover:bg-transparent hover:border-gray-500 hover:text-gray-500 border-2 transition-all duration-300">
                        Kembali
                    </a>
                @endif
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Function to handle payment
            function handlePayment(event, url) {
                const grossAmount = "{{ $order->total_bayar }}"; // Get the total bill amount
                const customerName = "{{ $order->nama_paket }}"; // Customer name
                const customerEmail = "{{ auth()->user()->email }}"; // Customer email

                // Call backend to get Snap token
                fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            gross_amount: grossAmount,
                            customer_name: customerName,
                            customer_email: customerEmail
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.status) {
                            if (data.data.status == 'settlement') {
                                Swal.fire({
                                    title: 'Payment Successful',
                                    text: "Welcome aboard!",
                                    icon: 'success',
                                    confirmButtonColor: '#198754',
                                    confirmButtonText: 'OK',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload()
                                    }
                                });
                            } else {
                                snap.pay(data.data.snap_token, {
                                    onSuccess: function(result) {
                                        Swal.fire({
                                            title: 'Payment Successful',
                                            text: "Welcome aboard!",
                                            icon: 'success',
                                            confirmButtonColor: '#198754',
                                            confirmButtonText: 'OK',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.reload()
                                            }
                                        });
                                    },
                                    onPending: function(result) {
                                        Swal.fire({
                                            title: 'Payment Pending',
                                            text: "Your payment is pending confirmation.",
                                            icon: 'warning',
                                            confirmButtonText: 'OK',
                                        });
                                    },
                                    onError: function(result) {
                                        Swal.fire({
                                            title: 'Payment Failed',
                                            text: "Something went wrong with your payment. Please try again.",
                                            icon: 'error',
                                            confirmButtonText: 'OK',
                                        });
                                    },
                                    onClose: function() {
                                        Swal.fire({
                                            title: 'Payment Canceled',
                                            text: "You closed the payment window without completing the payment.",
                                            icon: 'info',
                                            confirmButtonText: 'OK',
                                        });
                                    }
                                });
                            }
                        } else {
                            alert('Failed to create transaction');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred');
                    });
            }

            $('#payment_form').submit(function(e) {
                e.preventDefault();
                let url = $(this).attr('action');
                console.log(url)
                handlePayment(e, url)
            })
        });
    </script>
@endpush
