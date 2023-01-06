<div class="modal fade" id="modal-update-asset{{$item->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/project-asset/{{$item->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_project" value="{{$id}}">
                <div class="modal-header">
                    <h4 class="modal-title">Update Asset</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ppControl">File</label>
                        <input type="file" name="path" class="form-control-file" id="ppControl">
                    </div>
                    <div class="form-group">
                        <label for="typeControl">Type</label>
                        <select id="typeControl" class="form-control" required name="id_asset_type">
                            @foreach ($list_type_assets as $type)
                            <option value="{{$type->id}}" {{$item->id_asset_type == $type->id ? 'selected' :
                                ''}}>{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="epControl">Ep.</label>
                        <select id="epControl" class="form-control" required name="code">
                            <option value="MP" {{$item->code == 'MP' ? 'selected' : ''}}>Main Pack</option>
                            <option value="EP" {{$item->code == 'EP' ? 'selected' : ''}}>Episode</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nameControl">Name</label>
                        <input type="text" class="form-control" id="nameControl" required name="name"
                            value="{{$item->name}}">
                    </div>
                    <div class="form-group">
                        <label for="descControl">Description</label>
                        <textarea type="text" class="form-control" id="descControl" rows="5" required
                            name="description">{{$item->description}}</textarea>
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