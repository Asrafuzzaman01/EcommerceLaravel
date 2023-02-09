<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function addcategory(){

        return view('admin.addcategory');
    }

    public function allcategory(){

        return view('admin.allcategory');
    }
}
