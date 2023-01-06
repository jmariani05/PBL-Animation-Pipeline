<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/user" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Create a new user</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="firstNameControl">First Name</label>
                                <input type="text" name="first_name" class="form-control" id="firstNameControl"
                                    required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="lastNameControl">Last Name</label>
                                <input type="text" name="last_name" class="form-control" id="lastNameControl" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="usernameControl">Username</label>
                                <input type="text" name="username" class="form-control" id="usernameControl" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="emailControl">Email Address</label>
                                <input type="email" name="email" class="form-control" id="emailControl" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="hpControl">No HP</label>
                                <input type="text" name="phone" class="form-control" id="hpControl" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>