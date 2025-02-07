<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700&display=swap" rel="stylesheet">

<div class="flex h-screen bg-gray-100">
    <button
    data-drawer-target="logo-sidebar"
    data-drawer-toggle="logo-sidebar"
    aria-controls="logo-sidebar"
    type="button"
    class="flex items-start bg-white fixed inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
    >
    <span class="sr-only">Open sidebar</span>
    <svg
        class="w-6 h-6"
        aria-hidden="true"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
        clip-rule="evenodd"
        fill-rule="evenodd"
        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
        ></path>
    </svg>
</button>

    <!-- Sidebar -->
    <aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen sm:min-h-[110vh] transition-transform -translate-x-full sm:translate-x-0 bg-white overflow-y-auto"
    aria-label="Sidebar">
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
                        <a href="{{ route('kelas.index') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-100 {{ Route::currentRouteName() == 'kelas.index' ? 'bg-[#FDE4D3] text-[#1A1A1A] font-semibold' : '' }}">
                            <i class="fas fa-home text-[#F58A44] mr-3"></i>
                            <span class="text-gray-700">Kelas</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="" class="flex items-center px-4 py-2 rounded hover:bg-gray-100">
                            <i class="fas fa-file-alt text-[#F58A44] mr-3"></i>
                            <span class="text-gray-700">Sertifikat</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('ulasan.index') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-100">
                            <i class="fas fa-highlighter text-[#F58A44] mr-3"></i>
                            <span class="text-gray-700">Beri Ulasan</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('catatan.index') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-100">
                            <i class="fas fa-highlighter text-[#F58A44] mr-3"></i>
                            <span class="text-gray-700">Semua Catatan</span>
                        </a>
                    </li>
                </ul>
                <hr class="my-8 border-t-1 border-[#F58A44]">
            </div>

            <div>
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('paket.index') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-100 {{ Route::currentRouteName() == 'paket.index' ? 'bg-[#FDE4D3] text-[#1A1A1A] font-semibold' : '' }}">
                            <i class="fas fa-box text-[#F58A44] mr-3"></i>
                            <span class="text-gray-700">Paket Langganan</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="" class="flex items-center px-4 py-2 rounded hover:bg-gray-100 {{ Route::currentRouteName() == 'paket.index' ? 'bg-[#FDE4D3] text-[#1A1A1A] font-semibold' : '' }}">
                            <i class="fas fa-book text-[#F58A44] mr-3"></i>
                            <span class="text-gray-700">Berlanggan</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('order.index') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-100 {{ Route::currentRouteName() == 'order.index' ? 'bg-[#FDE4D3] text-[#1A1A1A] font-semibold' : '' }}">
                            <i class="fas fa-shopping-cart text-[#F58A44] mr-3"></i>
                            <span class="text-gray-700">Pembelian</span>
                        </a>
                    </li>
                </ul>
            </div>
            <hr class="my-8 border-t-1 border-[#F58A44]">

            <div>
                <ul>
                    <li class="mb-2">
                        <form action="{{ route('logout') }}" method="POST" class="w-full">
                            @csrf
                            <button type="submit" class="flex items-center px-4 py-2 w-full text-left rounded hover:bg-gray-100 text-gray-700">
                                <i class="fas fa-sign-out-alt text-red-500 mr-3"></i>
                                <span>Keluar</span>
                            </button>
                        </form>

                    </li>
                </ul>
            </div>
            <hr class="my-8 border-t-1 border-[#F58A44]">

            <div class="flex flex-col items-start">
                <a href="">
                    <img src="{{ asset('img/Frame 1.png') }}" class="w-24 h-24 mb-2">
                </a>
                <a href="{{ route('collection.index') }}" class="text-sm {{ Route::currentRouteName() == 'user.favorite.index' ? 'text-[#1A1A1A] font-semibold' : 'text-gray-700' }}">
                    Collection
                </a>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 sm:ml-64" style="background-image: url('{{ asset('img/bgOnlinecourse.png') }}'); background-size: cover; background-position: center; background-color: white;">
        @yield('content')
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleButton = document.querySelector("[data-drawer-toggle]");
            const sidebar = document.getElementById("logo-sidebar");
            const mainContent = document.querySelector(".flex-1");
            const logo = document.querySelector("#logo-sidebar img");

            // Toggle sidebar saat tombol diklik
            toggleButton.addEventListener("click", function () {
                sidebar.classList.toggle("-translate-x-full");
            });

            // Klik di luar sidebar atau logo untuk menutup sidebar
            document.addEventListener("click", function (event) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickToggleButton = toggleButton.contains(event.target);
                const isClickLogo = logo.contains(event.target);

                if (!isClickInsideSidebar && !isClickToggleButton || isClickLogo) {
                    sidebar.classList.add("-translate-x-full");
                }
            });
        });
    </script>


</div>
