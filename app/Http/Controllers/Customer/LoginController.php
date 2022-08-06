<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
USE App\Models\User;
use Mail;
use App\Mail\LoginMail;
use App\Mail\VerifyMail;

class LoginController extends Controller
{
	public function doregister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|min:10|max:10',
            'password' => 'required|string|confirmed|min:8',
        ]);
        $usep = User::where('phone',$request->phone)->where('role_id',3)->first();

		if($usep){
		//return back()->with('flash_error', 'Phone Number Already Taken');
		}

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role_id' => 3,
            'status' => 'Active'
        ]);


            $phone = $user->phone;
            $otp_code = mt_rand(100000, 999999);
            $username = "Subbisky";
            $password = "dev@1008";
            $sender = "SUBBIO";
            $template_id='1507163240649323671';
            $message = "Dear user, your OTP number is  " . $otp_code ." Regards Subbisky www.subbisky.com";
            $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    $curl_scraped_page = curl_exec($ch);
            //echo $curl_scraped_page = curl_exec($ch);
            curl_close($ch);

            $user->verifyOtp = $otp_code;
            $user->save();

          Mail::to($user->email)->send(new VerifyMail($user));
          return view('verify-account',compact('user'));
        //return back()->with('flash_success', 'Your Seller account is created you will be notified by admin once it approved');
    }
    public function newLogin(Request $request)
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
        
        if($user)
        {
          if($user->verify=="No"){
             return view('verify-account',compact('user'));
          }
		    }
        if (Auth::attempt($credentials) && Auth::user()->role_id == 3) {

            if(auth::user()->status =="Active"){
                if (isset($_REQUEST['return']) && $_REQUEST['return'] != '') {
                    return redirect($_REQUEST['return']);
                }
                else{
                    return redirect('/');
                }
            }else{
                Auth::logout();
                return back()->with('flash_error', 'Email, Password is incorrect');
            }
        }else{
            Auth::logout();
            return back()->with('flash_error', 'Email, Password is incorrect');
        }
    }




    public function doLoginWithOTP(Request $request)
    {
      if(is_numeric($request->email)){
        if (strlen($request->email) > 10) {
          $ret['status'] = "failure";
          $ret['message'] = "Mobile Number must be 10 charachters";
          return response()->json($ret);
        }
        elseif (strlen($request->email) < 10) {
          $ret['status'] = "failure";
          $ret['message'] = "Mobile Number must be 10 charachters";
          return response()->json($ret);
        }
        elseif (strlen($request->email) == 10) {
            // dd($request->all());
          $user = User::where('phone',$request->email)->where('role_id',$request->role_id)->first();
          if ($user) {
            $phone = $user->phone;
            $otp_code = mt_rand(100000, 999999);
            $username = "Subbisky";
            $password = "dev@1008";
            $sender = "SUBBIO";
            $template_id='1507163240649323671';
            $message = "Dear user, your OTP number is  " . $otp_code ." Regards Subbisky www.subbisky.com";
            $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $curl_scraped_page = curl_exec($ch);
            curl_close($ch);
            $user->otp = $otp_code;
            $user->save();

			$ret['mobilenumbers'] = $user->id;
            $ret['status'] = "success";
            $ret['message'] = "Otp Sent";
            return response()->json($ret);
          }
          else
          {
            $ret['status'] = "failure";
            $ret['message'] = "Phone not Found in server";
            return response()->json($ret);
          }
        }
      }

      elseif (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
        $user = User::where('email',$request->email)->where('role_id',$request->role_id)->first();
        if ($user) {

		if($user->verify=="No"){
		return view('verify-account',compact('user'));
		}else{

          $otp_code = mt_rand(100000, 999999);
          $data = ['firstname' => $user->name , 'otp' => $otp_code];;
         Mail::to($user->email)->send(new LoginMail($data));
          $user->otp = $otp_code;
          if ($user->save())
          {
            $ret['user_id'] = $user->id;
            $ret['status'] = "success_email";
            $ret['message'] = "Otp Sent";
          }
          else
          {
            $ret['status'] = "failure";
            $ret['message'] = "Something Went Wrong";
          }
        }
		}
        else{
          $ret['message'] = "Email Not Found in server";
        }
        return response()->json($ret);
      }

      else{
        $ret['message'] = "Something Went Wrong";
        return response()->json($ret);
      }
    }

    public function OtpVerify(Request $request)
    {
		//dd($request->all());
      $arr = array();
      if (strlen($request->user_id) == 10) {
        $user = User::where('otp',$request->otp)
        ->where('phone',$request->user_id)->where('role_id',$request->role_id)->first();
      }
      else{
        $user = User::where('otp',$request->otp)
        ->where('id',$request->user_id)->where('role_id',$request->role_id)->first();
      }
      if (!$user) {
        $arr['message'] = "Incorrect OTP";
      }
      else{
        Auth::login($user);
        if ($user->role_id == 3) {
          $arr['succ'] =1;
        }
        else{
			// return redirect('seller/home');
          $arr['succ'] =2;
        }

      }
      return response()->json($arr);
    }
}
