<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Service;
use App\Models\SellerService;
use App\Models\Contact;
use App\Models\Review;
use App\Models\User;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Quote;
use App\Models\Hotel;
use App\Models\Amenity;
use App\Models\City;
use Carbon\Carbon;
use DB;
use Session;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banner::where('status','Active')->get();
        $services = Service::whereNull('parent_id')->where('status','Active')->get();
		if($request->city){
		$city = City::where('name', $request->city)->first();
		$city_name = $request->city;
	    return view('city',compact('banners','services','city','city_name'));
		}
		else
        return view('welcome',compact('banners','services'));
    }
    public function service(Request $request, $slug)
    {
        $data=Session::get('data');
        //dd($data);

        $service = Service::where('slug',$slug)
			->where('status','Active')
			->first();
        $nearby_shop = Service::where('slug',$slug)
			->where('status','Active')
			->first();
        $main=Service::find($nearby_shop->parent_id);
		$sellers = Seller::where('service_id',$service->id)
			->where('status','Active')
			->paginate(500);
		
        if($main->type=="staybooking"){
            if(!$data){
                return view('service.staybooking.search',compact('service'));
            }
			
			$rooms = count($data['rooms']);
			//$sellers_ = [];
			$items = 0 ;
			
			if($data['adult'] != 1)
			{
				$city = City::where('name', $data['adult'])->first();
				foreach($sellers as $seller){
				$hotels=Hotel::where('seller_id',$seller->id)->sum('available_rooms');
				if($hotels >= $rooms && $seller->user->city_id == @$city->id)
					$items++;
				//$sellers_[] = Seller::find($seller->id);
			    }
				return view('service.staybooking.staybooking-list_city',compact('service','nearby_shop','main','sellers','data','items','rooms','city'));
			}
			else
			{
			    foreach($sellers as $seller){
				$hotels=Hotel::where('seller_id',$seller->id)->sum('available_rooms');
				if($hotels >= $rooms)
					$items++;
				//$sellers_[] = Seller::find($seller->id);
			    }
				return view('service.staybooking.staybooking-list',compact('service','nearby_shop','main','sellers','data','items','rooms'));
			}
        }
		
		if($request->city){
		$city = City::where('name', $request->city)->first();
		$items = 0 ;
		foreach($sellers as $seller){
			if($seller->user->city_id == @$city->id)
								$items++;
		}
		return view('service.ecom-shop-list_city',compact('service','nearby_shop','main','sellers','data','items','city'));
		}
		
        return view('service.ecom-shop-list',compact('service','nearby_shop','main','sellers','data'));
    }
	 public function serviceSeller($id,$sid)
    {
        $shop = Seller::where('status', 'Active')->where('id',$id)->first();
		 $service=Service::find($shop->service_parent_id);
        if($shop){
            $sellerServices=SellerService::where('id',$sid)->where('status','Active')->first();
            return view('service.seller-service',compact('shop','sellerServices','service'));
        }else{
            abort(404);
        }
    }
    public function services(Request $request, $slug)
    {
        $service = Service::where('slug',$slug)->where('status','Active')->first();
        if ($service) {
            if($service->slug=='stay-booking'){
            return view('service.staybooking.search',compact('service'));
        }
        else{
			
		if($request->city){
		$city = City::where('name', $request->city)->first();
		$city_name = $request->city;
	    return view('service.ecom_city',compact('service','city','city_name'));
		}
		else
            return view('service.ecom',compact('service'));
        }
			
        }
        else{
            abort(404);
        }
     }

	 public function instituteEducation($id)
     {
        $shop = Seller::where('status', 'Active')->where('id', $id)->first();

        if ($shop) {
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
            $services = SellerService::where('seller_id', $shop->id)->get();
            return view('service.education.education-list', compact('shop', 'services','reviews'));
        } else {
            abort(404);
        }

    }

	public function stayBookingSearch(Request $request,$id)
    {
		$maximum=0;
        $data=Session::get('data');
        if(!$data){
            return redirect()->route('services','stay-booking');
        }
		if (isset($data['from_date']) && $data['from_date']!='' && isset($data['to_date']) && $data['to_date']!='' && isset($data['adult']) && $data['adult']!='') {
		//dd($data);
        $children= $data['children'];
		$adults= $data['adults'];
			$rooms= $data['rooms'];
		if (count($children)) {
			$totalChildren=0;
			$totalAdult=0;
			$adultExtra=0;
			$childrenExtra=0;
			$totalRoom=count($rooms);
			$totalArray=[];
            foreach($children as $key => $input) {
                if ($children[$key]!=null && $adults[$key]!=null) {
                    $totalChildren += $children[$key];
					 $totalAdult += $adults[$key];
                   $total=$children[$key] + $adults[$key];

					if($total>2){
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
					$roomLimit = Seller::where('status', 'Active')->where('id', $id)->first();
if($total>$roomLimit->room_capacity){
return back()->with('failure','Limit For One room cannot exceed '.$roomLimit->room_capacity);
}

                }
            }
        }
	}
        $shop = Seller::where('status', 'Active')->where('id', $id)->first();
        if (isset($data['from_date']) && $data['from_date']!='' && isset($data['to_date']) && $data['to_date']!='' && isset($data['adult']) && $data['adult']!='') {
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
                $data_review = 0;
            }else{
            $data_review = round(array_sum($totalReviews) / $count);
			}
            $shop->ratingCount=$count;
            $shop->ratingAverage = $data_review;
           // dd($shop);
            return view('service.staybooking.stay-booking-details',compact('shop','hotels','reviews','totalRoom','totalChildren','totalAdult','adultExtra','childrenExtra','data'));
        }
        else{
            return view('service.staybooking.search',compact('shop'));
        }
    }

	public function hospitalHealth($id)
    {
        $shop = Seller::where('status', 'Active')->where('id', $id)->first();

        if ($shop) {
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
            $services = SellerService::where('seller_id', $shop->id)->get();
            return view('service.health.health-list', compact('shop', 'services','reviews'));
        } else {
            abort(404);
        }

    }
    public function shopProducts($id)
    {
        $shop = Seller::where('status','Active')->where('id',$id)->first();
        if ($shop) {
            $products = Product::where('seller_id',$shop->id)->paginate(20);
            return view('service.ecom-products',compact('shop','products'));
        }
        else{
            abort(404);
        }
    }

    public function shopCategory($seller_id,$category_id)
    {
        $shop = Seller::where('status','Active')->where('id',$seller_id)->first();
        if ($shop) {
            $products = Product::where('category_id',$category_id)->where('status','Active')->paginate(10);
            return view('service.ecom-products',compact('shop','products'));
        }
        else{
            abort(404);
        }
    }


    public function shopProductDetails($seller_id,$product_id)
    {
        $shop = Seller::where('status','Active')->where('id',$seller_id)->first();
        if ($shop) {
            $product = Product::where('id',$product_id)->where('status','Active')->first();
            return view('service.ecom-product-detail',compact('product'));
        }
        else{
            abort(404);
        }
    }
