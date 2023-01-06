@extends('layouts.auth') @section('content')

<div class="login-box">

    <!-- /.login-logo -->
    @include('includes.error-card')
    <div class="card">
        <div class="card-body login-card-body">
            <div class="login-logo">
                <a href="/">
                    <span class="brand-text font-weight-bold">Pipeline Animation</span>
                </a>
            </div>
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="/login" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Email / Username" name="uid">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3" id="show_hide_password">
                    <input class="form-control" type="password" required name="password" placeholder="Password">
                    <div class="input-group-append">
                        <a class="input-group-text" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

@endsection