@extends('components/layout')
@section('title')
    Edit {{ $activity->activity_name }}
@endsection
@section('content')
@include('inc.errors')

    <h2 class="text-center text-warning my-4">Edit {{ $activity->activity_name }}</h2>
        <div class="container my-3">
            <form action="{{ route('update_activity', $activity->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Activity</label>
                    <input type="text" class="form-control" name="activity_name" value= {{ old ('activity_name') ?? $activity->activity_name }}/>
                </div>
                <img src="{{ "../../uploads/activities/$activity->activity_img" }}" class="w-25 my-3">
                <div class="form-group">
                    <label>Activity Image</label>
                    <input type="file" class="form-control" name="activity_img"/>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update Activity</button>
            </form>
        </div>

@endsection