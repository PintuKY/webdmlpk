<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Helpers\Helper;

class SubServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Service::wherenotNull('parent_id')->orderBy('id','DESC')->paginate(10);
        return view('admin.sub-services.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::whereNull('parent_id')->orderBy('name','ASC')->get();
        return view('admin.sub-services.create',compact('services'));
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
            'parent_id' => 'required'
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
            $data->slug = $slug;
            $data->parent_id = $request->parent_id;
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
        $services = Service::whereNull('parent_id')->orderBy('name','ASC')->get();
        $data = Service::find($id);
        return view('admin.sub-services.edit',compact('data','services'));
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
            'parent_id' => 'required'
        ]);

        $data = Service::find($id);
        $data->name = $request->name;
        $data->status = $request->status;
        $data->parent_id = $request->parent_id;
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
        @unlink(public_path('uploads/images/'.$data->image));
        $data->delete();
        return back()->with('flash_success', 'Service Deleted  Successfully!');
    }
}
