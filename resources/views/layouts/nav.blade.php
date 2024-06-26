@extends('layout-auth')
@section('title', $title)
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Login To App</h2>
        </div>
        <div class="select-role">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <a class="btn" role="button" href="{{ route('admin.login') }}">
                    <div class="icon fs-4">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <span>I'm</span>
                    Admin
                </a>
                <a class="btn" role="button" href="{{ route('user.login') }}">
                    <div class="icon fs-4">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <span>I'm</span>
                    User    
                </a>
            </div>
        </div>
        <div class="row">
            <div class="input-group m-2">
                <a class="btn btn-outline-primary btn-lg btn-block" href="{{ route('user.register') }}">
                    Register To Create Account
                </a>
            </div>
        </div>
    </div>
@endsection
