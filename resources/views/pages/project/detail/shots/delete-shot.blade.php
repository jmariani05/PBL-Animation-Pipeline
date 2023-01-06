<form id="formDeleteShot{{$item->id}}" action="/project-shot/{{$item->id}}" method="POST">
    @csrf
    @method('delete')
    <button type="button" class="btn border btn-sm rounded-pill bg-white" onclick="handleDeleteShot({{$item->id}})">
        <i class="fa fa-trash"></i>
    </button>
</form>

<script>
    function handleDeleteShot(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will delete this shot!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formDeleteShot' + id).submit();
            }
        })
    }
</script>