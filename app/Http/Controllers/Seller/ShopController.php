<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Helpers\Helper;
use App\Models\Service;
use App\Models\City;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Bank;
use Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Seller::where('user_id',Auth::id())->first();
        $cities = City::orderBy('name','asc')->get();
		 $mainService=Service::find($data->service_parent_id);
        $bank = Bank::where('seller_id',Auth::user()->seller->id)->first();
        return view('seller.shop.index',compact('data','cities','bank','mainService'));
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
    public function update(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'shop_name' => 'required',
            'shop_address' => 'required',
            'city_id' => 'required',
        ]);
        $data = Seller::find(Auth::user()->seller->id);
        $data->shop_name = $request->shop_name;
        $data->shop_address = $request->shop_address;
		 if ($request->has('room_capacity')) {
            $data->room_capacity = $request->room_capacity;
        }
		 if ($request->has('description')) {
            $data->description = $request->description;
        }
		if ($request->has('open_time')) {
            $data->open_time = $request->open_time;
        }
		if ($request->has('close_time')) {
            $data->close_time = $request->close_time;
        }
        if($request->hasfile('shop_image'))
        {
            @unlink(public_path('uploads/shops/'.$data->shop_image));
            $file = $request->file('shop_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $file->move(public_path('uploads/shops'),$filename);
            $data->shop_image = $filename;
        }
        if($request->iframe){
        $data->iframe=$request->iframe;
        }
        $data->save();

        $user = User::find(auth::id());
        $user->city_id = $request->city_id;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();

        return back()->with('flash_success', 'Shop Updated successfully');
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

        return redirect('seller/shops')->with('flash_success', 'Bank information updated successfully');
    }

    public function wallets()
    {
        $seller_id = Auth::user()->seller->id;
        $amount =
        Wallet::where('seller_id',$seller_id)
        ->where('status','Credit')->sum('amount') -
        Wallet::where('seller_id',$seller_id)
        ->where('status','Debit')->sum('amount');

        $data = Wallet::where('seller_id',Auth::user()->seller->id)->paginate(10);
        return view('seller.wallets.index',compact('amount','data'));
    }
	public function updateDelivery(Request $request)
    {



         $data = Seller::find(Auth::user()->seller->id);
        $data->deliveryStatus = $request->delivery_status;
        $data->deliveryCharge = $request->delivery_charge;
		$data->cod = $request->cod;
        $data->save();

        return redirect('seller/shops')->with('flash_success', 'Delivery Details updated successfully');
    }

}
