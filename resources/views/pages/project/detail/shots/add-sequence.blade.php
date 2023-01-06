<form id="formAddSequences{{$episode->id}}" action="/project-shot-sequence" method="POST" class="float-right">
    @csrf
    <input type="hidden" name="id_episode" value="{{$episode->id}}">
    <button type="button" onclick="handleAddSequences({{$episode->id}})"
        class="btn btn-sm small rounded-pill bg-white px-3 mr-1">
        Add Sequence
    </button>
</form>

<script>
    function handleAddSequences(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will add a new sequence to this episode!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formAddSequences' + id).submit();
            }
        })
    }
</script>