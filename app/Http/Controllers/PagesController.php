<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Seller;
use App\Category;
use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    return view('uploadFile');
  }

  public function uploadFile(Request $request){

    if ($request->input('submit') != null ){

      $file = $request->file('file');

      // File Details 
      $filename = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $tempPath = $file->getRealPath();
      $fileSize = $file->getSize();
      $mimeType = $file->getMimeType();

      // Valid File Extensions
      $valid_extension = array("csv");

      // 2MB in Bytes
      $maxFileSize = 2097152; 

      // Check file extension
      if(in_array(strtolower($extension),$valid_extension)){

        // Check file size
        if($fileSize <= $maxFileSize){

          // File upload location
          $location = 'uploads/csvs';

          // Upload file
          $file->move($location,$filename);

          // Import CSV to Database
          $filepath = public_path($location."/".$filename);

          // Reading file
          $file = fopen($filepath,"r");

          $importData_arr = array();
          $i = 0;

          while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
             $num = count($filedata );
             
             // Skip first row (Remove below comment if you want to skip the first row)
             /*if($i == 0){
                $i++;
                continue; 
             }*/
             for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
             }
             $i++;
          }
          fclose($file);

          // Insert to MySQL database
          foreach($importData_arr as $importData){

            $insertData = array(
               "product_name"=>$importData[1],
               "seller_id"=>$importData[2],
               "category_id"=>$importData[3],
               "tag_id"=>$importData[4],
               "description"=>$importData[5],
               "qnt"=>$importData[6],
               "price"=>$importData[7],
               "compare_price"=>$importData[8],
               "product_img"=>$importData[9],
               );
            Page::insertData($insertData);
          }
          $users = User::get();
          $products = Product::get();
          $sellers = Seller::get();
          $categories = Category::get();   
          return view('Products.index',compact('products','sellers','categories','users'));

        }else{
          return ('File too large. File must be less than 2MB.');
        }

      }else{
         return ('Invalid File Extension.');
      }

    }

    // Redirect to index
    return redirect()->action('PagesController@index');
  }
}
