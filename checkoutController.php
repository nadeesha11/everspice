<?php

namespace App\Http\Controllers;

use App\Models\shipping_price;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;


class checkoutController extends Controller
{
    
   public function index(){
 
    return "this is checkout page";

    
   }


     public function check_login_for_checkout(){
   
        if(session()->has('customer_data'))
     {
      $shipping = shipping_price::all();
      // dd( $shipping);
        return view('web.display_checkout',compact('shipping'));

     }
     else{

        {
           
            // return redirect()->back() ->with('alert', 'you are not logged in. please login');
              return redirect('web/customer/login/check')->with('alert_checkout', 'you are not logged in. please login for checkout');

         }
     }


    }

}
