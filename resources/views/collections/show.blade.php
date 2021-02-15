@extends('components.layout')
@section('title')
    {{ $category->category_name }}
@endsection
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ "../../uploads/categories/$category->category_img" }}" class="w-100" alt="...">
        </div>
        <div class="col-lg-6">
            <h3 class="my-3 text-info"> Category ID {{ $category->id }}</h3>
            <br>
            <h2 class="my-3"><span class="text-warning">Category Name: </span> {{$category->category_name}}</h2>
            <br><br>   
            <a href="{{ route('show_categories') }}" class="btn btn-info">Back To Categories </a>
            <a href="{{ route('show_category_products',$category->id) }}" class="btn btn-success">Show Products </a>
            
        </div>
    </div>
</div>
@endsection
