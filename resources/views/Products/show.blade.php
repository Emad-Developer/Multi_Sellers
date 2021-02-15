@extends('components.layout')
@section('title')
    {{ $product->product_name }}
@endsection
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ "$product->product_img" }}" class="w-100" alt="...">
        </div>
        <div class="col-lg-6">
            <h3 class="my-3 text-info"> Seller ID {{ $product->id }}</h3>
            <br>
            <h3 class="my-3"><span class="text-warning">Product Name: </span> {{$product->product_name}}</h3>
            <h3 class="my-3"><span class="text-info">Category Name: </span>
                @foreach ($categories as $category) @if($category->id == $product->category_id){{$category->category_name}}@endif @endforeach</h3>
            <h3 class="my-3"><span class="text-warning">Store Name: </span>
                @foreach ($sellers as $seller) @if($seller->id == $product->seller_id){{$seller->store_name}}@endif @endforeach</h3>
            <h3 class="my-3"><span class="text-info">Product Price: </span>{{$product->price}} L.E</h3>
             <br><br>   
            <a href="{{ route('show_products') }}" class="btn btn-info">Back To Products </a>
            
        </div>
    </div>
</div>
@endsection

https://cdn.shopify.com/s/files/1/0261/8815/2907/files/Installment_MAG.pdf?v=1612865007
