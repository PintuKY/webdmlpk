<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Order;
use App\Models\Review;
use App\Models\OrderList;
use App\Models\SellerService;
use App\Models\Seller;
use App\Models\Service;
use App\Models\Product;
use App\Models\User;
use Auth;

class CustomerController extends Controller
{
    public function myaccount()
    {
        $cities = City::get();
        return view('customer.myaccount',compact('cities'));
    }
public function rating(Request $request)
    {
        $user = Auth::user();
        if($user) {
            $order = Order::where('user_id', $user->id)->where('seller_id', $request->seller_id)->first();
            if ($order) {
                $review = Review::where('user_id', $user->id)->where('seller_id', $request->seller_id)->first();
                if ($review) {
                    $review->rating = $request->rating;
                    $review->review = $request->review;
                    $review->save();
                } else {
                    $rating = new Review();
                    $rating->rating = $request->rating;
                    $rating->seller_id = $request->seller_id;
                    $rating->user_id = Auth::id();
					$rating->review = $request->review;
                    $rating->save();
                }
                return back()->with('flash_success', 'Thank You For Your Review');

            } else {
                return back()->with('flash_failure', 'Sorry, You Do Not Have Access To This Feature');
            }
        }else{
            return back()->with('flash_failure', 'Please Login To Continue');
        }
    }
    public function changePassword(Request $request)
    {
        auth::user()->password = bcrypt($request->password);
        auth::user()->save();
        return response()->json(['msg' => 'Password updated successfully']);
    }
public function serviceCheckout(Request $request,$id)
    {
        if (!Auth::check()) {
            return redirect('login?return=serviceCheckout');
        }
        else{
            $sellerService=SellerService::find($id);
			$seller=Seller::find($sellerService->seller_id);
			$service=Service::find($seller->service_parent_id);
            $cities = City::get();
           // return $sellerService;
            return view('serviceCheckout',compact('sellerService','cities','service'));
        }

    }
	
	public function pickUpCheckout(Request $request,$id)
    {
        if (!Auth::check()) {
            return redirect('login?return=service.pickupdrop.serviceCheckout');
        }
        else{
            $sellerService=SellerService::find($id);
            $cities = City::get();
            // return $sellerService;
            return view('service.pickupdrop.serviceCheckout',compact('sellerService','cities'));
        }

    }
    public function updateProfile(Request $request)
    {
        //dd($_REQUEST);
        $user = User::find(Auth::user()->id);
        $this->validate($request, [
            "email" => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'name' => 'required',
            'phone' => 'required|unique:users,email,'.$user->id,
            'city_id' => 'required',
            'pincode' => 'required',
            'landmark' => 'required',
            'address' => 'required'
        ]);
        
        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->city_id = $request->city_id;
        $user->pincode = $request->pincode;
        $user->landmark = $request->landmark;
        $user->address = $request->address;
        $user->save();
        return back()->with('flash_success', 'Profile Updated');
    }
	public function  orderDetails($order_id){

         $order = Order::where('order_id', $order_id)->first();
        $service=SellerService::find($order->sellerService_id);
        if($service){
            return view('customer.orderdetail', compact('order','service'));
        }else {
            $list = OrderList::where('order_id', $order->id)->get();
            foreach ($list as $item) {
                $product = Product::find($item->product_id);
                $item->product_id = $product->name;
            }
            return view('customer.orderdetail', compact('order', 'list'));
        }
        
    }
}
