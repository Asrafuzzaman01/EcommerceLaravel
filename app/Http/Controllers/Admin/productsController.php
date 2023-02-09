<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function addproduct(){

        return view('admin.addproduct');
    }

    public function allproduct(){

        return view('admin.allproduct');
    }

    





}
