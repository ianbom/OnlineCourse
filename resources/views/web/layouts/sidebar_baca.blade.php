<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700&display=swap" rel="stylesheet">

<div class="flex h-screen bg-gray-100">
    <!-- Tombol Open Sidebar -->
    <button
        data-drawer-target="logo-sidebar"
        data-drawer-toggle="logo-sidebar"
        aria-controls="logo-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 fixed z-50 bg-white"
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
    <aside
        id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-white"
        aria-label="Sidebar"
    >
        <nav class="flex-1 px-4 py-6 space-y-6">
            <div>
                <h3 class="text-gray-400 text-sm font-semibold uppercase mb-3 mt-14">konten</h3>
                <ul>
                    @foreach ($course->materi as $materi)
                    <li class="mb-2">
                        @if ($materi->is_free || $subscription)
                            <a href="{{ route('kelas.belajar', $materi->id_materi) }}" class="flex items-center justify-between px-4 py-2 hover:bg-[#ffe7d8]">
                                <span class="text-[#646363] hover:active:text-[#F58A44]">{{ $materi->name_materi }}</span>
                            </a>
                        @else
                            <a class="flex items-center justify-between px-4 py-2 hover:bg-[#F1F8FF]">
                                <span class="">Langganan sek</span>
                            </a>
                        @endif
                        <hr class="border-t-2 border-[#F58A44]">
                    </li>
                    @endforeach
                </ul>
                <div class="flex justify-end mt-6">
                    <a href="{{ route('kelas.show', $materi->id_course) }}" class="flex items-center gap-1 px-4 py-2 bg-[#F58A44] font-bold text-xs text-white rounded-[12px] hover:bg-[#fbd0b3] hover:text-[#F58A44]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12L4 8l4-4" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 sm:ml-64 bg-white">
        @yield('content')
    </div>
</div>
