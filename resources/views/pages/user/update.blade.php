<div class="modal fade" id="modal-update{{$item->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('user.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Update User {{$item->first_name}} {{$item->last_name}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="firstNameControl">First Name</label>
                                <input type="text" name="first_name" class="form-control" id="firstNameControl" required
                                    value="{{$item->first_name}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="lastNameControl">Last Name</label>
                                <input type="text" name="last_name" class="form-control" id="lastNameControl" required
                                    value="{{$item->last_name}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="usernameControl">Username</label>
                                <input type="text" name="username" class="form-control" id="usernameControl" required
                                    value="{{$item->username}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="emailControl">Email Address</label>
                                <input type="email" name="email" class="form-control" id="emailControl" required
                                    value="{{$item->email}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="hpControl">No HP</label>
                                <input type="text" name="phone" class="form-control" id="hpControl" required
                                    value="{{$item->phone}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>