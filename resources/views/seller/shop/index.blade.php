@extends('seller.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <br>

  <!-- Main content -->
  <section class="content">
    @if(Session::has('flash_success'))
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
      {{ Session::get('flash_success') }}
      </div>
  @endif
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img src="{{ URL::to('/') }}/uploads/shops/{{ @$data->shop_image }}" style="width: 200px;" />
              </div>
              <h3 class="profile-username text-center">{{ @$data->shop_name}}</h3>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item"> <b>Phone</b>  <a class="float-right">{{ Auth::user()->phone}}</a>
                </li>
                <li class="list-group-item"> <b>Email</b>  <a class="float-right">{{ Auth::user()->email}}</a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Details</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Edit Profile</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#banks" data-toggle="tab">Bank Details</a></li>
				   @if($mainService->type=="ecom")
				  <li class="nav-item"><a class="nav-link" href="#delivery" data-toggle="tab">Delivery</a></li>
				  @endif
              </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <!-- Post -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <!--  <thead>
                    <tr>
                      <th style="width: 100px">Details</th>
                    </tr>
                  </thead> -->
                        <tbody>
                          <tr>
                            <td>Name</td>
                            <td>{{ @$data->shop_name}}</td>
                          </tr>
                          <tr>
                            <td>Status</td>
                            <td><span class="badge bg-danger">{{ @$data->status}}</span>
                            </td>
                          </tr>
                          <tr>
                            <td>Image</td>
                            <td><img src="{{ URL::to('/') }}/uploads/shops/{{ @$data->shop_image }}" style="width: 200px;" /></td>
                          </tr>
                          <tr>
                            <td>Categories</td>
                            <td>{{ @$data->service->name}}</td>
                          </tr>
                          <tr>
                            <td>City</td>
                            <td>{{ @Auth::user()->city->name}}</td>
                          </tr>
                          <tr>
                            <td>Number</td>
                            <td>{{ @Auth::user()->phone}}</td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td>{{ @Auth::user()->email}}</td>
                          </tr>
                          <tr>
                            <td>Address</td>
                            <td>{{ @$data->shop_address}}</td>
                          </tr>

                          <tr>
                              <td>About Us</td>
                              <td>{{ @$data->description}}</td>
                          </tr>
							 @if(@$mainService->type!="staybooking")
                              <tr>
                              <td>Opening Time</td>
                              <td>{{ @$data->open_time}}</td>
                          </tr>
							<tr>
                              <td>Closing Time</td>
                              <td>{{ @$data->close_time}}</td>
                          </tr>
							@endif
							@if(@$mainService->type=="staybooking")
                              <tr>
                              <td>Maximum Room Capacity</td>
                              <td>{{ @$data->room_capacity}}</td>
                          </tr>
							@endif
							@if(@$data->iframe!=null)
                            <tr>
                                <td>Location</td>
                                <td><iframe src="{{ @$data->iframe}}"></iframe></td>
                            </tr>
                            @endif
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <form enctype="multipart/form-data" method="post" action="{{ route('seller.shop.update') }}">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="shop_name">Name</label>
                        <input type="text" name="shop_name" class="form-control" id="shop_name" placeholder="Enter Shop Name" value="{{ $data->shop_name}}" required>
                      </div>
                      <div class="form-group">
                        <img src="{{ URL::to('/') }}/uploads/shops/{{ @$data->shop_image }}" style="width: 300px;" /><br>
                        <label for="shop_image">Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="shop_image" class="custom-file-input" id="shop_image">
                            <label class="custom-file-label" for="shop_image">Choose file</label>
                          </div>
                          <div class="input-group-append"> <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">City</label>
                        <select name="city_id" class="form-control">
                          @foreach($cities as $city)
                          <option value="{{$city->id}}" @if($city->id == Auth::user()->city_id) selected @endif>{{$city->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input required type="number" name="phone" min="0" class="form-control" id="phone" placeholder="Enter Phone" value="{{ Auth::user()->phone}}">
                      </div>
                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input required type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ Auth::user()->email}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea required name="shop_address" type="text" class="form-control" placeholder="Enter Addrress">{{ $data->shop_address }}</textarea>
                      </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">About Us</label>
                                <textarea required name="description" type="text" class="form-control" placeholder="Enter About Us">{{ $data->description }}</textarea>
                            </div>
						<div class="form-group">
                        <label for="exampleInputiframe">Iframe</label>
                        <textarea  name="iframe" type="text" class="form-control" placeholder="Enter iframe">{{ $data->iframe }}</textarea>
							<h6>For Example: </h6>
								<h6>https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31170.190346452855!2d75.71736023077982!3d12.431469397206609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba50075627a7fff%3A0xaf8a66ea4651c1a6!2sMadikeri%2C%20Karnataka%20571201!5e0!3m2!1sen!2sin!4v1629975076657!5m2!1sen!2sin</h6>
                      </div>
                       @if($mainService->type!="staybooking")
						 <div class="form-group">
                        <label for="email">Opening Time</label>
                        <input  type="time" name="open_time" class="form-control" placeholder="Opening Time" value="{{ $data->open_time}}">
                      </div>
						
						<div class="form-group">
                        <label for="email">Closing Time</label>
                        <input  type="time" name="close_time" class="form-control" placeholder="Closing Time" value="{{ $data->close_time}}">
                      </div>
						
						@endif
						 @if($mainService->type=="staybooking")
						 <div class="form-group">
                        <label for="email">Maximum Room Capacity</label>
                        <input  type="number" min="0" name="room_capacity" class="form-control" id="capacity" placeholder="Enter Room Capacity" value="{{ $data->room_capacity}}">
                      </div>
						@endif
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </div>
                <div class="tab-pane" id="banks">
                  <form enctype="multipart/form-data" method="post" action="{{ route('seller.bank.update') }}">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="account_name">Account Name</label>
                        <input required type="text" name="account_name" class="form-control" id="account_name" placeholder="Enter Account Name" value="{{ @$bank->account_name}}">
                      </div>
                      <div class="form-group">
                        <label for="account_number">Account Number</label>
                        <input required type="text" name="account_number" class="form-control" id="account_number" placeholder="Enter Account Number" value="{{ @$bank->account_number}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">IFSC Code</label>
                        <textarea required name="ifsc" type="text" class="form-control" placeholder="Enter IFSC Code">{{ @$bank->ifsc }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">UPI Id</label>
                        <textarea name="upi_id" type="text" class="form-control" placeholder="Enter UPI Id">{{ @$bank->upi_id }}</textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </div>
				  <div class="tab-pane" id="delivery">
                  <form enctype="multipart/form-data" method="post" action="{{ route('seller.shop.delivery') }}">
                    @csrf
                    <div class="card-body">
                       <div class="form-group">
                            <label for="price">Delivery Status <span class="required">*</span></label><br>
                              <label for="chkYes">
                                <input type="radio" class="status" value="Active" name="delivery_status" @if($data->deliveryStatus == 'Active') checked @endif/>

                                Active
                            </label>
                            <label for="chkNo">
                                <input type="radio" class="status" value="Inactive" name="delivery_status" @if($data->deliveryStatus == 'Inactive') checked @endif />

                                Inactive
                            </label>
                          </div>

                      <div class="form-group">
                        <label for="email">Delivery Charge</label>
                        <input required type="number" name="delivery_charge" class="form-control" id="email" placeholder="Enter Delivery Charge" value="{{ $data->deliveryCharge}}">
                      </div>

						<div class="form-group">
                            <label for="price">COD Available <span class="required">*</span></label><br>
                              <label for="chkYes">
                                <input type="radio" class="status" value="Active" name="cod" @if($data->cod == 'Active') checked @endif/>

                                Active
                            </label>
                            <label for="chkNo">
                                <input type="radio" class="status" value="Inactive" name="cod" @if($data->cod == 'Inactive') checked @endif />

                                Inactive
                            </label>
                          </div>



                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
