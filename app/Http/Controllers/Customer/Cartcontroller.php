<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\City;
use App\Models\Product;
use Session;
use Auth;

class Cartcontroller extends Controller
{
    public function index()
    {
        $carts = Cart::where('session_id',Session::getId())->get();
        return view('cart',compact('carts'));
    }
   public function addToCart(Request $request)
    {
        $product = Product::where('id',$request->product_id)->first();
        $cart = Cart::where('session_id',Session::getId())
        ->where('product_id',$request->product_id)
        //->where('seller_id',$product->seller_id)
        ->first();

        if ($cart) {
            $cart->quantity = $cart->quantity+1;
        }
        else{
            $cart = new Cart;
            $cart->session_id = Session::getId();
            if (!Auth::check()) {
                $cart->user_id = 0;
            }
            else{
                $cart->user_id = Auth::user()->id;
				 $cartss=Cart::where('user_id',Auth::id())->where('seller_id',"!=",$product->seller_id)->delete();
            }
            $cart->product_id = $request->product_id;
            $cart->quantity = empty($request->quantity) ? 1 : $request->quantity;
            $cart->seller_id = $product->seller_id;
        }
        $cart->save();
		 $carts=Cart::where('session_id',Session::getId())->where('seller_id',"!=",$product->seller_id)->delete();
        $cart_counter = Cart::where('session_id',Session::getId())->count('id');
        $htmlCart=view('includes.mini-cart')->render();
        return response()->json(['msg' => 'Product Added successfully, If Products of Different vendor exist in your cart then it will be removed automatically','cart_counter' => $cart_counter,'carts'=>$htmlCart]);
    }

    public function increaseCartQuantity(Request $request)
    {
        $cart = Cart::where('id',$request->cart_id)->first();
        if ($cart) {
           $cart->quantity = $cart->quantity+1;
           $cart->save();
        }
        return response()->json(['msg' => 'Product Added successfully']);
    }

    public function decreaseCartQuantity(Request $request)
    {
       $cart = Cart::where('id',$request->cart_id)->first();
       if ($cart) {
        if ($cart->quantity == 1) {
            $cart->delete();
        }
        else{
            $cart->quantity = $cart->quantity-1;
            $cart->save();
        }
       }
       return response()->json(['msg' => 'Product Added successfully']);
    }

    public function deleteCartQuantity(Request $request)
    {
        $cart = Cart::where('id',$request->cart_id)->first();
        $cart->delete();
        return response()->json(['msg' => 'Cart Deleted successfully']);
    }

    public function checkout(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login?return=checkout');
        }
        else{
            $cities = City::get();
            $carts = Cart::where('session_id',Session::getId())->get();
            $get_cart = Cart::where('session_id',Session::getId())->first();
            return view('checkout',compact('carts','cities','get_cart'));
        }
        
    }
}
