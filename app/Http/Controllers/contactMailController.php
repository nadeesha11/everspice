<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use RealRashid\SweetAlert\Facades\Alert;



class contactMailController extends Controller
{
    
    public function contact_mail(Request $request){
        
        
        
        

        
        
        
        // validate
        
        
          $request->validate([
                 
     
            'customer_name' =>'required',
            'email' =>'required',
            'number' =>'required|numeric',
            // 'subject' =>'required',
            'message' =>'required',
            
         
                
                 
              
          
                            ],
                            
                            [
          
            
            
            'customer_name.required' =>'Customer name is required',
            'email.required' =>'Email is required',
            'number.required' =>'Number is required',
            'number.numeric' =>'Contact number is invalid',
            // 'subject.required' =>'Subject is required',
            'message.required' =>'Message is required',
           
            
         
            
            ]);
            
            
                
        
       
        
        // validate
        
        
        
        // add contact details to variable
        
           $details =[

          
                   "message"=>$request["message"],
                   "subject"=>$request["subject"],
                   "number"=>$request["number"],
                   "email"=>$request["email"],
                   "customer_name"=>$request["customer_name"],

                  ];
                  
                 
        
        
        //   add contact details to variable
        
        
              
    //  Mail::to("everspice.ceylone@gmail.com")->send(new ContactMail($details));
    
    if(   Mail::to("everspice.ceylone@gmail.com")->send(new ContactMail($details))    ){
        
        
        
          Alert::success('Contact Mail', 'Email sent');
        
        
        
    }
    else{
        
        //   Alert::success('Item Added', 'Item Added Succesfully');
           Alert::error('Contact Mail', 'Email not sent');

        
    }
        
         
        
        // return view('web.contact');
        
        return view('web.contact');
        
        
        
        
        
        
        
    }
    
    
    
    
    
    
}
