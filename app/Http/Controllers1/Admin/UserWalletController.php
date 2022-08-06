<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\User;
use Carbon\Carbon;
use Auth;

class UserWalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('role_id',2)->paginate(10);
        return view('admin.wallets.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role_id',2)->get();
        return view('admin.wallets.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'amount' => 'required',
            'status' => 'required'
        ]);

        $wallet = new Wallet;
        $wallet->user_id = $request->user_id;
        $wallet->amount = $request->amount;
        $wallet->status = $request->status;
        $wallet->amount_type = "Bonus";
        $wallet->debit_credit_type = "PLUS";
        //
        $manageWallet = ManageWallet::first();
        //
        $wallet->expiry_at = Carbon::now()->addDays($request->expiry);
        $wallet->save();
        return back()->with('flash_success', 'Wallet amount added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(1);
        $user = User::find($id);
        $data = Wallet::where('user_id',$id)->get();
        return view('admin.wallets.show',compact('data','user'));
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
    public function update(Request $request, $id)
    {
        //
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
}
