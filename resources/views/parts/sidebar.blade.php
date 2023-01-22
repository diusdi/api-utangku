<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Utangkuu</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Ut</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Pengaturan Teman</li>
            <li class="nav-item {{ (request()->url()) == route('teman.page') ? 'active' : '' }}">
                <a href="{{ route('teman.page') }}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Daftar Teman </span></a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="menu-header">Manajemen Hutang</li>
            <li class="nav-item {{ (request()->url()) == route('utang.page') ? 'active' : '' }}">
                <a href="{{ route('utang.page') }}" class="nav-link"><i class="fa-solid fa-money-bill"></i>
                    <span>Daftar Hutang</span></a>
            </li>
        </ul>
    </aside>
</div>
