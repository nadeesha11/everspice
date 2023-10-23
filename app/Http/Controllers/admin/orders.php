<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\admin_orders;



class orders extends Controller
{
    
    
    public function index(){
        
        // working
        //   $orders =  DB::table('orders_details')
        //  ->join('orders','orders_details.order_id','=','orders.id')
        //  ->select('orders_details.*','orders.*','orders.id AS details_id','orders.created_at as orderdate')
        //  ->get();
         
         
        //  test
          $orders =  DB::table('orders')
         ->get();
         
         
         
         
         
    
   
        
        //   dd($orders);
          
        // return view('admin.orders',compact('orders'));
        //   $new_orders =  json_encode($orders);
        
           return view('admin.orders', ['orders' => $orders]);
        
        
        
        
    }
    
    public function invoice($id){
        
        // return $id;
        
          $invoice =  DB::table('orders_details')
         ->join('orders','orders_details.order_id','=','orders.id')
         ->join('products','orders_details.product','=','products.id')
         ->select('orders_details.*','orders.*','orders.id AS details_id','products.*','orders.created_at as orderdate')
          ->where('orders.id' , $id)
         ->get();
         
        //  dd($invoice);
        
                  return view('admin.invoice',['invoice' => $invoice]);
        
    }
    
   
    
    public function updateOrderStatus( Request $request){
        
         DB::table('orders')->where('id', $request->id)->update(array('order_status' => $request->order_status)); 
         
         
        return redirect('/admin/orders');
    }
    
    
    public function inprogressOrders() {
        
        //     $orders =  DB::table('orders_details')
        //  ->join('orders','orders_details.order_id','=','orders.id')
        //  ->select('orders_details.*','orders.*','orders.id AS details_id')
        //  ->where('orders.order_status','=','inprogress')
        //  ->get();
         
         
           $orders =  DB::table('orders')
           ->where('order_status','=','inprogress')
           ->get();
         
   
        //  dd($orders);
   
      
        
           return view('admin.orders-inprogress', ['orders' => $orders]);
    }
    
    public function shippedOrders(){
        
        //  $orders =  DB::table('orders_details')
        //  ->join('orders','orders_details.order_id','=','orders.id')
        //  ->select('orders_details.*','orders.*','orders.id AS details_id')
        //  ->where('orders.order_status','=','shipped')
        //  ->get();
         
         
           $orders =  DB::table('orders')
           ->where('order_status','=','shipped')
           ->get();
   
        //  dd($orders);
   
        // return view('admin.orders',compact('orders'));
        
           return view('admin.orders-shipped', ['orders' => $orders]);
        
    }
    
    public function deliveredOrders(){
        //  $orders =  DB::table('orders_details')
        //  ->join('orders','orders_details.order_id','=','orders.id')
        //  ->select('orders_details.*','orders.*','orders.id AS details_id')
        //  ->where('orders.order_status','=','delivered')
        //  ->get();
         
         
            $orders =  DB::table('orders')
           ->where('order_status','=','delivered')
           ->get();
   
        //  dd($orders);
   
        // return view('admin.orders',compact('orders'));
        
           return view('admin.orders-delivered', ['orders' => $orders]);
    }
    
    
    
  public function  order_ajax(Request $request){
      
      
      

      
          $orders =  DB::table('orders_details')
         ->join('orders','orders_details.order_id','=','orders.id')
         ->select('orders_details.*','orders.*','orders.id AS details_id')
         ->get();
      
   
      
    return json_encode($orders);
    
  
      
      
  }
  
  
  
  
  
  
   
  public function getResult(Request $request){
       $datas = admin_orders::select("first_name")     
                     ->where("first_name","LIKE","%{$request->value}%")
                     ->pluck("first_name");                  
        return response()->json($datas);  
  }
  
  
  
  
  
   public function getOrderid(Request $request){
       
       
        $data = admin_orders::select("orderid")     
                     ->where("orderid","LIKE","%{$request->value}%")
                     ->pluck("orderid"); 
                     
                     
        return response()->json($data);  
        
        //   return response()->json("nadeeshss");
        
  }
  
  
     
  public function getPrice(Request $request){
      
      $price = admin_orders::select("amount")     
                     ->where("amount","LIKE","%{$request->value}%")
                     ->pluck("amount"); 
                     
                     
        //   $data = admin_orders::select("orderid")     
        //              ->where("orderid","LIKE","%{$request->value}%")
        //              ->pluck("orderid");              
                     
        return response()->json($price);  
        
        
  }
  
  public function getLastName(Request $request){
      
      
          $lastname = admin_orders::select("last_name")     
                     ->where("last_name","LIKE","%{$request->value}%")
                     ->pluck("last_name"); 
                     
                     
                  
                     
        return response()->json($lastname);  
      
      
      
      
  }
  
 
  
