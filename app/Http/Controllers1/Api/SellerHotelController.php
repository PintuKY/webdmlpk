<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
        $data = Hotel::where('seller_id', Auth::user()->seller->id)
            ->orderBy('id', 'DESC')->get();
		 foreach ($data as $hotel) {
            $hotel->image=url('/') . "/public/uploads/images/" . $hotel->image;
            $hotel->imageTwo=url('/') . "/public/uploads/images/" . $hotel->imageTwo;
            $hotel->imageThree=url('/') . "/public/uploads/images/" . $hotel->imageThree;
            $hotel->imageFour=url('/') . "/public/uploads/images/" . $hotel->imageFour;
            $hotel->imageFive=url('/') . "/public/uploads/images/" . $hotel->imageFive;
           $amenity_id = explode(',',$hotel->amenities);
            if (count($amenity_id))
                $amen = [];
            foreach ($amenity_id as $amenity_one) {
                $amenity = Amenity::where('id', $amenity_one)->first();
				if($amenity){
					$amenity->image = url('/') . "/public/images/icon/" . $amenity->image;
					$amen[] = $amenity;
				}
            }
            $hotel->amenity_id=$amen;
        }
        return response()->json(['success'=>true,'statusCode'=>200,'message'=>'Hotels','hotels'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $hotel->google_location = $request->google_location;
        $hotel->bed_size = $request->bed_size;
		$hotel->roomCapacity = $request->roomCapacity;
		$hotel->priceDescription = $request->priceDescription;
       // $hotel->google_location = $request->google_location;
       // $hotel->bed_size = $request->bed_size;
		$hotel->adultExtra = $request->adultExtra;
		$hotel->childrenExtra = $request->childrenExtra;
        $hotel->room_square_feet = $request->room_square_feet;
        $hotel->checkin_time = "12:00 PM";
        $hotel->checkout_time = "11:00 AM";
		//$amenity_id = explode(',',$request->amenities);
      
		
		
		$hotel->amenities=$request->amenities;
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
       return response()->json(['success'=>true,'statusCode'=>200,'message'=>'Hotel Created Successfully','hotel'=>$hotel]);
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
    public function update(Request $request, $id)
    {
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
        $hotel->available_rooms = $request->available_rooms;
        $hotel->google_location = $request->google_location;
        $hotel->bed_size = $request->bed_size;
		$hotel->roomCapacity = $request->roomCapacity;
		$hotel->priceDescription = $request->priceDescription;
       // $hotel->google_location = $request->google_location;
       // $hotel->bed_size = $request->bed_size;
		$hotel->adultExtra = $request->adultExtra;
		$hotel->childrenExtra = $request->childrenExtra;
		$hotel->from_block = $request->from_block;
		 $hotel->to_block = $request->to_block;
        $hotel->room_square_feet = $request->room_square_feet;
        $hotel->checkin_time = "12:00 PM";
        $hotel->checkout_time = "11:00 AM";
        $hotel->amenities = $request->amenities;
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
       return response()->json(['success'=>true,'statusCode'=>200,'message'=>'Hotel Updated Successfully','hotel'=>$hotel]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
       return response()->json(['success'=>true,'statusCode'=>200,'message'=>'Hotel Deleted']);
    }

    public function amenities(){
        $amenities = Amenity::orderBy('name','asc')->get();
     return response()->json(['success'=>true,'statusCode'=>200,'message'=>'Amenities','amenities'=>$amenities]);
    }
}
