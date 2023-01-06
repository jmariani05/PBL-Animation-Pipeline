<form id="formDeleteEpisode{{$episode->id}}" action="/project-shot-episode/{{$episode->id}}" method="POST"
    class="float-right">
    @csrf
    @method('delete')
    <button type="button" class="btn btn-sm small rounded-pill bg-white"
        onclick="handleDeleteEpisode({{$episode->id}})">
        <i class="fa fa-trash"></i>
    </button>
</form>

<script>
    function handleDeleteEpisode(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will delete this episode!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formDeleteEpisode' + id).submit();
            }
        })
    }
</script>