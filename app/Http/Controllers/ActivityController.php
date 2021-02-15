<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Seller;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function home()
    {
        return view('activities.home');
    }

    public function index()
    {
        $activities = Activity::paginate(3);
        $sellers = Seller::get();
        return view('activities.index',compact('activities','sellers'));
    }

    public function showSellers($id)
    {
        $activity = Activity::findOrFail($id);
        $sellers = Seller::get();
        return view('activities.showSellers',compact('activity','sellers'));
    }

    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.show',compact('activity'));
    }
    
    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        // Validate
        $request->validate([
        'activity_name'=>'required|string|max:100',
        'activity_img'=>'required|image',
        ]);

        // Image
        $img = $request->file('activity_img');
        $ext= $img->getClientOriginalExtension();
        $new_name = uniqid().".$ext";
        $img ->move(public_path('uploads/activities'),$new_name);

        // Store in DB
        Activity::create([
        'activity_name'=>$request->activity_name,
        'activity_img'=>$new_name,        
        ]);

        return redirect(route('show_activities'));
    }

    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.edit',compact('activity'));   
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'activity_name'=>'required|string|max:100',
            'activity_img'=> 'nullable|image',
        ]);
        
        // Store in DB
        $activity = Activity::findOrFail($id);
        $new_name = $activity->activity_img;
        if($request->hasFile('activity_img'))
        {
            if ($new_name !== null)
            {
                unlink(public_path("uploads/activities/$new_name"));
            }
        
        // Image
        $img = $request->file('activity_img');
        $ext= $img->getClientOriginalExtension();
        $new_name = uniqid().".$ext";
        $img ->move(public_path('uploads/activities'),$new_name);
        }
        $activity->update([
            'activity_name'=>$request->activity_name,
            'activity_img'=>$new_name,                
        ]);

        return redirect(route('show_activity',$id));
    }

    public function delete($id)
    {

        $activity = Activity::findOrFail($id);
        $activity->delete();
        $new_name = $activity->activity_img;
        unlink(public_path("uploads/activities/$new_name"));
        return redirect(route('show_activities'));
    }
    
}
