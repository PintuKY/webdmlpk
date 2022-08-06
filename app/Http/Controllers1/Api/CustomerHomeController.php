<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use App\Models\PickUpDrop;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Quote;
use App\Models\User;
use App\Models\Amenity;
use App\Models\Hotel;
use App\Models\SellerService;
use App\Models\Review;
use App\Models\Order;
use App\Models\OrderRoom;
use App\Models\Room;
use App\Models\OrderList;
use App\Models\Seller;
use App\Models\Service;
use Carbon\Carbon;
use Validator;
use Auth;
use Illuminate\Http\Request;

class CustomerHomeController extends Controller
{
	public function getdistanceWithDetails($from,$to)
    {

        $remFrom = str_replace(',', '', $from); //Remove Commas
        $from = urlencode($remFrom);

        $remTo = str_replace(',', '', $to); //Remove Commas
        $to = urlencode($remTo);
        $data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false&key=AIzaSyATk5VvnPJoy8U5Aw71ArL5vqGIj6fLIHI");
        $data = json_decode($data,true);
        $distance = $data['rows'][0]['elements'][0]['distance']['value'];
		$distanceT = $data['rows'][0]['elements'][0]['distance']['text'];
		$f=$data['destination_addresses'][0];
		$t=$data['origin_addresses'][0];
        return response()->json(['from'=>$f,'to'=>$t,'distanceMeter'=>$distance,'distanceKm'=>$distanceT,'success'=>true,'statusCode'=>200]);
    }
	 public function storeOrder(Request $request)
    {
        $responseData = ['message' => 'Something went wrong, please try again later'];
        $statusCode = 401;
        try {
            $validator = Validator::make($request->all(), [
                'adult' => 'required',
                'children' => 'required',
               
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "error" => "Validation Errors",
                    'status' => 'failure',
                    "validationErrors" => $validator->errors()
                ], 422);
            }
            if (isset($request->order_id) && $request->order_id != "") {
                $orderList = new OrderRoom;
                $orderList->adult = $request->adult;
                $orderList->children = $request->children;
                $orderList->order_id = $request->order_id;
                $orderList->save();
               
                $orderList->save();
                $responseData['message'] = 'Search Updated';
                $responseData['order_id'] = $orderList->order_id;
            } else {
                $order = new Room;
                
                $order->user_id = Auth::user()->id;
				 $order->seller_id = $request->seller_id;
                $order->save();
               
                

                $orderList = new OrderRoom;
                $orderList->adult = $request->adult;
                $orderList->children = $request->children;
                $orderList->order_id = $order->id;
                
                $orderList->save();
                $responseData['message'] = 'Order Created';
                $responseData['order_id'] = $order->id;
            }


            $statusCode = 200;
        } catch (\Exception $exception) {
            throw new HttpException(500, $exception->getMessage());
        }
        return response()->json($responseData)->setStatusCode($statusCode);
    }
	public function viewOrderRoom($id){
	$room=Room::find($id);
		$orderRooms=OrderRoom::where('order_id',$id)->get();
		return response()->json(['success'=>true,'statusCode'=>200,'data'=>$room,'details'=>$orderRooms]);
	}
    public function index()
    {
        $banners = Banner::where('status','Active')->get();
		foreach ($banners as $banner) {
            $banner->image= url('/') . "/public/uploads/images/" . $banner->image;
        }
        $services = Service::whereNull('parent_id')->where('status','Active')->get();
		 foreach ($services as $service) {
			     $seller=Seller::where('service_parent_id',$service->id)->get();
            $count=Count($seller);
            $service->shopCount=$count;
            $service->image= url('/') . "/public/uploads/images/" . $service->image;
        }
        return response()->json(['message'=>'home','success'=>true,'statusCode'=>200,'banners'=>$banners,'services'=>$services]);
    }
