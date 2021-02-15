<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title')</title>
    @yield('scripts')
    <style>
        #map {
            height: 300px;            
        }      
    </style>
</head>
{{-- @inject('project', 'App\Project') --}}
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="https://gorgov.com">Gorgov</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sellers
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @auth
                <a class="dropdown-item" href="{{ route('create_activity') }}">Add Activity</a>
                @endauth
                <a class="dropdown-item" href="{{ route('show_activities') }}">Show Activities</a>
                @auth
                <a class="dropdown-item" href="{{ route('create_seller') }}">Add Seller</a>
                @endauth
                <a class="dropdown-item" href="{{ route('show_sellers') }}">Show Sellers</a>
                @auth
                <a class="dropdown-item" href="{{ route('create_location') }}">Add Location</a>
                @endauth
                <a class="dropdown-item" href="{{ route('show_locations') }}">Show Locations</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Products
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @auth
                <a class="dropdown-item" href="{{ route('create_tag') }}">Add Tag</a>
                @endauth
                @auth
                <a class="dropdown-item" href="{{ route('create_category') }}">Add Categories</a>
                @endauth
                <a class="dropdown-item" href="{{ route('show_categories') }}">Show Categories</a>
                @auth
                <a class="dropdown-item" href="{{ route('create_product') }}">Add Product</a>
                @endauth
                <a class="dropdown-item" href="{{ route('show_products') }}">Show Products</a>
              </div>
            </li>
           </ul>
           @guest
           <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('auth_register') }}">Register</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('auth_login') }}">Login</a>
            </li>
           </ul>
            @endguest
            @auth
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link">{{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('auth_logout') }}">Logout</a>
            </li>
            @endauth
           </ul>
        </div>
      </nav>
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLi_lqeBs3scnLK-VNOzOZSPlUyZ1k5pM&callback=initMap&libraries=&v=weekly"
      async
    ></script>
</body>
</html>