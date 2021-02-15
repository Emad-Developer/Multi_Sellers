@extends('components/layout')
@section('title')
    Create Categories
@endsection
@section('content')
@include('inc.errors')
    <h2 class="text-center text-warning my-4">Add Category</h2>
        <div class="container my-3">
            <form action="{{ route('store_category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" name="category_name">
                </div>
                <div class="form-group">
                    <label>Category Image</label>
                    <input type="file" name="category_img" class="form-control">    
                </div>
                <button type="submit" class="btn btn-warning">Add Category</button>
            </form>
        </div>

@endsection