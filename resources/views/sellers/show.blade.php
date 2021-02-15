@extends('components.layout')
@section('title')
    {{ $seller->seller_name }}
@endsection
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ "../../uploads/sellers/$seller->store_img" }}" class="w-100" alt="...">
        </div>
        <div class="col-lg-6">
            <h3 class="my-3 text-info"> Seller ID {{ $seller->id }}</h3>
            <br>
            <h2 class="my-3"><span class="text-warning">Seller Name: </span> {{$seller->seller_name}}</h2>
            <h3 class="my-3"><span class="text-info">Store Name: </span>{{$seller->store_name}}</h3>
            <h3 class="my-3"><span class="text-warning">Store Address: </span>{{$seller->store_address}}</h3>
            <h3 class="my-3"><span class="text-info">Store Contact: </span>{{$seller->store_contact}}</h3>
            <h3 class="my-3"><span class="text-warning">Store Name: </span>{{$seller->store_name}}</h3>
            <h3 class="my-3"><span class="text-info">Store Description: </span>{{$seller->store_desc}}</h3>
            <h3 class="my-3"><span class="text-warning">Store POlicy: </span>{{$seller->store_policy}}</h3>
             <br><br>   
            <a href="{{ route('show_sellers') }}" class="btn btn-info">Back To Sellers </a>
            <a href="{{ route('show_seller_products', $seller->id)}}" class="btn btn-success">Show Products </a>
            
        </div>
    </div>
</div>
@endsection
