<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class web_product_controller extends Controller
{
    public function index(){


        $product_data =  DB::table('products')
        ->join('category','products.cat_id','=','category.id')
        ->join('subcategory','products.subcat_id','=','subcategory.id')
        ->join('create_product_image_tables','products.id','=','create_product_image_tables.product_id')
        ->select('products.*','category.Cat_name','subcategory.sub_name','create_product_image_tables.product_main_img','create_product_image_tables.product_sub_img1','create_product_image_tables.product_sub_img2','create_product_image_tables.product_sub_img3','create_product_image_tables.product_sub_img4')
        
         ->WhereNull('subcategory.status')
         ->WhereNull('products.status')
         ->WhereNull('category.status')
         
         
        ->get();
        
        // dd($product_data);
   
      $product_subs =DB::table('products')
      ->join('category','products.cat_id','=','category.id')
      ->groupBy('cat_id')
      ->select('category.Cat_name','category.id')
      ->get();  
      
      
      
    //   dd($product_subs);
      
      
      
      
        $product_reviews = DB::table('customer_reviews')->where('approved','=',1)->get();
        // dd($product_reviews);


           return view('web.web_product',compact('product_data','product_reviews'),compact('product_subs'));

       

    }
}
