<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;

class clientcontroller extends Controller
{
    public function Category($id){
       $category=categories::findOrFail($id);

        return view ('user.category', compact('category'));
    }


    public function Singleproduct(){

        return view ('user.product');
    }

    public function Addtocart(){

        return view ('user.addtocart');
    }


    public function Userprofile(){

        return view ('user.userprofile');
    }


    public function Checkout(){

        return view ('user.checkout');
    }

    public function Newreleas_product(){

        return view ('user.newrelease');
    }

    public function Todayesdeals(){

        return view ('user.todayesdeals');
    }

    public function Customerservice(){

        return view ('user.customerservice');
    }


}
