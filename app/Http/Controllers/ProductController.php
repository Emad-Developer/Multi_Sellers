<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Seller;
use App\Tag;
use Illuminate\Http\Request;
use App\User;

class ProductController extends Controller
{
    public function index()
    {
        $users = User::get();
        $products = Product::get();
        $sellers = Seller::get();
        $categories = Category::get(); 
        return view('Products.index',compact('products','sellers','categories','users'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $products = Product::where('product_name','like',"%$keyword%")->get();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $sellers = Seller::get();
        $categories = Category::get(); 
        return view('Products.show',compact('product','sellers','categories'));
    }

    public function create()
    {
        $sellers = Seller::get();
        $categories = Category::get();
        $tags = Tag::get();
        return view('Products.create',compact('categories','sellers','tags'));
    }

    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'product_name'=>'required|string|max:100',
            'seller_id'=>'required|numeric',
            'category_id'=>'required|numeric',
            'tag_id'=>'required|numeric',
            'description'=>'required|string|',
            'qnt'=>'required|numeric',
            'price'=>'required|numeric',
            'compare_price'=>'required|numeric',
            'product_img'=>'required|image',
        ]);

        // Image
        $img = $request->file('product_img');
        $ext= $img->getClientOriginalExtension();
        $new_name = uniqid().".$ext";
        $img ->move(public_path('uploads/products'),$new_name);

        // Store in DB
        Product::create([
        'product_name'=>$request->product_name,
        'seller_id'=>$request->seller_id,
        'category_id'=>$request->category_id,
        'tag_id'=>$request->tag_id,
        'description'=>$request->description,
        'qnt'=>$request->qnt,
        'price'=>$request->price,
        'compare_price'=>$request->compare_price,
        'product_img'=>$new_name,
        ]);
        
        return redirect(route('show_products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $sellers = Seller::get();
        $categories = Category::get();
        $tags = Tag::get(); 
        return view('Products.edit',compact('product','sellers','categories','tags'));
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'product_name'=>'required|string|max:100',
            'seller_id'=>'required|numeric',
            'category_id'=>'required|numeric',
            'tag_id'=>'required|numeric',
            'description'=>'required|string|',
            'qnt'=>'required|numeric',
            'price'=>'required|numeric',
            'compare_price'=>'required|numeric',
            'product_img'=>'nullable|image',
        ]);
        
        $product = Product::findOrFail($id);
        $new_name = $product->product_img;
        if($request->hasFile('product_img'))
        {
            if ($new_name !== null)
            {
                unlink(public_path("uploads/products/$new_name"));
            }

        // Image
        $img = $request->file('product_img');
        $ext= $img->getClientOriginalExtension();
        $new_name = uniqid().".$ext";
        $img ->move(public_path('uploads/products'),$new_name);
        }
        
        // Store in DB
        $product->update([
            'product_name'=>$request->product_name,
            'seller_id'=>$request->seller_id,
            'category_id'=>$request->category_id,
            'tag_id'=>$request->tag_id,
            'description'=>$request->description,
            'qnt'=>$request->qnt,
            'price'=>$request->price,
            'compare_price'=>$request->compare_price,
            'product_img'=>$new_name,
            ]);
            
        return redirect(route('show_product',$id));
    }
    
    public function delete($id)
    {

        $product = Product::findOrFail($id);
        $product->delete();
        return redirect(route('show_products'));
    }
    
}
