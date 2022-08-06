<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Quote;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $total_customers = User::where('role_id',3)->count('id');
        $total_sellers = User::where('role_id',2)->count('id');
        $total_orders = Order::count('id');
        $total_transactions = Order::sum('payable_price');
    	return view('admin.home',compact('total_customers','total_sellers','total_orders','total_transactions'));
    }

    public function contacts(Request $request)
    {
        $data = Contact::orderBy('id','desc')->paginate(10);
        return view('admin.contacts.index',compact('data'));
    }

    public function deleteContacts(Request $request)
    {
        $data = Contact::find($request->id);
        $data->delete();
        return back()->with('flash_success', 'Contact Message deleted successfully');
    }
	public function getQuotes(){
        $quotes=Quote::all();
        foreach ($quotes as $quote){
            $seller=Seller::find($quote->seller_id);
            $user=User::find($seller->user_id);
            $quote->seller_id=$user->name;
        }
        return view('admin.quotes',compact('quotes'));
    }
}