public function shopServices($id)
    {
        $shop = Seller::where('status', 'Active')->where('id', $id)->first();
	  $main =Service::find($shop->service_parent_id);
        if ($shop) {
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
            $services = SellerService::where('seller_id', $shop->id)->get();
            return view('service.seller-services', compact('shop', 'services','reviews','main'));
        } else {
            abort(404);
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
        return back()->with('flash_success', 'Quote Sent successfully');
    }
  public function saveContact(Request $request){
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return back()->with('flash_success','Thank You We will get back to you');
    }
	public function createaccount(Request $request)
	{
		  $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|string',
			'mobile' => 'required'
            
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->mobile;
       
        $user->save();
        return back()->with('flash_success', 'Your Account Created Successfull');
	}

	 public static function getdistance(Request $request)
    {
		$from=$request->from;
		 $to=$request->to;
		 $sellerService=SellerService::find($request->seller);
        $remFrom = str_replace(',', '', $from); //Remove Commas
        $from = urlencode($remFrom);

        $remTo = str_replace(',', '', $to); //Remove Commas
        $to = urlencode($remTo);
        $data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false&key=AIzaSyATk5VvnPJoy8U5Aw71ArL5vqGIj6fLIHI");
        $data = json_decode($data,true);
        $distance = $data['rows'][0]['elements'][0]['distance']['text'];
        $trim=substr($distance, 0, -2);
		$meter= $data['rows'][0]['elements'][0]['distance']['value'];
		 $convert=$meter/1000;
		 $total=$sellerService->price*$convert;
        return response()->json(['distance'=>$convert,'total'=>round($total,2)]);
    }
    public function stay_lists(Request $request){
       // dd($request->all());
        $data['stay_type']=$request->stay_type;
        $data['from_date']=$request->from_date;
        $data['to_date']=$request->to_date;
        $data['rooms']=$request->rooms;
        $data['adults']=$request->adults;
        $data['children']=$request->children;
        $data['adult']=$request->adult;
       // dd($data);
        Session::put('data',$data);
       $slug=Service::findOrfail($request->stay_type);
       $slug=$slug->slug;
    //    $service = Service::where('slug',$slug)->where('status','Active')->first();
    //    $nearby_shop = Service::where('slug',$slug)->where('status','Active')->first();
    //    $main=Service::find($nearby_shop->parent_id);
    //     $sellers=Seller::where('service_id',$service->id)->where('status','Active')->paginate(2);
        return redirect('/service/'.$slug);

    //    return view('service.ecom-shop-list',compact('service','nearby_shop','main','sellers'));
    }




    public function about_us()
    {
        return view('about-us');
    }
    public function checkout()
    {
        return view('checkout');
    }
    public function contactus()
    {
        return view('contactus');
    }

    public function doctors_booking_list_details()
    {
        return view('doctors-booking-list-details');
    }
    public function doctors_name_list()
    {
        return view('doctors-name-list');
    }
    public function education_categories()
    {
        return view('education-categories');
    }
    public function govt_categories()
    {
        return view('govt-categories');
    }
    public function food_categories()
    {
        return view('food-categories');
    }
    public function health_categories()
    {
        return view('health-categories');
    }
    public function pick_drop_categories()
    {
        return view('pick-drop-categories');
    }
    public function professional_categories()
    {
        return view('professional-categories');
    }
    public function service_categories()
    {
        return view('service-categories');
    }
    public function shop_categories()
    {
        return view('shop-categories');
    }
    public function food_menu_list()
    {
        return view('food-menu-list');
    }
    public function food_shop_name_list()
    {
        return view('food-shop-name-list');
    }
    public function shop_name_list()
    {
        return view('shop-name-list');
    }
    public function shop_product_list()
    {
        return view('shop-product-list');
    }
    public function single_product_details()
    {
        return view('single-product-details');
    }
    public function govt_department_name_list()
    {
        return view('govt-department-name-list');
    }
    public function pick_drop_name_list()
    {
        return view('pick-drop-name-list');
    }
    public function educations_list_details()
    {
        return view('educations-list-details');
    }
    public function professional_list_details()
    {
        return view('professional-list-details');
    }
    public function hospital_booking_list_details()
    {
        return view('hospital-booking-list-details');
    }
    public function pick_drop_booking_list_details()
    {
        return view('pick-drop-booking-list-details');
    }
    public function stay_booking_list_details()
    {
        return view('stay-booking-list-details');
    }
    public function stay_booking_list()
    {
        return view('stay-booking-list');
    }
    public function stay_booking()
    {
        return view('stay-booking');
    }
    public function service_list_details()
    {
        return view('service-list-details');
    }
    public function hospital_name_list()
    {
        return view('hospital-name-list');
    }
    public function service_name_list()
    {
        return view('service-name-list');
    }
    public function educations_name_list()
    {
        return view('educations-name-list');
    }
    public function professional_name_list()
    {
        return view('professional-name-list');
    }
    public function forget_password()
    {
        return view('forget-password');
    }
    public function login()
    {
        return view('login');
    }
	
    public function myaccount()
    {
        return view('myaccount');
    }
    public function privacy_policy()
    {
        return view('privacy-policy');
    }
    public function register()
    {
        return view('register');
    }
    public function terms_and_conditions()
    {
        return view('terms-and-conditions');
    }
    public function wishlist()
    {
        return view('wishlist');
    }

    public function searchTerm(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $searchResults = Service::where('name', 'like', '%' . $query . '%')->whereNull('parent_id')->get();
            $vendors = Seller::where('shop_name', 'Like', '%' . $query . '%')->where('status', 'Active')->get();

            $products = Product::where('name', 'Like', '%' . $query . '%')->where('status', 'Active')->get();

            $output = '<ul>';
             foreach ($products as $product){
                 $output .= '<li class="class_li">
                    <a class="search_a" href="'.url('/').'/shop/'.$product->seller_id.'/product/'.$product->id.'">'.$product->name.'</a></li>';
             }
			    foreach ($vendors as $vendor) {
                $sub=Service::find($vendor->service_parent_id);
                if($sub->type == "ecom") {
                    $output .= '<li class="class_li">
                    <a class="search_a" href="' . url('/') . '/shop/' . $vendor->id . '">' . $vendor->shop_name . '</a></li>';
                }elseif($sub->type == "service") {
                    $output .= '<li class="class_li">
                    <a class="search_a" href="' . url('/') . '/sellerAllServices/' . $vendor->id . '">' . $vendor->shop_name . '</a></li>';
                } elseif ($sub->type == "education") {
                    $output .= '<li class="class_li">
                    <a class="search_a" href="' . url('/') . '/educationList/' . $vendor->id . '">' . $vendor->shop_name . '</a></li>';
                } elseif ($sub->type == "health") {
                    $output .= '<li class="class_li">
                    <a class="search_a" href="' . url('/') . '/hospitalList/' . $vendor->id . '">' . $vendor->shop_name . '</a></li>';
                } elseif ($sub->type == "staybooking") {
                    $output .= '<li class="class_li">
                    <a class="search_a" href="' . url('/') . '/stay-booking/' . $vendor->id . '">' . $vendor->shop_name . '</a></li>';
                } elseif ($sub->type == "pd") {
                    $output .= '<li class="class_li">
                    <a class="search_a" href="' . url('/') . '/sellerAllServices/' . $vendor->id . '">' . $vendor->shop_name . '</a></li>';
                } elseif ($sub->type == "professional") {
                    $output .= '<li class="class_li">
                    <a class="search_a" href="' . url('/') . '/sellerAllServices/' . $vendor->id . '">' . $vendor->shop_name . '</a></li>';
                } }
            foreach($searchResults as $row)
            {
                $output .= '<li class="class_li">
                    <a class="search_a" href="'.url('/').'/services/'.$row->slug.'">'.$row->name.'</a></li>';
            }
              $output .= '</ul>';
              echo $output;
        }
    }
}
