<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class Homecontroller extends Controller
{
    public function index(){
        $allproducts=product::latest()->get();


        return view('user.home', compact('allproducts'));
    }
}
