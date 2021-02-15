<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    // Home Page
    Route::get('/home', 'ActivityController@home')->name('home');

    // ------------------------------------------------------ \\

    // Read Activities
    Route::get('/activities', 'ActivityController@index')->name('show_activities');
    Route::get('/activities/show/{id}', 'ActivityController@show')->name('show_activity');

    // Create Activity
    Route::get('/activities/create','ActivityController@create')->name('create_activity');
    Route::post('/activities/store','ActivityController@store')->name('store_activity');

    // Update Activity
    Route::get('/activities/edit/{id}','ActivityController@edit')->name('edit_activity');
    Route::post('/activities/update/{id}','ActivityController@update')->name('update_activity');

    // Delete Activity
    Route::get('/activities/delete/{id}','ActivityController@delete')->name('delete_activity');

    // ------------------------------------------------------ \\

    // Read Sellers
    Route::get('/sellers', 'SellerController@index')->name('show_sellers');
    Route::get('/sellers/show/{id}', 'SellerController@show')->name('show_seller');

    // Read Sellers From Activities
    Route::get('/activities/showSellers/{id}', 'ActivityController@showSellers')->name('showSellers');

    // Read Products From Seller
    Route::get('/sellerProduct/showAll/{id}', 'SellerController@showSellerProducts')->name('show_seller_products');

    // Read Products From Categories
    Route::get('/categoryProduct/showAll/{id}', 'CategoryController@showActivityProducts')->name('show_category_products');

    // Create Seller
    Route::get('/sellers/create','SellerController@create')->name('create_seller');
    Route::post('/sellers/store','SellerController@store')->name('store_seller');

    // Update Seller
    Route::get('/sellers/edit/{id}','SellerController@edit')->name('edit_seller');
    Route::post('/sellers/update/{id}','SellerController@update')->name('update_seller');

    // Delete Seller
    Route::get('/sellers/delete/{id}','SellerController@delete')->name('delete_seller');
    
    // ------------------------------------------------------ \\

    // Read Location
    Route::get('/locations', 'LocationController@index')->name('show_locations');
    
    // Create Location
    Route::get('/locations/create','LocationController@create')->name('create_location');
    Route::post('/locations/store','LocationController@store')->name('store_location');

    // ------------------------------------------------------ \\
    // Create Tag
    Route::get('/tags/create','TagController@create')->name('create_tag');
    Route::post('/tags/store','TagController@store')->name('store_tag');

    // ------------------------------------------------------ \\

    // Read Categories
    Route::get('/categories', 'CategoryController@index')->name('show_categories');
    Route::get('/categories/show/{id}', 'CategoryController@show')->name('show_category');
    
    // Create Category
    Route::get('/categories/create','CategoryController@create')->name('create_category');
    Route::post('/categories/store','CategoryController@store')->name('store_category');

    // Update Category
    Route::get('/categories/edit/{id}','CategoryController@edit')->name('edit_category');
    Route::post('/categories/update/{id}','CategoryController@update')->name('update_category');

    // Delete Category
    Route::get('/categories/delete/{id}','CategoryController@delete')->name('delete_category');

    // ------------------------------------------------------ \\

    // Read Products
    Route::get('/products', 'ProductController@index')->name('show_products');
    Route::get('/products/show/{id}', 'ProductController@show')->name('show_product');

    // Search about Products
    Route::get('/products/search', 'ProductController@search')->name('search_products');

    
    // Create Product
    Route::get('/products/create','ProductController@create')->name('create_product');
    Route::post('/products/store','ProductController@store')->name('store_product');

    // Import CSV Files
    Route::get('/csv', 'PagesController@index')->name('show');
    Route::post('/csv/uploadFile', 'PagesController@uploadFile')->name('upload_Files');
    
    // Update Product 
    Route::get('/products/edit/{id}','ProductController@edit')->name('edit_product');
    Route::post('/products/update/{id}','ProductController@update')->name('update_product');

    // Delete Product
    Route::get('/products/delete/{id}','ProductController@delete')->name('delete_product');

    // ------------------------------------------------------ \\

    // Authentication

    // Register
    Route::get('/register','AuthController@register')->name('auth_register');
    Route::post('/handleRegister','AuthController@handleRegister')->name('auth_handleRegister');

    // Login
    Route::get('/login','AuthController@login')->name('auth_login');
    Route::post('/handleLogin','AuthController@handleLogin')->name('auth_handleLogin');

    // Logout
    Route::get('/logout','AuthController@logout')->name('auth_logout');

    // Sign Up Github
    Route::get('/login/github','AuthController@redirectToProvider')->name('auth.github.redirect');
    Route::get('/login/github/callback','AuthController@handleProviderCallback')->name('auth.github.callback');

    // Sign Up Facebook
    Route::get('/login/facebook','AuthController@redirectToProviderFace')->name('auth.facebook.redirect');
    Route::get('/login/facebook/callback','AuthController@handleProviderCallbackFace')->name('auth.facebook.callback');

    