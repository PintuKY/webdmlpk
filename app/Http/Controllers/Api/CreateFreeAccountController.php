<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Mail;
use Carbon\Carbon;
use App\Mail\LoginMail;
use App\Mail\VerifyMail;



class CreateFreeAccountController extends Controller
{

	public function CreatefreeAccount(Request $request)
	{

		Log::info($request->all());

		$validator = Validator::make($request->all(), [
			'name'		 => 'required|string',
			'email' 	 => 'required|string|email|unique:users',
			'phone' 	 => 'required|string|min:10|max:10|unique:users',
			'password' 	 => 'required|string|confirmed|min:8'
		]);

		if ($validator->fails()) {
			return response(['error' => $validator->errors()->all()]);
		}

		try {

			$user = new User;
			$user->name 		= $request->name;
			$user->email		= $request->email;
			$user->phone		= $request->phone;
			$user->role_id		= 3;
			$user->password 	= Hash::make($request->password);
			$user->status  		= 'Active';
			$phone 				= $user->phone;
			$otp_code 			= mt_rand(100000, 999999);
			$username 			= "Subbisky";
			$password 			= "dev@1008";
			$sender 			= "SUBBIO";
			$template_id 		= '1507163240649323671';
			$message 			= "Dear user, your OTP number is  " . $otp_code . " Regards Subbisky www.subbisky.com";
			$url 				= "https://login.bulksmsgateway.in/sendmessage.php?user=" . urlencode($username) . "&password=" . urlencode($password) . "&mobile=" . urlencode($phone) . "&sender=" . urlencode($sender) . "&message=" . urlencode($message) . "&type=" . urlencode('3') . "&template_id=" . urlencode($template_id);
			$ch 				= curl_init($url);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$curl_scraped_page = curl_exec($ch);
			//echo $curl_scraped_page = curl_exec($ch);
			curl_close($ch);
			$user->verifyOtp = $otp_code;
			$user->save();
			$token = $user->createToken('LaravelAuthApp')->accessToken;
			Mail::to($user->email)->send(new VerifyMail($user));
			return view('verify-account', compact('user'));
			//return response()->json(['token' => $token],  200);

		} catch (Exception $e) {
			Log::error($e->getMessage());
			return response(['data' => "internal Server Error", 'error' => true]);
		}
	}

	public function verifyAccounts(Request $request)
	{
		//dd($request->all());
		$user = User::find($request->user_id);
		//dd($user);
		if ($user->verifyOtp == $request->user_otp) {
			$user->verify = "Yes";
			$user->save();
			if ($user->role_id == 2) {
				return response()->json(['message' => 'Your Seller account is verified you will be notified by admin once it get approved', 'statusCode' => 200]);
			} else {
				return response()->json(['message' => 'Your account is verified', 'statusCode' => 200]);
			}
		} else {
			return response()->json(['message' => 'Verification Failed, Please Check OTP', 'statusCode' => 401]);
		}
	}

	public function login(Request $request)
	{

		Log::info("Request data");
		Log::info($request->all());

		$validator = Validator::make($request->all(), [
			'email'    => 'required|string|email',
			'password' => 'required|string'
		]);

		if ($validator->fails()) {

			return response(['error' => $validator->errors()->all()]);
		}

		$data = [
			'email'	   => $request->email,
			'password' => $request->password
		];	

		$user = User::where('email', $request->email)->first();

		if ($user) {
			if ($user->verify == "No") {

				return response(['message' => "Account verify not done.!", 'success' => false, 'status' => 401], 401);
			}
		}

		if (Auth::attempt($data)) {

			Log::info("Logined successfully");

			if ($user->role_id == 3) {
				$tokenResult = $user->createToken('Personal Access Token');
				
				Log::info($tokenResult);
				$token = $tokenResult->token;
				
				Log::info($token);
				if ($request->remember_me)
					$token->expires_at = Carbon::now()->addWeeks(1);
				$token->save();

				Log::info("Data Updated");
				return response()->json([
					'message' => 'Login Successfully',
					'user' =>$user,
					'statusCode' => 200,
					'status' =>true,
					'access_token' =>$tokenResult->accessToken,
					'Token_type' =>'Bearer',
					'expires_at' =>Carbon::parse(
						$tokenResult->token->expires_at
					)->toDateTimeString()
				
				], 200);
			}
			else{

				return response(['error'=> 'Aunauthorize','success' =>false,'statusCode' =>401],401);
			}
			// if ($user->role_id == 3) {
			// 	$tokenResult = $user->createToken('Personal Access Token');
			// 	$token = $tokenResult->token;
			// 	if ($request->remember_me)
			// 		$token->expires_at = Carbon::now()->addWeeks(1);
			// 	$token->save();
			// 	return response()->json([
			// 		'user' => $user,
			// 		'message' => 'Login Successful',
			// 		'success' => true,
			// 		'statusCode' => 200,
			// 		'access_token' => $tokenResult->accessToken,
			// 		'token_type' => 'Bearer',
			// 		'expires_at' => Carbon::parse(
			// 			$tokenResult->token->expires_at
			// 		)->toDateTimeString()
			// 	]);
			// }else{
			// 	return response()->json(['success'=>false,'statusCode'=>401,'message'=>'Unauthorized']);
			// }
		}
		else{
			return response(['error'=> 'Given Credential are wrong','success' =>false,'statusCode' =>401],401);
		}
	}
	public function SellerSignup(Request $request){
		Log::info($request->all());
		
	}
}
