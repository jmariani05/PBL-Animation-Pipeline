<form action="/history" method="GET" class="mb-4">
    @csrf
    <div class="row align-items-end">
        <div class="col-md-4 col-lg-3 col-xl-2 mb-3 mb-md-0">
            <div class="form-group mb-0">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $start_date }}"
                    required>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-2 mb-3 mb-md-0">
            <div class="form-group mb-0">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $end_date }}" required>
            </div>
        </div>
        <div class="col">
            <div class="d-flex">
                <button type="submit" class="btn btn-primary px-3 mr-3">Filter</button>
                <a href="/history" class="btn btn-danger px-3">Reset</a>
            </div>
        </div>
    </div>
</form>