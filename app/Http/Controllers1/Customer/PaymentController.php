<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\User;
use App\Models\PickUpDrop;
use App\Models\SellerService;
use App\Models\Cart;
use App\Models\Seller;
use App\Models\Service;
use App\Models\Wallet;
use Auth;
use App\Models\City;
use App\Models\Hotel;
use Session;
use DateTime;


class PaymentController extends Controller
{
    public function ecomMakePayment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city_id' => 'required',
            'pincode' => 'required',
            'landmark' => 'required',
            'address' => 'required',
            'seller_id' => 'required'
        ]);
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $city_id = $request->city_id;
        $pincode = $request->pincode;
        $landmark = $request->landmark;
        $address = $request->address;
        $total_cart_price = $request->total_cart_price;
        $seller_id = $request->seller_id;
		$take=$request->takeAway;
        return view('payyoumoney-payment',compact('name','phone','email','city_id','pincode','landmark','address','total_cart_price','seller_id','take'));
    }

    public function makepaymentCashonDelivery(Request $request)
    {
		//dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city_id' => 'required',
            'pincode' => 'required',
            'landmark' => 'required',
            'address' => 'required',
            'seller_id' => 'required'
        ]);
        //dd($_REQUEST);
        $carts = Cart::where('session_id',Session::getId())->get();
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
        $order->user_id = auth::id();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->city_id = $request->city_id;
        $order->pincode = $request->pincode;
        $order->landmark = $request->landmark;
        $order->address = $request->address;
        $order->payable_price = $request->total_cart_price;
        $order->status = "OrderReceived";
        $order->payment_mode = $request->payment_mode;
        $order->save();
        $get_main_service = Service::where('id',$order->seller->service_parent_id)->pluck('commission');
        //  Customer
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBISY";
        $template_id='1507163273021768418';
        $message = "Dear customer your order ".$order->order_id." ".$order->seller->shop_name." from SubbiSky is placed.";
        //$phone = $order->phone;
        //$phone = 8971833497;
        $phone = $order->phone;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        echo $curl_scraped_page = curl_exec($ch);
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
        echo $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
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
        $user = Auth::user();
        $user->pincode = $order->pincode;
        $user->landmark = $order->landmark;
        $user->address = $order->address;
        $user->save();
         $seller=Seller::find($order->seller_id);
        $service=Service::find($seller->service_parent_id);
        //return $service;
        if ($service->type == "ecom") {
            foreach ($carts as $cart) {
                $subtotal[] = $cart->product->selling_price * $cart->quantity;
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
			 $order->takeAway = $request->takeAway;
			 $order->save();
        }
        else {
          $order->sellerService_id = $request->productinfo;
          $order->status = "InProcess";
          $order->save();
        }
        return redirect('thankyou?order_id='.$order->order_id);
    }

    public function ecomPayyouPayment(Request $request)
    {
		//dd($request->all());
        if (!Auth::check()) {
            $user = User::find($request->udf1);
            Auth::login($user);
            $getcarts = Cart::where('user_id',Auth::user()->id)->get();
            foreach ($getcarts as $getcart) {
                $getcart->session_id = Session::getId();
                $getcart->save();
            }
        }
        $carts = Cart::where('session_id',Session::getId())->get();
        $getlastId = Order::orderBy('id', 'desc')->first();
        if ($getlastId) {
            $order_id = "SUBBI".date('y').date('m').($getlastId->id+1);
        }
        else{
            $order_id = "SUBBI".date('y').date('m').(1);
        }
        $order = new Order;
        $order->order_id = $order_id;
        $order->seller_id = $request->udf5;
        $order->user_id = $request->udf1;


        $order->city_id = $request->udf4;
        $seller=Seller::find($request->udf5);
        $service=Service::find($seller->service_parent_id);
		if($service->type == "ecom"){
		$order->pincode = $request->udf3;
        $order->landmark = $request->udf2;
		$order->phone = $request->phone;
        $order->email = $request->email;
		$order->name = $request->firstname;
			$order->address = $request->address1;
		}else{
		$name = explode('-', $request->firstname);
		$add = explode('-', $request->address1);
			$order->phone = $request->phone;
        $order->email = $request->email;
			$order->pincode = $add[1];
        $order->landmark = $name[1];
			$order->address = $add[0];
			$order->name = $name[0];
			$order->appointment_time = $request->udf3;
        $order->appointment_date = $request->udf2;
		}

        $order->payable_price = $request->net_amount_debit;
        $order->payment_id = $request->payuMoneyId;
        $order->status = "OrderReceived";
        $order->payment_mode = "Online";
        $order->save();
        //  Customer
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBISY";
        $template_id='1507163273021768418';
        $message = "Dear customer your order ".$order->order_id." ".$order->seller->shop_name." from SubbiSky is placed.";
        $phone = $order->phone;
        //$phone = 8971833497;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        echo $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
        //  Seller
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBBIO";
        $template_id='1507163273063542985';
        $message = "Dear seller, order ".$order->order_id. " from SubbiSky is confirmed. Please proceed to complete it. Thank you www.subbisky.com";
        $phone = $order->seller->user->phone;
        //$phone = 8971833497;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        echo $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
        //
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
        $user->pincode = $order->pincode;
        $user->landmark = $order->landmark;
        $user->address = $order->address;
        $user->save();

		//return $service;
 		   if ($service->type == "ecom") {
            foreach ($carts as $cart) {
                $subtotal[] = $cart->product->selling_price * $cart->quantity;
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
			   $order->takeAway = $request->productinfo;
			 $order->save();
        }elseif($service->type == "pd"){
			    dd($request->all());
          $pickUp = new PickUpDrop();
            $pickUp->order_id=$order->id;

            $pickUp->quantity=$request->udf12;
            $pickUp->pickUpAddress=$request->udf7;
            $pickUp->pickUplatitude=$request->udf10;
            $pickUp->pickUplogitude=$request->udf11;
            $pickUp->dropAddress=$request->udf6;
            $pickUp->dropLatitude=$request->udf8;
            $pickUp->dropLongitude=$request->udf9;

            $pickUp->price=$request->amount;
            $pickUp->distance=$request->udf13;
            $pickUp->deliveryContact=$request->udf14;
            $pickUp->sellerService_id=$request->productinfo;
            $pickUp->save();
          $order->sellerService_id = $request->productinfo;
          $order->status = "InProcess";
          $order->save();
      }
      else {
          $order->sellerService_id = $request->productinfo;
          $order->status = "InProcess";
          $order->save();
      }
        return redirect('thankyou?order_id='.$order->order_id);
    }
public function serviceMakePayment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city_id' => 'required',
            'pincode' => 'required',
            'landmark' => 'required',
            'address' => 'required',
            'seller_id' => 'required'
        ]);
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $city_id = $request->city_id;
        $pincode = $request->pincode;
        $landmark = $request->landmark;
        $address = $request->address;
        $amount = $request->amount;
        $seller_id = $request->seller_id;
	$sellerService_id=$request->sellerService_id;
	if($request->appointment_time){
	$time=$request->appointment_time;
	$date=$request->appointment_date;
	}else{
	$time=null;
		$date=null;
	}
        return view('payumoney-service-payment',compact('name','phone','email','city_id','pincode','landmark','address','amount','seller_id','sellerService_id','date','time'));
    }
    public function paymentfailed()
    {
        return view('paymentfailed');
    }

    public function thankyou(Request $request)
    {
        $order = Order::where('order_id',$request->order_id)->first();
        if ($order) {
			 if($order->sellerService_id!=null){
                $service=SellerService::find($order->sellerService_id);
                $order->service=$service;
            }
            return view('customer.thankyou',compact('order'));
        }
        else{
            abort(404);
        }
    }

	public function stayBookingCheckout(Request $request)
    {
        if(!auth::check()){
            //return redirect("staybooking-checkout?from_date=".$_REQUEST['from_date']."&to_date=".$_REQUEST['to_date']."&adult=".$_REQUEST['adult']."&hotel=".$_REQUEST['hotel']);
            return redirect("login?return=staybooking-checkout&from_date=".$_REQUEST['from_date']."&to_date=".$_REQUEST['to_date']."&adult=".$_REQUEST['adult']."&hotel=".$_REQUEST['hotel']."&rooms=".$_REQUEST['rooms']."&adults=".$_REQUEST['adults']."&children=".$_REQUEST['children']."&adultExtra=".$_REQUEST['adultExtra']."&childrenExtra=".$_REQUEST['childrenExtra']);
        }
        else{
            $cities = City::get();
            $hotel = Hotel::findOrFail($request->hotel);

            $earlier = new DateTime($_REQUEST['from_date']);
            $later = new DateTime($_REQUEST['to_date']);

            $nosofdays = $later->diff($earlier)->format("%a"); //3
            return view('service.staybooking.checkout',compact('cities','hotel','nosofdays'));
        }
    }

    public function stayBookingPayment(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city_id' => 'required',
            'hotel_id' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'adult' => 'required',
            'nosofdays' => 'required'
        ]);
        $hotel = Hotel::findOrFail($request->hotel_id);
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $city_id = $request->city_id;
        $amount = $hotel->price * $request->nosofdays * $request->rooms + $request->nosofdays * $hotel->adultExtra*$request->adultExtra + $request->nosofdays * $hotel->childrenExtra*$request->childrenExtra;
		$room=$request->rooms;
        $hotel_id = $hotel->id;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $adult = $request->adult;
		$adults = $request->adults;
		$childrenExtra = $request->childrenExtra;
		$adultExtra = $request->adultExtra;
		$children=$request->children;
        $nosofdays = $request->nosofdays;
        return view('service.staybooking.payment',compact('name','childrenExtra','adultExtra','adults','phone','email','city_id','amount','hotel_id','from_date','to_date','children','room','adult','nosofdays'));
    }

    public function staybookingPayyouPayment(Request $request)
    {
		//dd($request->all());
        $address1 = explode('-', $request->address1);
		 $counts = explode('-', $request->udf5);
		 $ages = explode('-', $request->udf4);
        $hotel = Hotel::where('id',$address1[1])->first();
        if (!Auth::check()) {
            $user = User::find($request->udf1);
            Auth::login($user);
        }
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
        $order->user_id = $request->udf1;
        $order->name = $request->firstname;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->city_id = $address1[0];
        $order->payable_price = $request->net_amount_debit;
        $order->payment_id = $request->payuMoneyId;

        $order->hotel_id = $address1[1];
        $order->hotel_from_date = $request->udf2;
        $order->hotel_to_date = $request->udf3;
        $order->hotel_adult_no = $ages[0];
        $order->hotel_nos_of_days = $counts[0];
  		$order->hotel_children_no = $ages[1];
		$order->childrenExtraCharge = $counts[0]*$ages[2]*$hotel->childrenExtra;
		$order->adultExtraCharge = $counts[0]*$ages[3]*$hotel->adultExtra;
        $order->hotel_room_no = $counts[1];
        $order->status = "Booked";
        $order->save();
        $get_main_service = Service::where('id',$order->seller->service_parent_id)->pluck('commission');
        //
        $order->comission_percentage = $get_main_service[0];
        $order->commision_amount = round(($order->payable_price/100)*$order->comission_percentage);
        $order->payable_amount_seller = $order->payable_price - $order->commision_amount;
        $order->save();

        //  Customer
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBISY";
        $template_id='1507163273021768418';
        $message = "Dear customer your order ".$order->order_id." ".$order->seller->shop_name." from SubbiSky is placed.";
        $phone = 8971833497;
        //$phone = $order->phone;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        echo $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
        //  Seller
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBBIO";
        $template_id='1507163273063542985';
        $message = "Dear seller, order ".$order->order_id. " from SubbiSky is confirmed. Please proceed to complete it. Thank you www.subbisky.com";
        $phone = 8971833497;
        //$phone = $order->seller->user->phone;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        echo $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
        //

        //Wallet
        $wallet = new Wallet;
        $wallet->seller_id = $order->seller_id;
        $wallet->amount = $order->payable_amount_seller;
        $wallet->order_id = $order->id;
        $wallet->status = "Debit";
        $wallet->save();
        //Wallet
        return redirect('thankyou?order_id='.$order->order_id);
    }
	//pick up and drop
	 public function pickUpMakePayment(Request $request)
    {
		// dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city_id' => 'required',
            'pincode' => 'required',
            'landmark' => 'required',
            'address' => 'required',
            'seller_id' => 'required'
        ]);
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $city_id = $request->city_id;
        $pincode = $request->pincode;
        $landmark = $request->landmark;
        $address = $request->address;
        $amount = $request->amount;
        $seller_id = $request->seller_id;
         $pickUpLo=$request->pickUpLong;
        $pickUpLa=$request->pickUpLat;
        $dropLo=$request->droppLong;
        $dropLa=$request->dropLat;
        $pickUpAdd=$request->pickUpAdd;
        $dropAdd=$request->dropAdd;
        $quantity=$request->quantity;
        $sellerService=$request->sellerService;
        $distance=$request->distance;
        $delCon=$request->deliveryCon;
		 //dd($request->all());
        return view('service.pickupdrop.payyoumoney-payment',compact('name','phone','email','city_id','pincode','landmark','address','amount','seller_id','pickUpLa','pickUpLo','delCon','distance','dropAdd','dropLa','dropLo','pickUpAdd','quantity','sellerService'));
    }

 public function pickPayyouPayment(Request $request)
    {
        if (!Auth::check()) {
            $user = User::find($request->udf1);
            Auth::login($user);

        }

        $getlastId = Order::orderBy('id', 'desc')->first();
        if ($getlastId) {
            $order_id = "SUBBI" . date('y') . date('m') . ($getlastId->id + 1);
        } else {
            $order_id = "SUBBI" . date('y') . date('m') . (1);
        }

        $address1 = explode('-', $request->address1);
        $udf3 = explode('-', $request->udf3);
        $udf4 = explode('-', $request->udf4);
        $udf5 = explode('-', $request->udf5);
        $udf2 = explode('-', $request->udf2);
        $order = new Order;
        $order->order_id = $order_id;
        $order->seller_id = $udf5[0];
        $order->user_id = $request->udf1;
        $order->name = $request->firstname;
        $order->phone = $request->phone;
        $order->email = $request->email;
	 if(Auth::user()->city_id!=null){
        $order->city_id = Auth::user()->city_id;
	 }else{
	  $order->city_id = "None";
	 }
        $order->pincode = Auth::user()->pincode;
        $order->landmark = Auth::user()->landmark;
        $order->address = Auth::user()->address;
        $order->payable_price = $request->net_amount_debit;
        $order->payment_id = $request->payuMoneyId;
        $order->status = "InProcess";
        $order->save();

        //  Customer
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBISY";
        $template_id='1507163273021768418';
        $message = "Dear customer your order ".$order->order_id." ".$order->seller->shop_name." from SubbiSky is placed.";
        $phone = 8971833497;
        //$phone = $order->phone;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        echo $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
        //  Seller
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBBIO";
        $template_id='1507163273063542985';
        $message = "Dear seller, order ".$order->order_id. " from SubbiSky is confirmed. Please proceed to complete it. Thank you www.subbisky.com";
        $phone = 8971833497;
        //$phone = $order->seller->user->phone;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        echo $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
        //
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
        $user->pincode = $order->pincode;
        $user->landmark = $order->landmark;
        $user->address = $order->address;
        $user->save();
        $seller = Seller::find($order->seller_id);
        $service = Service::find($seller->service_parent_id);
        //return $service;

            $pickUp = new PickUpDrop();
            $pickUp->order_id=$order->id;
            $pickUp->quantity=$udf3[1];
            $pickUp->pickUpAddress=$udf2[0];
            $pickUp->pickUplatitude=$address1[0];
            $pickUp->pickUplogitude=$udf2[1];
            $pickUp->dropAddress=$address1[1];
            $pickUp->dropLatitude=$udf3[0];
            $pickUp->dropLongitude=$udf4[0];

            $pickUp->price=$request->amount;
            $pickUp->distance=$udf4[1];
            $pickUp->deliveryContact=$udf5[1];
            $pickUp->sellerService_id=$request->productinfo;
            $pickUp->save();
            $order->sellerService_id = $request->productinfo;
            $order->status = "InProcess";
            $order->save();

        return redirect('thankyou?order_id=' . $order->order_id);
    }
}
