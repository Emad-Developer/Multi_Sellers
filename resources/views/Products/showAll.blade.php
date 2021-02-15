@extends('components.layout')
@section('title')
    {{ $seller->store_name }}        
@endsection
@section('content')


<h1 class="text-center text-warning my-5"> {{ $seller->store_name }} </h1>
    <div class="container">
        <div class="row" id="products">
                @foreach ($products as $product)
                        @foreach ($categories as $category)
                                @if($product->seller_id == $seller->id)
                                    @if($product->category_id == $category->id)
                                        <div class="col-lg-4 col-md-6 mt-3">
                                            <div class="card">
                                                <img src="{{ "$product->product_img" }}" class="card-img-top m-auto w-50" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$product->product_name}}</h5>
                                                    <p class="float-right text-danger"><strong>{{$category->category_name}}</strong></p>
                                                    <h5 class="card-title text-info">{{$seller->store_name}} </h5>
                                                    <p><del class="text-danger">{{ $product->compare_price }} L.E </del>&nbsp &nbsp <span class="text-success">{{$product->price}} L.E</span></p>    
                                                        <a href="{{ route('show_product',$product->id) }}" class="btn btn-info">Show</a>
                                                    @auth
                                                        <a href="{{ route('edit_product', $product->id) }}" class="btn btn-warning">Edit</a>
                                                        <a href="{{ route('delete_product', $product->id) }}" class="btn btn-danger">Delete</a>
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>       
                                    @endif
                                @endif   
                    @endforeach
                @endforeach    
        </div>
    </div>
@endsection
