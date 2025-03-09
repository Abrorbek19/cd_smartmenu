<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/dashboard') ? '' : 'collapsed' }}" href="{{route("dashboard")}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/restaurants') ? '' : 'collapsed' }}" href="{{route("restaurants.index")}}">
                <i class="bi bi-shop"></i>
                <span>Restaurant</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/clients') ? '' : 'collapsed' }}" href="{{route("clients.index")}}">
                <i class="bi bi-people"></i>
                <span>Mijozlar</span>
            </a>
        </li>
    </ul>

</aside>
