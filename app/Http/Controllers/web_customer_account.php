<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class web_customer_account extends Controller
{
    public function index(){

        view('web.customer_account');
    }
}
