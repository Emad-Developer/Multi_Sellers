<?php

namespace App\Http\Controllers;

use App\Location;
use App\Seller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $sellers = Seller::get();
        $locations = Location::get();
        return view('Locations.index',compact('sellers','locations'));
    }

    public function create()
    {
        $sellers = Seller::get();
        return view('Locations.create',compact('sellers'));
    }

    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'seller_id'=>'required|numeric',
            'location_name'=>'required|string|max:100',
            'address'=>'required|string|max:100',
            'latitude'=>'required|numeric',
            'longitude'=>'required|numeric',
            'distance'=>'required|numeric',
        ]);

        // Store in DB
        Location::create([
        'seller_id'=>$request->seller_id,
        'location_name'=>$request->location_name,
        'address'=>$request->address,
        'latitude'=>$request->latitude,
        'longitude'=>$request->longitude,
        'distance'=>$request->distance,
        ]);
        return redirect(route('show_locations'));
    }

}
