<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\Activity;
use App\Country;
use App\Product;
use App\Category;


class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::paginate(3);
        $activities = Activity::get();
        return view('sellers.index',compact('sellers','activities'));
    }

    public function showSellerProducts($id)
    {
        $products = Product::get();
        $seller = Seller::findOrFail($id);
        $categories = Category::get(); 
        return view('Products.showAll',compact('products','seller','categories'));    
    }

    public function show($id)
    {
        $seller = Seller::findOrFail($id);
        $activityId= $seller->activity_id;
        $activities = Activity::select('id','activity_name')->where('id','=',$activityId)->get();
        return view('sellers.show',compact('seller','activities'));
    }
    
    public function create()
    {
        $activities = Activity::select('id','activity_name')->get();
        $countries = Country::select('id','country_name')->get();
        return view('sellers.create',compact('activities','countries'));
    }

    public function store(Request $request)
    {
        // Validate
        $request->validate([
        'seller_name'=>'required|string|max:100',
        'store_name'=>'required|string|max:100',
        'activity_id'=>'required|numeric',
        'email'=>'required|email|max:100',
        'store_address'=>'required|string',
        'city'=>'required|string|max:100',
        'countryId'=>'required|numeric',
        'zip_code'=>'required|numeric',
        'store_contact'=>'required|numeric',
        'store_desc'=>'required|string',
        'store_policy'=>'required|string',
        'store_img'=>'required|image',
        ]);

        // Image
        $img = $request->file('store_img');
        $ext= $img->getClientOriginalExtension();
        $new_name = uniqid().".$ext";
        $img ->move(public_path('uploads/sellers'),$new_name);

        // Store in DB
        Seller::create([
        'seller_name'=>$request->seller_name,
        'store_name'=>$request->store_name,
        'activity_id'=>$request->activity_id,
        'email'=>$request->email,
        'store_address'=>$request->store_address,
        'city'=>$request->city,
        'country_id'=>$request->countryId,
        'zip_code'=>$request->zip_code,
        'store_contact'=>$request->store_contact,
        'store_desc'=>$request->store_desc,
        'store_policy'=>$request->store_policy,
        'store_img'=>$new_name,        
        ]);

        return redirect(route('show_sellers'));
    }

    public function edit($id)
    {
        $seller = Seller::findOrFail($id);
        $activities = Activity::select('id','activity_name')->get();
        $countries = Country::select('id','country_name')->get();
        return view('sellers.edit',compact('seller','countries','activities'));   
    }

    public function update(Request $request , $id)
    {
        // Validate
        $request->validate([
            'seller_name'=>'required|string|max:100',
            'store_name'=>'required|string|max:100',
            'activity_id'=>'required|numeric',
            'email'=>'required|email|max:100',
            'store_address'=>'required|string',
            'city'=>'required|string|max:100',
            'countryId'=>'required|numeric',
            'zip_code'=>'required|numeric',
            'store_contact'=>'required|numeric',
            'store_desc'=>'required|string',
            'store_policy'=>'required|string',
            'store_img'=>'nullable|image',
        ]);

        // Update in DB
        $seller = Seller::findOrFail($id);
        $new_name = $seller->store_img;
        if($request->hasFile('store_img'))
        {
            if ($new_name !== null)
            {
                unlink(public_path("uploads/sellers/$new_name"));
            }
        
        // Image
        $img = $request->file('store_img');
        $ext= $img->getClientOriginalExtension();
        $new_name = uniqid().".$ext";
        $img ->move(public_path('uploads/sellers'),$new_name);
        }
        $seller->update([
            'seller_name'=>$request->seller_name,
            'store_name'=>$request->store_name,
            'activity_id'=>$request->activity_id,
            'email'=>$request->email,
            'store_address'=>$request->store_address,
            'city'=>$request->city,
            'country_id'=>$request->countryId,
            'zip_code'=>$request->zip_code,
            'store_contact'=>$request->store_contact,
            'store_desc'=>$request->store_desc,
            'store_policy'=>$request->store_policy,
            'store_img'=>$new_name,        
        ]);

        return redirect(route('show_seller',$id));
    }

    public function delete($id)
    {

        $seller = Seller::findOrFail($id);
        $seller->delete();
        $new_name = $seller->store_img;
        unlink(public_path("uploads/sellers/$new_name"));
        return redirect(route('show_sellers'));
    }

}
