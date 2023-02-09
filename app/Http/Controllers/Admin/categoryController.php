<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categories;

class categoryController extends Controller
{
    public function addcategory(){

        return view('admin.addcategory');
    }

    public function allcategory(){

        return view('admin.allcategory');
    }
    public function storecategory(Request $request){

        $request->validate([
            'category_name' => 'required|unique:categories',
            
        ]);

        categories::insert([
            'category_name'=> $request->category_name,
            'slug'=>strtolower(str_replace('','-',$request->category_name))


        ]);
        return redirect()->route('allcategory')->with('message', 'New category added Successfully!');

    }
}
