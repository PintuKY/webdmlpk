<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SellerAccountActivateMail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;
use App\Models\Order;
use App\Models\City;
use App\Models\Cart;
use App\Models\Review;
use App\Models\Bank;
use App\Models\Quote;
use App\Models\Hotel;
use App\Models\PickUpDrop;
use App\Models\OrderRoom;
use App\Models\Room;
use App\Models\Product;
use App\Models\OrderList;
use App\Models\Wallet;
use App\Models\Category;
use App\Models\SellerService;
use Illuminate\Support\Facades\Mail;

class SellerController extends Controller
{
    public function index()
    {
        $data = User::where('role_id',2)->orderBy('id','desc')->paginate(40);
        return view('admin.sellers.index',compact('data'));
    }

    public function edit($id)
    {
        $data = User::where('role_id',2)->where('id',$id)->first();
        if ($data) {
			
		$cities = City::orderBy('name','asc')->get();
            return view('admin.sellers.edit',compact('data','cities'));
        }
        else{
            abort(404);
        }
    }

    public function show($id)
    {
        $data = Seller::where('user_id',$id)->first();
		if($data){
		$categories=Category::where('seller_id',$data->id)->get();
		$services=SellerService::where('seller_id',$data->id)->get();
        return view('admin.sellers.show',compact('data','categories','services'));}else{
		return back()->with('flash_danger','Please Delete this seller');
		}
    }

    public function update(Request $request,$id)
    {
		$user_email = User::where('email', $request->email)->where('id', '!=', $id)->first();
        if ($user_email) {
            return back()->with('flash_error', 'Email Already Taken');
        }
		
        $data = Seller::where('user_id',$id)->first();
		if($data){
		$user=User::find($id);
		$user->status = $request->status;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->city_id = $request->city_id;
		$user->save();
        $data->status = $request->status;
        $data->show_mobile_email = $request->show_mobile_email;
        $data->save();
		if($request->status=="Active"){
        	Mail::to($user->email)->send(new SellerAccountActivateMail($user));
        }
        return redirect('admin/sellers')->with('flash_success', 'Seller Status Updated successfully');
		}
		else{
		return back()->with('flash_danger','Please Delete this seller');
		}
    }
	public function orders()
    {
            $orders = Order::orderBy('id','desc')->paginate(20);
            return view('admin.orders.orders',compact('orders'));
	}

    public function showSellerorders($id)
    {
        $data = Seller::where('user_id',$id)->first();
        if ($data) {
            $orders = Order::where('seller_id',$data->id)->orderBy('id','desc')->paginate(20);
            return view('admin.orders.index',compact('orders'));
        }else{
		return back()->with('flash_danger','Please Delete this seller');
    }
	}
    public function orderDetail(Request $request)
    {
        $order = Order::where('order_id',$request->order_id)->first();
        if ($order) {
            $orderitems = OrderList::where('order_id',$request->order_id)->get();
            return view('admin.orders.order-details',compact('order','orderitems'));
        }
    }

    public function wallets($id)
    {
        $user = User::findOrFail($id);
		$data = Seller::where('user_id',$id)->first();
        if ($data) {
        $seller_id = $user->seller->id;
        $data = Wallet::where('seller_id',$seller_id)->paginate(10);

        $amount = 
        Wallet::where('seller_id',$seller_id)
        ->where('status','Credit')->sum('amount') - 
        Wallet::where('seller_id',$seller_id)
        ->where('status','Debit')->sum('amount');

        return view('admin.wallets.index',compact('data','seller_id','amount'));
		}else{
		return back()->with('flash_danger','Please Delete this seller');}
    }

    public function payToSeller(Request $request)
    {
        $amount = 
        Wallet::where('seller_id',$request->seller_id)
        ->where('status','Credit')->sum('amount') - 
        Wallet::where('seller_id',$request->seller_id)
        ->where('status','Debit')->sum('amount');
        if ($amount >= $request->amount) {
            $wallet = new Wallet;
            $wallet->seller_id = $request->seller_id;
            $wallet->amount = $request->amount;
            $wallet->status = "Credit";
            $wallet->save();

            return back()->with('flash_success', 'Amount Paid to Seller');
        }
        else{
            return back()->with('flash_danger', 'Paid amount must be less than total amount');
        }
    }
	public function search(Request $request){
    // Get the search value from the request
    $search = $request->search;

    // Search in the title and body columns from the posts table
    $data = User::where('role_id',2)->where('name', 'Like', "%{$search}%")->paginate(40);

    // Return the search view with the resluts compacted
    return view('admin.sellers.index',compact('data'));
}
	public function destroy($id)
    {
        $seller = Seller::where('user_id',$id)->first();
		if($seller){
		//return $seller;
        @unlink(public_path('uploads/shops/' . $seller->shop_image));
        $orders = Order::where('seller_id', $seller->id)->get();
        foreach ($orders as $order) {
            $details = OrderList::where('order_id', $order->id)->delete();
            $pick = PickUpDrop::where('order_id', $order->id)->delete();
            $order->delete();
        }
        $rooms = Room::where('seller_id', $seller->id)->get();
        foreach ($rooms as $room) {
            $or = OrderRoom::where('order_id', $room->id)->delete();
            $room->delete();
        }
        $hotels = Hotel::where('seller_id', $seller->id)->get();
        foreach ($hotels as $data) {
            @unlink(public_path('uploads/images/' . $data->image));
            @unlink(public_path('uploads/images/' . $data->imageTwo));
            @unlink(public_path('uploads/images/' . $data->imageThree));
            @unlink(public_path('uploads/images/' . $data->imageFour));
            @unlink(public_path('uploads/images/' . $data->imageFive));
            $data->delete();
        }
        $services = SellerService::where('seller_id', $seller->id)->get();
        foreach ($services as $service) {
            @unlink(public_path('uploads/images/' . $service->image));
            $service->delete();
        }
        $quotes = Quote::where('seller_id', $seller->id)->delete();
        $data = Wallet::where('seller_id', $seller->id)->delete();
        $bank = Bank::where('seller_id', $seller->id)->delete();
        $categories = Category::where('seller_id', $seller->id)->delete();
        $products = Product::where('seller_id', $seller->id)->get();
        foreach ($products as $product) {
            @unlink(public_path('uploads/images/' . $product->image));
            $cart = Cart::where('product_id', $product->id)->delete();
            $product->delete();
        }
        $reviews = Review::where('seller_id', $seller->id)->delete();
        $user = User::where('id', $seller->user_id)->delete();
        $seller->delete();
		}else{
		 $user = User::where('id', $id)->delete();
		}
    return back()->with('flash_success', 'Seller Deleted with all the Connected Data');
    }
}
