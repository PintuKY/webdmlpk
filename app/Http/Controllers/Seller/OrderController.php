<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\SellerService;
use App\Models\Service;
use App\Models\OrderList;
use Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('seller_id',auth::user()->seller->id)->orderBy('id','desc')->paginate(20);
		 $service=Service::find(auth::user()->seller->service_parent_id);
        return view('seller.orders.index',compact('orders','service'));
    }

    public function changeOrderStatus(Request $request)
    {
        $order = Order::where('seller_id',auth::user()->seller->id)->where('order_id',$request->order_id)->first();
        if ($order) {
            $order->status = $request->order_status;
            if ($request->order_status == "OrderDelivered") {
              $order->delivered_date = \Carbon\Carbon::now();
            }
            $order->save();
            return back()->with('flash_success', 'Status updated successfully');
        }
    }

    public function orderDetail(Request $request)
    {
        $order = Order::where('seller_id',auth::user()->seller->id)->where('order_id',$request->order_id)->first();
         if($order->sellerService_id==null) {
                $orderitems = OrderList::where('order_id', $request->order_id)->get();
                return view('seller.orders.order-details', compact('order', 'orderitems'));
            }else{
                $service=SellerService::find($order->sellerService_id);
                return view('seller.orders.order-details', compact('order', 'service'));
            }
    }
}