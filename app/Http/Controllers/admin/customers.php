<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class customers extends Controller
{
    
    public function index(){
        
        
             $users = DB::table('users')->get();
             
            //  dd($users);
       
           
            
            //   return view('admin.dashboard',compact('users'));   
        
             return view('admin.customer',compact('users'));
        
    }
    
    
}
