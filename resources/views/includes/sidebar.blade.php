<aside class="main-sidebar sidebar-light-primary border-right">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('logo.png') }}" alt="Logo"
            class="brand-image">
        <span class="brand-text">Pipeline Animation</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Home</li>
                <li class="nav-item">
                    <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Main</li>
                <li class="nav-item">
                    <a href="/project"
                        class="nav-link {{ Request::is('project') || Request::is('project/*')  ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pen-fancy"></i>
                        <p>
                            Project
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/history" class="nav-link {{ Request::is('history') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            History
                        </p>
                    </a>
                </li>
                @if (request()->session()->get('user')['role'] == 'manager')
                <li class="nav-header">Setup</li>
                <li class="nav-item">
                    <a href="/user" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>