<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class dealzController extends Controller
{
    public function index(){


        $product_data =  DB::table('products')
        ->join('category','products.cat_id','=','category.id')
        ->join('subcategory','products.subcat_id','=','subcategory.id')
        ->join('create_product_image_tables','products.id','=','create_product_image_tables.product_id')
        ->select('products.*','category.Cat_name','subcategory.sub_name','create_product_image_tables.product_main_img','create_product_image_tables.product_sub_img1','create_product_image_tables.product_sub_img2','create_product_image_tables.product_sub_img3','create_product_image_tables.product_sub_img4')
       
         
         ->WhereNull('category.status')
        ->WhereNull('products.status')
        ->WhereNull('subcategory.status')
      
       
        ->where('products.discount', '>', 0)
        
        ->get();
        
        
        
        // dd($product_data);
        
        
          $product_reviews = DB::table('customer_reviews')->where('approved','=',1)->get();
         
     
           return view('web.productDealz',compact('product_data','product_reviews'));

    

    }
}
