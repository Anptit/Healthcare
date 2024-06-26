@extends('layout-auth')
@section('title', $title)
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Register</h2>
        </div>
        <form action="{{ route('user.create') }}" method="post">
            @csrf
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if (session()->has('fail'))
                <div class="alert alert-danger">
                    {{ session()->get('fail') }}
                </div>
            @endif

            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Enter email address">
            </div>
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" name="email" placeholder="Enter email address">
            </div>
            @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Enter password">
            </div>
            @error('password')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" class="form-control" name="confirm_password"
                    placeholder="Confirm password">
            </div>
            @error('confirm_password')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <div class="container">
                    <span class="ml-n2">Gender</span>
                    <div class="d-flex justify-content-around mt-1">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                            <label class="form-check-label" for="gender">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender2" value="female">
                            <label class="form-check-label" for="gender2">
                                Female
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender3" value="other">
                            <label class="form-check-label" for="gender3">
                                Other
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Register">
                        {{-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> --}}
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
