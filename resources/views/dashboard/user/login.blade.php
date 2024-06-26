@extends('layout-auth')
@section('title', $title)
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Login To User</h2>
        </div>
        <form action="{{ route('user.check') }}" method="post">
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
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" name="email" 
                placeholder="Enter email address" value="{{ old('email') }}">
            </div>
            @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password" 
                placeholder="Enter password">
            </div>
            @error('password')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                        {{-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> --}}
                    </div>
                </div>
                <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373" style="color: rgb(112, 115, 115);">
                    OR
                </div>
                <div class="input-group mb-0">
                    <a class="btn btn-outline-primary btn-lg btn-block" href="{{ route('user.register') }}">
                        Register To Create Account
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
