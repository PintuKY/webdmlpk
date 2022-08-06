<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Product;
use App\Models\PickUpDrop;
use App\Models\SellerService;
use App\Models\Service;
use App\Models\Seller;
use App\Models\Hotel;
use Facade\FlareClient\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerOrderController extends Controller
{
    public function orderDetail($id)
    {
        $order = Order::where('seller_id',Auth::user()->seller->id)->where('order_id',$id)->first();

        if ($order) {
            $seller=Seller::find(Auth::user()->seller->id);
            $service=Service::find($seller->service_parent_id);
            $type=$service->type;
            if($service->type=="ecom"){
            $orderitems = OrderList::where('order_id', $order->id)->get();
			foreach($orderitems as $items){
			$product=Product::find($items->product_id);
				$product->image=url('/') . "/public/uploads/images/" . $product->image;
				$items->product_id=$product;
			}
            $order->items=$orderitems;
        }elseif ($service->type=="pd"){
				  $sellerService=SellerService::find($order->sellerService_id);
            $order->sellerService=$sellerService;
                $pick=PickUpDrop::where('order_id',$order->id)->first();
                $order->pickUp=$pick;
            }elseif ($service->type=="staybooking"){
                $hotel= Hotel::find($order->hotel_id);
                $order->hotel_id=$hotel;
            }else{
                $sellerService=SellerService::find($order->sellerService_id);
                $order->sellerService=$sellerService;
            }

        }
        return response()->json(['type'=>$type,'message'=>'Order Details','success'=>true,'statusCode'=>200,'order'=>$order]);

    }
    public function changeOrderStatus(Request $request)
    {
        $order = Order::where('seller_id',Auth::user()->seller->id)->where('order_id',$request->order_id)->first();
        if ($order) {
            $order->status = $request->order_status;
            if ($request->order_status == "OrderDelivered") {
                $order->delivered_date = \Carbon\Carbon::now();
            }
            $order->save();
           return response()->json(['message'=>'Status Updated Successfully','success'=>true,'statusCode'=>200,'order'=>$order]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('seller_id',Auth::user()->seller->id)->orderBy('id','desc')->get();
        return response()->json(['message'=>'Order List','success'=>true,'statusCode'=>200,'order'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
