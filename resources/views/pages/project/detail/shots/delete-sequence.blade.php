<form id="formDeleteSequence{{$sequence->id}}" action="/project-shot-sequence/{{$sequence->id}}" method="POST"
    class="float-right">
    @csrf
    @method('delete')
    <button type="button" class="btn btn-sm small rounded-pill bg-white"
        onclick="handleDeleteSequence({{$sequence->id}})">
        <i class="fa fa-trash"></i>
    </button>
</form>

<script>
    function handleDeleteSequence(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will delete this sequence!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formDeleteSequence' + id).submit();
            }
        })
    }
</script>