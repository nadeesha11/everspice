<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
// use Munna\ShoppingCart\Facades\Cart;
use Cart;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Collection;
use Session;
// use Munna\ShoppingCart\Cart;

class add_to_cart extends Controller
{
    
  public function add(Request $request){



    // dd( $request);

    $discount = $request->discount;
    // echo $discount;
    $product = product::find($request->product_id);
   
    $product_id    = $product->id;
    $product_name  = $product->product_name;
    $product_qty   = $request->quantity;
    $product_price = $product->price;
    $coupon = $request->coupen;
    
    //check coupen is entered and user is logged
    
   /* if(!empty($coupon) && !empty(Session::get('auth_user_session_object')) ){
        
        //get coupon info from database
        $coupon = DB::table('coupons')->where('coupon_code',$coupon)->where('Product_id',$product_id)->where('status',1)->get();
        
        //check coupon exists
        if($coupon){
            
            $coupon_discount = $coupen->coupon_discount;
            $coupon_limit   = $coupen->coupon_limit;
            $item_count_coupon_applicable = $coupen->item_count_per_cus;
            
    
            //get customer info 
            
            $customer_info = Session::get('auth_user_session_object');
            $customer_email = $customer_info[0]->email;
            $customer_id =  $customer_info[0]->id;
            
            //check the customer already 
            
            //apply the coupen discount 
            
            if($coupen_limit>0){
                
              if($product_qty > $item_count_coupon_applicable) {

                }
            
             $product_price =  $product_price - ((( $discount/100 ) * $product_price) + (( $coupon_discount/100 ) * $product_price) );
             
             $coupon_limit = $coupon_limit-1;
             
             //save the info to db
            
           //  $updatecoupenlimit = DB::update('')
            
            }else{
                $product_price =  $product_price - (( $discount/100 ) * $product_price );
            }
            
            
            
            
            
            
            
            
            
        }else{
            
            $product_price =  $product_price - (( $discount/100 ) * $product_price );
            
        }
        
        
        
        
    }else{
        $product_price =  $product_price - (( $discount/100 ) * $product_price );
    }
    
    */
    
    

     $product_price =  $product_price - (( $discount/100 ) * $product_price );

    $num =  DB::table('create_product_image_tables')->where('product_id', '=', $product_id)->value('product_main_img');
    
    $product_weight = (int)$num;//string to int
    // return $product_weight;

    $new_cart = Cart::add($product_id, $product_name, $product_qty, $product_price , $product_weight,$discount = 0 );
    
  
     
     
   
 
    
    
    

    $product_data =  DB::table('products')
    ->join('category','products.cat_id','=','category.id')
    ->join('subcategory','products.subcat_id','=','subcategory.id')
    ->join('create_product_image_tables','products.id','=','create_product_image_tables.product_id')
    ->select('products.*','category.Cat_name','subcategory.sub_name','create_product_image_tables.product_main_img','create_product_image_tables.product_sub_img1','create_product_image_tables.product_sub_img2','create_product_image_tables.product_sub_img3','create_product_image_tables.product_sub_img4')
    ->get();

  

   
    
        //   Alert::success('Item Added', 'Item Added Succesfully');
          
          session(['new_item' => 'new item added']);
          
          
  
          return redirect()->back();
    


  }

  public function cart(){

    // $uid  = "zlmqrjfxjjtennpczhfz0gvodtwifzuc";

 
    
    
    
    // Cart::remove($uid);
   
   return view('web.cart');


  }

  public function cart_json(){
    
   $items= Cart::info();


   return json_encode($items);

  }


  public function item_delete($uid){

  
      Cart::remove($uid);
     // return json_encode($uid);

      $items= Cart::info();
      return json_encode($items);

  }
  
  
  
  public function item_update($uid,$qty){
      
    //   $uid  = $uid; 
    //   $quantity = $qty;
     
    //   Cart::update($uid,$quantity);
     
     
    //   $items= Cart::info();
      
      
   
     
    //   return json_encode($quantity);

  }
  
  
  
  
    public function item_update_new(Request $request){
      
     
       $quantity = $request->qty;
       $uid = $request->uid_update;
       
       Cart::update($uid,$quantity);
     
      $items2= Cart::info();
      return json_encode($items2);
     
 
  }
  //////////////////////////////////////////code by chamil//////////////////////////////
  public function check_cart_product($code){
      
//   $items=Cart::info();

      $data = DB::table('coupons')
                ->select('coupons.*')
                ->where([

                    ['coupons.coupon_code', '=', $code],
                    ])
                ->get()
                ->first();
       
          if (!empty($data)) {  
              
              $coupon_id=$data->id;
              $uid=(int)$data->Product_id;
              $coupon_discount=(float)$data->coupon_discount;
              $coupon_limit=(int)$data->coupon_limit;

        
             $items=Cart::searchByProductId($uid);
             $status=$items->getData()->status;
             
             if($coupon_limit>0){
                 if($status==0){
    
                    $price=(float)$items->getData()->price;
                    $qry=(int)$items->getData()->qty; 
    
                    if($items->getData()->used>0){
                        return json_encode(-1);   
                    }else{
                       
                            if($qry>=$coupon_limit){
                                 $dis_qty=$coupon_limit;
                                 $outstd_qty=(int)$coupon_limit-(int)$qry;
                                 $outstd_price=($qry-$coupon_limit)*$price;
                                 
                             }else if($qry<$coupon_limit){
                                 $dis_qty=$qry;
                                 $outstd_price=0;
                             }
                              
                            $discounted_price= ($price*$dis_qty*(100-$coupon_discount)/100)+$outstd_price;
                            Cart::updateByProId($uid, $discounted_price);
                            $items2= Cart::info();
    

                            
                         $items2=    ['data' => [
                                        'coupon_id' => $coupon_id,
                                        'dis_qty' => $dis_qty,
                                        'dropdown_data' => Cart::info(),
                                        ]];
                                    
                            return json_encode($items2);
                  
                    }
                
                 }else{
                     $items2= Cart::info();
                     return json_encode($items2);
                 }
              }else{
                  return json_encode(-3);   
              }
      
          }else{
             return json_encode($data);  
          }
        
  }
  
  
  


}
