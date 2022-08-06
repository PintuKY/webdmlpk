<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Mail\WelcomeMail;
use App\Mail\LoginMail;
use App\Mail\VerifyMail;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\SellerService;
use Illuminate\Support\Facades\Validator;
use App\Models\Quote;
use App\Models\Review;
use App\Models\Seller;
use App\Models\Service;
use App\Models\Hotel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthController extends Controller


{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'phone' => 'required|string|min:10|max:10|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'service_id' => 'required|string',
            'city_id' => 'required|string'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'service_id' => $request->service_id,
            'city_id' => $request->city_id,
            'role_id' => 2,
            'status' => 'Inactive'

        ]);
        $user->save();

        $seller = new Seller;
        $seller->user_id = $user->id;
        $seller->service_id = $request->service_id;
        $service1 = Service::where('id', $request->service_id)->first();
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
            $curl_scraped_page = curl_exec($ch);
            curl_close($ch); 
            
            $user->verifyOtp = $otp_code;
            $user->save();
		 Mail::to($user->email)->send(new WelcomeMail($user));
		Mail::to($user->email)->send(new VerifyMail($user));
		
        return response()->json([
            'success' => true, 'statusCode' => 201, 'seller' => $seller, 'basicinfo' => $user, 'message' => 'Your Seller account is created you will be notified by admin once it approved'

        ], 201);
    }
    
    public function customerRegister(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'phone' => 'required|string|min:10|max:10|unique:users',
            'password' => 'required|string|confirmed|min:8'

        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),

           
            'role_id' => 3,
 			'status' => 'Active',

        ]);
        $user->save();

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
             $curl_scraped_page = curl_exec($ch);
            curl_close($ch);
            
            $user->verifyOtp = $otp_code;
            $user->save();
		
		Mail::to($user->email)->send(new VerifyMail($user));
        return response()->json([
            'success' => true, 'statusCode' => 201,  'user' => $user, 'message' => 'Successfully Created User'

        ], 201);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
	public function verifyAccount(Request $request){
		//dd($request->all());
	$user=User::find($request->user_id);
	if($user->verifyOtp==$request->user_otp){
		$user->verify="Yes";
		$user->save();
		if($user->role_id==2){
	return response()->json(['message'=> 'Your Seller account is verified you will be notified by admin once it get approved','statusCode'=>200]);
		}else{
		return response()->json(['message'=> 'Your account is verified','statusCode'=>200]);
		}
	}else{
	return response()->json(['message'=> 'Verification Failed, Please Check OTP','statusCode'=>401]);
	}
	
	}
      public function sellerLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized',
			'success' => false,
                    'statusCode' => 401
            ], 401);

        $user = $request->user();
		  if($user->verify!="Yes"){
		  return response()->json([
                'message' => 'Account Verification not done',
			   'success' => false,
                    'statusCode' => 401
            ], 401);
		  
		  }
        if ($user->role_id == 2) {
            $seller = Seller::where('user_id', $user->id)->first();
			 $user->seller=$seller;
            $service=Service::find($seller->service_parent_id);
            $user->type=$service->type;
            if ($seller->status == "Active") {
                $tokenResult = $user->createToken('Personal Access Token');
                $token = $tokenResult->token;
                if ($request->remember_me)
                    $token->expires_at = Carbon::now()->addWeeks(1);
                $token->save();
                return response()->json([
					'type'=>$user->type,
                    'seller' => $user,
                    'message' => 'Login Successful',
                    'success' => true,
                    'statusCode' => 200,
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString()
                ]);
            } else {
                return response()->json([
					'type'=>$user->type,
                    'seller' => $user,
                    'message' => 'Wait For Admin Confirmation',
                    'success' => true,
                    'statusCode' => 200,

                ]);
            }
        }else{
            return response()->json(['success'=>false,'statusCode'=>401,'message'=>'Unauthorized']);
        }

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        
		 if($user->verify!="Yes"){
		  return response()->json([
                'message' => 'Account Verification not done',
			   'success' => false,
                    'statusCode' => 401
            ], 401);
		  
		  }
        if ($user->role_id == 3) {
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
            return response()->json([
                'user' => $user,
                'message' => 'Login Successful',
                'success' => true,
                'statusCode' => 200,
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]);
        }else{
            return response()->json(['success'=>false,'statusCode'=>401,'message'=>'Unauthorized']);
        }
    }

  
 

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'sucess' => true,
            'message' => 'Successfully logged out',
            'statusCode' => 200
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
        public function user(Request $request)
        {
        $user = Auth::user();
			 //  if($user->city_id!=null){
      //  $city = City::find($user->city_id);
      //  $user->city_id = $city;
			//   }
        $orders = Order::where('user_id', $user->id)->where('sellerService_id', null)->where('hotel_id',null)->get();
        foreach ($orders as $order) {
            $orderList = OrderList::where('order_id', $order->id)->get();
            foreach ($orderList as $list) {
                $product = Product::find($list->product_id);
                $list->product_id = $product;
            }
            $order->list = $orderList;
        }
        $services = Order::where('user_id', $user->id)->whereNotNull('sellerService_id')->get();
        foreach ($services as $service){
            $sellerService = SellerService::find($service->sellerService_id);
        $service->sellerService_id = $sellerService;}
			   $bookings=Order::where('user_id', $user->id)->whereNotNull('hotel_id')->get();
			   foreach($bookings as $booking){
				   $hotel=Hotel::find($booking->hotel_id);
				   $booking->hotel_id=$hotel;
					   
			   }
        return response()->json(['message' => 'Customer Profile', 'statusCode' => 200, 'success' => true, 'user' => $user, 'orders' => $orders, 'services' => $services,'booking'=>$bookings]);
    }
	
	public function rating(Request $request)
    {
        $user = Auth::user();
            $order = Order::where('user_id', $user->id)->where('seller_id', $request->seller_id)->first();
            if ($order) {
                $review = Review::where('user_id', $user->id)->where('seller_id', $request->seller)->first();
                if ($review) {
                    $review->rating = $request->rating;
                    $review->review = $request->review;
                    $review->save();
                } else {
                    $rating = new Review();
                    $rating->rating = $request->rating;
                    $rating->seller_id = $request->seller_id;
                    $rating->user_id = Auth::id();
                    $rating->save();
                }
                return response()->json(['success'=>true,'statusCode'=>200,'message'=>'Thank You For Your Review']);

            } else {
                return response()->json(['success'=>false,'statusCode'=>401,'message'=>'Sorry, You Do Not Have Access To This Feature']);
            }

    }
	
    public function fetchSubServices($sid)
    {
        $services1 = Service::where('parent_id',$sid)->get();
       return response()->json(['message'=>'Sub Services','success'=>true,'statusCode'=>200,'sub'=>$services1]);
    }
    public function services(){
        $services = Service::whereNull('parent_id')->where('status','Active')->get();
        return response()->json(['message'=>'Services','success'=>true,'statusCode'=>200,'services'=>$services]);
    }
	 public function getQuotes(){
        $user=Auth::user();
        $seller=Seller::where('user_id',$user->id)->first();
        $quotes=Quote::where('seller_id',$seller->id)->get();
        return response()->json(['message'=>'Quotes','success'=>true,'statusCode'=>200,'quotes'=>$quotes]);
    }
    //change password
    public function changePassword(Request $request)
    {

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {

            // The passwords matches
            return response()->json(['message' => 'Your current password does not matches with the password you provided. Please try again.']);
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return response()->json(['message' => 'New Password cannot be same as your current password. Please choose a different password.']);
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return response()->json(['success' => true, 'statusCode' => 200, 'message' => "Password changed successfully !"]);

    }
    public function  getCities(){
        $cities=City::all();
        return response()->json(['message'=>'cities','success'=>true,'statusCode'=>200,'cities'=>$cities]);
    }

  public function dashboard()
    {
        $orders = Order::where('seller_id', Auth::user()->seller->id)->get();
        $totalOrders = count($orders);
        $seller = Seller::find(Auth::user()->seller->id);
        $parent = Service::find($seller->service_parent_id);
        if ($parent->type == "ecom") {
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
            return response()->json(['message' => 'Dashboard','type'=>$parent->type ,'success' => true, 'statusCode' => 200, 'totalCategories' => $totalCategories, 'totalProduct' => $productcount, 'activeProduct' => $acount, 'inactiveProduct' => $icount, 'totalOrders' => $totalOrders]);
        } else {
            $sellerServices = SellerService::where('seller_id', $seller->id)->get();
            $sellerServiceCount = count($sellerServices);
            $active = SellerService::where('seller_id', $seller->id)->where('status', 'Active')->get();
            $activeSCount = count($active);
            $inactiveS = SellerService::where('seller_id', $seller->id)->where('status', 'Inactive')->get();
            $inactiveSCount = count($inactiveS);
            return response()->json(['message' => 'Dashboard','type'=>$parent->type, 'success' => true, 'statusCode' => 200, 'totalService' => $sellerServiceCount, 'activeService' => $activeSCount, 'inactiveService' => $inactiveSCount, 'totalOrders' => $totalOrders]);
        }

    }
    public function updateCustomerProfile(Request $request)
    {

        $user = User::find(Auth::id());
        $this->validate($request, [
            "email" => 'required|string|email',
            'name' => 'required',
            'phone' => 'required|string|min:10|max:10',
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
        return response()->json(['message'=>'Profile Updated','success'=>true,'statusCode'=>200,'user'=>$user]);
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
        //
        $username = "Subbisky";
        $password = "dev@1008";
        $sender = "SUBICD";
        $template_id='1507163273095062949';
        $message = "Dear Quote added from seller ".$quote->name. ". Please check and update to seller. Thank you www.subbisky.com";
        $phone = 8971833497;
        $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch); 
        //
        return response()->json(['success'=>true,'statusCode'=>200,'message'=>'Quote Sent','quote'=>$quote]);
    }
	 public function loginWithOtp(Request $request)
    {
		 $responseData = ['message' => 'Something went wrong, please try again later'];
        $statusCode = 403;
         if(is_numeric($request->phone)){
        if (strlen($request->phone) > 10) {
			 $responseData['status'] = "failure";
			 $responseData['statusCode'] = 422;
                $responseData['message'] = "Mobile Number must be 10 charachters";
                $statusCode = 422;
			 return response()->json($responseData)->setStatusCode($statusCode);
         
        }
        elseif (strlen($request->phone) < 10) {
           $responseData['status'] = "failure";
			 $responseData['statusCode'] = 422;
                $responseData['message'] = "Mobile Number must be 10 charachters";
                $statusCode = 422;
			 return response()->json($responseData)->setStatusCode($statusCode);
        }
        elseif (strlen($request->phone) == 10) {
          $user = User::where('phone',$request->phone)->where('role_id',3)->first();
          if ($user) {
			  
		if($user->verify=="No"){
			 $responseData['status'] = "failure";
			 $responseData['statusCode'] = 422;
                $responseData['message'] = "Verification not done";
                $statusCode = 422;
			return response()->json($responseData)->setStatusCode($statusCode);
		
		}else{
		
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
           $curl_scraped_page = curl_exec($ch);
            curl_close($ch); 
            
            $user->otp = $otp_code;
            $user->save();
			 $responseData['status'] = "success_phone";
			// $responseData['s'] =$curl_scraped_page;
                $responseData['message'] = "Otp Sent";
			 $responseData['statusCode'] = 200;
                $statusCode = 200;
            $responseData['user'] = $user;
			 return response()->json($responseData)->setStatusCode($statusCode);
		}
          }
          else
          {
			   $responseData['status'] = "failure";
                $responseData['message'] = "Phone not Found in server";
			   $responseData['statusCode'] = 422;
                $statusCode = 422;
            return response()->json($responseData)->setStatusCode($statusCode);
          }
        }
      }

      elseif (filter_var($request->phone, FILTER_VALIDATE_EMAIL)) {
        $user = User::where('email',$request->phone)->where('role_id',3)->first();
        if ($user) {
			
		if($user->verify=="No"){
		$responseData['status'] = "failure";
                $responseData['message'] = "Verification not done";
                $statusCode = 422;
			 $responseData['statusCode'] = 422;
			return response()->json($responseData)->setStatusCode($statusCode);
		}else{
		
          $otp_code = mt_rand(100000, 999999);
          $data = ['firstname' => $user->name , 'otp' => $otp_code];;
         Mail::to($user->email)->send(new LoginMail($data));
          $user->otp = $otp_code;
          if ($user->save()) 
          {
			  $responseData['status'] = "success_email";
                $responseData['message'] = "Otp Sent";
                $statusCode = 200;
			   $responseData['statusCode'] = 200;
            $responseData['user'] = $user;
           return response()->json($responseData)->setStatusCode($statusCode);
          }
          else
          {
			  $responseData['status'] = "failure";
			   $responseData['statusCode'] = 422;
                $responseData['message'] = "Something Went Wrong";
               return response()->json($responseData)->setStatusCode($statusCode);
            
          }
        }
		}
        else{
			 $responseData['status'] = "failure";
			 $responseData['statusCode'] = 422;
                $responseData['message'] = "Email Not Found in server";
         return response()->json($responseData)->setStatusCode($statusCode);
        }
        
      }

      else{
		   $responseData['statusCode'] = 422;
		   $responseData['message'] = "Something Went Wrong";
        return response()->json($responseData)->setStatusCode($statusCode);
        
      }
    }

    public function verifyLoginOtp(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'phone' => 'min:10|max:10|required|regex:/[0-9]/',
            'otp' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "error" => "Validation Errors",
                'status' => 'failure',
                "validationErrors" => $validator->errors()
            ], 422);
        }

        $user = User::where(['phone' => $request->phone, 'otp' => $request->otp, 'role_id' => 3])->first();
        if ($user) {
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
            return response()->json([
                'user' => $user,
                'message' => 'Login Successful',
                'success' => true,
                'statusCode' => 200,
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]);


        } else {
            return response()->json([

                'message' => 'Invalid OTP',
                'success' => false,
                'statusCode' => 404,

            ]);

        }
    }

    public function sellerloginWithOtp(Request $request)
    {
        $responseData = ['message' => 'Something went wrong, please try again later'];
        $statusCode = 403;
         if(is_numeric($request->phone)){
        if (strlen($request->phone) > 10) {
			 $responseData['status'] = "failure";
                $responseData['message'] = "Mobile Number must be 10 charachters";
                $statusCode = 422;
			 $responseData['statusCode'] = 422;
			 return response()->json($responseData)->setStatusCode($statusCode);
         
        }
        elseif (strlen($request->phone) < 10) {
           $responseData['status'] = "failure";
                $responseData['message'] = "Mobile Number must be 10 charachters";
                $statusCode = 422;
			 $responseData['statusCode'] = 422;
			 return response()->json($responseData)->setStatusCode($statusCode);
        }
        elseif (strlen($request->phone) == 10) {
          $user = User::where('phone',$request->phone)->where('role_id',2)->first();
          if ($user) {
			  
		if($user->verify=="No"){
			 $responseData['status'] = "failure";
                $responseData['message'] = "Verification not done";
                $statusCode = 422;
			 $responseData['statusCode'] = 422;
			return response()->json($responseData)->setStatusCode($statusCode);
		
		}else{
		
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
           $curl_scraped_page = curl_exec($ch);
            curl_close($ch); 
            
            $user->otp = $otp_code;
            $user->save();
			 $responseData['status'] = "success_phone";
                $responseData['message'] = "Otp Sent";
                $statusCode = 200;
			 $responseData['statusCode'] = 200;
            $responseData['user'] = $user;
			 return response()->json($responseData)->setStatusCode($statusCode);
		}
          }
          else
          {
			   $responseData['status'] = "failure";
                $responseData['message'] = "Phone not Found in server";
                $statusCode = 422;
			   $responseData['statusCode'] = 422;
            return response()->json($responseData)->setStatusCode($statusCode);
          }
        }
      }

      elseif (filter_var($request->phone, FILTER_VALIDATE_EMAIL)) {
        $user = User::where('email',$request->phone)->where('role_id',2)->first();
        if ($user) {
			
		if($user->verify=="No"){
		$responseData['status'] = "failure";
                $responseData['message'] = "Verification not done";
                $statusCode = 422;
			 $responseData['statusCode'] = 422;
			return response()->json($responseData)->setStatusCode($statusCode);
		}else{
		
          $otp_code = mt_rand(100000, 999999);
          $data = ['firstname' => $user->name , 'otp' => $otp_code];;
         Mail::to($user->email)->send(new LoginMail($data));
          $user->otp = $otp_code;
          if ($user->save()) 
          {
			  $responseData['status'] = "success_email";
                $responseData['message'] = "Otp Sent";
                $statusCode = 200;
			   $responseData['statusCode'] = 200;
            $responseData['user'] = $user;
           return response()->json($responseData)->setStatusCode($statusCode);
          }
          else
          {
			  $responseData['status'] = "failure";
			   $responseData['statusCode'] = 422;
                $responseData['message'] = "Something Went Wrong";
               return response()->json($responseData)->setStatusCode($statusCode);
            
          }
        }
		}
        else{
			 $responseData['status'] = "failure";
			 $responseData['statusCode'] = 422;
                $responseData['message'] = "Email Not Found in server";
         return response()->json($responseData)->setStatusCode($statusCode);
        }
        
      }

      else{
		   $responseData['message'] = "Something Went Wrong";
		   $responseData['statusCode'] = 422;
        return response()->json($responseData)->setStatusCode($statusCode);
        
      }
		   
    }

    public function verifySellerLoginOtp(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'phone' => 'min:10|max:10|required|regex:/[0-9]/',
            'otp' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "error" => "Validation Errors",
                'status' => 'failure',
                "validationErrors" => $validator->errors()
            ], 422);
        }

        $user = User::where(['phone' => $request->phone, 'otp' => $request->otp, 'role_id' => 2])->first();
        if ($user) {
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
            $seller = Seller::where('user_id', $user->id)->first();
            $user->seller = $seller;
            $service = Service::find($seller->service_parent_id);
            $user->type = $service->type;
            return response()->json([
                'user' => $user,
                'message' => 'Login Successful',
                'success' => true,
                'statusCode' => 200,
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]);


        } else {
            return response()->json([

                'message' => 'Invalid OTP',
                'success' => false,
                'statusCode' => 404,

            ]);

        }
    }

}

