@extends('components/layout')
@section('title')
    Login
@endsection
@section('content')
    @include('inc.errors')
<h2 class="text-center text-warning my-4">Login</h2>
<div class="container">
    <form action="{{ route('auth_handleLogin') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="text" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" value="{{ old('password') }}">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Login</button>
        <a href="{{ route('auth.facebook.redirect') }}" class="btn btn-info">Login with Facebook <i class="fab fa-facebook"></i></a>
        <a href="{{ route('auth.github.redirect') }}" class="btn btn-warning">Login with Github <i class="fab fa-github"></i></a>
    </form>
</div>
@endsection
