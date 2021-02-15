<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'country_name'
    ];

    // Country hasMany Sellers
    public function sellers()
    {
        $this->hasMany('App\Seller');
    }
}
