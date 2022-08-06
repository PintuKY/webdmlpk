<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerProductController extends Controller
{
    public function index()
    {
        $data = Product::where('seller_id', Auth::user()->seller->id)
            ->orderBy('id', 'DESC')->get();
        foreach ($data as $product){
            $category = Category::find($product->category_id);
            $product->category_id = $category;
            $product->image = url('/') . "/public/uploads/images/" . $product->image;
        }
        return response()->json(['message' => 'Products List', 'success' => true, 'statusCode' => 200, 'products' => $data]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'mrp_price' => 'required',
            'selling_price' => 'required',
            'image' => 'required',
            'status' => 'required',
            'unit' => 'required',
            'stock' => 'required'
        ]);

        $product = new Product;
        $product->seller_id = Auth::user()->seller->id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->mrp_price = $request->mrp_price;
        $product->selling_price = $request->selling_price;
        $product->status = $request->status;
        $product->stock = $request->stock;
        $product->unit = $request->unit;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'), $filePath);
            $product->image = $filename;
        }
        $product->save();
        return response()->json(['message' => 'Product Created Successfully', 'success' => true, 'statusCode' => 200, 'product' => $product]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        $category = Category::find($product->category_id);
        $product->category_id = $category;
        $product->image = url('/') . "/public/uploads/images/" . $product->image;
        return response()->json(['message' => 'Product Details', 'success' => true, 'statusCode' => 200, 'product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'mrp_price' => 'required',
            'selling_price' => 'required',
            //'image' => 'required',
            'status' => 'required',
            'unit' => 'required',
            'stock' => 'required'
        ]);

        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->mrp_price = $request->mrp_price;
        $product->selling_price = $request->selling_price;
        $product->status = $request->status;
        $product->stock = $request->stock;
        $product->unit = $request->unit;
        if ($request->hasfile('image')) {
            @unlink(public_path('uploads/images/' . $product->image));
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'), $filePath);
            $product->image = $filename;
        }
        $product->save();
        return response()->json(['message'=>'Product Updated Successfully','success'=>true,'statusCode'=>200,'product'=>$product]);
    }

    public function destroy($id)
    {
        $data = Product::find($id);
        @unlink(public_path('uploads/images/' . $data->image));
		  $cart=Cart::where('product_id', $data->id)->delete();
        $data->delete();
      return response()->json(['message'=>'Product Deleted Successfully','success'=>true,'statusCode'=>200]);
    }
}
