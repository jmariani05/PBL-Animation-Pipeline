@extends('layouts.app') @section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>People</h1>
                <p class="text-muted">People in this app</p>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            @include('includes.error-card')
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#modal-create">
                            <i class="fa fa-plus"></i>
                            Add a new user
                        </button>
                        @include('pages.user.create')
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3">
                                                @if ($item->avatar)
                                                <img src="{{asset('/images/avatars/'. $item->avatar)}}" alt="user image"
                                                    class="rounded-circle" width="50px" height="50px">
                                                @else
                                                <img src="https://ui-avatars.com/api/?name={{$item->first_name}}{{$item->last_name}}"
                                                    alt="user image" class="rounded-circle" width="50px" height="50px">
                                                @endif
                                            </div>
                                            <p class="mb-0">{{$item->first_name}} {{$item->last_name}}</p>
                                        </div>
                                    </td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm rounded-pill" data-toggle="modal"
                                            data-target="#modal-update{{$item->id}}">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <form id="formDelete{{ $item->id }}"
                                            action="{{ route('user.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <a type="button" class="btn btn-danger btn-sm rounded-pill"
                                                onclick="handleDelete({{ $item->id }})" title="Hapus">
                                                <i class="fa fa-trash"></i>
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
                                                        document.getElementById('formDelete' + id).submit();
                                                    }
                                                })
                                            }
                                        </script>
                                    </td>
                                </tr>
                                @include('pages.user.update')
                                <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection