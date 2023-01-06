<form action="/project-team" method="POST" class="d-flex mb-5 align-items-center">
    @csrf
    <input type="hidden" name="id_project" value="{{$id}}">
    <span class="mr-3">Add a member to the team: </span>
    <select class="form-control form-control-sm mr-3" required style="max-width: 300px;" name="id_user">
        <option value="" selected>Select a user...</option>
        @foreach ($list_users as $user)
        <option value="{{$user->id}}">
            {{$user->first_name}}
            {{$user->last_name}}
        </option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
        add
    </button>
</form>