<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use App\Helpers\Helper;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::where('seller_id',Auth::user()->seller->id)
        ->orderBy('id','DESC')->paginate(10);
        return view('seller.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller.category.create');
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
            'name' => 'required',
            'status' => 'required'
        ]);

        $data = new Category;
        $data->name = $request->name;
        $data->status = $request->status;
        $data->seller_id = Auth::user()->seller->id;
        $data->save();
        return redirect('seller/categories')->with('flash_success', 'Category Created successfully');
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
        $data = Category::find($id);
        return view('seller.category.edit',compact('data'));
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
        //dd($_REQUEST);
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required'
        ]);

        $data = Category::find($id);
        $data->name = $request->name;
        $data->status = $request->status;
        $data->save();
        return redirect('seller/categories')->with('flash_success', 'Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
		$products=Product::where('category_id',$id)->get();
        foreach ($products as $product){
            $cart=Cart::where('product_id',$product->id)->delete();
            $product->delete();
        }
        $data->delete();
        return back()->with('flash_success', 'Category Deleted  Successfully!');
    }
}
