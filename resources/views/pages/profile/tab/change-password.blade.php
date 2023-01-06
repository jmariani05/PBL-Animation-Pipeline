<form action="/profile/change-password" method="POST" class="form-horizontal">
    @csrf
    <div class="form-group row">
        <label for="lastPassControl" class="col-sm-2 col-form-label">Current Password</label>
        <div class="col-sm-10">
            <div class="input-group" id="show_hide_password">
                <input class="form-control" type="password" required name="current_password">
                <div class="input-group-append">
                    <a class="input-group-text" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="lastPassControl" class="col-sm-2 col-form-label">New Password</label>
        <div class="col-sm-10">
            <div class="input-group" id="show_hide_password">
                <input class="form-control" type="password" required name="new_password">
                <div class="input-group-append">
                    <a class="input-group-text" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="lastPassControl" class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-10">
            <div class="input-group" id="show_hide_password">
                <input class="form-control" type="password" required name="confirm_password">
                <div class="input-group-append">
                    <a class="input-group-text" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
    </div>
</form>