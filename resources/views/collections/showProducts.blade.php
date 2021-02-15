@extends('components.layout')
@section('title')
 {{ $category->category_name }}
@endsection
@section('content')

<div class="container mt-5">
    <div class="form-group">
        <input class="form-control" type="text" id="keyWord" placeholder="Search about Product">
    </div>
</div>

<h1 class="text-center text-warning my-5"> {{ $category->category_name }} Products</h1>
    <div class="container">
        <div class="row" id="products">
                @foreach ($products as $product)
                    @foreach ($sellers as $seller)
                        @if($product->category_id == $category->id)
                            @if(Auth::guest())
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="card">
                                        <img src="{{ "$product->product_img" }}" class="card-img-top m-auto w-50" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$product->product_name}}</h5>
                                                <p class="float-right text-danger"><strong>{{$category->category_name}}</strong></p>
                                                <h5 class="card-title text-info">{{$seller->store_name}} </h5>
                                                <p><del class="text-danger">{{ $product->compare_price }} L.E </del>&nbsp &nbsp &nbsp<span class="text-success">{{$product->price}} L.E</span> &nbsp &nbsp &nbsp &nbsp &nbsp <span class="text-info"> {{ $product->description }}</p>    
                                                <a href="{{ route('show_product',$product->id) }}" class="btn btn-info">Show</a>
                                                @auth
                                                <a href="{{ route('edit_product', $product->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete_product', $product->id) }}" class="btn btn-danger">Delete</a>
                                                @endauth
                                            </div>
                                    </div>
                                </div>    
                            @elseif(Auth::user()->is_admin == 1)
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="card">
                                        <img src="{{ "$product->product_img" }}" class="card-img-top m-auto w-50" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$product->product_name}}</h5>
                                                <p class="float-right text-danger"><strong>{{$category->category_name}}</strong></p>
                                                <h5 class="card-title text-info">{{$seller->store_name}} </h5>
                                                <p><del class="text-danger">{{ $product->compare_price }} L.E </del>&nbsp &nbsp &nbsp<span class="text-success">{{$product->price}} L.E</span> &nbsp &nbsp &nbsp &nbsp &nbsp <span class="text-info"> {{ $product->description }}</p>    
                                                <a href="{{ route('show_product',$product->id) }}" class="btn btn-info">Show</a>
                                                @auth
                                                <a href="{{ route('edit_product', $product->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete_product', $product->id) }}" class="btn btn-danger">Delete</a>
                                                @endauth
                                            </div>
                                    </div>
                                </div>            
                            @elseif(Auth::user()->email == $seller->email)
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="card">
                                        <img src="{{ "$product->product_img" }}" class="card-img-top m-auto w-50" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$product->product_name}}</h5>
                                                <p class="float-right text-danger"><strong>{{$category->category_name}}</strong></p>
                                                <h5 class="card-title text-info">{{$seller->store_name}} </h5>
                                                <p><del class="text-danger">{{ $product->compare_price }} L.E </del>&nbsp &nbsp &nbsp<span class="text-success">{{$product->price}} L.E</span> &nbsp &nbsp &nbsp &nbsp &nbsp <span class="text-info"> {{ $product->description }}</p>    
                                                <a href="{{ route('show_product',$product->id) }}" class="btn btn-info">Show</a>
                                                @auth
                                                <a href="{{ route('edit_product', $product->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('delete_product', $product->id) }}" class="btn btn-danger">Delete</a>
                                                @endauth
                                            </div>
                                    </div>
                                </div>        
                            @endif
                        @endif
                    @endforeach
                @endforeach
        </div>
    </div>
    @section('scripts')    
        <script>
            $('#keyWord').keyup(function(){
                let keyword = $(this).val();
                let url = "{{ route('search_products') }}" + "?keyword=" + keyword;
                // console.log(url);
                $.ajax({
                    type: "GET",
                    url: url, 
                    contentType: false,
                    processData: false,
                    success:function(data)
                    {
                        $('#products').empty()
                        for (product of data)
                        $('#products').append(`
                        <div class="col-lg-4 col-md-6 mt-3">
                            <div class="card">
                                <img src="${product.product_img}" class="card-img-top m-auto w-75" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">${product.product_name}</h5>                                                
                                    <p><del class="text-danger">${product.compare_price} L.E </del>&nbsp &nbsp <span class="text-success">${product.price} L.E </span></p>    
                                    <a href="http://localhost/multi_sellers/public/products/show/${product.id}" class='btn btn-info'> Show </a>
                                </div>
                            </div>
                        </div>
                        `)
                        // console.log(product.product_name);

                    }
                })
            })    
        </script>    
    @endsection
@endsection
