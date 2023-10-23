<?php

namespace App\Http\Controllers;

use App\Models\shipping_price;
use App\Mail\TestMail;
use App\Mail\orderAdmin;


use App\Models\coupon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Crypt;

use App\Models\fail_payment;

use App\Http\Controllers\web_product_controller;



class checkoutController extends Controller
{
    
   public function index(){
 
    return "this is checkout page";

    
   }


     public function check_login_for_checkout(){
   
   
    //  return "checkout checked";
   
    //     if(session()->has('customer_data'))
    //  {
    //     $shipping = shipping_price::all();
    //     // dd( $shipping);
    //     return view('web.display_checkout',compact('shipping'));

    //  }
    
    
       if(session()->has('auth_user_session_object')){
           
      
           
          $all = request()->session()->get('auth_user_session_object', '');
          $cid = $all->id;
          
          
           
       }
       
       else{
           
           $cid ="";
       }
 
       
       
       
        
    
    
     
        $shipping = shipping_price::all();
        // dd( $shipping);
        return view('web.display_checkout',compact('shipping','cid'));
     

    //  else{

    //     {
           
    //         // return redirect()->back() ->with('alert', 'you are not logged in. please login');
    //           return redirect('web/customer/login/check')->with('alert_checkout', 'you are not logged in. please login for checkout');

    //      }
    //  }


    }


