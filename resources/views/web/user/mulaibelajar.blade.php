@extends('web.layouts.user')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<section id="hero" class="relative bg-cover bg-center text-white" style="background-image: url('{{ asset('img/headBelajar.png') }}'); ">
    <div class="container mx-auto py-40 px-6">
        <div class="flex flex-col md:flex-row items-center">
            <!-- Left Section -->
            <div class="md:w-1/2 text-left">
                <p class="text-lg mb-6 font-semibold">
                    Sekolah Belajar Islam Batch 2 </p>
                <h1 class="text-4xl sm:text-5xl md:text-5xl font-semibold mb-6" style="font-family: 'Libre Baskerville', serif; line-height: 1.4;">
                    Berislam dengan Ilmu yang <br> <span class="text-[#EBDF98] font-light italic">Amaliah dan Amal</span> yang Ilmiah
                </h1>
                <p class="text-lg mb-6">
                    Program E-Learning belajar islam melalui 375+ materi yang intensif dan terstruktur untuk para penuntut ilmu yang ingin memahami dasar-dasar ilmu agama.
                </p>
                <blockquote class="italic font-semibold text-lg mb-12">
                    "Kesibukanku Tak Menghalangiku Dari Menuntut Ilmu"
                </blockquote>
            </div>

            <!-- Right Section -->
            <div class="md:w-1/2 mt-8 md:mt-0">
                <img src="{{ asset('img/belajar.png') }}" alt="Hero Image" class="mx-auto rounded-lg">
            </div>
        </div>

        <!-- Cards Section -->
    </div>
</section>

<section id="Kenapa harus" class=" relative -mt-24 z-20">
    <div class="container mx-auto bg-[#F58A44] p-8 rounded-[16px]">
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
    <div class="pl-6">
        <h2 class="text-white text-2xl font-bold">Kontent yang kamu dapatkan
        </h2>
    </div>
    <div class=" text-center">
        <h2 class="text-white text-5xl font-bold">12</h2>
        <p class="text-white mt-2">Modul</p>
    </div>

    <div class=" text-center">
        <h2 class="text-white text-5xl font-bold">376</h2>
        <p class="text-white mt-2">Materi</p>
    </div>
    <div class=" text-center ">
        <h2 class="text-white text-5xl font-bold">5</h2>
        <p class="text-white mt-2">Pengajar</p>
    </div>
</div>
</div>
</section>

