<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Helpers\Helper;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Service::whereNull('parent_id')->orderBy('id','DESC')->paginate(10);
        return view('admin.services.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
            'image' => 'required',
            'commission' => 'required'
        ]);

        $slug = Helper::getBlogUrl($request->name);
        if (Service::where('slug', '=', $slug)->count() > 0)
        {
            return back()->with('flash_error', 'Service Already Exits');
        }
        else{
            $data = new Service;
            $data->name = $request->name;
            $data->status = $request->status;
            $data->commission = $request->commission;
			$data->type=$request->type;
            $data->slug = $slug;
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $filename1 = uniqid() . '.' . $file->getClientOriginalExtension($file);
                $file->move(public_path('uploads/images'),$filename1); 
                $data->image = $filename1;  
            }

            $data->save();
            return back()->with('flash_success', 'Service Created successfully');
        }

        
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
        $data = Service::find($id);
        return view('admin.services.edit',compact('data'));
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
            'commission' => 'required'
        ]);

        $data = Service::find($id);
        $data->name = $request->name;
        $data->status = $request->status;
        $data->commission = $request->commission;
        if($request->hasfile('image'))
        {
            @unlink(public_path('uploads/images/'.$data->image));
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $file->move(public_path('uploads/images'),$filename); 
            $data->image = $filename;  
        }
        $data->save();
        return back()->with('flash_success', 'Service Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Service::find($id);
        $get_sub_services = Service::where('parent_id',$id)->get();
        foreach($get_sub_services as $get_sub_service)
        {
            $get_sub_service->delete();
        }
        @unlink(public_path('uploads/images/'.$data->image));
        $data->delete();
        return back()->with('flash_success', 'Service Deleted  Successfully!');
    }
}
