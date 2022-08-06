@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Seller</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              @if(Session::has('flash_error'))
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_error') }}
                  </div>
              @endif
              <form enctype="multipart/form-data" role="form" id="myform" method="post" action="{{ route('admin.sellers.update',$data->id) }}">
                @csrf
                @method('PATCH')
                <div class="container">
                 <div class="row">
                    <div class="col-sm-12">
                      <br>
						
						<div class="form-group">
                           
                            <label>Name<span class="required">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$data->name}}" required />
                          </div>
						
						<div class="form-group">
                           
                            <label>Email<span class="required">*</span></label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{$data->email}}" required />
                          </div>
						
						<div class="form-group">
                           
                            <label>Phone<span class="required">*</span></label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{$data->phone}}" required />
                          </div>
						
						<div class="form-group">
                            <label>Select City <span class="required">*</span></label><br>
                              <select name="city_id" class="form-control">
                                @foreach($cities as $city)
                                <option @if(@$data->city_id == $city->id) selected @endif value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                              </select>
                          </div>
						
                          <div class="form-group">
                            <label for="price">Status <span class="required">*</span></label><br>
                              <label for="chkYes">
                                <input type="radio" class="status" value="Active" name="status" @if($data->seller->status == 'Active') checked @endif/>
                                @if ($errors->has('status'))
                                  <span class="required">
                                      <strong>{{ $errors->first('status') }}</strong>
                                  </span>
                              @endif  
                                Active
                            </label>
                            <label for="chkNo">
                                <input type="radio" class="status" value="Inactive" name="status" @if($data->seller->status == 'Inactive') checked @endif />
                                @if ($errors->has('status'))
                                  <span class="required">
                                      <strong>{{ $errors->first('status') }}</strong>
                                  </span>
                              @endif  
                                Inactive
                            </label>
                          </div>
                          <div class="form-group">
                            <label for="price">Show Mobile Phone <span class="required">*</span></label><br>
                              <label for="chkYes">
                                <input type="radio" class="show_mobile_email" value="Yes" name="show_mobile_email" @if($data->seller->show_mobile_email == 'Yes') checked @endif/>
                                @if ($errors->has('show_mobile_email'))
                                  <span class="required">
                                      <strong>{{ $errors->first('show_mobile_email') }}</strong>
                                  </span>
                              @endif  
                                Yes
                            </label>
                            <label for="chkNo">
                                <input type="radio" class="show_mobile_email" value="No" name="show_mobile_email" @if($data->seller->show_mobile_email == 'No') checked @endif />
                                @if ($errors->has('show_mobile_email'))
                                  <span class="required">
                                      <strong>{{ $errors->first('show_mobile_email') }}</strong>
                                  </span>
                              @endif  
                                No
                            </label>
                          </div>
                           <div class="form-group">
                            <button id="submit" type="submit" class="btn btn-primary">Update Seller</button>
                          </div>
                    </div>
                 </div>
                </div>
              </form>
          </div>
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
