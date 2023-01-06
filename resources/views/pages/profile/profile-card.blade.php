<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="text-center mb-5">
            @if (request()->session()->get('user')['avatar'] != null)
            <img class="profile-user-img img-fluid img-circle"
                src="{{ asset('/images/avatars/'.request()->session()->get('user')['avatar']) }}"
                alt="User profile picture">
            @else
            <img class="profile-user-img img-fluid img-circle"
                src="https://ui-avatars.com/api/?name={{ request()->session()->get('user')['first_name'] }}{{ request()->session()->get('user')['last_name'] }}"
                alt="User profile picture">
            @endif

            <h3 class="profile-username mb-0">
                {{ request()->session()->get('user')['first_name'] }}
                {{ request()->session()->get('user')['last_name'] }}
            </h3>
            <p class="text-muted">
                {{ request()->session()->get('user')['role'] }}
            </p>
        </div>

        <div class="">
            <strong>
                <i class="fa fa-user mr-1"></i> Username
            </strong>
            <p class="text-muted">
                {{ request()->session()->get('user')['username'] }}
            </p>
        </div>
        <hr>
        <div class="">
            <strong>
                <i class="fa fa-envelope mr-1"></i> Email Address
            </strong>
            <p class="text-muted">
                {{ request()->session()->get('user')['email'] }}
            </p>
        </div>
        <hr>
        <div class="">
            <strong>
                <i class="fa fa-phone mr-1"></i> Phone
            </strong>
            <p class="text-muted">
                {{ request()->session()->get('user')['phone'] }}
            </p>
        </div>
    </div>
    <!-- /.card-body -->
</div>