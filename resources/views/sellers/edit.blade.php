@extends('components.layout')
@section('title')
    Edit Seller {{ $seller->sellerName }} 
@endsection
@section('content')
@include('inc.errors')
<h2 class="text-center text-warning my-4">Edit Seller</h2>
        <div class="container my-3">
            <form action="{{ route('update_seller' , $seller->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Seller Name</label>
                    <input type="text" class="form-control" name="seller_name" value="{{ old('seller_name') ?? $seller->seller_name }}"/>
                </div>
                <div class="form-group">
                    <label>Store Name</label>
                    <input type="text" class="form-control" name="store_name" value="{{ old('store_name') ?? $seller->store_name }}"/>
                </div>
                <div class="form-group">
                    <label>Activity</label>
                    <select class="form-control" name="activity_id" value="{{ old('activity_id') }}">
                        @foreach ($activities as $activity)
                            <option value={{ $activity->id }}>{{ $activity->activity_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Seller Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') ?? $seller->email}}"/>
                </div>
                <div class="form-group">
                    <label>Store Address</label>
                    <input type="text" class="form-control" name="store_address" value="{{ old('store_address') ?? $seller->store_address}}"/>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city') ?? $seller->city }}"/>
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
                    <input type="text" class="form-control" name="zip_code" value="{{ old('zip_cide') ?? $seller->zip_cide}}">
                </div>
                <div class="form-group">
                    <label>Store Phone</label>
                    <input type="text" class="form-control" name="store_contact" value="{{ old('store_contact') ?? $seller->store_contact}}"/>
                </div>
                <div class="form-group">
                    <label>Store Description</label>
                    <textarea name="store_desc" cols="30" rows="10" class="form-control">{{ old('store_desc') ?? $seller->store_desc}}</textarea>
                </div>
                <div class="form-group">
                    <label>Store Policy</label>
                    <textarea name="store_policy" cols="30" rows="10" class="form-control">{{ old('store_policy') ?? $seller->store_policy}}</textarea>
                </div>
                <img src="{{ "../../uploads/sellers/$seller->store_img" }}" class="w-25" alt="...">
                <div class="form-group">
                    <label>Store Image</label>
                    <input type="file" class="form-control" name="store_img" />
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update Seller</button>
                <a href="{{ route('show_sellers') }}" class="btn btn-warning">Cancel</a>
            </form>
        </div>

                
@endsection