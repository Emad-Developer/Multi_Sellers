@extends('components.layout')
@section('title')
    {{ $activity->activity_name }}
    
@endsection
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ "../../uploads/activities/$activity->activity_img" }}" class="w-100" alt="...">
        </div>
        <div class="col-lg-6">
            <h3 class="my-3 text-info">Activity No. {{ $activity->id }}</h3>
            <h2 class="my-3">Activity Name: {{  $activity->activity_name}}</h2>
            {{-- @foreach ($activity->sellers as $seller)
                <h2 class="my-3">Seller Name: {{  $seller->sellerName}}</h2>    
            @endforeach --}}
            <a href="{{ route('show_activities') }}" class="btn btn-info">Back To Activities </a>
        </div>
    </div>
</div>
@endsection
