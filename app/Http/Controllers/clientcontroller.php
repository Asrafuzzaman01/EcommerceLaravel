<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\categories;
use App\Models\order;
use App\Models\product;
use App\Models\shippinginfo;
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
public function Checkouts(){
    $userid=Auth::id();

    $cartitem=Cart::where('user_id', $userid)->get();
    $shippingaddress=shippinginfo::where('user_id',$userid )->first();



    return view('user.checkout', compact('cartitem', 'shippingaddress'));


}


   public function ShippingAddress(){

    return view ('user.shippingaddress');

   }
   public function addShippingAddress( Request $request){
    $request->validate([
        'phone_number' => 'required:shippinginfos',
        'city_name' => 'required',
        'postal_code' => 'required',

    ]);
    shippinginfo::insert([
        'user_id'=>Auth::id(),
        'phone_number'=> $request->phone_number,
        'city_name'=> $request->city_name,
        'postal_code'=> $request->postal_code,

    ]);

    return redirect()->route('checkout');

   }

   public function Addplaceorder(){


    $userid=Auth::id();
    $shippingaddress=shippinginfo::where('user_id',$userid )->first();
    $cartitem=Cart::where('user_id', $userid)->get();

    foreach($cartitem as $items ){
        order::insert([

         'user_id'=>$userid,
         'shipping_phonenumber'=> $shippingaddress->phone_number,
         'shipping_city'=>$shippingaddress->city_name,
        'shipping_postalcode'=>$shippingaddress->postal_code,
        'product_name'=>$items->product_id,
        'quantity'=>$items->quantity,
        'total_price'=>$items->price,


        ]);
        $id=$items->id;
        cart::findOrFail($id)->delete();



    }
    shippinginfo::where('user_id',$userid )->first()->delete();



    return redirect()->route('pendingorder')->with('message', 'your order has ben placed  Successfully!');



   }


    public function Userprofile(){

        return view ('user.userprofile');
    }


    public function Pendingorders(){
        $pending_orders=order::where('status', 'pending')->latest()->get();


        return view('user.pendingorder', compact('pending_orders'));
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
