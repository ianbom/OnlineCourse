<div id="sidebar">
    <div class="sidebar-wrapper">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{ route('landing') }}">
                        {{-- <img src="{{ asset('img/logo-shae-life.png') }}" alt="Logo" srcset=""> --}}
                    </a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ Route::is('landing') ? 'active' : '' }}">
                    <a href="{{ route('landing') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Beranda</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Route::is('user.index') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" class='sidebar-link'>
                        <i class="bi bi-people"></i>
                        <span>User</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Route::is('bundle.index') ? 'active' : '' }}">
                    <a href="{{ route('bundle.index') }}" class='sidebar-link'>
                        <i class="bi bi-box-seam"></i>
                        <span>Paket Langganan</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Route::is('course.index') ? 'active' : '' }}">
                    <a href="{{ route('course.index') }}" class='sidebar-link'>
                        <i class="bi bi-journal-richtext"></i>
                        <span>Kelas</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Route::is('materi.index') ? 'active' : '' }}">
                    <a href="{{ route('materi.index') }}" class='sidebar-link'>
                        <i class="bi bi-card-text"></i>
                        <span>Materi</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Route::is('category.index') ? 'active' : '' }}">
                    <a href="{{ route('category.index') }}" class='sidebar-link'>
                        <i class="bi bi-tags"></i>
                        <span>Kategori</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Route::is('pemateri.index') ? 'active' : '' }}">
                    <a href="{{ route('pemateri.index') }}" class='sidebar-link'>
                        <i class="bi bi-person-arms-up"></i>
                        <span>Pemateri</span>
                    </a>
                </li>

                <li class="sidebar-title">Keluar</li>
                <li class="sidebar-item">
                    <a type="button" class='sidebar-link' id="button-logout">
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Keluar</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