public function services($slug)
    {
        $service = Service::where('slug', $slug)->where('status', 'Active')->first();
        $main = Service::find($service->parent_id);
        if($slug=="stay-booking"){
            $subs = Service::where('parent_id', $service->id)->get();
			return response()->json(['message' => 'Services', 'success' => true, 'statusCode' => 200, 'service' => $service,'subs'=>$subs]);
        }
        if($main && $main->slug=="stay-booking"){
			$nearby_shop = $service;
			$sellers = Seller::where('service_id',$service->id)
				->where('status','Active')
				->get();
			foreach($sellers as $sellers_row){
				if ($sellers_row->shop_image !== null) {
					$sellers_row->shop_image = url('/') . "/public/uploads/shops/" . $sellers_row->shop_image;
				}
			}
			return response()->json(['message' => 'Services', 'success' => true, 'statusCode' => 200, 'service'=>$service,'nearby_shop'=>$nearby_shop,'sellers'=>$sellers]);
        }

        if ($service) {
            if ($service->image !== null) {
                $service->image = url('/') . "/public/uploads/images/" . $service->image;
            }
            $subs = Service::where('parent_id', $service->id)->get();
			foreach($subs as $sub){
            if ($sub->image !== null) {
                $sub->image = url('/') . "/public/uploads/images/" . $sub->image;
            }
			}
            $service->sub = $subs;
            return response()->json(['message' => 'Services', 'success' => true, 'statusCode' => 200, 'service' => $service]);
        } else {
            return response()->json(['message' => 'No Service', 'success' => false, 'statusCode' => 404]);
        }
    }

	 public function serviceSeller($id, $sid)
    {
        $shop = Seller::where('status', 'Active')->where('id', $id)->first();
		 $shop->shop_image=url('/') . "/public/uploads/shops/" . $shop->shop_image;
        $service = Service::find($shop->service_parent_id);
		  $service->image = url('/') . "/public/uploads/images/" . $service->image;
        if ($shop) {
            $sellerServices = SellerService::where('id', $sid)->where('status', 'Active')->first();
			$sellerServices->image=url('/') . "/public/uploads/images/" . $sellerServices->image;
           return response()->json(['success'=>true,'statusCode'=>200,'message'=>'Seller Service Details','seller'=>$shop,'main'=>$service,'seller service'=>$sellerServices,'sellerService'=>$sellerServices]);
        } else {
            return response()->json(['success'=>false,'statusCode'=>404,'message'=>'Seller Service Doesnt Exist']);
        }
    }
	
         public function service($slug)
    {
        $service = Service::where('slug', $slug)->where('status', 'Active')->first();
			 $mainS=Service::find($service->parent_id);
        if ($service->image !== null) {
            $service->image = url('/') . "/public/uploads/images/" . $service->image;
        }
        $nearby_shop = Seller::where('service_id',$service->id)->where('status', 'Active')->get();
        foreach ($nearby_shop as $shop){
			 $shop->user_id=User::find($shop->user_id);
            if($shop->shop_image!==null) {
                $shop->shop_image = url('/') . "/public/uploads/shops/" . $shop->shop_image;
            }}
        return response()->json(['message' => 'service and shop','type'=>$mainS->type, 'success' => true, 'statusCode' => 200, 'service' => $service, 'nearby_shop' => $nearby_shop]);
    }
    public function shopProducts($id)
    {
        $shop = Seller::where('status','Active')->where('id',$id)->first();
        if ($shop) {
            $products = Product::where('seller_id',$shop->id)->get();
			  foreach ($products as $product){
                $product->image=url('/') . "/public/uploads/images/" . $product->image;
            }
            return response()->json(['message'=>'Products','success'=>true,'products'=>$products]);
        }
        else{
            return response()->json(['message'=>'No Shop','success'=>false,'statusCode'=>404]);
        }
    }
	
	public function shopServices($id)
    {
        $shop = Seller::where('status', 'Active')->where('id', $id)->first();

        if ($shop) {
			 $shop->shop_image=url('/') . "/public/uploads/shops/" . $shop->shop_image;
            $reviews = Review::whereNotNull('review')->where('seller_id', $id)->get();
            $reviewCount = Review::where('seller_id', $id)->get();

            foreach ($reviewCount as $re) {
                $totalReviews[] = $re->rating;
            }

            $count = count($reviewCount);
            if ($count == 0) {
                $data = 0;
            } else {
                $data = round(array_sum($totalReviews) / $count);
            }

            $shop->ratingCount = $count;
            $shop->ratingAverage = $data;
            $services = SellerService::where('seller_id', $shop->id)->get();
			foreach($services as $service){
			$service->image=url('/') . "/public/uploads/images/" . $service->image;
			}
            return response()->json(['success'=>true,'statusCode'=>200,'message'=>'Services By Seller','services'=>$services,'seller'=>$shop,'reviews'=>$reviews]);
        } else {
            return response()->json(['success'=>false,'statusCode'=>404,'message'=>'No Data Found']);
        }
    }
	
 public function categoriesBySeller($shopId)
    {

        $categories = Category::where('seller_id', $shopId)->get();
        if($categories){
            foreach ($categories as $category){
                $products=Product::where('category_id',$category->id)->get();
                $count=count($products);
                $category->count=$count;
            }
            return response()->json(['success'=>true,'statusCode'=>200,'messsage'=>'category by seller','categories'=>$categories]);
        }else{
            return response()->json(['success'=>true,'statusCode'=>200,'messsage'=>' No category']);
        }
    }
