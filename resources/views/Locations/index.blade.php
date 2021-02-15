@extends('components.layout')
@section('title')
    All Locations
@endsection
@section('content')
<h1 class="text-center text-warning mt-3">All Locations</h1>          
    <div class="container">
        <div class="row">
            @foreach ($locations as $location)
                @foreach ($sellers as $seller)
                    @if($location->seller_id == $seller->id)
                <div class="col-lg-4 col-md-6 mt-3">
                    <div class="card">
                        <img src="{{ "uploads/sellers/$seller->store_img" }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-danger">{{$seller->store_name}}</h5>    
                            <h5 class="card-title">{{ $location->address }}</h5>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            @endforeach
        </div>
    </div>
@endsection