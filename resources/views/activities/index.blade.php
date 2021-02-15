@extends('components.layout')
@section('title')
    All Activities
@endsection
@section('content')

    <h1 class="text-center text-warning mt-3">All Activities</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mt-3">
                <div class="card">
                    <img src="{{ "uploads/activities/stores.jpg" }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">All Stores</h5>
                        <a href="http://localhost/multi_sellers/public/sellers" class="btn btn-success">Show</a>
                    </div>
                </div>
            </div>
            @foreach ($activities as $activity)
            <div class="col-lg-4 col-md-6 mt-3">
                <div class="card">
                    <img src="{{ "uploads/activities/$activity->activity_img" }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{  $activity->activity_name}}</h5>
                        <a href="{{ route('showSellers',$activity->id) }}" class="btn btn-success">Sellers</a>
                        @auth
                        <a href="{{ route('edit_activity', $activity->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('delete_activity', $activity->id) }}" class="btn btn-danger">Delete</a>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row mt-5">
        <h6 class="m-auto">
        {{ $activities->render() }}
        </h6>
    </div>

@endsection