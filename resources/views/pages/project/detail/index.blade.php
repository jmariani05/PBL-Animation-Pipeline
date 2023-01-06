@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 justify-content-between">
            <div class="col-sm-6">
                <h3>{{$project->name}}</h3>
                <p>
                    Total Assets : <b>{{$total_assets}}</b> ,
                    Episodes : <b>{{$total_episodes}}</b> ,
                    Team : <b>{{$total_team}}</b>
                </p>
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
                    <div class="card-header p-2 border-0">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'assets' ? 'active' : ''}}" href="#assets"
                                    data-toggle="tab" onclick="handleTabClick('assets')">Assets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'shots' ? 'active' : ''}}" href="#shots" data-toggle="tab"
                                    onclick="handleTabClick('shots')">Shots</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'team' ? 'active' : ''}}" href="#team" data-toggle="tab"
                                    onclick="handleTabClick('team')">Team</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <script>
                        function handleTabClick(tab) {
                            window.location.href = '/project/' + {{$id}} + '?tab=' + tab;
                        }
                    </script>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="{{$tab == 'assets' ? 'active' : ''}} tab-pane" id="assets">
                                @include('pages.project.detail.assets.index')
                            </div>
                            <div class="{{$tab == 'shots' ? 'active' : ''}} tab-pane" id="shots">
                                @include('pages.project.detail.shots.index')
                            </div>
                            <div class="{{$tab == 'team' ? 'active' : ''}} tab-pane" id="team">
                                @include('pages.project.detail.team.index')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection