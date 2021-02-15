@extends('components/layout')
@section('title')
    Create Location
@endsection
@section('content')
@include('inc.errors')
    <h2 class="text-center text-warning my-4">Add Seller Location</h2>
        <div class="container my-3">
            <form action="{{ route('store_location') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Store Name</label>
                    <select name="seller_id" class="form-control">
                        @foreach ($sellers as $seller)
                            <option value={{ $seller->id }}>{{ $seller->store_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Store Location</label>
                    <input type="text" class="form-control" name="location_name">
                </div>
                <div class="form-group">
                    <label>Store Address</label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Latitude</label>
                        <input type="text" class="form-control" id="lat" name="latitude">
                    </div>
                    <div class="col">
                        <label>Longitude</label>
                        <input type="text" class="form-control" id="long" name="longitude">
                    </div>
                </div>
                <div id="map"></div>
                <div class="form-group">
                    <label>Distance</label>
                    <input type="text" class="form-control" name="distance">
                </div>
                <button type="submit" class="btn btn-warning">Add Location</button>
            </form>
        </div>
@endsection

@section('scripts')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>
        function initMap() {
          const myLatlng = { lat: 29.9859349, lng: 31.1621756 };
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: myLatlng,
          });
          // Create the initial InfoWindow.
          let infoWindow = new google.maps.InfoWindow({
            content: "Click the map to get Lat/Lng!",
            position: myLatlng,
          });
          infoWindow.open(map);
          // Configure the click listener.
          map.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            infoWindow.close();
            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({
              position: mapsMouseEvent.latLng,
            });
            infoWindow.setContent(
              JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
            );
            infoWindow.open(map);
              var langlatude = infoWindow.content;
              var latlangtude = JSON.parse(langlatude);
              console.log(latlangtude.lat);
                var latitude = document.getElementById('lat').value = latlangtude.lat;
                var laogitude = document.getElementById('long').value = latlangtude.lng;
          });
        }
          
      </script>
  
@endsection
