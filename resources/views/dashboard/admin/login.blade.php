@extends('layout-auth')
@section('title', $title)
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Login To Admin</h2>
        </div>
        <form action="{{ route('admin.check') }}" method="post">
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
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                        {{-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> --}}
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
