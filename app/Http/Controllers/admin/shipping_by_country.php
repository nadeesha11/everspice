<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\shipping_price;
use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;



class shipping_by_country extends Controller
{
    public function index(){
          
        $shipping_details = DB::table('shipping_prices')->get();
        // return view('admin.shipping_by_country', compact('shipping_details'))->with('add_country_shipping', 'new shipping detail added');
        return view('admin.shipping_by_country',compact('shipping_details'));
    }

    public function add(Request $request){






    $products = array([

        "country_name"=>$request["country_name"],
        "shipping_price"=>$request["shipping_price"],
      

    ]);

  $result =   DB::table('shipping_prices')->insert($products);
  
//   dd($result);
  
  
  if($result){
      
       Alert::success('Shipping Price', 'Shipping Price Added Succesfully');
      
      
  }
  else{
      
        Alert::warning('Shipping Price', 'Shipping Price Added Unsuccesful');
      
      
  }
  
  
  
     return redirect()->back();
  
    //  $shipping_details = DB::table('shipping_prices')->get();
  
    //   return view('admin.shipping_by_country', compact('shipping_details'))->with('add_country_shipping', 'new shipping detail added');

    }

    public function delete(Request $request){

    $result =    DB::table('shipping_prices')->where('id', $request->id)->delete();
    
    
    if($result){
        
         Alert::success('Shipping Price', 'Shipping Price Delete Succesful');
        
    } 
    else{
        
         Alert::warning('Shipping Price', 'Shipping Price Delete Unsuccesfully');
        
    }
    
       
        
        
        // $shipping_details = DB::table('shipping_prices')->get();
        // return view('admin.shipping_by_country', compact('shipping_details'))->with('add_country_shipping', 'new shipping detail added');
        
        
         return redirect()->back();
       

    }

    public function edit(Request $request){

        // dd($request);

        $result =   DB::table('shipping_prices')->where('id', $request->id_delete)->update(array('country_name' => $request->country, 'shipping_price' => $request->shipping )); 
  
  
    
    
       if($result){
           
              Alert::success('Shipping Price', 'Shipping Price Edit Succesful');
           
       }
       else{
           
            Alert::warning('Shipping Price', 'Shipping Price Edit Unsuccesful');
           
       }
    
    

        // $shipping_details = shipping_price::get();
      
        // return view('admin.shipping_by_country', compact('shipping_details'))->with('add_country_shipping', 'new shipping detail added');
        
        
        return redirect()->back();

    }
    
    
    
    
    
    
    
    
    
    
    
    
    

}
