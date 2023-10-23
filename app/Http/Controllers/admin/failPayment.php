<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\fail_payment;

class failPayment extends Controller
{
    
    
    public function index(){
        
        $Fail_payments = fail_payment::get();
        
        // dd($Fail_payments);
        
        return view('admin.failPayment',compact('Fail_payments'));
        
        
        
    }
    
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
