<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class web_product_detailed extends Controller
{
    public function index($id){

        $product_detailed =  DB::table('products')
        ->join('category','products.cat_id','=','category.id')
        ->join('subcategory','products.subcat_id','=','subcategory.id')    
        ->join('create_product_image_tables','products.id','=','create_product_image_tables.product_id')
        ->select('products.*','category.Cat_name','subcategory.sub_name','create_product_image_tables.product_main_img','create_product_image_tables.product_sub_img1','create_product_image_tables.product_sub_img2','create_product_image_tables.product_sub_img3','create_product_image_tables.product_sub_img4')
        ->where('products.id', '=', $id)
        ->get();

        // dd($product_detailed);
        $product_images =  DB::table('create_product_image_tables')->where('product_id', '=', $id)->get();
        $product_reviews = DB::table('customer_reviews')->where('prod_id','=',$id)->where('approved','=',1)->get();
        $prod_id = $product_detailed[0]->id;
         
          $product_rating_amount = DB::table('customer_reviews')->where('prod_id','=',$id)->where('approved','=',1)->sum('rating');
          
        //5 star rating count
        $star_5_product_reviews = count(DB::table('customer_reviews')->where('prod_id','=',$id)->where('approved','=',1)->where('rating','=',5)->get());
        
         //4 star rating count
        $star_4_product_reviews = count(DB::table('customer_reviews')->where('prod_id','=',$id)->where('approved','=',1)->where('rating','=',4)->get());
         
         //3 star rating count
        $star_3_product_reviews = count(DB::table('customer_reviews')->where('prod_id','=',$id)->where('approved','=',1)->where('rating','=',3)->get());
      
         //2 star rating count
        $star_2_product_reviews = count(DB::table('customer_reviews')->where('prod_id','=',$id)->where('approved','=',1)->where('rating','=',2)->get());
  
         //1 star rating count
        $star_1_product_reviews = count(DB::table('customer_reviews')->where('prod_id','=',$id)->where('approved','=',1)->where('rating','=',1)->get());
    
        
       // dd($product_rating_amount);
        $review_count = count($product_reviews);
        
        if( $review_count == 0 ){
            
            
            $review_count = 1;
            
        }
        
        // $review_count = 1;
        
        //5 star review percentage
        $star5ratingpercentage = round((($star_5_product_reviews/$review_count)*100),1);
        
        //4 star review percentage
        $star4ratingpercentage = round((($star_4_product_reviews/$review_count)*100),1);
        //3 star review percentage
        $star3ratingpercentage =  round((($star_3_product_reviews/$review_count)*100),1);
        //2 star review percentage
        $star2ratingpercentage =  round((($star_2_product_reviews/$review_count)*100),1);
        //1 star review percentage
        $star1ratingpercentage =  round((($star_1_product_reviews/$review_count)*100),1);

        //$avg_rating = round(($product_rating_amount/$review_count),1);
        
        
        //calculating avg rating
        
        $avg_rating =  round(((($star_5_product_reviews *5) + ($star_4_product_reviews *4) + ($star_3_product_reviews *3) + ($star_2_product_reviews *2) + ($star_1_product_reviews *1))/$review_count),1);
        
        return view('web.web_product_detailed',compact('product_detailed','product_images','product_reviews','prod_id','avg_rating','star5ratingpercentage','star4ratingpercentage','star3ratingpercentage','star2ratingpercentage','star1ratingpercentage'));







    }
    
    public function add_review(Request $request){
        
        $request->validate([
            'comment' => 'required',
            'name' => 'required',
            'user_email'=>'email|required',
           // 'website'=>'url',
            'rating'=>'required'],['comment.required'=>'Please Enter Your Comment','name.required'=>'Please Enter Your Name','user_email.email'=>'Please Enter Valid Email Address','user_email.required'=>'Please Enter Email','rating.required'=>'Please Enter your rating']);
     
     $prod_id = $request->get('prod_id');
     
        
        $comment = $request->get('comment');
        $name = $request->get('name');
        $user_email = $request->get('user_email');
       // $website = $request->get('website');
        $rating = $request->get('rating');
        $date = Carbon::now();
        
        //save review to database
        
        $save_review = DB::insert('insert into customer_reviews(name,email,comment,rating,prod_id,created_at) values(?,?,?,?,?,?)',[$name,$user_email,$comment,$rating,$prod_id,$date]);
        
        if($save_review) {
            
            $red = redirect('web/products/detailed/'.$prod_id)->with('success','Product Review Successfully added');
            
        }else {
            $red = redirect('web/products/detailed/'.$prod_id)->with('danger','Error Adding Product Review ');
        }
        
        return $red;
        
    }
}
