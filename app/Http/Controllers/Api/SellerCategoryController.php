<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerCategoryController extends Controller
{
    public function index()
    {
        $data = Category::where('seller_id',Auth::user()->seller->id)
            ->orderBy('id','DESC')->get();
        return response()->json(['message'=>'Category List','success'=>true,'statusCode'=>200,'categories'=>$data]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required'
        ]);

        $data = new Category;
        $data->name = $request->name;
        $data->status = $request->status;
        $data->seller_id = Auth::user()->seller->id;
        $data->save();
        return response()->json(['message'=>'Category Created Successfully','success'=>true,'statusCode'=>200,'category'=>$data]);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'status' => 'required'
        ]);

        $data = Category::find($id);
        $data->name = $request->name;
        $data->status = $request->status;
        $data->save();
        return response()->json(['message'=>'Category Updated Successfully','success'=>true,'statusCode'=>200,'category'=>$data]);
    }
    public function destroy($id)
    {
        $data = Category::find($id);
		 $products=Product::where('category_id',$id)->get();
        foreach ($products as $product){
            $cart=Cart::where('product_id',$product->id)->delete();
            $product->delete();
        }
        $data->delete();
       return response()->json(['message'=>'Category Deleted Successfully','success'=>true,'statusCode'=>200]);
    }

}
