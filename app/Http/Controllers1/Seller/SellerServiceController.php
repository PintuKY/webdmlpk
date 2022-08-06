<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\SellerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SellerService::where('seller_id', Auth::user()->seller->id)
            ->orderBy('id', 'DESC')->paginate(10);
        return view('seller.sellerservices.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicies = SellerService::where('seller_id', Auth::user()->seller->id)
            ->orderBy('name', 'ASC')->where('status', 'Active')->get();
        return view('seller.sellerservices.create', compact('servicies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'status' => 'required',


        ]);

        $service = new SellerService();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->status = $request->status;
        $service->seller_id=Auth::user()->seller->id;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'), $filePath);
            $service->image = $filename;
        }
        $service->save();
        return redirect('seller/services')->with('flash_success', 'Seller Service Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SellerService::where('seller_id',Auth::user()->seller->id)
            ->where('id',$id)->first();


        return view('seller.sellerservices.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request, [

            'name' => 'required',
            'description' => 'required',
            'price' => 'required',

            'status' => 'required',


        ]);
        $service = SellerService::find($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->status = $request->status;
        $service->seller_id= Auth::user()->seller->id;

        if($request->hasfile('image'))
        {
            @unlink(public_path('uploads/images/'.$service->image));
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'),$filePath);
            $service->image = $filename;
        }
        $service->save();
        return redirect('seller/services')->with('flash_success', 'Seller Service Updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SellerService::find($id);
        @unlink(public_path('uploads/images/'.$data->image));

        $data->delete();
        return back()->with('flash_success', 'Seller Service Deleted  Successfully!');
    }
}
