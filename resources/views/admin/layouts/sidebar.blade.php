<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @role('admin|client')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/dashboard') ? '' : 'collapsed' }}" href="{{route("dashboard")}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @endrole
        @role('admin')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/users') ? '' : 'collapsed' }}" href="{{route("users.index")}}">
                <i class="bi bi-person"></i>
                <span>Foydalanuvchilar</span>
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
        @endrole

        @role('client')

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/categories') ? '' : 'collapsed' }}" href="{{route("categories.index")}}">
                <i class="bi bi-tags"></i>
                <span>Kategoriyalar</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/meals') ? '' : 'collapsed' }}" href="{{route("meals.index")}}">
                <i class="bi bi-egg-fried"></i>
                <span>Taomlar</span>
            </a>
        </li>

        @endrole

    </ul>

</aside>
