@extends('components/layout')
@section('title')
    Create Seller
@endsection
@section('content')
@include('inc.errors')
    <h2 class="text-center text-warning my-4">Add Seller</h2>
        <div class="container my-3">
            <form action="{{ route('store_seller') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Seller Name</label>
                    <input type="text" class="form-control" name="seller_name">
                </div>
                <div class="form-group">
                    <label>Store Name</label>
                    <input type="text" class="form-control" name="store_name">
                </div>
                <div class="form-group">
                    <label>activity Name</label>
                    <select name="activity_id" class="form-control">
                        @foreach ($activities as $activity)
                            <option value={{ $activity->id }}>{{ $activity->activity_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>Store Address</label>
                    <input type="text" class="form-control" name="store_address">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city">
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <select name="countryId" class="form-control">
                        @foreach ($countries as $country)
                            <option value={{ $country->id }}>{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Zip Code</label>
                    <input type="text" class="form-control" name="zip_code">
                </div>
                <div class="form-group">
                    <label>Store Contact</label>
                    <input type="text" class="form-control" name="store_contact">
                </div>
                <div class="form-group">
                    <label>Store Description</label>
                    <textarea name="store_desc" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Store Policy</label>
                    <textarea name="store_policy" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Store Image</label>
                    <input type="file" name="store_img" class="form-control">    
                </div>
                <button type="submit" class="btn btn-warning">Add Seller</button>
            </form>
        </div>

@endsection