<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;


class admin_loginController extends Controller
{
    
  public function index(){
    
    
    return view('admin.admin_login');
     
  }

  public function check_login(Request $request){

//     $admin = admin::where(['username'=>$request->username , 'password'=>$request->password])->count();
    
//     if($admin>0){
   
//     $admin_data = admin::where(['username'=>$request->username , 'password'=>$request->password])->get();
//     session(['admin_data'=>$admin_data]);
//     return redirect('/admin/dashboard');



//   }else{
//     return redirect('/admin/login')->with('login_error','check username and password');


//   }


    $admin = admin::where(['username'=>$request->username ])->value('password');
    
    if (password_verify($request->password, $admin)) {
        
  
        session(['admin_data'=>'admin_data']);
        return redirect('/admin/dashboard');

    
    } 
    
    else {
        
          return redirect('/admin/login')->with('login_error','Check Username and Password');
 
     }





    
    
    // dd($admin);
    
//     if($admin>0){
   
//     $admin_data = admin::where(['username'=>$request->username , 'password'=>$request->password])->get();
//     session(['admin_data'=>$admin_data]);
//     return redirect('/admin/dashboard');



//   }else{
//     return redirect('/admin/login')->with('login_error','check username and password');


//   }











  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function logout(){
   
    
    session()->forget(['admin_data']);
    return redirect('/admin/login');
  }





}
