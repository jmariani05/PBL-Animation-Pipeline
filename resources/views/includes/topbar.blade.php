<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                @if (request()->session()->get('user')['avatar'] != null)
                <img src="{{ asset('/images/avatars/'.request()->session()->get('user')['avatar']) }}"
                    class="user-image img-circle" alt="User Image" />
                @else
                <img src="https://ui-avatars.com/api/?name={{ request()->session()->get('user')['first_name'] }}{{ request()->session()->get('user')['last_name'] }}"
                    class="user-image img-circle" alt="User Image" />
                @endif
                <span class="hidden-xs" style="color: black">
                    {{ request()->session()->get('user')['first_name'] }}
                    {{ request()->session()->get('user')['last_name'] }}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="/profile" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <a href="/profile?tab=change-password" class="dropdown-item">
                    <i class="fas fa-lock mr-2"></i> Ganti Password
                </a>
                <div class="dropdown-divider"></div>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>