<section id="Kenapa harus" class="relative py-16">
    <div class="container mx-auto">
        @php
            $colorPairs = [
                ['bg' => '#F0F0F0', 'text' => '#8A8181FF'],
                ['bg' => '#DBF5D2', 'text' => '#6BAF54FF'],
                ['bg' => '#FFF7F5', 'text' => '#D59A5E'],
                ['bg' => '#FAFAD8', 'text' => '#B79F54'],
            ];
            $categories = [
                'Hijrah',
                'Islam Dasar',
                'Kemuslimahan',
                'Pengembangan Diri',
                'Akhlak',
                'Pranikah',
                'Keluarga',
                'Muamalah',
                'Keteladanan'
            ];
        @endphp
        <div class="flex flex-wrap gap-2">
            @foreach ($categories as $index => $category)
                @php
                    $color = $colorPairs[$index % count($colorPairs)];
                @endphp
                <a href="#" class="px-4 py-3 rounded-[16px]" style="background-color: {{ $color['bg'] }}; color: {{ $color['text'] }};">
                    <strong>{{ $category }}</strong>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="py-10">
    <div class="container mx-auto px-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-3xl sm:text-3xl md:text-3xl font-semibold text-[#1A1A1A] mb-8" style="font-family: 'Libre Baskerville', serif; line-height: 1.2;">
                Hijrah
            </h2>
            <button onclick="toggleView()" id="toggleButton" class="text-[#F58A44] font-semibold">See all →</button>
        </div>

        <!-- Carousel Container -->
        <div id="carouselView" class="relative flex overflow-x-auto space-x-4 scroll-smooth hide-scrollbar">
                @php
                    $buku = [
                        (object)[
                            'id_buku' => 1,
                            'judul_buku' => 'Belajar Laravel',
                            'penulis' => 'John Doe',
                            'deskripsi' => "wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuahn wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah",
                            'totalWaktu' => 120,
                            'ratingRerata' => 4.8,
                        ],
                        (object)[
                            'id_buku' => 2,
                            'judul_buku' => 'Mastering JavaScript',
                            'penulis' => 'Jane Smith',
                            'deskripsi' => "wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuahn wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah",
                            'totalWaktu' => 90,
                            'ratingRerata' => 4.5,
                        ],
                        (object)[
                            'id_buku' => 3,
                            'judul_buku' => 'Python for Data Science',
                            'penulis' => 'Robert Brown',
                            'deskripsi' => "wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuahn wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah",
                            'totalWaktu' => 75,
                            'ratingRerata' => 4.7,
                        ],
                        (object)[
                            'id_buku' => 4,
                            'judul_buku' => 'React JS Handbook',
                            'penulis' => 'Michael Johnson',
                            'deskripsi' => "wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuahn wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah",
                            'totalWaktu' => 150,
                            'ratingRerata' => 4.6,
                        ],
                        (object)[
                            'id_buku' => 5,
                            'judul_buku' => 'Machine Learning Basics',
                            'penulis' => 'Emily Davis',
                            'deskripsi' => "wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuahn wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah",
                            'totalWaktu' => 110,
                            'ratingRerata' => 4.9,
                        ],
                        (object)[
                            'id_buku' => 6,
                            'judul_buku' => '6Machine Learning Basics',
                            'penulis' => 'Emily Davis',
                            'deskripsi' => "wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuahn wusuuahusha ahwuahush whuahuw awhuahuw ahwuahwuah",
                            'totalWaktu' => 110,
                            'ratingRerata' => 4.9,
                        ],
                    ];
                @endphp

                @foreach ($buku as $book)
                    <div class="min-w-[170px] md:min-w-[190px] lg:min-w-[250px] flex-shrink-0 bg-white rounded-[16px] overflow-hidden border-2 border-transparent hover:border-[#FDE4D3] transition-all">
                        <img src="{{ asset('img/cover.png') }}"
                        alt="Book Cover"
                        class="w-full h-48 md:h-56 object-cover rounded-[16px]">

                        <div class="p-4">
                            <h3 class="text-[#484848] text-[14px] font-semibold mb-2">{{ $book->judul_buku }}</h3>
                            <p class="text-[#F58A44] font-medium text-[14px]">{{ $book->penulis }}</p>

                            <div class="flex justify-between items-center text-[#979797] text-sm mt-4">
                                <div class="flex items-center">
                                    <i class="fa fa-file-alt mr-2 p-2 rounded-[8px] text-[12px]" style="background-color: #FDE4D3; color: #F58A44;"></i>
                                    <span class=" font-inter font-medium text-[12px]">{{ floor($book->totalWaktu / 60) }} MPodul</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-star mr-2 p-2 rounded-[8px] text-[12px]" style="background-color: #FAFAD8; color: #B79F54;"></i>
                                               <span class="font-inter font-medium text-[12px]">{{ number_format($book->ratingRerata, 1) }} Kuis</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="listView" class="hidden flex flex-col space-y-4">
                @foreach ($buku as $book)
                <div class="flex flex-wrap md:flex-nowrap bg-[#F58A44] rounded-[16px] p-6 gap-4">
                    <!-- Bagian Gambar -->
                    <div class="flex space-x-2">
                        <img src="{{ asset('img/cover.png') }}"
                            alt="Book Cover"
                            class="w-40 md:w-40 aspect-[3/4] object-cover rounded-lg shadow-md">

                        <div class="relative w-32 md:w-40 aspect-[3/4]">
                            <!-- Gambar Pemateri -->
                            <img src="{{ asset('img/pemateri.png') }}"
                                alt="pemateri"
                                class="w-40 h-full object-cover rounded-lg shadow-md">

                            <!-- Nama Penulis (Menimpa Gambar) -->
                            <p class="absolute -bottom-4 left-0 w-full bg-black bg-opacity-60 text-white text-center text-sm font-medium py-1 rounded-b-lg">
                                {{ $book->penulis }}
                            </p>
                        </div>
                    </div>

                    <!-- Bagian Informasi Buku -->
                    <div class="flex-1 flex flex-col justify-between text-white">
                        <div>
                            <h3 class="text-lg font-semibold mb-2">{{ $book->judul_buku }}</h3>
                            <p class="text-sm mt-1">{{ $book->deskripsi }}</p>

                            <!-- Total Waktu & Rating dalam Satu Baris -->
                            <div class="flex items-center space-x-4 mt-2">
                                <div class="flex items-center">
                                    <i class="fa fa-file-alt mr-2 p-2 rounded-[8px] text-[12px]" style="background-color: #FDE4D3; color: #F58A44;"></i>
                                    <span class=" font-inter font-medium text-[12px]">{{ floor($book->totalWaktu / 60) }} MPodul</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-star mr-2 p-2 rounded-[8px] text-[12px]" style="background-color: #FAFAD8; color: #B79F54;"></i>
                                               <span class="font-inter font-medium text-[12px]">{{ number_format($book->ratingRerata, 1) }} Kuis</span>
                                </div>
                            </div>
                            <button class="mt-4 flex items-center bg-white text-[#F58A44] font-semibold pl-6 py-2 pr-2 rounded-full transition hover:bg-gray-200">
                                LIHAT DETAIL
                                <span class="ml-4 w-6 h-6 flex justify-center items-center bg-[#F58A44] rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            </button>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>



        </div>
    </div>
</section>

<script>
    function scrollLeft() {
        const container = document.getElementById('bookCarousel');
        container.scrollBy({ left: -300, behavior: 'smooth' });
    }

    function scrollRight() {
        const container = document.getElementById('bookCarousel');
        container.scrollBy({ left: 300, behavior: 'smooth' });
    }
    function toggleView() {
        const carousel = document.getElementById("carouselView");
        const list = document.getElementById("listView");
        const button = document.getElementById("toggleButton");

        if (carousel.classList.contains("hidden")) {
            carousel.classList.remove("hidden");
            list.classList.add("hidden");
            button.textContent = "See all →";
        } else {
            carousel.classList.add("hidden");
            list.classList.remove("hidden");
            button.textContent = "Show less ←";
        }
    }
</script>

<style>
    /* Hide scrollbar but still allow scrolling */
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .hide-scrollbar {
        -ms-overflow-style: none; /* Internet Explorer 10+ */
        scrollbar-width: none; /* Firefox */
    }
</style>


<div class="bg-[#F58A44]  text-white text-center py-4 text-sm mt-10">
    <p>&copy; 2025 Shae Life. All Rights Reserved.</p>
</div>


@endsection
