<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::where('seller_id',Auth::user()->seller->id)
        ->orderBy('id','DESC')->paginate(10);
        return view('seller.products.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('seller_id',Auth::user()->seller->id)
        ->orderBy('name','ASC')->where('status','Active')->get();
        return view('seller.products.create',compact('categories'));
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
            'category_id' => 'required',
            'productname' => 'required',
            'description'=> 'required',
            'mrp_price' => 'required',
            'selling_price' => 'required',
            'image' => 'required',
            'productstatus' => 'required',
            'unit' => 'required',
            'stock_quantity' => 'required'
        ]);

        $product = new Product;
        $product->seller_id = Auth::user()->seller->id;
        $product->category_id = $request->category_id;
        $product->name = $request->productname;
        $product->description = $request->description;
        $product->mrp_price = $request->mrp_price;
        $product->selling_price = $request->selling_price;
        $product->status = $request->productstatus;
        $product->stock = $request->stock_quantity;
        $product->unit = $request->unit;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'),$filePath); 
            $product->image = $filename;  
        }
        $product->save();
        return redirect('seller/products')->with('flash_success', 'Product Created successfully');
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
        $data = Product::where('seller_id',Auth::user()->seller->id)
        ->where('id',$id)->first();

        $categories = Category::where('seller_id',Auth::user()->seller->id)
        ->orderBy('name','ASC')->where('status','Active')->get();
        return view('seller.products.edit',compact('categories','data'));
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
        $this->validate($request, [
            'category_id' => 'required',
            'productname' => 'required',
            'description'=> 'required',
            'mrp_price' => 'required',
            'selling_price' => 'required',
            //'image' => 'required',
            'productstatus' => 'required',
            'unit' => 'required',
            'stock_quantity' => 'required'
        ]); 

        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->name = $request->productname;
        $product->description = $request->description;
        $product->mrp_price = $request->mrp_price;
        $product->selling_price = $request->selling_price;
        $product->status = $request->productstatus;
        $product->stock = $request->stock_quantity;
        $product->unit = $request->unit; 
        if($request->hasfile('image'))
        {
            @unlink(public_path('uploads/images/'.$product->image));
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'),$filePath); 
            $product->image = $filename;  
        }
        $product->save();
        return redirect('seller/products')->with('flash_success', 'Product Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        @unlink(public_path('uploads/images/'.$data->image));
		 $cart=Cart::where('product_id', $data->id)->delete();
        $data->delete();
        return back()->with('flash_success', 'Product Deleted  Successfully!');
    }
}
