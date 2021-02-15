@extends('components.layout')
@section('title')
    All Categories
@endsection
@section('content')
<h1 class="text-center text-warning mt-3">All Categories</h1>
                        
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-lg-4 col-md-6 mt-3">
                <div class="card">
                    <img src="{{ "uploads/categories/$category->category_img" }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$category->category_name}} <span class="float-right"></h5>    
                            <a href="{{ route('show_category',$category->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('show_category_products',$category->id) }}" class="btn btn-success">Products</a>
                            @auth
                            <a href="{{ route('edit_category', $category->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('delete_category', $category->id) }}" class="btn btn-danger">Delete</a>                        
                            @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row mt-5">
        <h6 class="m-auto">
        {{ $categories->render() }}
        </h6>
    </div>
@endsection