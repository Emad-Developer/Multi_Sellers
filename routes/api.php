<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

// Show All Products
Route::get('/products','ApiProductController@index');

// Show One Product
Route::get('/products/show/{id}','ApiProductController@show');

// Middleware
Route:: middleware('isApiUser')->group(function(){
    // Store one Product
    Route::post('/products/store','ApiProductController@store');
    
    // Update one Product
    Route::post('/products/update/{id}','ApiProductController@update');
    
    // Delete one Product
    Route::get('/products/delete/{id}','ApiProductController@delete');
});

// Authentication

    // Register
    Route::post('/handleRegister','ApiAuthController@handleRegister');

    // Login
    Route::post('/handleLogin','ApiAuthController@handleLogin');

    // Logout
    Route::post('/logout','ApiAuthController@logout');

