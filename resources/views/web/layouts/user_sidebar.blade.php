<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700&display=swap" rel="stylesheet">

<div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md flex flex-col">
        <!-- Logo -->
        <div class="py-4">
            <img src="{{ asset('img/lgoshaelife.png') }}" alt="Logo" class="w-32 h-auto ml-2">
        </div>


        <!-- Menu -->
        <nav class="flex-1 px-4 py-6 space-y-6">
            <div>
                <h3 class="text-gray-400 text-sm font-semibold uppercase mb-3">Menu</h3>
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('kelas.index') }}"
                           class="flex items-center px-4 py-2 rounded hover:bg-gray-100
                           {{ Route::currentRouteName() == 'kelas.index' ? 'bg-[#D3E9FF] text-[#052D6E] font-semibold' : '' }}">
                            <i class="fas fa-home text-blue-500 mr-3"></i>
                            <span class="text-gray-700">Kelas</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href=""
                        class="flex items-center px-4 py-2 rounded hover:bg-gray-100
                        {{ Route::currentRouteName() == 'user.buku.search' ? 'bg-[#D3E9FF] text-[#052D6E] font-semibold' : '' }}">
                            <i class="fas fa-search text-blue-500 mr-3"></i>
                            <span class="text-gray-700">Sertifikat</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('ulasan.index') }}"
                           class="flex items-center px-4 py-2 rounded hover:bg-gray-100">
                            <i class="fas fa-highlighter text-blue-500 mr-3"></i>
                            <span class="text-gray-700">Beri Ulasan</span>
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('catatan.index') }}"
                           class="flex items-center px-4 py-2 rounded hover:bg-gray-100">
                            <i class="fas fa-highlighter text-blue-500 mr-3"></i>
                            <span class="text-gray-700">Semua Catatan</span>
                        </a>
                    </li>

                </ul>
                <hr class="my-8 border-t-1 border-[#1E90FF]">


            </div>


            <div>
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('paket.index') }}"
                           class="flex items-center px-4 py-2 rounded hover:bg-gray-100
                           {{ Route::currentRouteName() == 'paket.index' ? 'bg-[#D3E9FF] text-[#052D6E] font-semibold' : '' }}">
                            <i class="fas fa-box text-blue-500 mr-3"></i>
                            <span class="text-gray-700">Paket Langganan</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href=""
                           class="flex items-center px-4 py-2 rounded hover:bg-gray-100
                           {{ Route::currentRouteName() == 'user.langganan.index' ? 'bg-[#D3E9FF] text-[#052D6E] font-semibold' : '' }}">
                            <i class="fas fa-users text-blue-500 mr-3"></i>
                            <span class="text-gray-700">Berlangganan</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('order.index') }}"
                           class="flex items-center px-4 py-2 rounded hover:bg-gray-100
                           {{ Route::currentRouteName() == 'order.index' ? 'bg-[#D3E9FF] text-[#052D6E] font-semibold' : '' }}">
                            <i class="fas fa-shopping-cart text-blue-500 mr-3"></i>
                            <span class="text-gray-700">Pembelian</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"  class="flex items-center px-4 py-2 rounded hover:bg-gray-100">Keluar</button>
                        </form>

                    </li>
                </ul>
            </div>

            <hr style="margin-top:30px; margin-bottom:30px; height: 1px; background-color: #1E90FF;">

            <div>
                <a href="">
                    <img src="{{ asset('img/Frame 1.png') }}" class="w-24 h-24 mb-2">
                </a>


                <a href="{{ route('collection.index') }}"
                   class="flex flex-col
                   {{ Route::currentRouteName() == 'user.favorite.index' ? 'text-[#052D6E] font-semibold' : 'text-gray-700' }}">
                    <span class="text-sm">Collection</span>
                </a>
            </div>

        </nav>
    </aside>

    <!-- Main Content -->
<div class="flex-1" style="background-image: url('{{ asset('img/bgOnlinecourse.png') }}'); background-size: cover; background-position: center; background-color: white;">

    @yield('content')
</div>

</div>
