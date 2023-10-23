<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutFrontController extends Controller
{
    public function showAboutPage(){

        return view('web.about');
    }

    public function showOurHistry(){

        return view('web.our_history');
    }
    
    public function showOurTeam(){

        return view('web.our_team');
    }
}
