<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Hotel::where('seller_id', auth::user()->seller->id)
            ->orderBy('id', 'DESC')->paginate(10);
        return view('seller.hotels.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amenities = Amenity::orderBy('name','asc')->get();
        return view('seller.hotels.create',compact('amenities'));
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
            'google_location' => 'required',
            'amenities' => 'required',
            'bed_size' => 'required',
            'room_square_feet' => 'required'
        ]);

        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->description = $request->description;
        $hotel->price = $request->price;
        $hotel->status = $request->status;
		 $hotel->available_rooms = $request->available_rooms;
		$hotel->roomCapacity = $request->roomCapacity;
		$hotel->priceDescription = $request->priceDescription;
        $hotel->google_location = $request->google_location;
        $hotel->bed_size = $request->bed_size;
		$hotel->adultExtra = $request->adultExtra;
		$hotel->childrenExtra = $request->childrenExtra;
        $hotel->room_square_feet = $request->room_square_feet;
        $hotel->checkin_time = "12:00 PM";
        $hotel->checkout_time = "11:00 AM";
        $hotel->amenities = implode(',',$request->amenities);
        $hotel->seller_id = Auth::user()->seller->id;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'), $filePath);
            $hotel->image = $filename;
        }
		if ($request->hasfile('imageFive')) {
            $file = $request->file('imageFive');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'), $filePath);
            $hotel->imageFive = $filename;
        }
		if ($request->hasfile('imageTwo')) {
            $file = $request->file('imageTwo');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'), $filePath);
            $hotel->imageTwo = $filename;
        }
		if ($request->hasfile('imageThree')) {
            $file = $request->file('imageThree');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'), $filePath);
            $hotel->imageThree = $filename;
        }
		if ($request->hasfile('imageFour')) {
            $file = $request->file('imageFour');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'), $filePath);
            $hotel->imageFour = $filename;
        }
        $hotel->save();
        return redirect('seller/hotels')->with('flash_success', 'Hotel Created successfully');
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
        $data = Hotel::where('seller_id',Auth::user()->seller->id)
            ->where('id',$id)->first();
        $amenities = Amenity::orderBy('name','asc')->get();    
        @$amenity_id = explode(',', $data->amenities);
        return view('seller.hotels.edit',compact('data','amenities','amenity_id'));
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
            //'image' => 'required',
            'status' => 'required',
            'google_location' => 'required',
            'amenities' => 'required',
            'bed_size' => 'required',
            'room_square_feet' => 'required'
        ]);

        $hotel = Hotel::findOrFail($id);
		
        $hotel->name = $request->name;
        $hotel->description = $request->description;
        $hotel->price = $request->price;
        $hotel->status = $request->status;
		 $hotel->from_block = $request->from_block;
		 $hotel->to_block = $request->to_block;
		 $hotel->available_rooms = $request->available_rooms;
        $hotel->google_location = $request->google_location;
        $hotel->bed_size = $request->bed_size;
		$hotel->adultExtra = $request->adultExtra;
		$hotel->roomCapacity = $request->roomCapacity;
		$hotel->priceDescription = $request->priceDescription;
		$hotel->childrenExtra = $request->childrenExtra;
        $hotel->room_square_feet = $request->room_square_feet;
        $hotel->checkin_time = "12:00 PM";
        $hotel->checkout_time = "11:00 AM";
        $hotel->amenities = implode(',',$request->amenities);
        $hotel->seller_id = Auth::user()->seller->id;
        if ($request->hasfile('image')) {
            @unlink(public_path('uploads/images/'.$hotel->image));
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'), $filePath);
            $hotel->image = $filename;
        }
		if ($request->hasfile('imageTwo')) {
            @unlink(public_path('uploads/images/'.$hotel->imageTwo));
            $file = $request->file('imageTwo');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'), $filePath);
            $hotel->imageTwo = $filename;
        }
		if ($request->hasfile('imageThree')) {
            @unlink(public_path('uploads/images/'.$hotel->imageThree));
            $file = $request->file('imageThree');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'), $filePath);
            $hotel->imageThree = $filename;
        }
		if ($request->hasfile('imageFour')) {
            @unlink(public_path('uploads/images/'.$hotel->imageFour));
            $file = $request->file('imageFour');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'), $filePath);
            $hotel->imageFour = $filename;
        }
		if ($request->hasfile('imageFive')) {
            @unlink(public_path('uploads/images/'.$hotel->imageFive));
            $file = $request->file('imageFive');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $filePath = 'uploads/images/' . $filename;
            $file->move(public_path('uploads/images'), $filePath);
            $hotel->imageFive = $filename;
        }
        $hotel->save();
        return redirect('seller/hotels')->with('flash_success', 'Hotel Updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Hotel::find($id);
        @unlink(public_path('uploads/images/'.$data->image));
		@unlink(public_path('uploads/images/'.$data->imageTwo));
		@unlink(public_path('uploads/images/'.$data->imageThree));
		@unlink(public_path('uploads/images/'.$data->imageFour));
		@unlink(public_path('uploads/images/'.$data->imageFive));
        $data->delete();
        return back()->with('flash_success', 'Deleted  Successfully!');
    }
}
