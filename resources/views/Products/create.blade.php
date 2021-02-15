@extends('components/layout')
@section('title')
    Create Product
@endsection
@section('content')
@include('inc.errors')
    <h2 class="text-center text-warning my-4">Add Product</h2>
        <div class="float-right px-2 mb-3">
            <form method='post' action='{{ route('upload_Files') }}' enctype='multipart/form-data' >
                {{ csrf_field() }}
                <input type='file' name='file' >
                <input type='submit' name='submit' value='Import'>
            </form>        
        </div> 
        <div class="container my-3">
                <form action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="product_name">
                        </div>
                        <div class="form-group">
                            <label>Seller Name</label>
                            <select name="seller_id" class="form-control">
                                @foreach ($sellers as $seller)
                                    <option value={{ $seller->id }}>{{ $seller->seller_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category Name</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value={{ $category->id }}>{{ $category->category_name }}</option>
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
                            <textarea class="form-control" name="description" cols="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" class="form-control" name="qnt">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price">
                        </div>
                        <div class="form-group">
                            <label>Compare Price</label>
                            <input type="text" class="form-control" name="compare_price">
                        </div>
                        <div class="form-group">
                            <label>Store Image</label>
                            <input type="file" name="product_img" class="form-control">    
                        </div>
                        <button type="submit" class="btn btn-warning">Add product</button>
                    </form>
                </div>
            </div>
        </div>

@endsection