<form action="/edit-profile" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="ppControl">Photo Profile</label>
                <input type="file" name="avatar" class="form-control-file" id="ppControl">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="firstNameControl">First Name</label>
                <input type="text" name="first_name" class="form-control" id="firstNameControl" required
                    value="{{ request()->session()->get('user')['first_name'] }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="lastNameControl">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="lastNameControl" required
                    value="{{ request()->session()->get('user')['last_name'] }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="usernameControl">Username</label>
                <input type="text" name="username" class="form-control" id="usernameControl" required
                    value="{{ request()->session()->get('user')['username'] }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="emailControl">Email Address</label>
                <input type="email" name="email" class="form-control" id="emailControl" required
                    value="{{ request()->session()->get('user')['email'] }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="hpControl">No HP</label>
                <input type="text" name="phone" class="form-control" id="hpControl" required
                    value="{{ request()->session()->get('user')['phone'] }}">
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-danger px-5">Submit</button>
    </div>
</form>