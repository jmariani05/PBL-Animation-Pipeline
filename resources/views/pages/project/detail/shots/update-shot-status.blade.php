@if ($status == 'todo')
<button class="btn btn-sm rounded-pill btn-outline-info py-0" data-toggle="modal"
    data-target="#modal-shot-{{$name}}{{$item->id}}">
    <span class="small">TODO</span>
</button>
@endif
@if ($status == 'retake')
<button class="btn btn-sm rounded-pill btn-danger py-0" data-toggle="modal"
    data-target="#modal-shot-{{$name}}{{$item->id}}">
    <span class="small">RETAKE</span>
</button>
@endif
@if ($status == 'ready')
<button class="btn btn-sm rounded-pill btn-warning py-0 text-white" data-toggle="modal"
    data-target="#modal-shot-{{$name}}{{$item->id}}">
    <span class="small">READY</span>
</button>
@endif
@if ($status == 'done')
<button class="btn btn-sm rounded-pill btn-success py-0 text-white" data-toggle="modal"
    data-target="#modal-shot-{{$name}}{{$item->id}}">
    <span class="small">DONE</span>
</button>
@endif

<div class="modal fade" id="modal-shot-{{$name}}{{$item->id}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/project-shot/{{$item->id}}" method="POST">
                @csrf
                @method('put')
                <input type="hidden" name="{{$name_user}}" value="{{request()->session()->get('user')['id']}}">
                <input type="hidden" name="historyDesc" value="{{$historyDesc}}">
                <div class="modal-header">
                    <h5 class="modal-title">Update Status {{$item->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" required name="{{$name}}">
                            @foreach ($list_status as $stat)
                            <option value="{{$stat}}" {{$status==$stat ? 'selected' : '' }}>{{$stat}}</option>
                            @endforeach
                        </select>
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