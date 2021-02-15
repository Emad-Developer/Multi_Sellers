@extends('components.layout')
@section('title')
    Edit Category {{ $category->category_name }} 
@endsection
@section('content')
@include('inc.errors')
<h2 class="text-center text-warning my-4">Edit Category</h2>
        <div class="container my-3">
            <form action="{{ route('update_category' , $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" name="category_name" value="{{ old('category_name') ?? $category->category_name }}"/>
                </div>
                <img src="{{ "../../uploads/categories/$category->category_img" }}" class="w-25" alt="...">
                <div class="form-group">
                    <label>Category Image</label>
                    <input type="file" class="form-control" name="category_img" />
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update Category</button>
                <a href="{{ route('show_categories') }}" class="btn btn-warning">Cancel</a>
            </form>
        </div>

                
@endsection