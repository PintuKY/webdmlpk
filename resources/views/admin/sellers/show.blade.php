@extends('admin.layouts.app') 
@section('content')
<!-- Content Wrapper. Contains page content -->

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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Details</a>
                </li>
				  <li class="nav-item mx-2"><a class="nav-link" href="{{url('admin/sellers/orders')}}/{{ @$data->user->id}}">Seller Orders</a>
                </li>
				  <li class="nav-item mx-2"><a class="nav-link" href="{{url('admin/sellers/wallets')}}/{{ @$data->user->id}}">Pay to Seller</a>
                </li>
                <!--     <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> -->
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
                            <td>Shop Name</td>
                            <td>{{ $data->shop_name}}</td>
                          </tr>
                          <tr>
                            <td>Status</td>
                            <td><span class="badge bg-danger">{{ $data->status}}</span>
                            </td>
                          </tr>
                          <tr>
                            <td>Shop Image</td>
                            <td><img src="{{ URL::to('/') }}/uploads/shops/{{ @$data->shop_image }}" style="width: 200px;" /></td>
                          </tr>
                          <tr>
                            <td>Shop Categories</td>
                            <td>{{ @$data->service->name}}</td>
                          </tr>
                          <tr>
                            <td>City</td>
                            <td>{{ @$data->user->city->name}}</td>
                          </tr>
                          <tr>
                            <td>Number</td>
                            <td>{{ $data->user->phone}}</td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td>{{ $data->user->email}}</td>
                          </tr>
                          <tr>
                            <td>Shop Address</td>
                            <td>{{ $data->shop_address}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
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

     <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Bank Details</a>
                </li>
                <!--     <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> -->
              </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <!-- Post -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Bank Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <td>Account Name</td>
                            <td>{{ @$data->bank->account_name}}</td>
                          </tr>
                          <tr>
                            <td>Account Number</td>
                            <td>{{ @$data->bank->account_number}}</td>
                          </tr>
                          <tr>
                            <td>IFSC Code</td>
                            <td>{{ @$data->bank->ifsc}}</td>
                          </tr>
                          <tr>
                            <td>UPI ID</td>
                            <td>{{ @$data->bank->upi_id}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
					    <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Categories [E-com]</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <th>Name</th>
							  </tr>
							
							  @foreach($categories as $category)
							<tr>
                            <td>{{ @$category->name}}</td>
							</tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
						    <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Seller Services</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <th>Name</th>
							  </tr>
							
							  @foreach($services as $service)
							<tr>
                            <td>{{ @$service->name}}</td>
							</tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
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
<!-- /.content-wrapper -->
@endsection