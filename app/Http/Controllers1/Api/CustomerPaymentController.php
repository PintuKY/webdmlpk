<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Service;
use App\Models\Seller;
use App\Mail\OrderMail;
use App\Models\User;
use App\Models\PickUpDrop;
use App\Models\Hotel;
use App\Models\Amenity;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use DateTime;

class CustomerPaymentController extends Controller
{
    public function placeOrder(Request $request){
        $carts = Cart::where('user_id',Auth::id())->get();
        $getlastId = Order::orderBy('id', 'desc')->first();
        if ($getlastId) {
            $order_id = "SUBBI".date('y').date('m').($getlastId->id+1);
        }
        else{
            $order_id = "SUBBI".date('y').date('m').(1);
        }
        $order = new Order;
        $order->order_id = $order_id;
        $order->seller_id = $request->seller_id;
        $order->user_id = Auth::id();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->city_id = $request->city_id;
        $order->pincode = $request->pincode;
        $order->landmark = $request->landmark;
        $order->address = $request->address;
        $order->payable_price = $request->payable_price;
        $order->payment_id = $request->payuMoneyId;
        $order->status = "OrderReceived";
        $order->payment_mode = $request->payment_mode;
		 $order->takeAway = $request->takeAway;
        $order->save();
        $get_main_service = Service::where('id',$order->seller->service_parent_id)->pluck('commission');
        //
        $order->comission_percentage = $get_main_service[0];
        $order->commision_amount = round(($order->payable_price/100)*$order->comission_percentage);
        $order->payable_amount_seller = $order->payable_price - $order->commision_amount;
        $order->save();
        //Wallet
        $wallet = new Wallet;
        $wallet->seller_id = $order->seller_id;
        $wallet->amount = $order->payable_amount_seller;
        $wallet->order_id = $order->id;
        $wallet->status = "Debit";
        $wallet->save();
        //Wallet
        $user=Auth::user();
        $user->pincode = $order->pincode;
        $user->landmark = $order->landmark;
        $user->address = $order->address;
        $user->save();

        foreach ($carts as $cart) {
            $subtotal[] = $cart->product->selling_price*$cart->quantity;
            $orderList = new OrderList;
            $orderList->order_id = $order->id;
            $orderList->product_id = $cart->product_id;
            $orderList->mrp_price = $cart->product->mrp_price;
            $orderList->selling_price = $cart->product->selling_price;
            $orderList->quantity = $cart->quantity;
            $orderList->unit = $cart->unit;
            $orderList->save();
            $cart->delete();
        }
		//  Customer
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBISY";
        $template_id='1507163273021768418';
        $message = "Dear customer your order ".$order->order_id." ".$order->seller->shop_name." from SubbiSky is placed.";
        $phone = $order->phone;
        //$phone = 8971833497;
        //$phone = $order->phone;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch); 
        //  Seller
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBBIO";
        $template_id='1507163273063542985';
        $message = "Dear seller, order ".$order->order_id. " from SubbiSky is confirmed. Please proceed to complete it. Thank you www.subbisky.com";
        //$phone = $order->seller->user->phone;
        //$phone = 8971833497;
        $phone = $order->seller->user->phone;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch); 
        //
		 try {
            $data = ['order_id' => $order->order_id];
            Mail::to($user->email)->send(new OrderMail($data));
        } catch (Exception $e) {
        }
        return response()->json(['message'=>'Order Placed','success'=>true,'statusCode'=>200,'order'=>$order]);
    }
	public function booking(Request $request){

        $getlastId = Order::orderBy('id', 'desc')->first();
        if ($getlastId) {
            $order_id = "SUBBI".date('y').date('m').($getlastId->id+1);
        }
        else{
            $order_id = "SUBBI".date('y').date('m').(1);
        }
        $order = new Order;
        $order->order_id = $order_id;
        $order->seller_id = $request->seller_id;
        $order->user_id = Auth::id();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->city_id = $request->city_id;
        $order->pincode = $request->pincode;
        $order->landmark = $request->landmark;
        $order->address = $request->address;
        $order->payable_price = $request->payable_price;
        $order->payment_id = $request->payuMoneyId;
        $order->sellerService_id=$request->sellerService_id;
		$order->appointment_time = $request->appointment_time;
        $order->appointment_date = $request->appointment_date;
        $order->status = "InProcess";
        $order->save();
        $get_main_service = Service::where('id',$order->seller->service_parent_id)->pluck('commission');
        //
        $order->comission_percentage = $get_main_service[0];
        $order->commision_amount = round(($order->payable_price/100)*$order->comission_percentage);
        $order->payable_amount_seller = $order->payable_price - $order->commision_amount;
        $order->save();
        //Wallet
        $wallet = new Wallet;
        $wallet->seller_id = $order->seller_id;
        $wallet->amount = $order->payable_amount_seller;
        $wallet->order_id = $order->id;
        $wallet->status = "Debit";
        $wallet->save();
        //Wallet
        $user=Auth::user();
        $user->pincode = $order->pincode;
        $user->landmark = $order->landmark;
        $user->address = $order->address;
        $user->save();
//  Customer
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBISY";
        $template_id='1507163273021768418';
        $message = "Dear customer your order ".$order->order_id." ".$order->seller->shop_name." from SubbiSky is placed.";
        $phone = $order->phone;
        //$phone = 8971833497;
        //$phone = $order->phone;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch); 
        //  Seller
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBBIO";
        $template_id='1507163273063542985';
        $message = "Dear seller, order ".$order->order_id. " from SubbiSky is confirmed. Please proceed to complete it. Thank you www.subbisky.com";
        //$phone = $order->seller->user->phone;
        //$phone = 8971833497;
        $phone = $order->seller->user->phone;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $curl_scraped_page = curl_exec($ch);
        curl_close($ch); 
        //

        try {
            $data = ['order_id' => $order->order_id];
            Mail::to($user->email)->send(new OrderMail($data));
        } catch (Exception $e) {
        }
        return response()->json(['message'=>'Booking','success'=>true,'statusCode'=>200,'booking'=>$order]);
    }
	
	public function staybookingPayment(Request $request)
    {

        $hotel = Hotel::where('id',$request->hotel_id)->first();

        $getlastId = Order::orderBy('id', 'desc')->first();
        if ($getlastId) {
            $order_id = "SUBBI".date('y').date('m').($getlastId->id+1);
        }
        else{
            $order_id = "SUBBI".date('y').date('m').(1);
        }
        $order = new Order;
        $order->order_id = $order_id;
        $order->seller_id = $hotel->seller_id;
        $order->user_id = Auth::id();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->city_id = $request->city_id;
        $order->payable_price = $request->amount;
        $order->payment_id = $request->payuMoneyId;

        $order->hotel_children_no = $request->children;
		$order->childrenExtraCharge = $request->no_of_days*$request->extraChildren*$hotel->childrenExtra;
		$order->adultExtraCharge = $request->no_of_days*$request->extraAdult*$hotel->adultExtra;
        $order->hotel_room_no = $request->room;
        $order->hotel_id = $request->hotel_id;
        $order->hotel_from_date = $request->from;
        $order->hotel_to_date = $request->to;
        $order->hotel_adult_no = $request->adult;
        $order->hotel_nos_of_days = $request->no_of_days;

        $order->status = "Booked";
        $order->save();
        $get_main_service = Service::where('id',$order->seller->service_parent_id)->pluck('commission');
        //
        $order->comission_percentage = $get_main_service[0];
        $order->commision_amount = round(($order->payable_price/100)*$order->comission_percentage);
        $order->payable_amount_seller = $order->payable_price - $order->commision_amount;
        $order->save();
        //Wallet
        $wallet = new Wallet;
        $wallet->seller_id = $order->seller_id;
        $wallet->amount = $order->payable_amount_seller;
        $wallet->order_id = $order->id;
        $wallet->status = "Debit";
        $wallet->save();
        //Wallet
		//  Customer
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBISY";
        $template_id='1507163273021768418';
        $message = "Dear customer your order ".$order->order_id." ".$order->seller->shop_name." from SubbiSky is placed.";
        $phone = $order->phone;
        //$phone = 8971833497;
        //$phone = $order->phone;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $curl_scraped_page = curl_exec($ch);
        curl_close($ch); 
        //  Seller
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBBIO";
        $template_id='1507163273063542985';
        $message = "Dear seller, order ".$order->order_id. " from SubbiSky is confirmed. Please proceed to complete it. Thank you www.subbisky.com";
        //$phone = $order->seller->user->phone;
        //$phone = 8971833497;
        $phone = $order->seller->user->phone;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $curl_scraped_page = curl_exec($ch);
        curl_close($ch); 
        //
       return response()->json(['success'=>true,'statusCode'=>200,'meessage'=>"stay booking",'orders'=>$order]);
    }
	
	 public function calculateDays(Request $request){

        $earlier = new DateTime($request->from);
        $later = new DateTime($request->to);

        $nosofdays = $later->diff($earlier)->format("%a"); //3
        
        return response()->json(['success'=>true,'statusCode'=>200,'message'=>'No. of days','days'=>$nosofdays]);
    }
	
	 public function pickUpPayment(Request $request)
    {

        $getlastId = Order::orderBy('id', 'desc')->first();
        if ($getlastId) {
            $order_id = "SUBBI" . date('y') . date('m') . ($getlastId->id + 1);
        } else {
            $order_id = "SUBBI" . date('y') . date('m') . (1);
        }


        $order = new Order;
        $order->order_id = $order_id;
        $order->seller_id = $request->seller_id;
        $order->user_id = Auth::id();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
		 if(Auth::user()->city_id!=null){
        $order->city_id = Auth::user()->city_id;
		 }else{
		 $order->city_id = "No";
		 }
        $order->pincode = Auth::user()->pincode;
        $order->landmark = Auth::user()->landmark;
        $order->address = Auth::user()->address;
        $order->payable_price = $request->amount;
        $order->payment_id = $request->payuMoneyId;
        $order->status = "InProcess";
        $order->save();
        $get_main_service = Service::where('id', $order->seller->service_parent_id)->pluck('commission');
        //
        $order->comission_percentage = $get_main_service[0];
        $order->commision_amount = round(($order->payable_price / 100) * $order->comission_percentage);
        $order->payable_amount_seller = $order->payable_price - $order->commision_amount;
        $order->save();
        //Wallet
        $wallet = new Wallet;
        $wallet->seller_id = $order->seller_id;
        $wallet->amount = $order->payable_amount_seller;
        $wallet->order_id = $order->id;
        $wallet->status = "Debit";
        $wallet->save();
        //Wallet
        $user=Auth::user();
        $user->pincode = $order->pincode;
        $user->landmark = $order->landmark;
        $user->address = $order->address;
        $user->save();
        $seller = Seller::find($order->seller_id);
        $service = Service::find($seller->service_parent_id);
        //return $service;

        $pickUp = new PickUpDrop();
        $pickUp->order_id=$order->id;
        $pickUp->quantity=$request->quantity;
        $pickUp->pickUpAddress=$request->pickUpAdd;
        $pickUp->pickUplatitude=$request->pickUpLat;
        $pickUp->pickUplogitude=$request->pickUpLong;
        $pickUp->dropAddress=$request->dropAdd;
        $pickUp->dropLatitude=$request->dropLat;
        $pickUp->dropLongitude=$request->dropLong;

        $pickUp->price=$request->amount;
        $pickUp->distance=$request->distance;
        $pickUp->deliveryContact=$request->deliCon;
        $pickUp->sellerService_id=$request->sellerService_id;
        $pickUp->save();
        $order->sellerService_id = $request->sellerService_id;
        $order->status = "InProcess";
        $order->save();
//  Customer
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBISY";
        $template_id='1507163273021768418';
        $message = "Dear customer your order ".$order->order_id." ".$order->seller->shop_name." from SubbiSky is placed.";
        $phone = $order->phone;
        //$phone = 8971833497;
        //$phone = $order->phone;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $curl_scraped_page = curl_exec($ch);
        curl_close($ch); 
        //  Seller
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBBIO";
        $template_id='1507163273063542985';
        $message = "Dear seller, order ".$order->order_id. " from SubbiSky is confirmed. Please proceed to complete it. Thank you www.subbisky.com";
        //$phone = $order->seller->user->phone;
        //$phone = 8971833497;
        $phone = $order->seller->user->phone;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $curl_scraped_page = curl_exec($ch);
        curl_close($ch); 
        //
        return response()->json(['success'=>true,'statusCode'=>200,'message'=>'Pick Up Booked','order'=>$order,'details'=>$pickUp]);
    }
}
