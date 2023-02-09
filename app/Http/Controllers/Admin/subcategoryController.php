<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class subcategoryController extends Controller
{
    public function addsubcat(){

        return view('admin.addsubcategory');
    }

    public function allsubcat(){

        return view('admin.allsubcategory');
    }
}
