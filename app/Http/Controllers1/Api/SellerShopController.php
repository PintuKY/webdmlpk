<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\City;
use App\Models\Seller;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Seller::where('user_id',Auth::id())->first();
		$data->shop_image=url('/') . "/public/uploads/shops/" . $data->shop_image;
		 $parent=Service::find($data->service_parent_id);
        $data->service_parent_id=$parent;
		 $servicee=Service::find($data->service_id);
        $data->service_id=$servicee;
        $user=Auth::user();
		 $user->seller->shop_image=url('/') . "/public/uploads/shops/" . $user->seller->shop_image;
		 $service_parent=Service::find($user->Seller->service_parent_id);
        $user->seller->service_parent_id=$service_parent;
		 $service=Service::find($user->seller->service_id);
        $user->seller->service_id=$service;
        $cities = City::orderBy('name','asc')->get();
        $bank = Bank::where('seller_id',Auth::user()->seller->id)->first();

    return response()->json(['message'=>'Details','success'=>true,'statusCode'=>200,'basicinfo'=>$user,'seller'=>$data,'cities'=>$cities,'bank'=>$bank]);
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
    public function shopupdate(Request $request)
    {

        $this->validate($request, [
            'shop_name' => 'required',
            'shop_address' => 'required',
            'city_id' => 'required',
        ]);
        $data = Seller::find(Auth::user()->seller->id);
        $data->shop_name = $request->shop_name;
        $data->shop_address = $request->shop_address;
		 $data->description = $request->description;
		if ($request->has('open_close_time')) {
            $data->open_close_time = $request->open_close_time;
        }
		if ($request->has('room_capacity')) {
            $data->room_capacity = $request->room_capacity;
        }
        $data->iframe = $request->iframe;
        if($request->hasfile('shop_image'))
        {
            @unlink(public_path('uploads/shops/'.$data->shop_image));
            $file = $request->file('shop_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $file->move(public_path('uploads/shops'),$filename);
            $data->shop_image = $filename;
        }
        $data->save();

        $user = User::find(auth::id());
        $user->city_id = $request->city_id;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();
    return response()->json(['message'=>'Shop Updated Successfully','success'=>true,'statusCode'=>200,'shop'=>$data,'user'=>$user]);
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
    public function updateBank(Request $request)
    {
        $this->validate($request, [
            'account_number' => 'required',
            'account_name' => 'required',
            'ifsc' => 'required',
            'upi_id' => 'required',
        ]);

        $bank = Bank::where('seller_id',Auth::user()->seller->id)->first();
        if (!$bank) {
            $bank = new Bank;
        }
        $bank->seller_id = Auth::user()->seller->id;
        $bank->account_number = $request->account_number;
        $bank->account_name = $request->account_name;
        $bank->ifsc = $request->ifsc;
        $bank->upi_id = $request->upi_id;
        $bank->save();

       return response()->json(['message'=>'Bank Details Updated Successfully','success'=>true,'statusCode'=>200,'bank'=>$bank]);
    }

    public function wallets()
    {
        $seller_id = Auth::user()->seller->id;
        $amount =
            Wallet::where('seller_id',$seller_id)
                ->where('status','Credit')->sum('amount') -
            Wallet::where('seller_id',$seller_id)
                ->where('status','Debit')->sum('amount');

        $data = Wallet::where('seller_id',Auth::user()->seller->id)->get();
       return response()->json(['message'=>'Wallet','success'=>true,'statusCode'=>200,'wallet'=>$data,'amount'=>$amount]);
    }
	public function updateDelivery(Request $request)
    {
         $data = Seller::find(Auth::user()->seller->id);
        $data->deliveryStatus = $request->delivery_status;
        $data->deliveryCharge = $request->delivery_charge;
		if($request->cod){
		$data->cod = $request->cod;
		}
        $data->save();

        return response()->json(['success'=>true,'statusCode'=>200,'message'=>'Delivery Details Updated']);
    }
	public function getDeliveryCharge($id){
	$seller=Seller::find($id);
		if($seller){
		if($seller->deliveryStatus=="Active"){
		  return response()->json(['success'=>true,'statusCode'=>200,'message'=>'Enabled','charge'=>$seller->deliveryCharge]);
		}else{
		  return response()->json(['success'=>false,'statusCode'=>404,'message'=>'Disabled']);
		}
		}else{
		return response()->json(['success'=>false,'statusCode'=>404,'message'=>'Not Found']);
		}
	}
}
