@if (request()->session()->get('user')['role'] == 'manager')
@include('pages.project.detail.team._form-addmember')
@endif
<table id="example2-2" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            @if (request()->session()->get('user')['role'] == 'manager')
            <th>Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($list_project_teams as $item)
        <tr>
            <td>{{$no}}</td>
            <td>
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        @if ($item->user->avatar)
                        <img src="{{asset('/images/avatars/'. $item->user->avatar)}}" alt="user image"
                            class="rounded-circle" width="50px" height="50px">
                        @else
                        <img src="https://ui-avatars.com/api/?name={{$item->user->first_name}}{{$item->user->last_name}}"
                            alt="user image" class="rounded-circle" width="50px" height="50px">
                        @endif
                    </div>
                    <p class="mb-0">{{$item->user->first_name}} {{$item->user->last_name}}</p>
                </div>
            </td>
            <td>{{$item->user->email}}</td>
            <td>{{$item->user->phone}}</td>
            @if (request()->session()->get('user')['role'] == 'manager')
            <td>
                <form id="formDeleteProjectTeam{{ $item->id }}" action="/project-team/{{$item->id}}" method="POST"
                    class="d-inline">
                    @csrf
                    @method('delete')
                    <a type="button" class="btn btn-sm border rounded-pill bg-white px-3"
                        onclick="handleDelete({{ $item->id }})" title="Hapus">
                        Remove
                    </a>
                </form>

                <script>
                    function handleDelete(id) {
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
                                document.getElementById('formDeleteProjectTeam' + id).submit();
                            }
                        })
                    }
                </script>
            </td>
            @endif
        </tr>
        <?php $no++; ?>
        @endforeach
    </tbody>
</table>