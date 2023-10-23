<?php

/*
* Author:Yasiru Liyanage
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Str;

use App\Http\Controllers\Controller;
use DB;
use Cart;
use App\Http\Controllers\checkoutController;
use RealRashid\SweetAlert\Facades\Alert;




class  CustomerLoginController extends Controller
{



    //function to display customer login page
    public function getCustomerLogin(){

        return view('web.customer_login');
    }
    
    //function for handle custome login page.
    public function postCustomerLogin(Request $request){
        
        //validation the form request 
        $request->validate([
            'email' => 'required',
            'password'=>'required|min:8',
        ],
        ['email.required'=>'Please Enter Your email',
        'password.required' => 'Please Enter Your Password',
        'password.min' => 'Password should have at least 8 characters',
        
        ]);

    

       $credentials = $request->only('email','password');
       
       $user = User::where('email',$request->get('email'))->first();

      if(Auth::guard('customer')->attempt($credentials)) {
          
         //dd(Auth::user());
         
         Session::put('auth_user_session_object',$user);
         
        //  get customer id
        
          if(session()->has('auth_user_session_object')){
          $all = request()->session()->get('auth_user_session_object', '');
          $cid = $all->id;
       
          }
        
        // get customer id
         
         
         
        // start check cart count and redirect to checkout page
         
                $data = $this->checkcart();
                $cartItems = json_decode( $data, true );
      
            
              $check = 0;
       
                foreach ( $cartItems[ 'original' ] as $i => $v ) {
     
                      
                     
                     $check =    $v[ 'qty' ];
                      
           
                   
                }
                
                // dd($check);
         

               if($check > 0){
                   
                     return redirect('verfity_for_checkout');
                    // return "checked";
                    
                    // $checkoutController = new checkoutController;
                    
                    // $checkoutController->check_login_for_checkout();
                    //   Session::put('cart_has_items',"cart_has_items");
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                //   return "this should redirected to checkout";
               }
                else{
                    
                        return redirect()->intended('/customer/account')->with('message','Signed in!');
                    //   return "redirected to account";
                    
                    
                    
                }
         
         
         
         
         
         
         
         
         
         
        // start check cart count and redirect checkout page
        
        
        
        
        
        
        
         
        // return redirect()->intended('/customer/account')->with('message','Signed in!');
        
        
       }
       
       
       
       
      
    //   return "fail";
    
    
       return redirect('/customer/login')->with('message','Login details are not valid');
          
        
    }
    
    
    
    
    
    
            public function checkcart() {
    
        
            $items = Cart::items();

    
            return json_encode( $items );
                                         }
    
    
    
    
    
    
    
    
    

    //function to display customer register page
    public function getCustomerSignUp(){

        return view('web.customer_register');
    }

    //function to handle customer registration process
    public function postCustomerSignUp(Request $request){

        $request->validate([
            
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:users',
            'phone'=>'required|numeric',
            'username'=>'required|unique:users',
            'password'=>'required|confirmed|min:8',
            'password_confirmation'=>'required',
          
        ],[
        'first_name.required'=>'Please Enter your first name',
        'last_name.required' => 'Please Enter Your last name',
        'email.required' => 'Please enter your email',
        'email.email'=>'Please Enter Valid Email',
        'phone.required'=>'Please Enter Phone number',
        'phone.numeric'=>'Please Enter Valid Phone number',
        'username.required'=>'Please Enter User name',
        //'agree.required'=>'Please Check the agreement checkbox'
    ]);
        
        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $email = $request->get('email');
        $password = Hash::make($request->get('password'));
        $phone = $request->get('phone');
        $username = $request->get('username');
        $user = User::create([  
            'first_name' => $first_name,
            'last_name'=> $last_name,
            'email' => $email,
            'password'=> $password,
            'username'=> $username,
            'phone'=>$phone,
            'role'=>'customer',
            'way'=>'general'
        ]);
        
        Session::put('auth_user_session_object',$user);
       
        return redirect("/customer/account");


    }

    public function signOut(){
        Session::flush();
        Auth::guard('customer')->logout();

        return redirect('/customer/login');
    }

    public function getCustomerAccount(){
        $user_id = Auth::user()->id;
        // dd($user_id);
        
        $orders =  DB::table('orders_details')
         ->join('orders','orders_details.order_id','=','orders.id')
         ->join('products','orders_details.product','=','products.id')
         ->select('orders_details.*','orders.*','orders.id AS details_id','products.*','orders.created_at as orderdate')
          ->where('orders.user_id',$user_id)
         ->get();
         
         
        //  dd($orders);
         
        $user =  DB::table('users')
        ->where('id',$user_id)
         ->get();
        //  dd($user);
        return view('web.customer_account',compact(['user','orders']));
    }

    
    public function googleLogin(){

        // $clientId="237015228687-krqfjnrqe581b5c4d2bt00eoq33ocf9s.apps.googleusercontent.com";
        // $clientSecret = "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";
        // $redirectUrl = "/google-call-back";
        

        // $config = new \SocialiteProviders\Manager\Config($clientId,$clientSecret,$redirectUrl);

        // $url = Socialite::driver('google')->setConfig($config)->stateless()->redirect()->getTargetUrl();

        // return response()->json([
        //   'url' => $url
        // ],200);
        // // return ;
        
                return Socialite::driver('google')->stateless()->redirect();


    }
    
    public function googleCallBack(){
        
        $googleuser = Socialite::driver('google')->stateless()->user();
    //dd($googleuser);
    
        
           if(User::where('email',$googleuser->email)->exists()){

           $user = User::where('email',$googleuser->email)->first();
           
           
           
           
          // dd($user);

            
             $useremail = $user->email;
             
            // dd($useremail);
            
             $userpassword = $user->password;
             $userid = $user->id;
             
          
         //$credentials = [''=>$useremail,$userpassword];

       if(Auth::guard('customer')->loginUsingId($userid)) {
         //if(Auth::guard('customer')->login($user,true)) {
            //dd($useremail);
         
            Session::put('auth_user_session_object', $user);
        return redirect('/customer/account')->with('message','Signed in!');
      
       }

       //return redirect('/customer/login')->with('message','Login details are not valid');



        }else{

           //create user  by azure email id and username
            $email = $googleuser->email;
            $username = $googleuser->user['given_name'];
          //  $avatar = $googleuser->avatar;


            //dd($avatar);

            $password = Hash::make(Str::random(8));
            
            //dd($googleuser->user['given_name']);

            $user = User::create([
            'first_name' => $googleuser->user['given_name'],
            'last_name'=>$googleuser->user['family_name'],
            'username'=>$username,
            'email' => $googleuser->email,
            'google_id' => $googleuser->id,
            'password'=>$password,
            'role'=>'customer',
            
            
        ]);
        
           //dd($user);

            //get created user info

            $inserteduser = User::where('email',$googleuser->email)->get();

            //dd($inserteduser[0]->id);
            $userid = $inserteduser[0]->id;
            $email = $inserteduser[0]->email;
            $password = $inserteduser[0]->password;
            
            

      
          // dd(Auth::attempt(['username' => $email, 'password' => $password]));
          
       
       if(Auth::guard('customer')->loginUsingId($userid)) {
           
         Session::put('auth_user_session_object', $inserteduser);
        return redirect('/customer/account')->with('message','Signed in!');
        
           
       }


      

      //creating access and refresh token for authentication using outh

    


        }
        
        // return $response;
    }
    
    public function fbLogin(){
        
          return Socialite::driver('facebook')->stateless()->redirect();
        
    }
    
    
   public function customAttempt($email, $password) {
    $user = User::find('email', $email);
    if ($user) {
        // Authorize user.
        Auth::login($user, true);
    }
}













     public function changeDetails(Request $request){
         
         
        //  dd($request);
         
         if(isset($request->socialLogins)  ){
             
             
             return "social logins not created yet";
             
             
         }
         
         else{
             
             
             
             if( isset($request->current_password)   || isset($request->new_password) || isset($request->password_confirmation)){
             
            //  validate 
        
            $request->validate([

       
            'first_name' =>'required',
            'last_name' =>'required',
            'username' =>'required',
            'current_password' =>'required',
            'new_password' =>'required|min:8',
            'password_confirmation' =>'required|same:new_password',
            
            
            
                                       ],
            [
                
            'first_name.required'=>'Please Fill First Name',
            'last_name.required'=>'Please Fill Last Name',
            'username.required'=>'Please Fill User Name',
            'current_password.required'=>'Current password is required',
            'new_password.required'=>'New password is required',
            'new_password.min'=>'New password should have at least 8 characters',
            'password_confirmation.required'=>'Confirm password is required',
      
            
            ]);
            //  validate 
             
             
            //  check current password is matched with db password
             
              $user = User::where('email', request('email'))->first();
              
            //   dd($user);
              
              $check =  Hash::check(request('current_password'), $user->password);
             
              if($check){
                  
                  
               $password = Hash::make($request->get('new_password'));      
                  
           
                  
              $change_password =  User::where('id',$request->id)->update([ 'password'=>$password, 'first_name'=>$request->first_name , 'last_name'=>$request->last_name ,  'username'=>$request->last_name  ]);
                  
              
            //   password and other things changed
            if($change_password){
                
               Alert::success('Details change', 'Successful'); 
               return redirect()->back();
                
            }
            else{
                
                  Alert::success('Details change', 'Successful'); 
                  return redirect()->back();
                
                
            }
            
            
            
            
            
            
            //   password and other things changed
              
              
                  
                  
              }
              else{
                  
                 
             return back()
            ->withInput()
            ->withErrors([
            'current_password' => 'This password not matched with your old password '
            
            
            ]);
                  
                  
              }
            
             //  check current password is matched with db password
             
             
             
             
             
         
             
        
             
         }
         
         else{
             
            //  change other details only
            
            
            
            
            // validate details
            
              $request->validate([

       
            'first_name' =>'required',
            'last_name' =>'required',
            'username' =>'required',
           
                                       ],
            [
                
            'first_name.required'=>'Please Fill First Name',
            'last_name.required'=>'Please Fill Last Name',
             'username.required'=>'Please Fill User Name',
      
            
            ]);
            
            
          $success =  User::where('id',$request->id)->update(['first_name'=>$request->first_name , 'last_name'=>$request->last_name ,  'username'=>$request->last_name  ]);
            
           
          if($success){
              
               Alert::success('Details change', 'Details Changed Succesfully'); 
               return redirect()->back();
              
          }
          else{
              
              Alert::error('Details change', 'Details Change Failed'); 
               return redirect()->back();
              
          }
            
      
            
            
            
            
            
            
            
            
            // validate details
            
            
            
            
            
            
            
            //  change other details only
             
             
         }
         
         
         
         
         
         
         
     
         
         
     }



}




}
