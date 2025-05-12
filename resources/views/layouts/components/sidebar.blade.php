@php
    $menus = [
        (object) [
            "title" => "Dashboard",
            "route" => "index",
            "icon" => "fas fa-fw fa-tachometer-alt",
        ],
        (object) [
            "title" => "Produk",
            "route" => "pages.products.product",
            "icon" => "fas fa-fw fa-archive",
        ],
    ]
@endphp

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-3">Atur.In</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @foreach ($menus as $menu)
        <li class="nav-item {{ request()->routeIs($menu->route) ? 'active' : ''}}">
        <a class="nav-link" href="{{ route($menu->route )}}">
            <i class="{{ $menu->icon }}"></i>
            <span>{{ $menu->title }}</span></a>
        </li>
    @endforeach

    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
