<form id="formAddEpisodes" action="/project-shot-episode" method="POST">
    @csrf
    <input type="hidden" name="id_project" value="{{$id}}">
    <button type="button" onclick="handleAddEpisodes()" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
        <i class="fa fa-plus"></i>
        Add Episode
    </button>
</form>

<script>
    function handleAddEpisodes() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will add a new episode to this project!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formAddEpisodes').submit();
            }
        })
    }
</script>