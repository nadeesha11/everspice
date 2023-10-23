<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ContactFrontController extends Controller
{
    //function for display front contact page 

    public function showContactPage(){


        return view('web.contact');


    }

    public function sendContactMessage(Request $request){

     
      


    }
}
