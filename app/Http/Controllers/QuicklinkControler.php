<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuicklinkControler extends Controller
{
    public function privacyPolicy(){

        return view('web.privacy_policy');

    }

    public function returnPolicy(){
        return view('web.return_policy');
    }

    public function termsandConditions(){
        return view('web.terms_and_condtiton');
    }

    public function evfoodPolicy(){
        return view('web.everspice_food_policy');
    }
    
    public function privacyStatement(){
        return view('web.privacy_statement');
    }
}
