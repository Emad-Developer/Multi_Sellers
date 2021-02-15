@extends('components/layout')
@section('title')
    Create Tag
@endsection
@section('content')
@include('inc.errors')
    <h2 class="text-center text-warning my-4">Add Tag</h2>
        <div class="container my-3">
            <form action="{{ route('store_tag') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tag Name</label>
                    <input type="text" class="form-control" name="tag_name">
                </div>
                <button type="submit" class="btn btn-warning">Add Tag</button>
            </form>
        </div>

@endsection