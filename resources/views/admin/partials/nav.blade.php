<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Navegación</li>
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="{{ request()->is('admin') ? 'active' : '' }} nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Inicio
                </p>
            </a>
        </li>
        <li class="nav-item {{ request()->is('admin/posts*') ? 'menu-open': '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/posts') ? 'active' : '' }}">
                <i class="nav-icon fas fa-bars"></i>
                <p>
                    Blog
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->is('admin/posts') ? 'active' : '' }}">
                        <i class="far fa-eye nav-icon"></i>
                        <p>Ver todos los posts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-pencil-alt nav-icon"></i>
                        <p>Crear post</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>