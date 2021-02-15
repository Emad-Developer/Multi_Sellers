<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Category;
use App\Product;
use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(12);
        return view('collections.index',compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('collections.show',compact('category'));
    }

    public function showActivityProducts($id)
    {
        $products = Product::get();
        $sellers = Seller::get();
        $category = Category::findOrFail($id); 
        $activities = Activity::get();
        return view('collections.showProducts',compact('activities','sellers','products','category'));
    }

    public function create()
    {
        return view('collections.createCategories');
    }

    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'category_name'=>'required|string|max:100',
            'category_img'=>'required|image',
        ]);

        // Image 
        $img = $request->file('category_img');
        $ext = $img->getClientOriginalExtension();
        $new_name = uniqid().".$ext";
        $img->move(public_path('uploads/categories'),$new_name);
        // Store in DB
        Category::create([
            'category_name'=>$request->category_name,
            'category_img'=>$new_name,
        ]);
        return redirect(route('show_categories'));
    }
    
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('collections.editCategories',compact('category'));
    }
    
    public function update(Request $request,$id)
    {
        // Validate
        $request->validate([
            'category_name'=>'required|string|max:100',
            'category_img'=>'nullable|image',
        ]);

        // Store in DB
        $category = Category::findOrFail($id);
        $new_name = $category->category_img;
        if($request->hasFile('category_img'))
        {
            if ($new_name !== null)
            {
                unlink(public_path("uploads/categories/$new_name"));
            }
        
        // Image
        $img = $request->file('category_img');
        $ext= $img->getClientOriginalExtension();
        $new_name = uniqid().".$ext";
        $img ->move(public_path('uploads/categories'),$new_name);
        }

        $category->update([
            'category_name'=>$request->category_name,
            'category_img'=>$new_name,                
        ]);
        
        return redirect(route('show_categories'));

    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $new_name = $category->category_img;
        unlink(public_path("uploads/categories/$new_name"));
        return redirect(route('show_categories'));
    }

}
