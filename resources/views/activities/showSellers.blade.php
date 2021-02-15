@extends('components.layout')
@section('title')
{{ $activity->activity_name }}
@endsection
{{-- {{ dd($activity->id) }} --}}

@section('content')

    <h1 class="text-center text-warning mt-3"> Sellers of <span class="text-info"> {{ $activity->activity_name }} </span></h1>
    <div class="container">
        <div class="row">
            @foreach ($sellers as $seller)
            @if ($activity->id == $seller->activity_id)
                <div class="col-lg-4 col-md-6 mt-3">
                    <div class="card">
                        <img src="{{ "../../uploads/sellers/$seller->store_img" }}" class="w-100" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">{{$seller->store_name}}</h5>
                            <a href="{{ route('show_seller_products', $seller->id) }}" class="btn btn-success">Products</a>
                            <a href="{{ route('show_seller',$seller->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('edit_seller', $seller->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('delete_seller', $seller->id) }}" class="btn btn-danger">Delete</a>
                        </div>
                    
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    
@endsection