@extends('components/layout')
@section('title')
    Create Activity
@endsection
@section('content')
@include('inc.errors')

    <h2 class="text-center text-warning my-4">Add Activity</h2>
        <div class="container my-3">
            <form action="{{ route('store_activity') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Activity</label>
                    <input type="text" class="form-control" name="activity_name" value="{{ old('activity_name') }}"/>
                </div>
                <div class="form-group">
                    <label>Activity Image</label>
                    <input type="file" class="form-control" name="activity_img" />
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Add Activity</button>
            </form>
        </div>

@endsection