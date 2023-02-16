<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\categories;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class clientcontroller extends Controller
{
    public function Category($id){
      $category=categories::findOrFail($id);

      $products=product::where('product_category_id',$id)->latest()->get();

        return view ('user.category', compact('category','products'));
    }


    public function Singleproduct($id){

        $products=product::findOrFail($id);
        $subcat_id=product::where('id',$id)->value('propduct_subcategorey_id');
       $related_products=product::where('propduct_subcategorey_id', $subcat_id )->latest()->get();

        return view ('user.product', compact('products', 'related_products'));
    }

    public function Addtocart(){
        $userid=Auth::id();

        $cartitem=Cart::where('user_id', $userid)->get();

        return view ('user.addtocart', compact('cartitem'));
    }

    public function proAddtocart(Request $request){

            $product_price=$request->price;
            $Product_quantity=$request->quantity;

$price=$Product_quantity * $product_price;

Cart::insert([
    'product_id'=>$request->product_id,
    'user_id'=>Auth::id(),
    'quantity'=>$request->quantity,
      'price'=>$price

]);
return redirect()->route('addtocart')->with('message', 'your item  added to cart  Successfully!');
    }

   public function productitemremove($id){

    Cart::findOrFail($id)->delete();
    return redirect()->route('addtocart')->with('message', 'your item  Removed from   cart  Successfully!');


   }






    public function Userprofile(){

        return view ('user.userprofile');
    }

    public function Pendingorders(){

        return view('user.pendingorder');
    }

    public function History(){

        return view('user.history');
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
