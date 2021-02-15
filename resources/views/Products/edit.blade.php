@extends('components.layout')
@section('title')
    Edit Product {{ $product->product_name }} 
@endsection
@section('content')
@include('inc.errors')
<h2 class="text-center text-warning my-4">Edit Product</h2>
        <div class="container my-3">
            <form action="{{ route('update_product' , $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="product_name" value="{{ old('product_name') ?? $product->product_name }}">
                </div>
                <div class="form-group">
                    <label>Seller Name</label>
                    <select name="seller_id" class="form-control">
                        @foreach ($sellers as $seller)
                            <option value="{{ $seller->id }}" > {{ $seller->seller_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Category Name</label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value = "{{ $category->id }}" > {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tag Name</label>
                    <select name="tag_id" class="form-control">
                        @foreach ($tags as $tag)
                            <option value={{ $tag->id }}>{{ $tag->tag_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" cols="3"> {{ old('description') ?? $product->description }} </textarea>
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" class="form-control" name="qnt" value="{{ old ('qnt') ?? $product->qnt }}">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price') ?? $product->price }}">
                </div>
                <div class="form-group">
                    <label>Compare Price</label>
                    <input type="text" class="form-control" name="compare_price" value=" {{ old('compare_price') ?? $product->compare_price }} ">
                </div>
                <img src="{{ "../../uploads/products/$product->product_img" }}" class="w-25" alt="...">
                <div class="form-group">
                    <label>Store Image</label>
                    <input type="file" name="product_img" class="form-control">    
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update Product</button>
                <a href="{{ route('show_products') }}" class="btn btn-warning">Cancel</a>
            </form>
        </div>

                
@endsection