@extends('components/layout')
@section('title')
    Create Product
@endsection
@section('content')
@include('inc.errors')
    <h2 class="text-center text-warning my-4">Add Product</h2>
        <div class="container my-3">
            <form method='post' action='{{ route('upload_Files') }}' enctype='multipart/form-data' >
                {{ csrf_field() }}
                    <input type='file' name='file' >
                    <input type='submit' name='submit' value='Import'>
            </form>
        </div>
@endsection