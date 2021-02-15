<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'seller_id','email','location_name','address','latitude','longitude','distance'
    ];
}
