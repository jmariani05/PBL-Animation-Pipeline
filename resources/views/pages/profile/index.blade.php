@extends('layouts.app') @section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('pages.profile.profile-card')
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                @include('includes.error-card')
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'about' ? 'active' : ''}}" href="#aboutApp"
                                    data-toggle="tab" onclick="handleTabClick('about')">
                                    About
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'edit-profile' ? 'active' : ''}}" href="#edit-profile"
                                    data-toggle="tab" onclick="handleTabClick('edit-profile')">
                                    Edit Profile
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link {{$tab == 'change-password' ? 'active' : ''}}"
                                    href="#change-password" data-toggle="tab"
                                    onclick="handleTabClick('change-password')">
                                    Change Password
                                </a>
                            </li>
                        </ul>
                    </div>
                    <script>
                        function handleTabClick(tab) {
                            window.location.href = '/profile' + '?tab=' + tab;
                        }
                    </script>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="{{$tab == 'about' ? 'active' : ''}} tab-pane" id="aboutApp">
                                @include('pages.profile.tab.about')
                            </div>
                            <div class="{{$tab == 'edit-profile' ? 'active' : ''}} tab-pane" id="edit-profile">
                                @include('pages.profile.tab.edit-profile')
                            </div>
                            <div class="{{$tab == 'change-password' ? 'active' : ''}} tab-pane" id="change-password">
                                @include('pages.profile.tab.change-password')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection