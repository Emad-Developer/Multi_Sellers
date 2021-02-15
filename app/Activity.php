<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'activity_name', 'activity_img'
    ];

    // Activity hasMany Sellers
    public function sellers()
    {
        $this->hasMany('App\Seller');
    }
}
