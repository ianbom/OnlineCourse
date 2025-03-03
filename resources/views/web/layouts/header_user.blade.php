<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHAE Life Navbar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Styling Navbar */
        header {
            background-color: white;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 50;
        }

        /* Untuk menampilkan dropdown ketika di-hover */
        .nav-link-group {
            position: relative;
            display: inline-block;
        }

        .nav-dropdown {
            display: none;
            position: absolute;
            left: 0;
            top: 100%;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.375rem;
            z-index: 10;
        }

        .nav-link-group:hover .nav-dropdown {
            display: block;
        }

        a {
            text-decoration: none;
        }

        .nav-dropdown a {
            display: block;
            padding: 0.5rem 1rem;
            color: #4a4a4a;
            text-decoration: none;
            font-family: 'Libre Baskerville', serif;
        }

        .nav-dropdown a:hover {
            background-color: #FDE4D3;
            color: #F58A44;
        }
    </style>
</head>

<body>
    <header>
        <div class="container mx-auto">
            <div class="d-flex align-items-center justify-content-between py-4">
                <!-- Logo -->
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/lgoshaelife.png') }}" alt="Logo" class="w-40 h-auto ms-2">
                </div>

                <!-- Navigation Menu -->
                <nav class="d-none d-md-flex gap-4">
                    <a href="{{ route('landing') }}"
                        class="rounded-md {{ Route::currentRouteName() == 'landing' ? 'text-[#F58A44] fw-bold' : 'text-[#484848]' }} hover:text-[#F58A44]"
                        style="font-family: 'Libre Baskerville', serif;">
                        Home
                    </a>

                    <!-- Dropdown Menu -->
                    <div class="nav-link-group">
                        <a href="#" class="nav-link rounded-md text-[#484848] hover:text-[#F58A44]"
                            style="font-family: 'Libre Baskerville', serif;">
                            Mulai Belajar
                        </a>
                        <div class="nav-dropdown">
                            <a href="#">Hijrah</a>
                            <a href="#">Islam Dasar</a>
                            <a href="#">Kemuslimahan</a>
                            <a href="#">Pengembangan Diri</a>
                            <a href="#">Akhlak</a>
                            <a href="#">Pranikah</a>
                            <a href="#">Keluarga</a>
                            <a href="#">Muamalah</a>
                            <a href="#">Keteladanan</a>
                        </div>
                    </div>
                    
                </nav>

                <!-- Buttons -->
                <div class="d-none d-md-flex gap-2">
                    <a href="{{ route('login') }}"
                        class="bg-[#FDE4D3] text-[#F58A44] px-4 py-2 rounded-[16px] hover:bg-[#F58A44] hover:text-white fw-semibold">
                        Login
                    </a>
                    <a href="{{ route('landing') }}"
                        class="bg-gradient-to-r from-[#F58A44] to-[#6F2E03] text-white px-4 py-2 rounded-[16px] hover:bg-blue-600 fw-semibold d-flex align-items-center gap-2">
                        Subscribe
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="menu-toggle"
                    class="bg-[#FDE4D3] p-2 rounded-[8px] d-md-none text-[#6F2E03] hover:text-[#F58A44] focus:outline-none me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="d-none d-md-none bg-white pb-4">
            <nav class="space-y-1 px-4">
                <a href="{{ route('landing') }}"
                    class="block rounded-md {{ Route::currentRouteName() == 'landing' ? 'text-[#F58A44] fw-bold' : 'text-[#484848]' }} hover:text-[#F58A44] hover:bg-[#FDE4D3] py-1 px-4"
                    style="font-family: 'Libre Baskerville', serif;">
                    Home
                </a>
                <div class="relative">
                    <a href="{{ route('mulaibelajar') }}"
                        class="block rounded-md
              {{ request()->routeIs('mulaibelajar') ? 'text-[#F58A44] fw-bold' : 'text-[#484848]' }}
              hover:text-[#F58A44] hover:bg-[#FDE4D3] py-1 px-4"
                        style="font-family: 'Libre Baskerville', serif;">
                        Mulai Belajar
                    </a>

                    <div class="d-none bg-white shadow-lg rounded-md mt-2 space-y-1 px-4 py-2">
                        <a href="#" class="block hover:bg-gray-100">Hijrah</a>
                        <a href="#" class="block hover:bg-gray-100">Islam Dasar</a>
                        <a href="#" class="block hover:bg-gray-100">Kemuslimahan</a>
                        <a href="#" class="block hover:bg-gray-100">Pengembangan Diri</a>
                        <a href="#" class="block hover:bg-gray-100">Akhlak</a>
                        <a href="#" class="block hover:bg-gray-100">Pranikah</a>
                        <a href="#" class="block hover:bg-gray-100">Keluarga</a>
                        <a href="#" class="block hover:bg-gray-100">Muamalah</a>
                        <a href="#" class="block hover:bg-gray-100">Keteladanan</a>
                    </div>
                </div>
                <a href="#subscribe"
                    class="block bg-gradient-to-r from-[#F58A44] to-[#6F2E03] text-white px-6 py-2 rounded-[16px] hover:bg-blue-600 font-semibold flex items-center justify-center space-x-2 text-center">
                    Subscribe
                </a>

                <a href="{{ route('login') }}"
                    class="block bg-[#FDE4D3] text-[#F58A44] px-6 py-2 rounded-[16px] hover:bg-[#F58A44] hover:text-white font-semibold text-center">
                    Login
                </a>
            </nav>
        </div>
    </header>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('d-none');
        });
    </script>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
