@php
    $menus = [
        (object) [
            'title' => 'Dashboard',
            'route' => 'index',
            'icon' => 'fas fa-fw fa-tachometer-alt',
        ],
        (object) [
            'title' => 'Produk',
            'route' => 'admin.products.index',
            'icon' => 'fas fa-fw fa-archive',
        ],
        (object) [
            'title' => 'Kategori',
            'route' => 'admin.categories.index',
            'icon' => 'fas fa-fw fa-layer-group',
        ],
    ];
@endphp

<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion position-sticky" id="accordionSidebar"
    style="top: 0; height: 100vh;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-3">Simpan.In</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @foreach ($menus as $menu)
        <li class="nav-item {{ request()->routeIs($menu->route) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route($menu->route) }}">
                <i class="{{ $menu->icon }}"></i>
                <span>{{ $menu->title }}</span></a>
        </li>
    @endforeach

    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
