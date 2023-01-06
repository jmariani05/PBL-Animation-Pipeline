<form id="formAddShots{{$sequence->id}}" action="/project-shot" method="POST" class="float-right">
    @csrf
    <input type="hidden" name="id_sequence" value="{{$sequence->id}}">
    <button type="button" onclick="handleAddShot({{$sequence->id}})"
        class="btn btn-sm small rounded-pill bg-white px-3 mr-1">
        Add Shots
    </button>
</form>

<script>
    function handleAddShot(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will add a new shot to this sequence!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formAddShots' + id).submit();
            }
        })
    }
</script>