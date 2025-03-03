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
    @php
        // Array gambar yang tersedia
        $images = [asset('img/paket1.png'), asset('img/paket2.png'), asset('img/paket3.png')];
    @endphp

    <section id="hero" class="bg-white pt-20 px-6">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row items-center">
                <!-- Left Section -->
                <div class="md:w-1/2  md:text-left">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-semibold text-[#1A1A1A] mb-6"
                        style="font-family: 'Libre Baskerville', serif; line-height: 1.2;">
                        Menjadi
                        <span class="text-[#F58A44] font-light italic"> Pemuda Berkualitas Unggulan </span>yang
                        Dinanti-nantikan
                    </h1>
                    <p class="text-[#484848] text-lg mb-12">
                        Platform belajar online terdepan di Indoneisa yang membahas ilmu kehidupan berbagai tahapan bagi
                        pemuda dengan beragam pendekatan keilmuan sesuai nilai-nilai islam. </p>
                    <a href="{{ route('kelas.index')}}"
                        class="bg-[#F58A44] text-white px-6 py-3 rounded-[16px] font-semibold hover:bg-[#6F2E03] hover:text-[#F58A44] transition duration-300 focus:outline-none">
                        JELAJAHI
                    </a>

                </div>
                <!-- Right Section -->
                <div class="md:w-1/2 mt-8 md:mt-0 p-10">
                    <img src="{{ asset('img/sec1.png') }}" alt="Hero Image"
                        class="mx-auto md:ml-auto max-w-full rounded-lg p-10">
                </div>
            </div>
        </div>
    </section>

    <section id="Kenapa harus" class=" pt-32">
        <div class="container mx-auto">
            <h2 class="text-3xl sm:text-3xl md:text-3xl font-semibold text-[#1A1A1A] mb-8"
                style="font-family: 'Libre Baskerville', serif; line-height: 1.2;">
                Kenapa Kamu
                <span class="text-[#F58A44] font-light italic"> Harus Daftar </span>E-Learning di SHAE Life?
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="bg-[#F0F0F0] rounded-[16px] p-6">
                    <h5 class="font-semibold text-lg text-[#484848]">Mentor Ahli yang Berkompeten dan berpengalaman</h5>
                    <p class="text-[#484848] mb-4">Dipandu oleh pemateri yang siap kasih ilmu dengan cara yang ringan, fun,
                        dan mudah dipahami.  Mulai dari ustadz, ustadzah, psikolog, dokter, dan lainnya.</p>
                </div>
                <div class="bg-[#F0F0F0] rounded-[16px] p-6">
                    <h5 class="font-semibold text-lg text-[#350A0AFF]">Video Pembelajaran yang Ringkas & Aplikatif</h5>
                    <p class="text-[#484848] mb-4">Nggak cuma teori, kamu akan dapat contoh-contoh kasus sehari-hari yang
                        bikin kamu bilang, “Oh, gini toh ternyata!” </p>
                </div>
                <div class="bg-[#F0F0F0] rounded-[16px] p-6">
                    <h5 class="font-semibold text-lg text-[#484848]">Materi dijelaskan dalam bentuk video-video ringkas dan
                        tersedia modul ppt</h5>
                    <p class="text-[#484848] mb-4">Materi dijelaskan dalam bentuk video-video ringkas dan tersedia modul ppt
                    </p>
                </div>
                <div class="bg-[#FDE4D3] rounded-[16px] p-6">
                    <h5 class="font-semibold text-lg text-[#484848]">Akses Materi Selamanya</h5>
                    <p class="text-[#484848] mb-4">Materi dapat diakses selamanya oleh peserta.</p>
                </div>
                <div class="bg-[#DBF5D2] rounded-[16px] p-6">
                    <h5 class="font-semibold text-lg text-[#484848]">Biaya Terjangkau </h5>
                    <p class="text-[#484848] mb-4">Biaya terjangkau untuk semua kalangan baik untuk pelajar, mahasiswa, ibu
                        rumah tangga, atau pekerja.</p>
                </div>
                <div class="bg-[#F0F0F0] rounded-[16px] p-6">
                    <h5 class="font-semibold text-lg text-[#484848]">Waktu Belajar Fleksibel</h5>
                    <p class="text-[#484848] mb-4">Tanpa perlu khawatir menganggu kesibukan! Video materi bisa diakses kapan
                        saja dan dimana saja.
                    </p>
                </div>
                <div class="bg-[#FDE4D3] rounded-[16px] p-6">
                    <h5 class="font-semibold text-lg text-[#484848]">Live Session</h5>
                    <p class="text-[#484848] mb-4">Peserta mendapatkan akses gratis tanpa syarat untuk mengikuti sesi LIVE
                        melalui program SHAETALK dengan berbagai topik yang beragam.

                    </p>
                </div>
                <div class="bg-[#DBF5D2] rounded-[16px] p-6">
                    <h5 class="font-semibold text-lg text-[#484848]">Quiz dan E-Sertifikat </h5>
                    <p class="text-[#484848] mb-4">Terdapat quiz di setiap pembahasan untuk mengukur pemahaman peserta.
                        Dilengkapi E-Sertifikat untuk peserta yang sudah selesai menyimak materi.</p>
                </div>
                <div class="bg-[#F0F0F0] rounded-[16px] p-6">
                    <h5 class="font-semibold text-lg text-[#484848]">Grup Diskusi</h5>
                    <p class="text-[#484848] mb-4">Disediakan grup dua arah untuk memudahkan komunikasi dan diskusi antar
                        peserta yang bersifat opsional

                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="cocok-bagi-kamu" class="py-32">
        <div class="container mx-auto">
            <h2 class="text-3xl sm:text-3xl md:text-3xl font-semibold text-[#1A1A1A] mb-8"
                style="font-family: 'Libre Baskerville', serif; line-height: 1.2;">
                Cocok untuk semua,
                <span class="text-[#F58A44] font-light italic"> terutama kamu yang merasa... </span>
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <div class="flex flex-col items-center">
                    <!-- Gambar -->
                    <div class="bg-[#FDE4D3] rounded-[16px] mb-4">
                        <img src="{{ asset('img/cocok1.png') }}" alt="Image"
                            class="w-full h-auto object-cover rounded-[16px]">
                    </div>
                    <!-- Card -->
                    <div class="bg-[#FDE4D3] p-6 rounded-[16px]">
                        <p class="text-[#484848]">Jika kamu ingin belajar dengan cara yang lebih aplikatif dan fleksibel.
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <!-- Gambar -->
                    <div class="bg-[#FDE4D3] rounded-[16px] mb-4">
                        <img src="{{ asset('img/cocok2.png') }}" alt="Image"
                            class="w-full h-auto object-cover rounded-[16px]">
                    </div>
                    <!-- Card -->
                    <div class="bg-[#FDE4D3] p-6 rounded-[16px]">
                        <p class="text-[#484848]">Jika kamu ingin mengakses materi kapan saja dan di mana saja.</p>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <!-- Gambar -->
                    <div class="bg-[#DBF5D2] rounded-[16px] mb-4">
                        <img src="{{ asset('img/cocok3.png') }}" alt="Image"
                            class="w-full h-auto object-cover rounded-[16px]">
                    </div>
                    <!-- Card -->
                    <div class="bg-[#DBF5D2] p-6 rounded-[16px]">
                        <p class="text-[#484848]">Jika kamu mencari mentor yang ahli dan berpengalaman.</p>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <!-- Gambar -->
                    <div class="bg-[#F0F0F0] rounded-[16px] mb-4">
                        <img src="{{ asset('img/cocok4.png') }}" alt="Image"
                            class="w-full h-auto object-cover rounded-[16px]">
                    </div>
                    <!-- Card -->
                    <div class="bg-[#F0F0F0] p-6 rounded-[16px]">
                        <p class="text-[#484848]">Jika kamu membutuhkan waktu belajar yang fleksibel.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="testimoni" class="bg-[#F58A44] py-32">
        <div class="container mx-auto">
            <h2 class="text-3xl sm:text-3xl md:text-3xl font-semibold text-white mb-6"
                style="font-family: 'Libre Baskerville', serif; line-height: 1.2;">
                Ini Kata Mereka yang
                <span class="text-[#FDE4D3] font-light italic"> Sudah Merasakan Manfaatnya:</span>
            </h2>
            <!-- Flex container untuk card dan scroll horizontal -->
            <div class="flex flex-wrap justify-start space-y-6 sm:space-y-0 sm:space-x-6" id="testimonial-carousel">
                <div class="bg-[#FDE4D3] rounded-[16px] p-10 w-full sm:w-[calc(50%-1.5rem)]">
                    <p class="text-[#484848] mb-4 text-left">"Alhamdulillah sangat bersyukur Allah izinkan belajar di
                        program sebagus & sekeren Belajar Islam dan Pengembangan diri. Di Belajar Islam, materi
                        well-structured, fasilitas lengkap, dan ada record nilai jadi kita bisa track perkembangan belajar.
                        Di Pengembangan diri, para pemateri impressively insightful dan materinya incredibly dagiing banget
                        bi idznillah! The self-development materials are quite advanced++sesuai dg Islamic values. It's such
                        a valuable experience to learn here. Can't wait to join the new program held by SHAE again!"</p>

                    <div class="flex items-center">
                        <!-- Circle image with border F58A44 -->
                        <img src="{{ asset('img/testimoni (1).png') }}" alt="User"
                            class="p-1 w-16 h-16 rounded-full border-2 border-[#F58A44]">

                        <!-- Text beside the image -->
                        <div class="ml-4">
                            <h5 class="font-semibold text-lg text-[#484848]">Rizka Aulia</h5>
                            <p class="text-sm text-[#484848]">22 Tahun, Mahasiswa</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-[16px] p-10 w-full sm:w-[calc(50%-1.5rem)]">
                    <p class="text-[#484848] mb-4 text-left">"Alhamdulillah, banyak belajar di program2nya SHAE^^ learning
                        platformnya membantu banget buat mereview materi & mengakes ulang kalo pas jam kelas sinyalnya
                        buruk, quiz2nya juga MasyaAllah sangat menyokong pemahaman di kelas, adanya tugas studi kasus juga
                        membuat peserta saling berdiskusi dalam menjawab masalah yg relate dengan pelajaran yg sudah
                        diberikan. Akses untuk bertanya langsung dengan guru baik dikelas maupun di SBUM.. Jazakumullahu
                        khairan SHAE semoga semakin berkembang dan memberi manfaat yang long last.. aamiin"</p>

                    <div class="flex items-center">
                        <!-- Circle image with border F58A44 -->
                        <img src="{{ asset('img/testimoni (2).png') }}" alt="User"
                            class="p-1 w-16 h-16 rounded-full border-2 border-[#F58A44]">

                        <!-- Text beside the image -->
                        <div class="ml-4">
                            <h5 class="font-semibold text-lg text-[#484848]">Ulfa Munawwaroh</h5>
                            <p class="text-sm text-[#484848]">22 Tahun, Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="how-it-works" class="py-24">
        <div class="container mx-auto flex flex-wrap">
            <!-- Bagian Kiri -->
            <div class="w-full md:w-1/2 p-6 flex items-center justify-center">
                <div>
                    <h2 class="text-3xl sm:text-3xl md:text-3xl font-semibold text-[#1A1A1A] mb-8"
                        style="font-family: 'Libre Baskerville', serif; line-height: 1.2;">
                        Bagaimana <span class="text-[#F58A44] font-light italic">Sistem Belajarnya?</span>
                    </h2>
                    <!-- Card di Kiri -->
                    <div class="bg-[#FDE4D3] rounded-[16px] p-6">
                        <p class="text-[#484848]">
                            Untuk mendapatkan akses LIVE SESSION, silakan join grup peserta SHAE Life! Link grup akan
                            diberikan langsung setelah peserta berhasil mendaftar
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bagian Kanan -->
            <div class="w-full md:w-1/2 p-6">
                <div class="space-y-6">
                    <!-- Langkah 1: Berlangganan -->
                    <div class="flex items-center">
                        <div class="p-6 w-12 h-12 bg-[#F58A44] text-white text-3xl flex justify-center items-center rounded-full"
                            style="font-family: 'Libre Baskerville', serif; line-height: 1.2;">
                            1
                        </div>
                        <div class="ml-4">
                            <p class="font-bold text-[#484848]">Berlangganan</p>
                            <p class="text-[#484848]">Klik LOGIN dan masukkan email pada portal pelanggan, pastikan kamu
                                sudah membeli kelasnya. Jika belum, Klik MULAI BELAJAR di halaman ini.</p>
                        </div>
                    </div>
                    <hr class="border-2 border-[#F58A44] mt-2">

                    <!-- Langkah 2: Menikmati Materi -->
                    <div class="flex items-center">
                        <div class="p-6 w-12 h-12 bg-[#F58A44] text-white text-3xl flex justify-center items-center rounded-full"
                            style="font-family: 'Libre Baskerville', serif; line-height: 1.2;">
                            2
                        </div>
                        <div class="ml-4">
                            <p class="font-bold text-[#484848]">Menikmati Materi</p>
                            <p class="text-[#484848]">Simak video materi dan Modul PPT yang sudah disediakan dalam platform
                                untuk memahami topik pembelajaran lebih dalam.</p>
                        </div>
                    </div>
                    <hr class="border-2 border-[#F58A44] mt-2">

                    <!-- Langkah 3: Mengerjakan Quiz -->
                    <div class="flex items-center">
                        <div class="p-6 w-12 h-12 bg-[#F58A44] text-white text-3xl flex justify-center items-center rounded-full"
                            style="font-family: 'Libre Baskerville', serif; line-height: 1.2;">
                            3
                        </div>
                        <div class="ml-4">
                            <p class="font-bold text-[#484848]">Mengerjakan Quiz</p>
                            <p class="text-[#484848]">Mengerjakan Quiz untuk mengukur pemahamanmu tentang materi yang telah
                                dipelajari. Setiap quiz didesain untuk memberikan tantangan yang bermanfaat.</p>
                        </div>
                    </div>
                    <hr class="border-2 border-[#F58A44] mt-2">

                    <!-- Langkah 4: Dapatkan Sertifikat -->
                    <div class="flex items-center">
                        <div class="p-6 w-12 h-12 bg-[#F58A44] text-white text-3xl flex justify-center items-center rounded-full"
                            style="font-family: 'Libre Baskerville', serif; line-height: 1.2;">
                            4
                        </div>
                        <div class="ml-4">
                            <p class="font-bold text-[#484848]">Dapatkan Sertifikat</p>
                            <p class="text-[#484848]">Klaim sertifikat setelah menyelesaikan pembelajaran. Sertifikat ini
                                dapat menjadi bukti pengakuan atas keterampilan yang telah dipelajari.</p>
                        </div>
                    </div>

                    <!-- Garis Pemisah -->
                    <hr class="border-2 border-[#F58A44] mt-2">
                </div>
            </div>
        </div>
    </section>



    <section id="materi" class=" pt-10 pb-20">
        <div class="container mx-auto">
            <h2 class="text-3xl sm:text-3xl md:text-3xl font-semibold text-[#1A1A1A] mb-8"
                style="font-family: 'Libre Baskerville', serif; line-height: 1.2;">
                Lihat <span class="text-[#F58A44] font-light italic">Kurikulum Topik</span>
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-8 justify-center items-center">
                @foreach (range(1, 9) as $item)
                    <div class="bg-[#F0F0F0] text-[#484848] rounded-[16px] p-6 text-center hover:bg-[#FDE4D3]"
                        style="background-image: url('{{ asset('img/bg_ustad1.png') }}'); background-size: cover; background-position: center;">
                        <div class="bg-white w-16 h-16 mx-auto rounded-full mb-4 flex items-center justify-center">
                            <img src="{{ asset('img/logo_' . $item . '.png') }}" alt="Icon" class="w-11 h-11">
                        </div>
                        <h5 class="font-medium text-lg  transition duration-300 ease-in-out">
                            @switch($item)
                                @case(1)
                                    Hijrah
                                @break

                                @case(2)
                                    Islam Dasar
                                @break

                                @case(3)
                                    Kemuslimahan
                                @break

                                @case(4)
                                    Pengembangan Diri
                                @break

                                @case(5)
                                    Akhlak
                                @break

                                @case(6)
                                    Pranikah
                                @break

                                @case(7)
                                    Keluarga
                                @break

                                @case(8)
                                    Muamalah
                                @break

                                @case(9)
                                    Keteladanan
                                @break

                                @default
                                    Judul Materi
                            @endswitch
                        </h5>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="mentor" class="py-10">
        <div class="container mx-auto">
            <h2 class="text-3xl sm:text-3xl md:text-3xl font-semibold text-[#1A1A1A] mb-8"
                style="font-family: 'Libre Baskerville', serif; line-height: 1.2;">
                Pemateri yang <span class="text-[#F58A44] font-light italic">Kompeten</span>
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 justify-center items-center">
                @php
                    // Array warna background
                    $bgColors = ['bg-[#FDE4D3]', 'bg-[#DBF5D2]', 'bg-[#F0F0F0]'];
                @endphp
                @foreach ($pemateri as $index => $item)
                    @php
                        // Menentukan warna berdasarkan indeks
                        $bgColor = $bgColors[$index % count($bgColors)];
                    @endphp
                    <div class="{{ $bgColor }} rounded-[16px] p-6">
                        <div class="bg-gray-200 w-24 h-24 mx-auto rounded-full mb-4 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Pemateri"
                                class="w-24 h-24 rounded-full">
                        </div>
                        <h5
                            class="font-medium text-lg text-[#484848] hover:text-[#F58A44] transition duration-300 ease-in-out mb-2">
                            {{ $item->nama }}
                        </h5>
                        <ul class="text-left text-sm -ml-8 text-[#484848] space-y-1">
                            {{-- Pisahkan deskripsi berdasarkan koma atau titik --}}
                            @foreach (explode("\n", $item->deskripsi ?? '') as $desc)
                                <li>{{ $desc }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>




    <section id="about" class="pt-32">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row items-center">
                <div
                    class="md:w-1/2 mb-8 mr-20 md:mb-0 bg-[#F58A44] rounded-tl-[0px] rounded-tr-[50px] rounded-br-[50px] rounded-bl-[50px]">
                    <img src="{{ asset('img/sec3.png') }}" alt="About Image" class="max-w-full">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl sm:text-3xl md:text-3xl font-semibold text-[#1A1A1A] mb-6"
                        style="font-family: 'Libre Baskerville', serif; line-height: 1.2;">
                        E-Learning
                        <span class="text-[#F58A44] font-light italic"> Shaelife
                    </h2>
                    <p class="text-[#484848] text-lg mb-12">
                        Belajar semua topik jadi pemuda idaman agar shalih di Tiap Fase Kehidupan </p>
                    <a href="#"
                        class="bg-[#F58A44] text-white px-6 py-3 rounded-[16px] font-semibold hover:bg-[#6F2E03] hover:text-[#F58A44] transition duration-300">
                        MULAI BELAJAR </a>

                </div>
            </div>
        </div>
    </section>


    <!--section BERLANGGAN-->
    <div id="subscription" class="pt-32 pb-8 flex justify-center items-center min-h-screen bg-white">


        <section class="features max-w-6xl mx-auto">
            <!-- Title -->
            <h2 class="text-[#F58A44] text-center font-semibold text-2xl mb-4"
                style="font-family: 'Libre Baskerville', serif;">Pilih Paket Langganan Anda</h2>

            <!-- Deskripsi -->
            <p class="text-center text-[#1A1A1A] text-4xl font-semibold mb-12"
                style="font-family: 'Libre Baskerville', serif;">
                Temukan Paket Langganan yang Paling Sesuai
            </p>

            <div class="flex justify-center max-w-6xl mx-auto">
                <!-- Package Cards -->
                @php
                    // Pilih gambar secara acak
                    $randomImage = $images[array_rand($images)];
                @endphp
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($bundle as $paket)
                        <div class="bg-[#F58A44] rounded-[16px] p-6 text-white">
                            <!-- Gambar Acak (Placeholder atau Static jika gambar tidak ada dalam schema) -->
                            <div class="mb-4">
                                <img src="{{ $randomImage }}" alt="Package Image"
                                    class="rounded-lg w-full h-50 object-cover">
                            </div>

                            <!-- Nama Paket -->
                            <h3 class="text-[16px] font-bold mb-2" style="font-family: 'Inter', sans-serif;">
                                {{ $paket->name_bundle }}</h3>

                            <!-- Deskripsi -->
                            <p class="mb-6 text-[14px] text-white" style="font-family: 'Inter', sans-serif;">
                                {{ $paket->description }}</p>

                            <!-- Time and Price -->
                            <div class="flex justify-between items-center mb-6 p-3 border rounded-[8px]">
                                <div class="flex items-center space-x-2" style="font-family: 'Inter', sans-serif;">
                                    <span class="text-[14px]">Masa {{ $paket->duration }} Hari</span>
                                </div>
                                <div class="text-[16px] font-bold" style="font-family: 'Inter', sans-serif;">
                                    <span>Rp. {{ number_format($paket->price, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <!-- Tombol Subscribe -->
                            <button type="button"
                                class="w-full bg-[#FDE4D3] text-[#F58A44] py-4 rounded-[12px] font-bold hover:bg-white transition"
                                onclick="window.location.href='{{ route('login') }}'"
                                style="font-family: 'Inter', sans-serif;">
                                Subscribe Now
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>





    <!-- SECTION FAQ -->
    <section id="FAQ" class=" pt-24 pb-24">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold text-center mb-12 text-[#1A1A1A]"
                style="font-family: 'Libre Baskerville', serif;">FAQ</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- FAQ 1 -->
                <div class="bg-[#FDE4D3] p-6 rounded-lg" id="faq-1">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold text-[#F58A44]" style="font-family: 'Inter', sans-serif;">Apakah
                            ada sertifikat setelah selesai kursus?
                        </h3>
                        <button class="text-[#F58A44]" onclick="toggleAnswer(1)">
                            <span id="toggle-icon-1">+</span>
                        </button>
                    </div>
                    <p id="answer-1" class="text-[#484848] hidden mt-4" style="font-family: 'Inter', sans-serif;"> Ya,
                        ada! Setelah menyelesaikan semua materi dan kuis, kamu akan mendapatkan sertifikat sebagai bukti
                        telah menyelesaikan materi.

                    </p>
                </div>
                <!-- FAQ 2 -->
                <div class="bg-[#FDE4D3] p-6 rounded-lg" id="faq-2">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold text-[#F58A44]" style="font-family: 'Inter', sans-serif;">Kapan
                            Waktu Belajarnya?

                        </h3>
                        <button class="text-[#F58A44]" onclick="toggleAnswer(2)">
                            <span id="toggle-icon-2">+</span>
                        </button>
                    </div>
                    <p id="answer-2" class="text-[#484848] hidden mt-4" style="font-family: 'Inter', sans-serif;">Waktu
                        belajar fleksibel kapan saja dan dimana saja

                    </p>
                </div>
                <!-- FAQ 3 -->
                <div class="bg-[#FDE4D3] p-6 rounded-lg" id="faq-3">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold text-[#F58A44]" style="font-family: 'Inter', sans-serif;">
                            Bagaimana Cara Belajarnya?
                        </h3>
                        <button class="text-[#F58A44]" onclick="toggleAnswer(3)">
                            <span id="toggle-icon-3">+</span>
                        </button>
                    </div>
                    <p id="answer-3" class="text-[#484848] hidden mt-4" style="font-family: 'Inter', sans-serif;">Cukup
                        dengan menyimak video secara mandiri. Lalu kerjakan quiz setelah menyimak video materi

                    </p>
                </div>
                <!-- FAQ 4 -->
                <div class="bg-[#FDE4D3] p-6 rounded-lg" id="faq-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold text-[#F58A44]" style="font-family: 'Inter', sans-serif;">
                            Bolehkah membagikan akun ke orang lain?
                        </h3>
                        <button class="text-[#F58A44]" onclick="toggleAnswer(4)">
                            <span id="toggle-icon-4">+</span>
                        </button>
                    </div>
                    <p id="answer-4" class="text-[#484848] hidden mt-4" style="font-family: 'Inter', sans-serif;">Mohon
                        maaf tidak diperbolehkan, hanya yang terdaftar yang boleh mengakses.

                    </p>
                </div>
            </div>
        </div>
        </div>

    </section>


    <script>
        function toggleAnswer(faqNumber) {
            const answer = document.getElementById('answer-' + faqNumber);
            const icon = document.getElementById('toggle-icon-' + faqNumber);
            const faqSection = document.getElementById('faq-' + faqNumber);

            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                icon.textContent = '-';
                faqSection.style.backgroundColor = '#F0F0F0'; // Change background color when answer is visible
            } else {
                answer.classList.add('hidden');
                icon.textContent = '+';
                faqSection.style.backgroundColor = '#FDE4D3'; // Revert to original color when answer is hidden
            }
        }
    </script>


    <!-- Footer Section -->
    <footer class="bg-[#F58A44] text-white py-16">
        <div class="container mx-auto">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                <!-- Deskripsi Website -->
                <div class=" sm:text-left mb-6 sm:mb-0 max-w-xs sm:max-w-sm">
                    <img src="{{ asset('img/life.png') }}" alt="Hero Image" style="width: 160px; ">
                    <p class="font-semibold text-lg pt-4" style="font-family: 'Inter', sans-serif;">Hidup Tentram sesuai
                        Panduan Islam</p>

                    <div class="border border-white rounded-lg p-1 inline-flex items-center">
                        <p class="text-sm mt-2" style="font-family: 'Inter', sans-serif; display: inline;">Bagian Dari:
                        </p><img src="{{ asset('img/academy.png') }}" alt="Hero Image"
                            style="width: 80px; display: inline;">
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="flex flex-col sm:flex-row justify-between gap-8 w-full sm:w-auto">
                    <!-- Company Section -->
                    <div class="sm:w-1/2">
                        <h6 class="font-semibold text-white mb-3" style="font-family: 'Inter', sans-serif;">Company</h6>
                        <ul class="space-y-4 -ml-8 text-sm text-white">
                            <li><a href="#hero" class="text-white hover:text-[#FDE4D3]"
                                    style="font-family: 'Inter', sans-serif;">Introduction</a></li>
                            <li><a href="#Kenapa harus" class="text-white hover:text-[#FDE4D3]"
                                    style="font-family: 'Inter', sans-serif;">Why ShaeLife</a></li>
                            <li><a href="#testimoni" class="text-white hover:text-[#FDE4D3]"
                                    style="font-family: 'Inter', sans-serif;">Testimonial</a></li>
                            <li><a href="#FAQ" class="text-white hover:text-[#FDE4D3]"
                                    style="font-family: 'Inter', sans-serif;">FAQ</a></li>
                        </ul>
                    </div>

                    <!-- Explore Section -->
                    <div class="sm:w-1/2">
                        <h6 class="ml-8 font-semibold text-white mb-3 " style="font-family: 'Inter', sans-serif;">Explore
                        </h6>
                        <ul class="space-y-4 text-sm text-white">
                            <li><a href="#Kurikulum" class="text-white hover:text-[#FDE4D3]"
                                    style="font-family: 'Inter', sans-serif;">Kurikulum</a></li>
                            <li><a href="#mentor" class="text-white hover:text-[#FDE4D3]"
                                    style="font-family: 'Inter', sans-serif;">Mentor</a></li>
                            <li><a href="#subscription" class=" text-white hover:text-[#FDE4D3]"
                                    style="font-family: 'Inter', sans-serif;">Subscription</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="mt-6  sm:mt-0">
                    <h6 class="font-semibold text-white mb-3" style="font-family: 'Inter', sans-serif;">Follow Us</h6>
                    <ul class="-ml-8 flex space-x-6 justify-center sm:justify-start">
                        <li>
                            <a href="https://facebook.com" target="_blank" class="hover:text-[#FDE4D3]">
                                <svg class="w-6 h-6 text-white hover:text-[#FDE4D3] transition duration-300 ease-in-out"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.351C0 23.406.593 24 1.325 24h11.497v-9.294H9.847v-3.622h2.975V8.413c0-2.946 1.796-4.548 4.417-4.548 1.254 0 2.332.093 2.646.134v3.068h-1.816c-1.426 0-1.7.678-1.7 1.67v2.186h3.403l-.444 3.622h-2.959V24h5.788c.73 0 1.324-.594 1.324-1.325V1.325C24 .593 23.406 0 22.675 0z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com" target="_blank" class="hover:text-[#FDE4D3]">
                                <svg class="w-6 h-6 text-white hover:text-[#FDE4D3] transition duration-300 ease-in-out"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M24 4.557a9.83 9.83 0 0 1-2.828.775 4.932 4.932 0 0 0 2.165-2.724 9.865 9.865 0 0 1-3.127 1.195 4.918 4.918 0 0 0-8.381 4.482C7.691 7.748 4.066 5.82 1.64 2.924a4.917 4.917 0 0 0-.665 2.475c0 1.708.87 3.214 2.188 4.096a4.904 4.904 0 0 1-2.228-.616c-.053 2.282 1.582 4.415 3.949 4.89a4.935 4.935 0 0 1-2.224.085c.63 1.964 2.445 3.393 4.6 3.434a9.867 9.867 0 0 1-6.102 2.104c-.396 0-.79-.023-1.175-.068A13.95 13.95 0 0 0 7.548 21c9.057 0 14.01-7.514 14.01-14.015 0-.213-.005-.425-.014-.637A10.004 10.004 0 0 0 24 4.557z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://linkedin.com" target="_blank" class="hover:text-[#FDE4D3]">
                                <svg class="w-6 h-6 text-white hover:text-[#FDE4D3] transition duration-300 ease-in-out"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M22.23 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.226.792 24 1.771 24H22.23C23.207 24 24 23.226 24 22.271V1.729C24 .774 23.207 0 22.23 0zM7.19 20.452H3.577V9.038H7.19v11.414zM5.384 7.578c-1.15 0-2.082-.93-2.082-2.079 0-1.148.932-2.079 2.082-2.079 1.147 0 2.078.931 2.078 2.079s-.931 2.079-2.078 2.079zM20.451 20.452h-3.612v-5.557c0-1.325-.025-3.029-1.846-3.029-1.847 0-2.131 1.442-2.131 2.933v5.653h-3.609V9.038h3.467v1.561h.047c.482-.913 1.659-1.874 3.415-1.874 3.65 0 4.325 2.404 4.325 5.523v6.204z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <p class="text-white mt-4">&copy; 2025 Shae Life. All Rights Reserved.</p>
                </div>

            </div>
        </div>
    </footer>



    <!-- Font Awesome CDN for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