      public function directpay_start(Request $request){
          
          
          
          if( ($request->amount)>100 ){
              
            $request->merge([
           'country' => 0.00,
           ]);
   
              
          }
          
          else{
            
                   $request->merge([
           'amount' =>3.99+$request->amount,
           ]);   
               
            
            
            
               $request->merge([
           'country' =>3.99,
           ]);   
               
              
          }
          
          
     
        //   dd($request);
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
        //   add vales to not mandotory fields
        
        
        //start additional_information
          if (!isset($request->additional_information)) {
              
        //   $request->additional_information = "Additional information not filled by customer";
           
           $request->merge([
           'additional_information' => "Additional information not filled",
           ]);
   
           
           }
           else{
              
           }
        //end additional_information
           
           
         
           
           
           
         //start zipcode 
         
           if (!isset($request->zipcode)) {

           
           $request->merge([
           'zipcode' => "Zipcode not filled",
           ]);
   
           
           }
           else{
              
           }
   
   
   
   
        //end zipcode
        
        
        
          //start address line 2 
         
           if (!isset($request->billing_address2)) {

           
           $request->merge([
           'billing_address2' => "Address line 2 not filled",
           ]);
   
           
           }
           else{
              
           }
   
   
   
   
        //end address line 2 
        
        
              //start last name
         
           if (!isset($request->last_name)) {

           
           $request->merge([
           'last_name' => "last name not filled",
           ]);
   
           
           }
           else{
              
           }
   
   
   
   
        //end last name
          
               
          
          
          
          
          
          
          
          
        //   add vales to not mandotory fields       
           
           
           
           
           
           
           
           
           
           
           
           
           
           
        //  dd($request);
        
          
        //   check card payment or cash
          if($request->payment_method == "cash"){
           
        //   $cash = "cash is the way";
        //   dd($request);  
           
           
           
           
        //   cash on delivery codes copy from CashOnDeliveryData controller
           
           
              
        // validate form
        
         if(isset($request->checkbox)){
            
      
            
                    $request->validate([
                 
            
            'first_name' =>'required',
            'last_name' =>'required',
            
            'billing_address1' =>'required',
            'billing_address2' =>'required',
            
            'billing_address3' =>'required',
            'billing_address4' =>'required',
            
            'country_name' =>'required',
            'country' =>'required',
            
            'email' =>'required',
            'zipcode' =>'required',
            
            'phone' =>'required',
         
            'first_name_b' =>'required',
            // 'last_name_b' =>'required',
            
            'street_address_line_1_b' =>'required',
            // 'street_address_line_2_b' =>'required',
            
            'town_b' =>'required',
            'country_b' =>'required',
            
            'company_name_b' =>'required',
            'email_b' =>'required',
            
            // 'zip_b' =>'required|numeric',
            'phone_b' =>'required|numeric',
            
            
          
                                       ],
            [
                
            'first_name.required'=>'Please Fill First Name',
            'last_name.required'=>'Please Fill Last Name',
            
            'billing_address1.required'=>'Please Fill Street Address  Line One',
            'billing_address2.required'=>'Please Fill Street Address  Line Two',
            
            'billing_address3.required'=>'Please Fill Town',
            'billing_address4.required'=>'Please Fill Company Name',
            
            'country_name.required'=>'Please Select Shipping Country',
         
            
            'email.required'=>'Please Fill Email',
            'zipcode.required'=>'Please Fill Zipcode',
            // 'zipcode.numeric'=>'Please Fill With Valid Format',
            
            'phone.required'=>'Please Fill Phone Number',
            // 'additional_information.required'=>'Please Fill Additional Information',
         
         
         
         
         
            'first_name_b.required'=>'Please Fill First Name',
            // 'last_name_b.required'=>'Please Fill Last Name',
            
            'street_address_line_1_b.required'=>'Please Fill Street Address Line One',
            // 'street_address_line_2_b.required'=>'Please Fill Street Address Line Two',
         
            'town_b.required'=>'Please Fill Town',
            'country_b.required'=>'Please Fill Country',
            
            'company_name_b.required'=>'Please Fill Company Name',
            'email_b.required'=>'Please Fill Email',
            
            // 'zip_b.required'=>'Please Fill Zipcode',
            // 'zip_b.numeric'=>'Please Fill With Valid Format',
            
            'phone_b.required'=>'Please Fill Phone',
            'phone_b.numeric'=>'Please Fill With Valid Format',
            
         
            
            ]);
            
            
            
          
                
        }
        
        else{
            
        //   return "not set";    
        $request->validate([

       
            'first_name' =>'required',
            'last_name' =>'required',
            
            'billing_address1' =>'required',
            'billing_address2' =>'required',
            
            'billing_address3' =>'required',
            'billing_address4' =>'required',
            
            'country_name' =>'required',
            'country' =>'required',
            
            'email' =>'required',
            'zipcode' =>'required',
            
            'phone' =>'required',
            // 'additional_information' =>'required',
          
                                       ],
            [
                
            'first_name.required'=>'Please Fill First Name',
            'last_name.required'=>'Please Fill Last Name',
            
            'billing_address1.required'=>'Please Fill Street Address  Line One',
            'billing_address2.required'=>'Please Fill Street Address  Line Two',
            
            'billing_address3.required'=>'Please Fill Town',
            'billing_address4.required'=>'Please Fill Company Name',
            
            'country_name.required'=>'Please Select Shipping Country',
         
            
            'email.required'=>'Please Fill Email',
            'zipcode.required'=>'Please Fill Zipcode',
            // 'zipcode.numeric'=>'Format Wrong',
            
            'phone.required'=>'Please Fill Phone Number',
            // 'additional_information.required'=>'Please Fill Additional Information',
         
            
            ]);
            
      
          
            
        
            
        }
        
        
        
        // end validation
        
  
          
        //   create variable that add data to order
          
               if(isset($request->checkbox)){
                   
                
                
                // add not filled values to fileds
                
                  //start last name 
         
               if (!isset($request->last_name_b)) {

           
           $request->merge([
           'last_name_b' => "last name not filled",
           ]);
   
           
           }
           else{
              
           }
   
   
   
   
        //end last name
        
        
        
        
                  //start street_address_line_2_b
         
               if (!isset($request->street_address_line_2_b)) {

           
           $request->merge([
           'street_address_line_2_b' => "Address line 2 not filled",
           ]);
   
           
           }
           else{
              
           }
   
   
   
   
        //end street_address_line_2_b
        
        
        
        
                  //start zip_b
         
               if (!isset($request->zip_b)) {

           
           $request->merge([
           'zip_b' => "zipcode not filled",
           ]);
   
           
           }
           else{
              
           }
   
   
   
   
        //end zip_b
                
                
                
                  // add not filled values to fileds  
                   
        
        
                 $cashOnDelivery = [
        
        
            //  $cashOnDelivery = array([
            "first_name"=>$request["first_name"],
            "last_name"=>$request["last_name"],
            "billing_address1"=>$request["billing_address1"],
            "billing_address2"=>$request["billing_address2"],
            "billing_address3"=>$request["billing_address3"],
            "billing_address4"=>$request["billing_address4"],
            "country_name"=>$request["country_name"],
            "country"=>$request["country"],
            "email"=>$request["email"],
            "zipcode"=>$request["zipcode"],
            "phone"=>$request["phone"],
            "additional_information"=>$request["additional_information"],
            "amount"=>$request["amount"],
            
            // billing address
            
            "first_name_b"=>$request["first_name_b"],
            "last_name_b"=>$request["last_name_b"],
            "street_address_line_1_b"=>$request["street_address_line_1_b"],
            "street_address_line_2_b"=>$request["street_address_line_2_b"],
            "town_b"=>$request["town_b"],
            "country_b"=>$request["country_b"],
            "company_name_b"=>$request["company_name_b"],
            "email_b"=>$request["email_b"],
            "zip_b"=>$request["zip_b"],
            "phone_b"=>$request["phone_b"],
            "user_id"=>$request["user_id"],
            
            
              'orderid' => date( 'ymdhis' ),
              'created_at'=> date("Y-m-d H:i:s", strtotime('now')),
              'order_status'=>'inprogress',
              'method'=>'Cash On Delivery'
         
             // billing address

                    // 'orderid' => date( 'ymdhis' ),
                    // 'additional_information' => $request->additional_information,
                    // 'amount' => $request->amount,
                    // 'billing_address1'=>$request->billing_address1,
                    // 'billing_address2'=>$request->billing_address2,
                    // 'billing_address3'=>$request->billing_address3,
                    // 'billing_address4'=>$request->billing_address4,
                    // 'country_name'=>$request->country_name,
                    // 'email'=>$request->email,
                    // 'first_name'=>$request->first_name,
                    // 'last_name'=>$request->last_name,
                    // 'phone'=>$request->phone,
                    // 'zipcode'=>$request->zipcode,
                    // 'created_at'=> date("Y-m-d H:i:s", strtotime('now')),
                    // 'country'=>$request->country,
                    
                    // 'user_id'=>$request->user_id,
                    
                  
                    
                    // 'first_name_b'=>$request->first_name_b,
                    // 'last_name_b'=>$request->last_name_b,
                    // 'street_address_line_1_b'=>$request->street_address_line_1_b,
                    // 'street_address_line_2_b'=>$request->street_address_line_2_b,
                    
                    // 'town_b'=>$request->town_b,
                    // 'country_b'=>$request->country_b,
                    // 'company_name_b'=>$request->company_name_b,
                    // 'email_b'=>$request->email_b,
                    
                    // 'zip_b'=>$request->zip_b,
                    // 'phone_b'=>$request->phone_b,
                    // 'order_status'=>'inprogress',
        
        //  ]
        //   );
          
          
          ];
          
          
            
        }
        else{
            
      
             $cashOnDelivery = [
            
            
            //  $cashOnDelivery = array([
            "first_name"=>$request["first_name"],
            "last_name"=>$request["last_name"],
            "billing_address1"=>$request["billing_address1"],
            "billing_address2"=>$request["billing_address2"],
            "billing_address3"=>$request["billing_address3"],
            "billing_address4"=>$request["billing_address4"],
            "country_name"=>$request["country_name"],
            "country"=>$request["country"],
            "email"=>$request["email"],
            "zipcode"=>$request["zipcode"],
            "phone"=>$request["phone"],
            "additional_information"=>$request["additional_information"],
            "amount"=>$request["amount"],
            
                    
            
            
            
            
                // billing address
            
            "first_name_b"=>$request["first_name"],
            "last_name_b"=>$request["last_name"],
            "street_address_line_1_b"=>$request["billing_address1"],
            "street_address_line_2_b"=>$request["billing_address2"],
            "town_b"=>$request["billing_address3"],
            "country_b"=>$request["country_name"],
            "company_name_b"=>$request["billing_address4"],
            "email_b"=>$request["email"],
            "zip_b"=>$request["zipcode"],
            "phone_b"=>$request["phone"],
            "user_id"=>$request["user_id"],
            
            
              'orderid' => date( 'ymdhis' ),
              'created_at'=> date("Y-m-d H:i:s", strtotime('now')),
              'order_status'=>'inprogress',
              'method'=>'Cash On Delivery'
            
       
        //      ]
        //   );
          
          ];
          
            
        }
          
          
          
           // end  create variable that add data to order
          
        //  var_dump($cashOnDelivery); 
        //  dd($cashOnDelivery);
 
         DB::table('orders')->insert($cashOnDelivery);
         
     
         
        
        $last2 = DB::table('orders')->orderBy('id','DESC')->first();
        
    //   DB::table('orders')->insertGetId($cashOnDelivery);
        
     
          $lastInsert = $last2->id;
          
        
        //   add data to db
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
        //  get order_details data and add to db 
         
         
         
                  $data = $this->loadcart();
                  
           
                      
                  $cartItems = json_decode( $data, true );
                 
      
                  $multiple_items= [];
                  foreach ( $cartItems[ 'original' ] as $i => $v ) {
     
                            //   get the product discount
                        $pro_discount = DB::table('products')->where('id',$v[ 'product' ])->value('discount');
                        // dd($pro_discount);
                     
                        $name = $v[ 'name' ];
                   
                        $order_main = array(
                            
                        'product_name' => $v[ 'name' ],
                        'product'=> $v[ 'product' ],
                        'qty'=> $v[ 'qty' ],
                        'subtotal'=> $v[ 'subtotal' ],
                        'discount'=> $v[ 'discount' ] ,
                        'order_id'=> $lastInsert ,
                        'product_discount'=> $pro_discount ,   
                        
                    );
                    
                    array_push($multiple_items, $order_main);
                    
                    $success =   DB::table('orders_details')->insert($order_main);
                 
             
                  
                          
                  
              
                  
                  
                  
             

             
    //   }
       
         
    
       
      }
        //   dd($multiple_items);
      
      
      
    //   email for user and admin
      
      
                  
                 $details =[

          
                'first_name'=>$cashOnDelivery['first_name'],
            
                'last_name'=>$cashOnDelivery['last_name'],
          
                'billing_address1' =>$cashOnDelivery['billing_address1'],
                'billing_address2' =>$cashOnDelivery['billing_address2'],
                'billing_address3' =>$cashOnDelivery['billing_address3'],
                'billing_address4' =>$cashOnDelivery['billing_address4'],

                'zipcode' =>$cashOnDelivery['zipcode'],
                'country_name' =>$cashOnDelivery['country_name'],
                'phone' =>$cashOnDelivery['phone'],
                'email' =>$cashOnDelivery['email'],
                
                
                
                    'first_name_b'=>$cashOnDelivery['first_name_b'],
                    'last_name_b'=>$cashOnDelivery['last_name_b'],
                    'street_address_line_1_b'=>$cashOnDelivery['street_address_line_1_b'],
                    'street_address_line_2_b'=>$cashOnDelivery['street_address_line_2_b'],
                    
                    'town_b'=>$cashOnDelivery['town_b'],
                    'country_b'=>$cashOnDelivery['country_b'],
                    'company_name_b'=>$cashOnDelivery['company_name_b'],
                    'email_b'=>$cashOnDelivery['email_b'],
                    
                    'zip_b'=>$cashOnDelivery['zip_b'],
                    'phone_b'=>$cashOnDelivery['phone_b'],
                    'orderid'=>$cashOnDelivery['orderid'],
                 
                    'name'=>$name,
                    'qty'=>$order_main['qty'],
                    'subtotal'=>$order_main['subtotal'],
                    
                     'shipping'=>$cashOnDelivery['country'],
                     'amount'=>$cashOnDelivery['amount'],
                     'method'=>$cashOnDelivery['method'],

                  ];
                  
                  
                    // dd($order_main);
         
                  
                      
                      Mail::to($request->email)->send(new TestMail($details,$multiple_items));
                      
                      Mail::to("everspice.ceylone@gmail.com")->send(new orderAdmin($details,$multiple_items));
                    
                    
                    
      
      
      
      
      
      
      
      
      
      
      
      
      
    //   email for user and admin
      
   
      
          
      
      
      
      
      
      
      
          Cart::clear();
      
      
    
  
  
        //   (new web_product_controller)->index();
     
         
         
         $product_data =  DB::table('products')
        ->join('category','products.cat_id','=','category.id')
        ->join('subcategory','products.subcat_id','=','subcategory.id')
        ->join('create_product_image_tables','products.id','=','create_product_image_tables.product_id')
        ->select('products.*','category.Cat_name','subcategory.sub_name','create_product_image_tables.product_main_img','create_product_image_tables.product_sub_img1','create_product_image_tables.product_sub_img2','create_product_image_tables.product_sub_img3','create_product_image_tables.product_sub_img4')
        ->get();
   
       $product_subs =DB::table('products')
      ->join('category','products.cat_id','=','category.id')
      ->groupBy('cat_id')
      ->select('category.Cat_name','category.id')
      ->get();  


    
    ////////////////////////////////// develop by chamil/////////////////////////////////
    
  
     
    //  session()->forget(['coupon_id','dis_qty']);
    //  session()->flush();
    DB::table('coupons')->where('id', $request->coupon_id)->decrement('coupon_limit',(int)$request->dis_qty);
     
    //  return (int)$request->dis_qty."  //   ".$request->coupon_id;
    
    
    
    
    
    
    
    
    
    
         // add aleart  
           
                     if(  $success>0  ){
       
                     
                       return view('web.thank_you_cod');
                      
                        }
                        
                      else{
       
                        //  return "not sucesss";
                         return view('web.web_product',compact('product_data'),compact('product_subs'));
                        Alert::warning('New Order', 'Order Failed');
       
                        }
                  
          //  add aleart 
          
          
          
     

         
        //   get order_details data and add to db 
    
           
           
           
           
           
           
           
           
           
        //   cash on delivery codes  from CashOnDeliveryData controller
           
              
          }
          
        
          
          else
          {
        
              
          
           //   check card payment or cash
          
        //   This is card way

    
    

        if(isset($request->checkbox)){
            
            // return "set";
            
                    $request->validate([
                 
            
            // shipping details
            'first_name' =>'required',
            'last_name' =>'required',
            
            'billing_address1' =>'required',
            'billing_address2' =>'required',
            
            'billing_address3' =>'required',
            'billing_address4' =>'required',
            
            'country_name' =>'required',
            'country' =>'required',
            
            'email' =>'required',
            'zipcode' =>'required',
            
            'phone' =>'required',
            'additional_information' =>'required',
            // shipping details
            
            

            // billing details
            'first_name_b' =>'required',
            // 'last_name_b' =>'required',
            
            'street_address_line_1_b' =>'required',
            // 'street_address_line_2_b' =>'required',
            
            'town_b' =>'required',
            'country_b' =>'required',
            
            'company_name_b' =>'required',
            'email_b' =>'required',
            
            // 'zip_b' =>'required|numeric',
            'phone_b' =>'required|numeric',
            
             // billing details
          
                                       ],
            [
                
            'first_name.required'=>'Please Fill First Name',
            'last_name.required'=>'Please Fill Last Name',
            
            'billing_address1.required'=>'Please Fill Street Address  Line One',
            'billing_address2.required'=>'Please Fill Street Address  Line Two',
            
            'billing_address3.required'=>'Please Fill Town',
            'billing_address4.required'=>'Please Fill Company Name',
            
            'country_name.required'=>'Please Select Shipping Country',
         
            
            'email.required'=>'Please Fill Email',
            'zipcode.required'=>'Please Fill Zipcode',
            // 'zipcode.numeric'=>'Please Fill With Valid Format',
            
            'phone.required'=>'Please Fill Phone Number',
            'additional_information.required'=>'Please Fill Additional Information',
         
         
         
         
         
            'first_name_b.required'=>'Please Fill First Name',
            // 'last_name_b.required'=>'Please Fill Last Name',
            
            'street_address_line_1_b.required'=>'Please Fill Street Address Line One',
            // 'street_address_line_2_b.required'=>'Please Fill Street Address Line Two',
         
            'town_b.required'=>'Please Fill Town',
            'country_b.required'=>'Please Fill Country',
            
            'company_name_b.required'=>'Please Fill Company Name',
            'email_b.required'=>'Please Fill Email',
            
            // 'zip_b.required'=>'Please Fill Zipcode',
            // 'zip_b.numeric'=>'Please Fill With Valid Format',
            
            'phone_b.required'=>'Please Fill Phone',
            'phone_b.numeric'=>'Please Fill With Valid Format',
            
         
            
            ]);
            
            
            
          
                
        }
        
        
        
        
        
        
        else{
            
        //   return "not set";    
        $request->validate([

       
            'first_name' =>'required',
            'last_name' =>'required',
            
            'billing_address1' =>'required',
            'billing_address2' =>'required',
            
            'billing_address3' =>'required',
            'billing_address4' =>'required',
            
            'country_name' =>'required',
            'country' =>'required',
            
            'email' =>'required',
            'zipcode' =>'required',
            
            'phone' =>'required',
            'additional_information' =>'required',
          
                                       ],
            [
                
            'first_name.required'=>'Please Fill First Name',
            'last_name.required'=>'Please Fill Last Name',
            
            'billing_address1.required'=>'Please Fill Street Address  Line One',
            'billing_address2.required'=>'Please Fill Street Address  Line Two',
            
            'billing_address3.required'=>'Please Fill Town',
            'billing_address4.required'=>'Please Fill Company Name',
            
            'country_name.required'=>'Please Select Shipping Country',
         
            
            'email.required'=>'Please Fill Email',
            'zipcode.required'=>'Please Fill Zipcode',
            // 'zipcode.numeric'=>'Format Wrong',
            
            'phone.required'=>'Please Fill Phone Number',
            'additional_information.required'=>'Please Fill Additional Information',
         
            
            ]);
            
      
          
            
        
            
        }
        
        
       


    //     $uid=0;
    //     $p_id=0;
    //     // code for coupn code
    //       if(isset($request->coupon_code)){
            
            
    //       $coupon_code= $request->coupon_code;
          
    //     //   check coupon is correct or not
          
    //          if (coupon::where('coupon_code', $coupon_code )->exists()) {
          
            
            
    //           $coupon_code_data =  coupon::where('coupon_code', $coupon_code )->get();
    //         //   dd($coupon_code_data);
              
    //         //   dd($coupon_code_data->Product_id);
    //           $product_id = $coupon_code_data[0]->Product_id;

              
    //         //  testing code 
            
            
             
    // //   $datas = Cart::items();
    //   $data = $this->loaddcart();
    //   $cartItems = json_decode( $data, true );
      

       
    //   foreach ( $cartItems[ 'original' ] as $i => $v ) {
     

    //           if($v['product'] == $product_id){
                   
    //              $uid = $v['uid'];
    //              $p_id = $v['product']; 
                   
    //           }


               
             
    //   }
       
       
            
            
            
            
            
            
            
            
            
    //           //  testing code 
              
             
             
    //           $coupon_discount =  $coupon_code_data[0]->coupon_discount;
            
            
            
            
    //       }
           
    //       else{
               
               
    //             alert()->error('Error','Coupon Code Not Found');

    //             return redirect()->back();
               
               
               
    //       }
           
           
    //       // check coupon is correct or not
           
           
           
           
            
            
    //     }
    //     else{
            
            
    //          $coupon_discount =  0;
    //     //   return "not null"; 
            
            
            
    //     }
        
          // code for coupn code
        
        
        
        
        
        
        
        
        
        
        
        
        
        if(isset($request->checkbox)){
            
          
        //   add data to not required fields 
        
        
        //start last_name_b
         
               if (!isset($request->last_name_b)) {
 
           $request->merge([
           'last_name_b' => "last name not filled",
           ]);
     
           }
           else{
              
           }
   
   
   
   
        //end last_name_b
        
        
            //start street_address_line_2_b
         
               if (!isset($request->street_address_line_2_b)) {
 
           $request->merge([
           'street_address_line_2_b' => "Address line 2 not filled",
           ]);
     
           }
           else{
              
           }
   
        //end street_address_line_2_b
        
        
                   //start street_address_line_2_b
         
               if (!isset($request->zip_b)) {
 
           $request->merge([
           'zip_b' => "Zipcode not filled",
           ]);
     
           }
           else{
              
           }
   
   
   
   
        //end street_address_line_2_b
        
        
        
        
        
        
        
        //  add data to not required fields 
          
          
            
             $purchase = array([
            "first_name"=>$request["first_name"],
            "last_name"=>$request["last_name"],
            "billing_address1"=>$request["billing_address1"],
            "billing_address2"=>$request["billing_address2"],
            "billing_address3"=>$request["billing_address3"],
            "billing_address4"=>$request["billing_address4"],
            "country_name"=>$request["country_name"],
            "country"=>$request["country"],
            "email"=>$request["email"],
            "zipcode"=>$request["zipcode"],
            "phone"=>$request["phone"],
            "additional_information"=>$request["additional_information"],
            "amount"=>$request["amount"],
            
            // billing address
            
            "first_name_b"=>$request["first_name_b"],
            "last_name_b"=>$request["last_name_b"],
            "street_address_line_1_b"=>$request["street_address_line_1_b"],
            "street_address_line_2_b"=>$request["street_address_line_2_b"],
            "town_b"=>$request["town_b"],
            "country_b"=>$request["country_b"],
            "company_name_b"=>$request["company_name_b"],
            "email_b"=>$request["email_b"],
            "zip_b"=>$request["zip_b"],
            "phone_b"=>$request["phone_b"],
            
            "user_id"=>$request["user_id"],
            
            
            // coupon code data
              "coupon_id"=>$request["coupon_id"],
                "dis_qty"=>$request["dis_qty"],
                
             
         
                
                 // coupon code data
            
            // "coupon_discount"=>$coupon_discount,
            // "uid"=>$uid,
            // "p_id"=>$p_id,
                // "amount1"=>"set",
            
            
            
            
             // billing address

             ]
          );
            
        }
        else{
            
            // echo "not set";
             $purchase = array([
            "first_name"=>$request["first_name"],
            "last_name"=>$request["last_name"],
            "billing_address1"=>$request["billing_address1"],
            "billing_address2"=>$request["billing_address2"],
            "billing_address3"=>$request["billing_address3"],
            "billing_address4"=>$request["billing_address4"],
            "country_name"=>$request["country_name"],
            "country"=>$request["country"],
            "email"=>$request["email"],
            "zipcode"=>$request["zipcode"],
            "phone"=>$request["phone"],
            "additional_information"=>$request["additional_information"],
            "amount"=>$request["amount"],
            
                    
            
            
            
            
                // billing address
            
            "first_name_b"=>$request["first_name"],
            "last_name_b"=>$request["last_name"],
            "street_address_line_1_b"=>$request["billing_address1"],
            "street_address_line_2_b"=>$request["billing_address2"],
            "town_b"=>$request["billing_address3"],
            "country_b"=>$request["country_name"],
            "company_name_b"=>$request["billing_address4"],
            "email_b"=>$request["email"],
            "zip_b"=>$request["zipcode"],
            "phone_b"=>$request["phone"],
            "user_id"=>$request["user_id"],
            
            
      
             // coupon code data
              "coupon_id"=>$request["coupon_id"],
                "dis_qty"=>$request["dis_qty"],
                
    
                
           
                
                 // coupon code data
            
            
                //  "amount1"=>"not set",
             // billing address
            
            //  "coupon_discount"=>$coupon_discount,
            //  "uid"=>$uid,
            //  "p_id"=>$p_id,
             ]
          );
            
        }

        
        // return $request;
        
        
        //  $request->validate([

            
        //     'first_name' =>'required|max:20',
        //     'last_name' =>'required|max:20',
        //     'billing_address1' =>'required|max:20',
        //     'billing_address2' =>'required|max:20',
        //     'billing_address3' =>'required|max:20',
        //     'billing_address4' =>'required|max:20',
        //     // 'country'=>'required|max:20',
        //     'email'=>'required|max:25',
        //     'zipcode'=>'required|max:20',
        //     'phone'=>'required|max:15',
        //     'additional_information'=>'required|max:200'
            

        // ]);
        
        
    
        
        //     $purchase = array([
        //     "first_name"=>$request["first_name"],
        //     "last_name"=>$request["last_name"],
        //     "billing_address1"=>$request["billing_address1"],
        //     "billing_address2"=>$request["billing_address2"],
        //     "billing_address3"=>$request["billing_address3"],
        //     "billing_address4"=>$request["billing_address4"],
        //     "country_name"=>$request["country_name"],
        //     "country"=>$request["country"],
        //     "email"=>$request["email"],
        //     "zipcode"=>$request["zipcode"],
        //     "phone"=>$request["phone"],
        //     "additional_information"=>$request["additional_information"],
        //     "amount"=>$request["amount"],

        //      ]
        //   );
        
        
        
        
        
        // dd($purchase);
        
        
        
        
        // dd($purchase);
        
        
        $csrf =  $request["_token"];
        
        // return $csrf;
        
         return view('web.directpayHome',['purchase'=>$purchase , 'csrf'=>$csrf ]);
         
      }
      
     
      
      }
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
          public function loaddcart() {
        $items = Cart::items();

        //    return   $items;
        return json_encode( $items );
    }
      
      
      
      
      
      
      
     
    // start add payment fail data to db
    
    
    
