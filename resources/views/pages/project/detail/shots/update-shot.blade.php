<div class="modal fade" id="modal-update-shot{{$item->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/project-shot/{{$item->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Update Shot {{$item->title}}</h4>
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
                        <label for="nameControl">Name</label>
                        <input type="text" class="form-control" id="nameControl" required name="title"
                            value="{{$item->title}}">
                    </div>
                    <div class="form-group">
                        <label for="frameControl">Frame</label>
                        <input type="number" class="form-control" id="frameControl" name="frames"
                            value="{{$item->frames}}">
                    </div>
                    <div class="form-group">
                        <label for="inControl">In</label>
                        <input type="number" class="form-control" id="inControl" name="in" value="{{$item->in}}">
                    </div>
                    <div class="form-group">
                        <label for="outControl">Out</label>
                        <input type="number" class="form-control" id="outControl" name="out" value="{{$item->out}}">
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