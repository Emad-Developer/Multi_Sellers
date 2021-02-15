@extends('components.layout')
@section('title')
    All Sellers
@endsection
@section('content')
<h1 class="text-center text-warning mt-3">All Sellers</h1>
                        
    <div class="container">
        <div class="row">
            @foreach ($sellers as $seller)
            <div class="col-lg-4 col-md-6 mt-3">
                <div class="card">
                    <img src="{{ "uploads/sellers/$seller->store_img" }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$seller->store_name}}</h5>    
                            <a href="{{ route('show_seller',$seller->id) }}" class="btn btn-info">Show</a>
                            @auth
                            <a href="{{ route('edit_seller', $seller->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('delete_seller', $seller->id) }}" class="btn btn-danger">Delete</a>
                            @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row mt-5">
        <h6 class="m-auto">
        {{ $sellers->render() }}
        </h6>
    </div>
@endsection