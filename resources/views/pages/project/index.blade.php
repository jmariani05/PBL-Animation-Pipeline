@extends('layouts.app') @section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Projects</h1>
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
                        @if (request()->session()->get('user')['role'] == 'manager')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#modal-create">
                            <i class="fa fa-plus"></i>
                            Create a new production
                        </button>
                        @include('pages.project.create')
                        @endif
                        <table id="example2" class="table table-bordered table-hover text-center">
                            <thead class="text-center">
                                <tr class="table-info">
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Project Name</th>
                                    <th colspan="4" class="border-bottom-0">Detail Project</th>
                                    <th rowspan="2">Aksi</th>
                                </tr>
                                <tr class="table-info">
                                    <th>FPS</th>
                                    <th>Ratio</th>
                                    <th>Resolution</th>
                                    <th>Project Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($items as $item)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->fps}}</td>
                                    <td>{{$item->ratio}}</td>
                                    <td>{{$item->resolution}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>
                                        <a href="/project/{{$item->id}}"
                                            class="btn btn-primary btn-sm rounded-pill px-3">
                                            detail
                                        </a>
                                        @if (request()->session()->get('user')['role'] == 'manager')
                                        <button class="btn btn-warning btn-sm rounded-pill" data-toggle="modal"
                                            data-target="#modal-update{{$item->id}}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        @include('pages.project.update')

                                        <form id="formDelete{{ $item->id }}"
                                            action="{{ route('project.destroy', $item->id) }}" method="POST"
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
                                        @endif
                                    </td>
                                </tr>
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