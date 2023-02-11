<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\product;
use App\Models\subcategory;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function addproduct(){

        $category=categories::latest()->get();
        $subcategory=subcategory::latest()->get();

        return view('admin.addproduct', compact('category','subcategory'));
    }

    public function allproduct(){

        return view('admin.allproduct');
    }

    public function Storeproduct(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'productquantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_category_id' => 'required',
            'propduct_subcategorey_id' => 'required',
            'product_img' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',




        ]);

        $image=$request->file('product_img');
        $image_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('uploadimg'),$image_name);
        $imgurl='uploadimg/'.$image_name;

        $category_id=$request->product_category_id;
        $subcategory_id=$request->propduct_subcategorey_id;

        $categoryname=categories::where('id', $category_id)->value('category_name');
        $subcategoryname=subcategory::where('id', $subcategory_id)->value('subcategory_name');



        product::insert([
            'product_name'=> $request->product_name,
            'product_short_des'=> $request->product_short_des,
            'product_long_des'=> $request->product_long_des,
            'price'=> $request->price,
            'product_category_name'=>$categoryname,
            'product_subcategory_name'=>$subcategoryname,

            'product_category_id'=> $request->product_category_id,
            'propduct_subcategorey_id'=> $request->propduct_subcategorey_id,
            'product_img'=>$imgurl,
            'productquantity'=> $request->productquantity,
            'slug'=>strtolower(str_replace('','-',$request->product_name)),




        ]);

        categories::where('id', $category_id)->increment('product_count',1);
        subcategory::where('id', $subcategory_id)->increment('product_count',1);

      return redirect()->route('allproduct')->with('message', '  New Product Added Successfully!');

    }




}