  public function filterData(Request $request){
      


            // dd($request);


      if(   isset($request->OrderDateFrom)   AND   isset($request->OrderDateTo)  AND  isset($request->Status)  ){
          
           
           $from = $request->OrderDateFrom;
           $to = $request->OrderDateTo;
           $status = $request->Status;
           
        //   $orders =  DB::table('orders_details')
        //  ->join('orders','orders_details.order_id','=','orders.id')
        //  ->select('orders_details.*','orders.*','orders.id AS details_id')
        //  ->whereBetween('orders.created_at',[$from,$to])
        //  ->where('orders.order_status',$status)
        //  ->get();
        
        
            $orders =  DB::table('orders')
         ->whereBetween('created_at',[$from,$to])
         ->where('order_status',$status)
         ->get();
            
         
            
     
         
         
           return view('admin.filterdOrders', ['orders' => $orders]); 
          
        
      }
      
      
      
         elseif(   isset($request->OrderDateFrom)   AND   isset($request->OrderDateTo) ){
          
           
           $from = $request->OrderDateFrom;
           $to = $request->OrderDateTo;
        
           
        //   $orders =  DB::table('orders_details')
        //  ->join('orders','orders_details.order_id','=','orders.id')
        //  ->select('orders_details.*','orders.*','orders.id AS details_id')
        //  ->whereBetween('orders.created_at',[$from,$to])
       
        //  ->get();
         
         
         
         
          $orders =  DB::table('orders')
           ->whereBetween('created_at',[$from,$to])
         ->get();
         
         
         
         
         
         
           return view('admin.filterdOrders', ['orders' => $orders]); 
          
        
      }
      
      
      
 
    
    
       
      elseif(    isset($request->Customer) and   isset($request->LastName)     ){
          
        
        //   $orders =  DB::table('orders_details')
        //  ->join('orders','orders_details.order_id','=','orders.id')
        //  ->select('orders_details.*','orders.*','orders.id AS details_id')
        //  ->where( 'first_name',$request->Customer )
        //  ->where( 'last_name',$request->LastName )
        //  ->get();
         
         
         
              $orders =  DB::table('orders')
                 ->where( 'first_name',$request->Customer )
         ->where( 'last_name',$request->LastName )
         ->get();
         
         
         
         
           return view('admin.filterdOrders', ['orders' => $orders]); 
          
          
        //   and 'last_name',$request->LastName
        
        
        

        
        
        
        
        
          
      }       
    
   
   
   
      elseif(    isset($request->Customer)      ){
          
        
        //   $orders =  DB::table('orders_details')
        //  ->join('orders','orders_details.order_id','=','orders.id')
        //  ->select('orders_details.*','orders.*','orders.id AS details_id')
        //  ->where('first_name',$request->Customer)
        //  ->get();
         
         
              $orders =  DB::table('orders')
               ->where('first_name',$request->Customer)
              ->get();
         
         
         
         
           return view('admin.filterdOrders', ['orders' => $orders]); 
          
          
          
      }
      
      elseif(  isset($request->LastName)   ){
          
        //   $orders =  DB::table('orders_details')
        //  ->join('orders','orders_details.order_id','=','orders.id')
        //  ->select('orders_details.*','orders.*','orders.id AS details_id')
        //  ->where('last_name',$request->LastName)
        //  ->get();
         
         
             $orders =  DB::table('orders')
              ->where('last_name',$request->LastName)
              ->get();
         
           return view('admin.filterdOrders', ['orders' => $orders]); 
          
          
      }
      
      
      
      
      
      elseif(  isset($request->Order_Id)   ){
          
        //   $orders =  DB::table('orders_details')
        //  ->join('orders','orders_details.order_id','=','orders.id')
        //  ->select('orders_details.*','orders.*','orders.id AS details_id')
        //  ->where('orderid',$request->Order_Id)
        //  ->get();
        
        
            $orders =  DB::table('orders')
                 ->where('orderid',$request->Order_Id)
              ->get();
         
           return view('admin.filterdOrders', ['orders' => $orders]); 
          
          
      }
      
      
      
       elseif(  isset($request->Status)   ){
          
        //   $orders =  DB::table('orders_details')
        //  ->join('orders','orders_details.order_id','=','orders.id')
        //  ->select('orders_details.*','orders.*','orders.id AS details_id')
        //  ->where('order_status',$request->Status)
        //  ->get();
         
         
            $orders =  DB::table('orders')
                 ->where('order_status',$request->Status)
              ->get();
         
         
         
         
           return view('admin.filterdOrders', ['orders' => $orders]); 
          
          
      }
      
      
      
      else{
          
          
        //   $orders =  DB::table('orders_details')
        //  ->join('orders','orders_details.order_id','=','orders.id')
        //  ->select('orders_details.*','orders.*','orders.id AS details_id')
        //  ->get();
        
         return redirect()->back();
      
          
      }
      
      
          
    
          
      
 
      
      
      
      
      
         

         
         
       
     
      
  }
  
  
  
  
    
    
    
}
