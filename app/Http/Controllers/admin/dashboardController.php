<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    
   public function index(){



   
  
            
             $orders = DB::table('orders')->where('order_status','inprogress')
            ->get();
            
             $deliverd_orders = DB::table('orders')->where('order_status','delivered')
             ->get();
            
             $users = DB::table('users')
            ->get();
            
            
             $revanue = DB::table('orders')->select('amount')
            ->get();
            
            // calculate total revanue
            
             $total_revanue = 0;
            
             foreach ($revanue as $single) {
                 
                 
                $price = $single->amount;
                
                $total_revanue = $total_revanue + $price;
             
             
             }
             
          
           
           
           //   data for pie chart
             
           
             $cod = DB::table('orders')->where('method','Cash On Delivery')
            ->count();
            
             $card = DB::table('orders')->where('method','Card')
            ->count();
            
           
            
             //   data for area chart
             
          
             
              
             $amounts = DB::table('orders')->selectRaw('sum(amount) as amount,created_at')
             ->groupBy('created_at')
             ->get();
             
           
            
           
             $labels =[];
             $data =[];
             
             
             
          
             
             foreach($amounts as $amount  ){
                 
             
         
                 
                 array_push($labels,$amount->created_at);
                 array_push($data,$amount->amount );
                 
                 
             }
           
             //   data for area chart 
         
            
        //   dd($data);
        
           
             
             
             
            
            
             return view('admin.dashboard',compact('orders','users','total_revanue','deliverd_orders','cod','card','labels','data'));   
   
   
    //  return view('admin.dashboard');

   }


}
