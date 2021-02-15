@extends('components/layout')
@section('title')
    Register
@endsection
@section('content')
    @include('inc.errors')
<h2 class="text-center text-warning my-4">Register</h2>
<div class="container">
    <form action="{{ route('auth_handleRegister') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="text" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" value="{{ old('password') }}">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Register</button>
        <a href="{{ route('auth.github.redirect') }}" class="btn btn-info">Sign Up with Github <i class="fab fa-github"></i></a>
    </form>
</div>
@endsection
