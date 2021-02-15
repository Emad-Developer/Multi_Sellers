<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
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
        
        $success = 'Product Created Successfully';
        return response()->json($success);
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
        $success = 'Product Updated Successfully';    
        return response()->json($success);
    }
    
    public function delete($id)
    {

        $product = Product::findOrFail($id);
        $product->delete();
        $new_name = $product->product_img;
        unlink(public_path("uploads/products/$new_name"));
        $success = "Product Deleted Successfully";
        return response()->json($success);
    }

}
