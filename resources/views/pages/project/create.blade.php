<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('project.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Create Production</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nameControl">Give your project a name</label>
                                <input type="text" class="form-control" id="nameControl" required name="name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="typeControl">Type</label>
                                <select id="typeControl" class="form-control" required name="type">
                                    <option value="Short">Short</option>
                                    <option value="TV Show">TV Show</option>
                                </select>
                                <small class="form-text text-muted">
                                    if you choose TV Show, the production will be splitted in episodes.
                                </small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="fpsControl">FPS</label>
                                <input type="number" class="form-control" id="fpsControl" required name="fps"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ratioControl">Ratio</label>
                                <select id="ratioControl" class="form-control" required name="ratio">
                                    @foreach ($list_ratio as $ratio)
                                    <option value="{{$ratio}}">{{$ratio}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="resolutionControl">Resolution</label>
                                <select id="resolutionControl" class="form-control" required name="resolution">
                                    @foreach ($list_resolution as $resolution)
                                    <option value="{{$resolution}}">{{$resolution}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Start and End Dates</label>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <input type="date" class="form-control" required name="start_date">
                                </div>
                                <div class="col text-center">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                                <div class="col-5">
                                    <input type="date" class="form-control" required name="end_date">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>