<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/project-asset" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_project" value="{{$id}}">
                <div class="modal-header">
                    <h4 class="modal-title">Create an Asset</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="typeControl">Type</label>
                        <select id="typeControl" class="form-control" required name="id_asset_type">
                            @foreach ($list_type_assets as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="epControl">Ep.</label>
                        <select id="epControl" class="form-control" required name="code">
                            <option value="MP">Main Pack</option>
                            <option value="EP">Episode</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nameControl">Name</label>
                        <input type="text" class="form-control" id="nameControl" required name="name">
                    </div>
                    <div class="form-group">
                        <label for="descControl">Description</label>
                        <textarea type="text" class="form-control" id="descControl" rows="5" required
                            name="description"></textarea>
                    </div>
                    {{-- <div class="form-group">
                        <label for="ppControl">File</label>
                        <input type="file" name="path" class="form-control-file" id="ppControl">
                    </div> --}}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>