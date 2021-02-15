<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Page extends Model
{
    public static function insertData($data){

      $value=DB::table('products')->where('product_name', $data['product_name'])->get();
      if($value->count() == 0){
         DB::table('products')->insert($data);
      }
   }
}
