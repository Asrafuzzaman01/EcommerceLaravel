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

        $category=categories::latest()->get();

        return view('admin.allcategory', compact('category'));

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
     
     public function Editecategory($id)
     {
        $editecat= categories::findOrFail($id);

        return view('admin.editecategory', compact('editecat'));

     }

     public function updatecategory(Request $request){

        $category_id=$request->category_id;




        $request->validate([
            'category_name' => 'required|unique:categories',
            
        ]);

        categories::findOrFail($category_id)->update([
            'category_name'=> $request->category_name,
            'slug'=>strtolower(str_replace('','-',$request->category_name))



        ]);
        return redirect()->route('allcategory')->with('message', ' category Updated Successfully!');


     }

     public function Deletcategory($id){

        categories::findOrFail($id)->delete();

        return redirect()->route('allcategory' )->with('message', 'category deleted successfully');


     }


     





}
