<div class="d-flex justify-content-end mb-3">
    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill" data-toggle="modal"
        data-target="#modal-create">
        <i class="fa fa-plus"></i>
        Create Assets
    </button>
    @include('pages.project.detail.assets.create')
</div>
<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Ep.</th>
            <th>Name</th>
            <th>Description</th>
            <th>Rigging</th>
            <th>Concept</th>
            <th>Shading</th>
            <th>Modeling</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reports_assets as $key => $value)
        <tr class="expandable-body">
            <td colspan="8">
                <p class="mb-0 font-weight-bold text-muted">
                    {{ $key }}
                </p>
            </td>
        </tr>
        @foreach ($value as $item)
        <tr>
            <td>{{$item->code}}</td>
            <td>
                <div class="d-flex align-items-center">
                    @if ($item->path != null)
                    <img src="{{ asset('/images/assets/'. $item->path) }}" alt="Assets File" width="80" height="50"
                        style="object-fit: cover" />
                    @else
                    <img src="{{ asset('/images/gray.png') }}" alt="Assets File" width="80" height="50" />
                    @endif
                    <p class="mb-0 ml-3">
                        {{$item->name}}
                    </p>
                </div>
            </td>
            <td>
                @if (strlen($item->description) > 50)
                {{substr($item->description, 0, 50)}}...
                @else
                {{$item->description}}
                @endif
            </td>
            <td>
                @include('includes.badge-status',[
                'name' => 'status_rigging',
                'name_user' => 'user_rigging',
                'status' => $item->status_rigging,
                'item' => $item,
                'historyDesc' => 'Update Status Rigging'
                ])

                @if ($item->user_rigging)
                <img src="{{asset('/images/avatars/'. $item->userRigging->avatar)}}" width="30" height="30" alt="avatar"
                    class="rounded-circle" data-toggle="tooltip" data-placement="top"
                    title="{{$item->userRigging->first_name}} {{$item->userRigging->last_name}}">
                @endif
            </td>
            <td>
                @include('includes.badge-status', [
                'name' => 'status_concept',
                'name_user' => 'user_concept',
                'status' => $item->status_concept,
                'item' => $item,
                'historyDesc' => 'Update Status Concept'
                ])

                @if ($item->user_concept)
                <img src="{{asset('/images/avatars/'. $item->userConcept->avatar)}}" width="30" height="30" alt="avatar"
                    class="rounded-circle" data-toggle="tooltip" data-placement="top"
                    title="{{$item->userConcept->first_name}} {{$item->userConcept->last_name}}">
                @endif
            </td>
            <td>
                @include('includes.badge-status', [
                'name' => 'status_shading',
                'name_user' => 'user_shading',
                'status' => $item->status_shading,
                'item' => $item,
                'historyDesc' => 'Update Status Shading'
                ])

                @if ($item->user_shading)
                <img src="{{asset('/images/avatars/'. $item->userShading->avatar)}}" width="30" height="30" alt="avatar"
                    class="rounded-circle" data-toggle="tooltip" data-placement="top"
                    title="{{$item->userShading->first_name}} {{$item->userShading->last_name}}">
                @endif
            </td>
            <td>
                @include('includes.badge-status', [
                'name' => 'status_modeling',
                'name_user' => 'user_modeling',
                'status' => $item->status_modeling,
                'item' => $item,
                'historyDesc' => 'Update Status Modeling'
                ])

                @if ($item->user_modeling)
                <img src="{{asset('/images/avatars/'. $item->userModeling->avatar)}}" width="30" height="30"
                    alt="avatar" class="rounded-circle" data-toggle="tooltip" data-placement="top"
                    title="{{$item->userModeling->first_name}} {{$item->userModeling->last_name}}">
                @endif
            </td>
            <td>
                <button class="btn border btn-sm rounded-pill" data-toggle="modal"
                    data-target="#modal-update-asset{{$item->id}}">
                    <i class="fa fa-edit"></i>
                </button>
                @include('pages.project.detail.assets.update')


                <form id="formDeleteAsset{{ $item->id }}" action="/project-asset/{{$item->id}}" method="POST"
                    class="d-inline">
                    @csrf
                    @method('delete')
                    <a type="button" class="btn border btn-sm rounded-pill" onclick="handleDeleteAsset({{ $item->id }})"
                        title="Hapus">
                        <i class="fa fa-trash"></i>
                    </a>
                </form>

                <script>
                    function handleDeleteAsset(id) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('formDeleteAsset' + id).submit();
                            }
                        })
                    }
                </script>
            </td>
        </tr>
        @endforeach
        @endforeach
    </tbody>
</table>