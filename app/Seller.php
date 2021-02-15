<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = [
        'seller_name', 'store_name' , 'activity_id' , 'email' , 'store_address' , 'city' , 
        'country_id' , 'zip_code' , 'store_contact' , 'store_desc' , 'store_policy' , 'store_img'
    ];

    // Sellers belongsTo Activity
    public function activity()
    {
        $this->belongsTo('App\Activity');
    }

    // Sellers belongsTo Country
    public function country()
    {
        $this->belongsTo('App\Country');
    }
}
