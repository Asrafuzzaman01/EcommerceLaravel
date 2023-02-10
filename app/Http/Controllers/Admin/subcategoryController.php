<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categories;

use App\Models\subcategory;
use Illuminate\Http\Request;


class subcategoryController extends Controller
{
    public function addsubcat(){
        $categories=categories::latest()->get();
        return view('admin.addsubcategory', compact('categories'));
    }



    public function allsubcat(){

        $allsubcategory=subcategory::latest()->get();

        return view('admin.allsubcategory', compact('allsubcategory'));
    }






    public function storesubcategory(Request $request){

        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id'=>'required',

        ]);
        $category_id=$request->category_id;
      $categoryname=categories::where('id', $category_id)->value('category_name');

      subcategory::insert([

        'subcategory_name'=> $request->subcategory_name,
        'slug'=>strtolower(str_replace('','-',$request->category_name)),
        'category_id' => $category_id,
        'category_name' => $categoryname

      ]);

      categories::where('id', $category_id)->increment('subcategory_count',1);

      return redirect()->route('allsubcategory')->with('message', ' Sub Category Added Successfully!');





    }

    public function Editesubcat($id){

        $editesubcategoryinfo=subcategory::findOrFail($id);

        return view('admin.editesubcategory',compact('editesubcategoryinfo'));


    }




    public function Updatesubcategory(Request $request){

        $subcategory_id=$request->subcategory_id;




        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',

        ]);

        subcategory::findOrFail($subcategory_id)->update([
            'subcategory_name'=> $request->subcategory_name,
            'slug'=>strtolower(str_replace('','-',$request->subcategory_name))



        ]);
        return redirect()->route('allsubcategory')->with('message', ' sub category Updated Successfully!');

    }

    public function Deletcsubategory($id){

        subcategory::findOrFail($id)->delete();

        return redirect()->route('allsubcategory' )->with('message', 'sub category deleted successfully');


     }






}
