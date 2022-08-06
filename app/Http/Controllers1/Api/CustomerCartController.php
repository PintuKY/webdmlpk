<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\City;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerCartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id',Auth::id())->get();
		foreach($carts as $cart){
		$product=Product::find($cart->product_id);
			 $category = Category::find($product->category_id);
            $product->category_id = $category;
            $product->image = url('/') . "/public/uploads/images/" . $product->image;
			$cart->product_id=$product;
			
		}
        return response()->json(['message'=>'cart list','success'=>true,'statusCode'=>200,'carts'=>$carts]);
    }
	    public function cartCount()
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();
        $count = Count($carts);
        return response()->json(['message' => 'Cart Count', 'success' => true, 'statusCode' => 200, 'count' => $count]);
    }
	public function cartQuantityUpdate(Request $request)
    {
        $cart = Cart::find($request->cart_id);
        if ($cart) {

            $cart->quantity = $request->quantity;
            $cart->save();
            
           
        }
        return response()->json(['message' => 'Cart Updated', 'success' => true, 'statusCode' => 200]);
    }
    public function addToCart(Request $request)
    {
        $product = Product::where('id',$request->product_id)->first();
        $cart = Cart::where('user_id',Auth::id())
            ->where('product_id',$request->product_id)
            //->where('seller_id',$product->seller_id)
            ->first();

        if ($cart) {
            $cart->quantity = $cart->quantity+1;
        }
        else{
            $cart = new Cart;
            $cart->user_id = Auth::id();
            $cart->product_id = $request->product_id;
            $cart->quantity = empty($request->quantity) ? 1 : $request->quantity;
            $cart->seller_id = $product->seller_id;
        }
        $cart->save();
		 $carts=Cart::where('user_id',Auth::id())->where('seller_id','!=',$product->seller_id)->delete();
        $cart_counter = Cart::where('user_id',Auth::id())->count('id');
        return response()->json(['message' => 'Product Added successfully','success'=>true,'statusCode'=>200,'cart'=>$cart,'cart_counter' => $cart_counter]);
    }

    public function increaseCartQuantity(Request $request)
    {
        $cart = Cart::where('id',$request->cart_id)->first();
        if ($cart) {
            $cart->quantity = $cart->quantity+1;
            $cart->save();
        }
        return response()->json(['message' => 'Product Added successfully','success'=>true,'statusCode'=>200,'cart'=>$cart]);
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
        return response()->json(['message' => 'Product Removed successfully','success'=>true,'statusCode'=>200]);
    }

    public function deleteCart($id)
    {
        $cart = Cart::where('id',$id)->first();
        $cart->delete();
        return response()->json(['message' => 'Cart Deleted successfully','success'=>true,'statusCode'=>200]);
    }


}