    public function add_error_details(Request $request){
        
        
        // $failed_reason = new fail_payment;
        
           fail_payment::create([
  
                "amount"=>$request->amount,
            "billing_address1"=>$request->billing_address1,
            "billing_address2"=>$request->billing_address2,
            
            "billing_address3"=>$request->billing_address3,
            "billing_address4"=>$request->billing_address4,
            "country_name"=>$request->country_name,
            
            "email"=>$request->email,
            "first_name"=>$request->first_name,
            "last_name"=>$request->last_name,
            
            "phone"=>$request->phone,
            "reason"=>$request->reason,
            "zipcode"=>$request->zipcode,

       ]);
        
        // $failed_reason =[
            
            
        //     "amount"=>$request->amount,
        //     "billing_address1"=>$request->billing_address1,
        //     "billing_address2"=>$request->billing_address2,
            
        //     "billing_address3"=>$request->billing_address3,
        //     "billing_address4"=>$request->billing_address4,
        //     "country_name"=>$request->country_name,
            
        //     "email"=>$request->email,
        //     "first_name"=>$request->first_name,
        //     "last_name"=>$request->last_name,
            
        //     "phone"=>$request->phone,
        //     "reason"=>$request->reason,
        //     "zipcode"=>$request->zipcode,
            
         
            
            
        //     ];
            
            
            
            
            
            
//   $failed_reason->save();
        
        
    //   return $failed_reason;
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
      // end add payment fail data to db
      
      
      
      
      
      
      
     
      
   
      public function add_order_details(Request $request){
     
          
          
        // dd($request);
          
            $dataOrder = [
                
                    'orderid' => date( 'ymdhis' ),
                    'additional_information' => $request->additional_information,
                    'amount' => $request->amount,
                    'billing_address1'=>$request->billing_address1,
                    'billing_address2'=>$request->billing_address2,
                    'billing_address3'=>$request->billing_address3,
                    'billing_address4'=>$request->billing_address4,
                    'country_name'=>$request->country_name,
                    'email'=>$request->email,
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,
                    'phone'=>$request->phone,
                    'zipcode'=>$request->zipcode,
                    'created_at'=> date("Y-m-d H:i:s", strtotime('now')),
                    'country'=>$request->country,
                    
                    'user_id'=>$request->user_id,
                    
                    // billing details
                    
                    'first_name_b'=>$request->first_name_b,
                    'last_name_b'=>$request->last_name_b,
                    'street_address_line_1_b'=>$request->street_address_line_1_b,
                    'street_address_line_2_b'=>$request->street_address_line_2_b,
                    
                    'town_b'=>$request->town_b,
                    'country_b'=>$request->country_b,
                    'company_name_b'=>$request->company_name_b,
                    'email_b'=>$request->email_b,
                    
                    'zip_b'=>$request->zip_b,
                    'phone_b'=>$request->phone_b,
                    'order_status'=>'inprogress',
                    'method'=>'Card'
         
                     // billing details

                      ];
                      
                      
                    //   $first_name_mail=$request->first_name;
                //   $order_id =  $dataOrder->orderid;
                      
                      
                //           $details =[

                // 'first_name' =>$request->first_name,
                // 'last_name' =>$request->last_name,
                // // 'body' =>'this is fro testing'
                // 'billing_address1' =>$request->billing_address1,
                // 'billing_address2' =>$request->billing_address2,
                // 'billing_address3' =>$request->billing_address3,
                // 'billing_address4' =>$request->billing_address4,

                // 'zipcode' =>$request->zipcode,
                // 'country_name' =>$request->country_name,
                // 'phone' =>$request->phone,
                // 'email' =>$request->email,
                
                
                
                //   'first_name_b'=>$request->first_name_b,
                //     'last_name_b'=>$request->last_name_b,
                //     'street_address_line_1_b'=>$request->street_address_line_1_b,
                //     'street_address_line_2_b'=>$request->street_address_line_2_b,
                    
                //     'town_b'=>$request->town_b,
                //     'country_b'=>$request->country_b,
                //     'company_name_b'=>$request->company_name_b,
                //     'email_b'=>$request->email_b,
                    
                //     'zip_b'=>$request->zip_b,
                //     'phone_b'=>$request->phone_b,
                //     'orderid'=>$dataOrder['orderid']
                 


                //   ];
                      
                //       Mail::to($request->email)->send(new TestMail($details));
                      
                      
                      
                   
             
        
            
                //   DB::table('orders')->insert($dataOrder);
                 //   $lastId = DB::table('orders')->insertGetId();
                
                //   $last = DB::table('orders')->latest("id")->first();
  
                     $isInserted = DB::table('orders')->insertGetId( $dataOrder );
                     
                     
                //   $last = DB::table('orders')->orderBy('id','desc')->first();
            
                    //  return $isInserted;
           
            //   $uid = $request->uid;
            //   $coupon_discount = $request->coupon_discount;
            //   $p_id = $request->p_id;
          
                // if($request->uid>0){
                    
                //     $data = $this->loadcarts($uid,$coupon_discount); 
                //     $success ="should be updated";
                    
                // }
                
                // else{
                    
                //     $data = $this->loadcart(); 
                //      $success ="should not be updated";
                    
                // }
      
      
                  
                  $data = $this->loadcart();
                  
                  
                    // $data = Cart::items();
                  
                //   $dis =22;
                      
                  $cartItems = json_decode( $data, true );
                 
                 
                //  delete this 
                   
                //   $multiple_items= [];
       
                //   foreach ( $cartItems[ 'original' ] as $i => $v ) {
     
                        
                     
                //         $name = $v[ 'name' ];
                   
                //         $order_main = array(
                        
                //         'product_name' => $v[ 'name' ],
                //         'product'=> $v[ 'product' ],
                //         'qty'=> $v[ 'qty' ],
                //         'subtotal'=> $v[ 'subtotal' ],
                //         'discount'=> $v[ 'discount' ] ,
                //         'order_id'=> $lastInsert ,
                     
                        
                        
                        
                        
                //     );
                    
                //     array_push($multiple_items, $order_main);
                    
                    //  delete this 
      

                         $multiple_items= [];
                  foreach ( $cartItems[ 'original' ] as $i => $v ) {
     
                   
                     $pro_discount = DB::table('products')->where('id',$v[ 'product' ])->value('discount');
                   
                        $name = $v[ 'name' ];
                   
                    $order_main = array(
                        
                        'product_name' => $v[ 'name' ],
                        'product'=> $v[ 'product' ],
                        'qty'=> $v[ 'qty' ],
                        'subtotal'=> $v[ 'subtotal' ],
                        'discount'=> $v[ 'discount' ] ,
                        'order_id'=> $isInserted ,
                        // 'coupon_discount'=>2  ,
                          'product_discount'=> $pro_discount ,
                        
                        
                        
                        
                    );
                    array_push($multiple_items, $order_main);
                    
                    DB::table('orders_details')->insert($order_main);
                    
                    
                    
                    
                  }
                    
                    
                             
                          $details =[

                'first_name' =>$request->first_name,
                'last_name' =>$request->last_name,
          
                'billing_address1' =>$request->billing_address1,
                'billing_address2' =>$request->billing_address2,
                'billing_address3' =>$request->billing_address3,
                'billing_address4' =>$request->billing_address4,

                'zipcode' =>$request->zipcode,
                'country_name' =>$request->country_name,
                'phone' =>$request->phone,
                'email' =>$request->email,
                
                
                
                    'first_name_b'=>$request->first_name_b,
                    'last_name_b'=>$request->last_name_b,
                    'street_address_line_1_b'=>$request->street_address_line_1_b,
                    'street_address_line_2_b'=>$request->street_address_line_2_b,
                    
                    'town_b'=>$request->town_b,
                    'country_b'=>$request->country_b,
                    'company_name_b'=>$request->company_name_b,
                    'email_b'=>$request->email_b,
                    
                    'zip_b'=>$request->zip_b,
                    'phone_b'=>$request->phone_b,
                    'orderid'=>$dataOrder['orderid'],
                 
                    'name'=>$name,
                    'qty'=>$order_main['qty'],
                    'subtotal'=>$order_main['subtotal'],
                    
                    'shipping'=>$request->country,
                    'amount'=>$dataOrder['amount'],
                    'method'=>$dataOrder['method'],
                    

                  ];
                  
                  
                      
                      Mail::to($request->email)->send(new TestMail($details,$multiple_items ));
                      
                      Mail::to("everspice.ceylone@gmail.com")->send(new orderAdmin($details,$multiple_items ));
                    
                    
                    

             
    //   }
       
         
    
       
      
      
      
      
      
      
      
      
      
        DB::table('coupons')->where('id', $request->coupon_id)->decrement('coupon_limit',(int)$request->dis_qty);
      
      
      
      
      Cart::clear();
      
      
      
      return response($request);
     
      }  
      
          public function loadcarts($uid,$coupon_discount) {
    
           $discount = $coupon_discount;
           $uid = $uid;
           
        //   $cart = new Cart();
        //   $cart->update($uid, $discount);
          
        //   Cart::update($uid, $discount);
          
          $items = Cart::items();
        //   $items = Cart::info();


        //    return   $items;
        return json_encode( $items );
    }
    
              public function loadcart() {
    
        
           $items = Cart::items();

        //    return   $items;
        return json_encode( $items );
    }
    
    
    public function email(){
        
        
        return view('web.bill');
        
        
            $data = $this->loadcart();
                  
                  
                    // $data = Cart::items();
                  
                //   $dis =22;
                      
                  $cartItems = json_decode( $data, true );
            //   return   var_dump($cartItems);
        
                foreach ( $cartItems[ 'original' ] as $i => $v ) {
     
                        
                          $name = $v[ 'name' ];
                          $total = $v[ 'total' ];
                        // if($v['product']==$p_id){
                            
                        //   $dis = $coupon_discount;
                        // }
                        // else{
                            
                        // $dis = $coupon_discount;
                            
                        // }
                   
                    $order_main = array(
                        'name'=> $v[ 'name' ],
                        'product'=> $v[ 'product' ],
                        'qty'=> $v[ 'qty' ],
                        'subtotal'=> $v[ 'subtotal' ],
                        'discount'=> $v[ 'discount' ] ,
                        // 'order_id'=> $isInserted ,
                        // 'coupon_discount'=>2  ,
                        
                        
                        
                        
                    );
                    
                    
                    // return $cartItems;
                
                
                      
                             $dataOrder = [
                
                    'orderid' => date( 'ymdhis' )
                 
                                 ];
                                 
                          
                      
                          $details =[

                'first_name' =>"nadeesha",
                'last_name' =>"asdasd",
                // 'body' =>'this is fro testing'
                'billing_address1' =>"asdasd",
                'billing_address2' =>"asdasd",
                'billing_address3' =>"asdasd",
                'billing_address4' =>"asdasd",

                'zipcode' =>"asdasd",
                'country_name' =>"asdasd",
                'phone' =>"asdasd",
                'email' =>"asdasd",
                
                
                
                   'first_name_b'=>'first_name_b',
                    'last_name_b'=>'last_name_b',
                    'street_address_line_1_b'=>'street_address_line_1_b',
                    'street_address_line_2_b'=>'street_address_line_2_b',
                    
                    'town_b'=>'town_b',
                    'country_b'=>'country_b',
                    'company_name_b'=>'company_name_b',
                    'email_b'=>'email_b',
                    
                    'zip_b'=>'zip_b',
                    'phone_b'=>'phone_b',
                    'orderid'=>$dataOrder['orderid'],
                
                    'name'=>$order_main['name'],
                    'qty'=>$order_main['qty'],
                    'subtotal'=>$order_main['subtotal'],
                    'method'=>"cash",
                    'shipping'=>"shipping",
                    
                    'amount'=>"amount",
                    
                    
                    
                    // 'total'=>$order_main['total'],
                    // 'qty'=>$order_main['qty'],
                    // 'subtotal'=>$order_main['subtotal'],
                    // 'orderid'=>$dataOrder['orderid'],
                
                


                   ];
                   
                //   dd($details);
                      
                       Mail::to('jayathilaka221b@gmail.com')->send(new TestMail($details));
                       
                       return "send";
        
    }
      


}





     public function cashOnDelivery(){
         
         
         if(session()->has('auth_user_session_object')){
           
       
          $all = request()->session()->get('auth_user_session_object', '');
          $cid = $all->id;
          
      
       }
       
       else{
           
           $cid ="";
       }
         
         
         
         
         
         
         $shipping = shipping_price::all();
      
         return view('web.cashOnDelivery',compact('shipping','cid'));
         
         
      
         
         
         
         
     }
     
     
    public function CashOnDeliveryData(Request $request){
        
        
        // dd($request);
        
        
        
        
        // validate form
        
         if(isset($request->checkbox)){
            
            // return "set";
            
                    $request->validate([
                 
            
            // shipping details
            'first_name' =>'required',
            'last_name' =>'required',
            
            'billing_address1' =>'required',
            'billing_address2' =>'required',
            
            'billing_address3' =>'required',
            'billing_address4' =>'required',
            
            'country_name' =>'required',
            'country' =>'required',
            
            'email' =>'required',
            'zipcode' =>'required|numeric',
            
            'phone' =>'required',
            'additional_information' =>'required',
            // shipping details
            
            

            // billing details
            'first_name_b' =>'required',
            'last_name_b' =>'required',
            
            'street_address_line_1_b' =>'required',
            'street_address_line_2_b' =>'required',
            
            'town_b' =>'required',
            'country_b' =>'required',
            
            'company_name_b' =>'required',
            'email_b' =>'required',
            
            'zip_b' =>'required|numeric',
            'phone_b' =>'required|numeric',
            
             // billing details
          
                                       ],
            [
                
            'first_name.required'=>'Please Fill First Name',
            'last_name.required'=>'Please Fill Last Name',
            
            'billing_address1.required'=>'Please Fill Street Address  Line One',
            'billing_address2.required'=>'Please Fill Street Address  Line Two',
            
            'billing_address3.required'=>'Please Fill Town',
            'billing_address4.required'=>'Please Fill Company Name',
            
            'country_name.required'=>'Please Select Shipping Country',
         
            
            'email.required'=>'Please Fill Email',
            'zipcode.required'=>'Please Fill Zipcode',
            'zipcode.numeric'=>'Please Fill With Valid Format',
            
            'phone.required'=>'Please Fill Phone Number',
            'additional_information.required'=>'Please Fill Additional Information',
         
         
         
         
         
            'first_name_b.required'=>'Please Fill First Name',
            'last_name_b.required'=>'Please Fill Last Name',
            
            'street_address_line_1_b.required'=>'Please Fill Street Address Line One',
            'street_address_line_2_b.required'=>'Please Fill Street Address Line Two',
         
            'town_b.required'=>'Please Fill Town',
            'country_b.required'=>'Please Fill Country',
            
            'company_name_b.required'=>'Please Fill Company Name',
            'email_b.required'=>'Please Fill Email',
            
            'zip_b.required'=>'Please Fill Zipcode',
            'zip_b.numeric'=>'Please Fill With Valid Format',
            
            'phone_b.required'=>'Please Fill Phone',
            'phone_b.numeric'=>'Please Fill With Valid Format',
            
         
            
            ]);
            
            
            
          
                
        }
        
        else{
            
        //   return "not set";    
        $request->validate([

       
            'first_name' =>'required',
            'last_name' =>'required',
            
            'billing_address1' =>'required',
            'billing_address2' =>'required',
            
            'billing_address3' =>'required',
            'billing_address4' =>'required',
            
            'country_name' =>'required',
            'country' =>'required',
            
            'email' =>'required',
            'zipcode' =>'required|numeric',
            
            'phone' =>'required',
            'additional_information' =>'required',
          
                                       ],
            [
                
            'first_name.required'=>'Please Fill First Name',
            'last_name.required'=>'Please Fill Last Name',
            
            'billing_address1.required'=>'Please Fill Street Address  Line One',
            'billing_address2.required'=>'Please Fill Street Address  Line Two',
            
            'billing_address3.required'=>'Please Fill Town',
            'billing_address4.required'=>'Please Fill Company Name',
            
            'country_name.required'=>'Please Select Shipping Country',
         
            
            'email.required'=>'Please Fill Email',
            'zipcode.required'=>'Please Fill Zipcode',
            'zipcode.numeric'=>'Format Wrong',
            
            'phone.required'=>'Please Fill Phone Number',
            'additional_information.required'=>'Please Fill Additional Information',
         
            
            ]);
            
      
          
            
        
            
        }
        
        
        
        // end validation
        
  
          
        //   create variable that add data to order
          
               if(isset($request->checkbox)){
        
        
                 $cashOnDelivery = [
        
        
            //  $cashOnDelivery = array([
            "first_name"=>$request["first_name"],
            "last_name"=>$request["last_name"],
            "billing_address1"=>$request["billing_address1"],
            "billing_address2"=>$request["billing_address2"],
            "billing_address3"=>$request["billing_address3"],
            "billing_address4"=>$request["billing_address4"],
            "country_name"=>$request["country_name"],
            "country"=>$request["country"],
            "email"=>$request["email"],
            "zipcode"=>$request["zipcode"],
            "phone"=>$request["phone"],
            "additional_information"=>$request["additional_information"],
            "amount"=>$request["amount"],
            
            // billing address
            
            "first_name_b"=>$request["first_name_b"],
            "last_name_b"=>$request["last_name_b"],
            "street_address_line_1_b"=>$request["street_address_line_1_b"],
            "street_address_line_2_b"=>$request["street_address_line_2_b"],
            "town_b"=>$request["town_b"],
            "country_b"=>$request["country_b"],
            "company_name_b"=>$request["company_name_b"],
            "email_b"=>$request["email_b"],
            "zip_b"=>$request["zip_b"],
            "phone_b"=>$request["phone_b"],
            "user_id"=>$request["user_id"],
            
            
              'orderid' => date( 'ymdhis' ),
              'created_at'=> date("Y-m-d H:i:s", strtotime('now')),
              'order_status'=>'inprogress',
              'method'=>'Cash On Delivery'
         
             // billing address

                    // 'orderid' => date( 'ymdhis' ),
                    // 'additional_information' => $request->additional_information,
                    // 'amount' => $request->amount,
                    // 'billing_address1'=>$request->billing_address1,
                    // 'billing_address2'=>$request->billing_address2,
                    // 'billing_address3'=>$request->billing_address3,
                    // 'billing_address4'=>$request->billing_address4,
                    // 'country_name'=>$request->country_name,
                    // 'email'=>$request->email,
                    // 'first_name'=>$request->first_name,
                    // 'last_name'=>$request->last_name,
                    // 'phone'=>$request->phone,
                    // 'zipcode'=>$request->zipcode,
                    // 'created_at'=> date("Y-m-d H:i:s", strtotime('now')),
                    // 'country'=>$request->country,
                    
                    // 'user_id'=>$request->user_id,
                    
                  
                    
                    // 'first_name_b'=>$request->first_name_b,
                    // 'last_name_b'=>$request->last_name_b,
                    // 'street_address_line_1_b'=>$request->street_address_line_1_b,
                    // 'street_address_line_2_b'=>$request->street_address_line_2_b,
                    
                    // 'town_b'=>$request->town_b,
                    // 'country_b'=>$request->country_b,
                    // 'company_name_b'=>$request->company_name_b,
                    // 'email_b'=>$request->email_b,
                    
                    // 'zip_b'=>$request->zip_b,
                    // 'phone_b'=>$request->phone_b,
                    // 'order_status'=>'inprogress',
        
        //  ]
        //   );
          
          
          ];
          
          
            
        }
        else{
            
      
             $cashOnDelivery = [
            
            
            //  $cashOnDelivery = array([
            "first_name"=>$request["first_name"],
            "last_name"=>$request["last_name"],
            "billing_address1"=>$request["billing_address1"],
            "billing_address2"=>$request["billing_address2"],
            "billing_address3"=>$request["billing_address3"],
            "billing_address4"=>$request["billing_address4"],
            "country_name"=>$request["country_name"],
            "country"=>$request["country"],
            "email"=>$request["email"],
            "zipcode"=>$request["zipcode"],
            "phone"=>$request["phone"],
            "additional_information"=>$request["additional_information"],
            "amount"=>$request["amount"],
            
                    
            
            
            
            
                // billing address
            
            "first_name_b"=>$request["first_name"],
            "last_name_b"=>$request["last_name"],
            "street_address_line_1_b"=>$request["billing_address1"],
            "street_address_line_2_b"=>$request["billing_address2"],
            "town_b"=>$request["billing_address3"],
            "country_b"=>$request["country_name"],
            "company_name_b"=>$request["billing_address4"],
            "email_b"=>$request["email"],
            "zip_b"=>$request["zipcode"],
            "phone_b"=>$request["phone"],
            "user_id"=>$request["user_id"],
            
            
              'orderid' => date( 'ymdhis' ),
              'created_at'=> date("Y-m-d H:i:s", strtotime('now')),
              'order_status'=>'inprogress',
              'method'=>'Cash On Delivery'
            
       
        //      ]
        //   );
          
          ];
          
            
        }
          
          
          
           // end  create variable that add data to order
          
        //  var_dump($cashOnDelivery); 
        //  dd($cashOnDelivery);
 
         DB::table('orders')->insert($cashOnDelivery);
         
     
         
        
        $last2 = DB::table('orders')->orderBy('id','DESC')->first();
        
    //   DB::table('orders')->insertGetId($cashOnDelivery);
        
     
          $lastInsert = $last2->id;
          
        
        //   add data to db
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
        //  get order_details data and add to db 
         
         
         
                  $data = $this->loadcart();
                  
           
                      
                  $cartItems = json_decode( $data, true );
                 
      

       
                  foreach ( $cartItems[ 'original' ] as $i => $v ) {
     
                        
                     
                        $name = $v[ 'name' ];
                   
                        $order_main = array(
                        
                        'product'=> $v[ 'product' ],
                        'qty'=> $v[ 'qty' ],
                        'subtotal'=> $v[ 'subtotal' ],
                        'discount'=> $v[ 'discount' ] ,
                        'order_id'=> $lastInsert ,
                     
                        
                        
                        
                        
                    );
                    
                 $success =   DB::table('orders_details')->insert($order_main);
                 
             
                  
                  
            
                  
                  
                  
                  
                  
                  
             

             
    //   }
       
         
    
       
      }
      
      
      
      
    //   email for user and admin
      
      
                  
                 $details =[

          
                'first_name'=>$cashOnDelivery['first_name'],
            
                'last_name'=>$cashOnDelivery['last_name'],
          
                'billing_address1' =>$cashOnDelivery['billing_address1'],
                'billing_address2' =>$cashOnDelivery['billing_address2'],
                'billing_address3' =>$cashOnDelivery['billing_address3'],
                'billing_address4' =>$cashOnDelivery['billing_address4'],

                'zipcode' =>$cashOnDelivery['zipcode'],
                'country_name' =>$cashOnDelivery['country_name'],
                'phone' =>$cashOnDelivery['phone'],
                'email' =>$cashOnDelivery['email'],
                
                
                
                    'first_name_b'=>$cashOnDelivery['first_name_b'],
                    'last_name_b'=>$cashOnDelivery['last_name_b'],
                    'street_address_line_1_b'=>$cashOnDelivery['street_address_line_1_b'],
                    'street_address_line_2_b'=>$cashOnDelivery['street_address_line_2_b'],
                    
                    'town_b'=>$cashOnDelivery['town_b'],
                    'country_b'=>$cashOnDelivery['country_b'],
                    'company_name_b'=>$cashOnDelivery['company_name_b'],
                    'email_b'=>$cashOnDelivery['email_b'],
                    
                    'zip_b'=>$cashOnDelivery['zip_b'],
                    'phone_b'=>$cashOnDelivery['phone_b'],
                    'orderid'=>$cashOnDelivery['orderid'],
                 
                    'name'=>$name,
                    'qty'=>$order_main['qty'],
                    'subtotal'=>$order_main['subtotal'],
                    
                     'shipping'=>$cashOnDelivery['country'],
                     'amount'=>$cashOnDelivery['amount'],
                     'method'=>$cashOnDelivery['method'],

                  ];
                  
                  
                //   dd($details);
         
                  
                      
                      Mail::to($request->email)->send(new TestMail($details));
                      
                      Mail::to("everspice.ceylone@gmail.com")->send(new orderAdmin($details));
                    
                    
                    
      
      
      
      
      
      
      
      
      
      
      
      
      
    //   email for user and admin
      
   
      
           // add aleart  
           
                     if(  $success>0  ){
       
                        // return "sucesss";
                       Alert::success('New Order', 'Order Placed Successfully');
                      
                        }
                        
                      else{
       
                        //  return "not sucesss";
                        Alert::warning('New Order', 'Order Failed');
       
                        }
                  
          //  add aleart     
      
      
      
      
      
      
      
          Cart::clear();
      
      
    
  
  
        //   (new web_product_controller)->index();
     
         
         
         $product_data =  DB::table('products')
        ->join('category','products.cat_id','=','category.id')
        ->join('subcategory','products.subcat_id','=','subcategory.id')
        ->join('create_product_image_tables','products.id','=','create_product_image_tables.product_id')
        ->select('products.*','category.Cat_name','subcategory.sub_name','create_product_image_tables.product_main_img','create_product_image_tables.product_sub_img1','create_product_image_tables.product_sub_img2','create_product_image_tables.product_sub_img3','create_product_image_tables.product_sub_img4')
        ->get();
   
       $product_subs =DB::table('products')
      ->join('category','products.cat_id','=','category.id')
      ->groupBy('cat_id')
      ->select('category.Cat_name','category.id')
      ->get();  


    
    ////////////////////////////////// develop by chamil/////////////////////////////////
    
  
     
    //  session()->forget(['coupon_id','dis_qty']);
    //  session()->flush();
    DB::table('coupons')->where('id', $request->coupon_id)->decrement('coupon_limit',(int)$request->dis_qty);
     
    //  return (int)$request->dis_qty."  //   ".$request->coupon_id;
      return view('web.web_product',compact('product_data'),compact('product_subs'));

         
        //   get order_details data and add to db 
    
    

        
    }
    
    
    public function mail_test(){
        
      
   
        
    }










}
