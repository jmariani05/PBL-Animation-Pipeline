<div class="d-flex mb-3">
    @include('pages.project.detail.shots.add-episode')
</div>
<table class="table table-hover">
    <tbody>
        @foreach ($reports_episodes as $episode)
        <tr data-widget="expandable-table" aria-expanded="true" class="table-primary">
            <td>
                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                {{$episode->title}}

                @include('pages.project.detail.shots.delete-episode')
                @include('pages.project.detail.shots.add-sequence')
            </td>
        </tr>
        @foreach ($episode->sequences as $sequence)
        <tr class="expandable-body">
            <td>
                <div class="p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr data-widget="expandable-table" aria-expanded="false" class="table-secondary">
                                <td>
                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                    {{$sequence->title}}

                                    @include('pages.project.detail.shots.delete-sequence')
                                    @include('pages.project.detail.shots.add-shot')
                                </td>
                            </tr>
                            <tr class="expandable-body">
                                <td>
                                    <div class="p-0">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr class="table-warning">
                                                    <th>Name</th>
                                                    <th>
                                                        <div class="row justify-content-between text-center"
                                                            style="font-size: 0.9rem">
                                                            <div class="col-md-4">Frame</div>
                                                            <div class="col-md-4">In</div>
                                                            <div class="col-md-4">Out</div>
                                                        </div>
                                                    </th>
                                                    <th>Layout</th>
                                                    <th>Animation</th>
                                                    <th>Render</th>
                                                    <th>Compositing</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sequence->shots as $item)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            @if ($item->path != null)
                                                            <img src="{{ asset('/images/shots/'. $item->path) }}"
                                                                alt="Assets File" width="80" height="50"
                                                                style="object-fit: cover" />
                                                            @else
                                                            <img src="{{ asset('/images/gray.png') }}" alt="Assets File"
                                                                width="80" height="50" />
                                                            @endif

                                                            <p class="mb-0 ml-3">
                                                                {{$item->title}}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row justify-content-between text-center">
                                                            <div class="col-md-4">{{$item->frames}}</div>
                                                            <div class="col-md-4">{{$item->in}}</div>
                                                            <div class="col-md-4">{{$item->out}}</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @include('pages.project.detail.shots.update-shot-status', [
                                                        'name' => 'status_layout',
                                                        'name_user' => 'user_layout',
                                                        'status' => $item->status_layout,
                                                        'item' => $item,
                                                        'historyDesc' => 'Update Status Layout',
                                                        ])
                                                        @if ($item->user_layout)
                                                        <img src="{{asset('/images/avatars/'. $item->userLayout->avatar)}}"
                                                            width="30" height="30" alt="avatar" class="rounded-circle"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="{{$item->userLayout->first_name}} {{$item->userLayout->last_name}}">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @include('pages.project.detail.shots.update-shot-status', [
                                                        'name' => 'status_animation',
                                                        'name_user' => 'user_animation',
                                                        'status' => $item->status_animation,
                                                        'item' => $item,
                                                        'historyDesc' => 'Update Status Animation',
                                                        ])
                                                        @if ($item->user_animation)
                                                        <img src="{{asset('/images/avatars/'. $item->userAnimation->avatar)}}"
                                                            width="30" height="30" alt="avatar" class="rounded-circle"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="{{$item->userAnimation->first_name}} {{$item->userAnimation->last_name}}">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @include('pages.project.detail.shots.update-shot-status', [
                                                        'name' => 'status_render',
                                                        'name_user' => 'user_render',
                                                        'status' => $item->status_render,
                                                        'item' => $item,
                                                        'historyDesc' => 'Update Status Render',
                                                        ])
                                                        @if ($item->user_render)
                                                        <img src="{{asset('/images/avatars/'. $item->userRender->avatar)}}"
                                                            width="30" height="30" alt="avatar" class="rounded-circle"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="{{$item->userRender->first_name}} {{$item->userRender->last_name}}">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @include('pages.project.detail.shots.update-shot-status', [
                                                        'name' => 'status_compositing',
                                                        'name_user' => 'user_compositing',
                                                        'status' => $item->status_compositing,
                                                        'item' => $item,
                                                        'historyDesc' => 'Update Status Compositing',
                                                        ])
                                                        @if ($item->user_compositing)
                                                        <img src="{{asset('/images/avatars/'. $item->userCompositing->avatar)}}"
                                                            width="30" height="30" alt="avatar" class="rounded-circle"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="{{$item->userCompositing->first_name}} {{$item->userCompositing->last_name}}">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="btn border btn-sm rounded-pill bg-white"
                                                            data-toggle="modal"
                                                            data-target="#modal-update-shot{{$item->id}}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        @include('pages.project.detail.shots.update-shot')
                                                        @include('pages.project.detail.shots.delete-shot')
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        @endforeach
        @endforeach
    </tbody>
</table>