<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name' , 'seller_id' , 'category_id' , 'tag_id' , 'description' ,
        'qnt' , 'price' , 'compare_price' , 'product_img'
    ];
}