public function orderDetails($id)
    {
        $order = Order::find($id);
        $seller= Seller::find($order->seller_id);
        $service=Service::find($seller->service_parent_id);
        $type=$service->type;
        if($service->type=="ecom"){
        $orderList = OrderList::where('order_id', $id)->get();
        
        foreach ($orderList as $list) {
            $product = Product::find($list->product_id);
			$product->image=url('/') . "/public/uploads/images/" . $product->image;
            $list->product_id = $product;
        }
        $order->list = $orderList;
        }elseif ($service->type=="pd"){
  $sellerService=SellerService::find($order->sellerService_id);
			$sellerService->image=url('/') . "/public/uploads/images/" . $sellerService->image;
            $order->sellerService=$sellerService;

            $pick=PickUpDrop::where('order_id',$order->id)->first();
            $order->pickUp=$pick;
        }elseif ($service->type=="staybooking"){
            $hotel= Hotel::find($order->hotel_id);
            $order->hotel_id=$hotel;
        }else{
            $sellerService=SellerService::find($order->sellerService_id);
			$sellerService->image=url('/') . "/public/uploads/images/" . $sellerService->image;
            $order->sellerService=$sellerService;
        }
        return response()->json(['type'=>$type,'message' => 'Order Details', 'success' => true, 'statusCode' => 200, 'order' => $order]);
    }
    public function shopCategory($seller_id,$category_id)
    {
        $shop = Seller::where('status','Active')->where('id',$seller_id)->first();
        if ($shop) {
            $products = Product::where('category_id',$category_id)->where('status','Active')->get();
			  foreach ($products as $product){
                $product->image=url('/') . "/public/uploads/images/" . $product->image;
            }
           return response()->json(['message'=>'Products','success'=>true,'statusCode'=>200,'products'=>$products]);
        }
        else{
            return response()->json(['message'=>'No Shop','success'=>false,'statusCode'=>404]);
        }
    }


	
	
	public function stayBookingSearch(Request $request,$id)
   {
		// return $request;
		//dd($request->all());
		$maximum=0;
		if (isset($request->from_date) && $request->from_date!='' && isset($request->to_date) && $request->to_date!='' ) {
			//dd($request->all());
		 	$data = $request->all();

			$roomLimit = Seller::where('status', 'Active')->where('id', $id)->first();
			$total = 0;
			$totalAdult = 0;
			$totalChildren = 0;
			$adultExtra = 0;
			$childrenExtra = 0;
			if(isset($request->adult)){
				$totalAdult = array_sum($request->adult);
			}
			if(isset($request->children)){
				$totalChildren = array_sum($request->children);
			}
			$total = ($totalAdult + $totalChildren);
			if($total>$roomLimit->room_capacity){
				return response()->json(['success'=>true,'statusCode'=>200,'message'=>'Limit For One room cannot exceed '.$roomLimit->room_capacity]);
			}

			$orderRooms = $request->rooms;
			$children = $request->children;
			$adults = $request->adult;

		if (count($children)) {
			$totalChildren=0;
			$totalAdult=0;
			$adultExtra=0;
			$childrenExtra=0;
			$totalRoom=count($orderRooms);
			$totalArray=[];
            foreach($children as $key => $input) {
                if ($children[$key]!=null && $adults[$key]!=null) {
                    $totalChildren += $children[$key];
					 $totalAdult += $adults[$key];
                   $total=$children[$key] + $adults[$key];
					
					if($total>2){
						//return $total;
						$totalArray[]=$total;
						$deducted=0;
					if($adults[$key]>2 && $children[$key]>2){
						$deducted= $adults[$key]-2;
						$adultExtra += $deducted;
						$childrenExtra += $children[$key];
					}elseif($adults[$key]>2 && $children[$key]==0 ){
					$deducted= $adults[$key]-2;
						$adultExtra += $deducted;
					}
					elseif($adults[$key]>2 && $children[$key]==1){
						
						$deducted= $adults[$key]-2;
						$adultExtra += $deducted;
					$childrenExtra += $children[$key];
					}elseif($adults[$key]>2 && $children[$key]==2){
						$adultExtra += $adults[$key]-2;
					$childrenExtra += $children[$key];
					}elseif($adults[$key]==2 && $children[$key]!=0){
						
					$childrenExtra += $children[$key];
					}elseif($adults[$key]==1 && $children[$key]>1  ){
						$childrenExtra += $children[$key]-1;
					}elseif($adults[$key]==0 && $children[$key]>2){
						
					$childrenExtra += $children[$key]-2;
					}else{
					$adultExtra += $adults[$key]-2;
					$childrenExtra += $children[$key];
					}}
					if(!empty($totalArray)){
					$maximum=max($totalArray);
					}else{
					$maximum=2;
					}
                    
                }
            }
        }
	
	}
       
        
            
        $shop = Seller::where('status', 'Active')->where('id', $id)->first();
		 if($shop->shop_image!==null) {
                $shop->shop_image = url('/') . "/public/uploads/shops/" . $shop->shop_image;
            }
        if (isset($request->from_date) && $request->from_date!='' && isset($request->to_date) && $request->to_date!='' ) {
			$blocks = Hotel::where('seller_id',$shop->id)->get();
			foreach($blocks as $block){
			if($block->from_block!=null && $block->to_block!=null){
				$today=Carbon::now();
			if($block->from_block <= $today && $block->to_block >= $today){
				$block->status="Inactive";
				$block->save();
			}else{
			$block->status="Active";
				$block->save();
			}
			}
			}
            $hotels = Hotel::where('seller_id',$shop->id)->where('status','Active')->where('roomCapacity','>=',$maximum)->get();
            $amenities = Amenity::get();
            $reviews=Review::whereNotNull('review')->where('seller_id',$id)->get();
            $reviewCount=Review::where('seller_id',$id)->get();
            foreach ($reviewCount as $re) {
                $totalReviews[] = $re->rating;
            }
            $count=count($reviewCount);
            if($count==0){
                $data = 0;
            }else{
                $data = round(array_sum($totalReviews) / $count);
            }
            $shop->ratingCount=$count;
            $shop->ratingAverage = $data;
			 foreach ($hotels as $hotel) {
                $amenity_id = explode(',', $hotel->amenities);

 $hotel->image=url('/') . "/public/uploads/images/" . $hotel->image;
                $hotel->imageTwo=url('/') . "/public/uploads/images/" . $hotel->imageTwo;
                $hotel->imageThree=url('/') . "/public/uploads/images/" . $hotel->imageThree;
                $hotel->imageFour=url('/') . "/public/uploads/images/" . $hotel->imageFour;
                $hotel->imageFive=url('/') . "/public/uploads/images/" . $hotel->imageFive;
                if (count($amenity_id))
                    $amen = [];
                    foreach ($amenity_id as $amenity_one) {

                        $amenity = Amenity::where('id', $amenity_one)->first();
						 $amenity->image= url('/') . "/public/images/icon/" . $amenity->image;
                        $amen[] = $amenity;
                    }
                    $hotel->amenity_id=$amen;

            }
            return response()->json(['success'=>true,'statusCode'=>200,'message'=>"Stay Booking",'shop'=>$shop,'reviews'=>$reviews,'hotels'=>$hotels,'amenities'=>$amenities,'bookingDetails'=>["from"=>$request->from_date,"to"=>$request->to_date,"adult"=>$totalAdult,'totalRoom'=>$totalRoom,'totalChildren'=>$totalChildren,'adultExtra'=>$adultExtra,'childrenExtra'=>$childrenExtra]]);
        }
        else{
            return response()->json(['success'=>true,'statusCode'=>200,'shop'=>$shop]);
        }
    }
	
	
	
    public function shopProductDetails($seller_id,$product_id)
    {
        $shop = Seller::where('status','Active')->where('id',$seller_id)->first();
        if ($shop) {
            $product = Product::where('id',$product_id)->where('status','Active')->first();
			$product->image=url('/') . "/public/uploads/images/" . $product->image;
          return response()->json(['message'=>'Product','success'=>true,'statusCode'=>200,'product'=>$product]);
        }
        else{
           return response()->json(['message'=>'No Shop','success'=>false,'statusCode'=>404]);
        }
    }

    public function saveQuote(Request $request)
    {
        $quote = new Quote;
        $quote->name = $request->name;
        $quote->email = $request->email;
        $quote->phone = $request->phone;
        $quote->message = $request->message;
        $quote->seller_id = $request->seller_id;
		$quote->status = "Received";
        $quote->save();
        return response()->json(['message'=>'Quote Added','success'=>true,'statusCode'=>200,'quote'=>$quote]);
    }
	public function saveContact(Request $request){
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return response()->json(['message'=>'Thank You We will get back to you','success'=>true,'statusCode'=>200,'contact'=>$contact]);
    }
	
	public function getdistance($from,$to)
    {

        $remFrom = str_replace(',', '', $from); //Remove Commas
        $from = urlencode($remFrom);

        $remTo = str_replace(',', '', $to); //Remove Commas
        $to = urlencode($remTo);
        $data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false&key=AIzaSyATk5VvnPJoy8U5Aw71ArL5vqGIj6fLIHI");
        $data = json_decode($data,true);
        //$distance = $data['rows'][0]['elements'][0]['distance']['text'];

        return response()->json($data);
    }
	public function searchByName($name)
    {
		$services = Service::where('name', 'Like', "%{$name}%")->where('parent_id', null)->get();
        $vendors = Seller::where('shop_name', 'Like', "%{$name}%")->where('status', 'Active')->get();
		 foreach ($vendors as $vendor) {
            $sub=Service::find($vendor->service_parent_id);
            $vendor->type=$sub->type;
        }
        $products = Product::where('name', 'Like', "%{$name}%")->where('status', 'Active')->get();
        if (count($services) == 0 && count($products) == 0 && count($vendors)==0) {
            return response()->json(['message' => 'No Results', 'success' => false]);

        } else {
            return response()->json(['success' => true, 'statusCode' => 200, 'message' => 'Results', 'service' => $services, 'products' => $products,'vendors'=>$vendors]);

        }
	}
}
