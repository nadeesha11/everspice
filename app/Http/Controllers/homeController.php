<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class homeController extends Controller
{
    
     public function __construct(){
         $this->middleware('web');
         //$this->middleware('guest');
     }
   public function index(){


      
          // $user = Auth::user();
          // dd($user);
          $user = Session::get('auth_user_session_object');
         //dd($user);
         
         
         
         
         
         
         
        //  testing 
         $product_detailed =  DB::table('products')
        ->join('category','products.cat_id','=','category.id')
        ->join('subcategory','products.subcat_id','=','subcategory.id')    
        ->join('create_product_image_tables','products.id','=','create_product_image_tables.product_id')
        ->select('products.*','category.Cat_name','subcategory.sub_name','create_product_image_tables.product_main_img','create_product_image_tables.product_sub_img1','create_product_image_tables.product_sub_img2','create_product_image_tables.product_sub_img3','create_product_image_tables.product_sub_img4')
       
       
         ->WhereNull('products.status')
        ->WhereNull('category.status')
      
        ->WhereNull('subcategory.status')

        ->get();
        // testing 
        
        // dd($product_detailed);
        
        
        $product_reviews = DB::table('customer_reviews')->where('approved','=',1)->get();
        
        
        
        // dd($product_reviews);
        
        
        
        
        
        
        
         
         
         
         
         // this is working code
        //   $product_data =  DB::table('products')
        // ->join('category','products.cat_id','=','category.id')
        // ->join('subcategory','products.subcat_id','=','subcategory.id')
        // ->join('create_product_image_tables','products.id','=','create_product_image_tables.product_id')
        // ->select('products.*','category.Cat_name','subcategory.sub_name','create_product_image_tables.product_main_img','create_product_image_tables.product_sub_img1','create_product_image_tables.product_sub_img2','create_product_image_tables.product_sub_img3','create_product_image_tables.product_sub_img4')
        // ->get();
         // this is working code
       
        
        
        
        
        
        // this is working code
        // return view('web.home',compact('product_data'));   
        // this is working
        
        
           return view('web.home',compact('product_detailed','product_reviews'));   

   }
   
   public function unset_popup(){
       
       
       session()->forget('new_item');
       
       return back();    
        
   }
   
   
   
   
   
   

}
