<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use App\Mail\VerifyMail;
use App\Models\Service;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\SellerService;
use App\Models\City;
use App\Models\User;
use App\Models\Quote;
use App\Models\Seller;
use Illuminate\Support\Facades\Mail;
use Auth;

class SellerController extends Controller
{
    public function login()
    {   
        return view('auth.seller-login');
    }
    public function register()
    {   
        $services = Service::whereNull('parent_id')->where('status','Active')->get();
        $first_service = Service::whereNull('parent_id')->where('status','Active')->first();
        $services1 = Service::where('parent_id',$first_service->id)->get();
        $cities = City::orderBy('name','asc')->get();
        return view('auth.seller-register',compact('services','cities','services1'));
    }

    public function doregister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|min:10|max:10',
            'password' => 'required|string|confirmed|min:8',
            'service_id' => 'required|string',
            'city_id' => 'required|string'
        ]);

		
		$usep= User::where('phone',$request->phone)->where('role_id',2)->first();
		
		if($usep){
		return back()->with('flash_success', 'Phone Already Taken');
		}
		
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'service_id' => $request->service_id,
            'city_id' => $request->city_id,
            'role_id' => 2,
            'status' => 'Inactive'
        ]);

        $seller = new Seller;
        $seller->user_id = $user->id;
        $seller->service_id = $request->service_id;
        $service1 = Service::where('id',$request->service_id)->first();
        $seller->service_parent_id = $service1->service->id;
        $seller->save();
		$phone = $user->phone;
            $otp_code = mt_rand(100000, 999999);
            $username = "Subbisky";
            $password = "dev@1008";
            $sender = "SUBBIO";
            $template_id='1507163240649323671';
            $message = "Dear user, your OTP number is  " . $otp_code ."Regards Subbisky www.subbisky.com";
            $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            echo $curl_scraped_page = curl_exec($ch);
            curl_close($ch); 
            
            $user->verifyOtp = $otp_code;
            $user->save();
		 Mail::to($user->email)->send(new WelcomeMail($user));
		Mail::to($user->email)->send(new VerifyMail($user));
		return view('verify-account',compact('user'));
        //return back()->with('flash_success', 'Your Seller account is created you will be notified by admin once it approved');
    }

	public function verifyAccount(Request $request){
		//dd($request->all());
	$user=User::find($request->user_id);
	if($user->verifyOtp==$request->user_otp){
		$user->verify="Yes";
		$user->save();
		if($user->role_id==2){
	return back()->with('flash_success', 'Your Seller account is verified you will be notified by admin once it get approved');
		}else{
			
        
		return view('auth.register')->with('flash_success', 'Your account is verified');
		}
	}else{
	return back()->with('flash_error', 'Verification Failed, Please Check OTP');
	}
	
	}
    public function dologin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
		
		$user=User::where('email',$request->email)->first();
		if($user){
		if($user->verify=="No"){
		return view('verify-account',compact('user'));
		}
		}

        if (Auth::attempt($credentials) && Auth::user()->role_id == 2) {
            if(auth::user()->seller->status =="Active"){
                return redirect('seller/home');
            }else{
                Auth::logout();
                return back()->with('flash_error', 'Wait For Admin Confirmation');
            }
        }else{
            Auth::logout();
            return back()->with('flash_error', 'Email, Password is incorrect');
        }
    }

    public function fetch_sub_services(Request $request)
    {
        $services1 = Service::where('parent_id',$request->service_id)->get();
        $htmlCart = view('auth.sub-services',compact('services1'))->render();
        return response()->json(['data' => $htmlCart]);
    }
    public function getQuotes(){
        $user=Auth::user();
        $seller=Seller::where('user_id',$user->id)->first();
        $quotes=Quote::where('seller_id',$seller->id)->get();
        
        return view('seller.quotes',compact('quotes'));
    }
    

     public function dashboard()
    {
        $orders=Order::where('seller_id',Auth::user()->seller->id)->get();
        $totalOrders=count($orders);
        $seller=Seller::find(\Illuminate\Support\Facades\Auth::user()->seller->id);
        $parent=Service::find($seller->service_parent_id);
        if($parent->type=="ecom") {
            $categories = Category::where('seller_id', Auth::user()->seller->id)->get();
            $totalCategories = count($categories);
            $products = Product::where('seller_id', Auth::user()->seller->id)
                ->orderBy('id', 'DESC')->get();
            $productcount = count($products);
            $activeProducts = Product::where('seller_id', Auth::user()->seller->id)->where('status', 'Active')
                ->orderBy('id', 'DESC')->get();
            $acount = count($activeProducts);
            $inactive = Product::where('seller_id', Auth::user()->seller->id)->where('status', 'Inactive')
                ->orderBy('id', 'DESC')->get();
            $icount = count($inactive);
            return view('seller.index', compact('totalCategories', 'totalOrders', 'icount', 'productcount', 'acount'));
        }else{
            $sellerServices=SellerService::where('seller_id',$seller->id)->get();
            $sellerServiceCount=count($sellerServices);
            $active=SellerService::where('seller_id',$seller->id)->where('status','Active')->get();
            $activeSCount=count($active);
            $inactiveS=SellerService::where('seller_id',$seller->id)->where('status','Inactive')->get();
            $inactiveSCount=count($inactiveS);
            return view('seller.serviceindex', compact( 'totalOrders','sellerServiceCount','inactiveSCount','activeSCount'));
        }
    }

	
	 public function createQuote()
    {
        return view('seller.create-quote');

    }
	public function saveQuote(Request $request)
    {
        $quote = new Quote;
        $quote->name = Auth::user()->name;
        $quote->email = Auth::user()->email;
        $quote->phone = Auth::user()->phone;
        $quote->message = $request->message;
        $seller=Seller::where('user_id',Auth::id())->first();
        $quote->seller_id = $seller->id;
        $quote->status="Sent";
        $quote->save();

        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBICD";
        $template_id='1507163273095062949';
        $message = "Dear Quote added from seller ".$quote->name. ". Please check and update to seller. Thank you www.subbisky.com";
        $phone = 8971833497;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        echo $curl_scraped_page = curl_exec($ch);
        curl_close($ch); 
        ///
        return back()->with('flash_success', 'Quote Sent successfully');
    }
    public function index()
    {   
        return view('seller.index');
    }
    public function add_products()
    {   
        return view('seller.add-products');
    }
    public function add_shop()
    {   
        return view('seller.add-shop');
    }
    public function edit_products()
    {   
        return view('seller.edit-products');
    }
    public function edit_shop()
    {   
        return view('seller.edit-shop');
    }
    public function forget_password()
    { 
        return view('seller.forget-password');
    }
    public function user_profile()
    {   
        return view('seller.user-profile');
    }
    public function view_products()
    {   
        return view('seller.view-products');
    }
    public function view_shop()
    {   
        return view('seller.view-shop');
    }
}
