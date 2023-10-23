<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use DB;

class PDFController extends Controller
{
    
    
       public function generatePDF($id)
    {
        //  return $id;
        
          $invoice =  DB::table('orders_details')
         ->join('orders','orders_details.order_id','=','orders.id')
         ->join('products','orders_details.product','=','products.id')
         ->select('orders_details.*','orders.*','orders.id AS details_id','products.*','orders.created_at as orderdate')
          ->where('orders.id' , $id)
         ->get();
         
        //  dd($invoice);
         
        //   $invoice =  DB::table('orders')
        //  ->join('orders','orders_details.order_id','=','orders.id')
        //  ->join('products','orders_details.product','=','products.id')
        //  ->select('orders_details.*','orders.*','orders.id AS details_id','products.*')
        //   ->where('orders.id' , $id)
        //  ->get();
         
        // dd($invoice);
         
        
        $data = [
             
             'qty' => $invoice[0]->qty,
            'updated_at' => $invoice[0]->orderdate,
           
            'orderid' => $invoice[0]->orderid,
            
              'billing_address1' => $invoice[0]->billing_address1,
              'billing_address2' => $invoice[0]->billing_address2,
              'billing_address3' => $invoice[0]->billing_address3,
              'billing_address4' => $invoice[0]->billing_address4,
              
              'first_name' => $invoice[0]->first_name,
              'last_name' => $invoice[0]->last_name,
              
              
              'zipcode' => $invoice[0]->zipcode,
              'country' => $invoice[0]->country,
              
              'phone' => $invoice[0]->phone,
              'email' => $invoice[0]->email,
              
              
              //   'country' => $invoice[0]->country,
              'amount' => $invoice[0]->amount,
              
              'product_name' => $invoice[0]->product_name,
              'price'=> $invoice[0]->price,
              
              'discount'=> $invoice[0]->discount,
              'country_name'=>$invoice[0]->country_name,
              'subtotal'=>$invoice[0]->subtotal,
              
              
            //   variables for billing details
              'first_name_b'=>$invoice[0]->first_name_b,
              'last_name_b'=>$invoice[0]->last_name_b,
              'street_address_line_1_b'=>$invoice[0]->street_address_line_1_b,
              
              'street_address_line_2_b'=>$invoice[0]->street_address_line_2_b,
              'town_b'=>$invoice[0]->town_b,
              'country_b'=>$invoice[0]->country_b,
              
               'company_name_b'=>$invoice[0]->company_name_b,
               'email_b'=>$invoice[0]->email_b,
               'zip_b'=>$invoice[0]->zip_b,
            
               'phone_b'=>$invoice[0]->phone_b,
               
                'method'=>$invoice[0]->method,
               
               
               
                'new'=>$invoice,
               
            
            //   variables for billing details
              
              
              
            
        ];
        
        
      
        // dd($data);
        
          
        $pdf = PDF::loadView('admin.myPDF',$data);
        
   
        
        
        return $pdf->download( $invoice[0]->orderid.'.pdf');
    }
    
    
    
    
    
    
    
    
    
    
    
    
}
