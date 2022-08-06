@extends('admin.layouts.app')
@section('content')
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
			  <!--<div class="card-header">
				  <h3 class="card-title my-2">Admin Wallet Balance: </h3>
              </div>-->
            @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Order id</th>
                      <th>Customer Payable Price</th>
                      <th>Admin Comission</th>
                      <th>Seller Amount</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Order Status</th>
					  <th>Seller</th>
                      <th>Ordered Date</th>
                      <th>Delivered Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $row)
                    <tr>
                      <td><a href="{{url('admin/sellers/order')}}/?order_id={{$row->order_id}}">{{$row->order_id}}</a></td>
                      <td>&#8377;{{ @$row->payable_price}}</td>
                      <td>&#8377;{{ @$row->commision_amount}}</td>
                      <td>&#8377;{{ @$row->payable_price - @$row->commision_amount}}</td>
                      <td>{{ @$row->name}}</td>
                      <td>{{ @$row->email}}</td>
                      <td>{{ @$row->phone}}</td>
                      <td>{{@$row->status}}</td>
					  <td><a class="btn btn-info btn-sm" href="{{url('admin/sellers/show')}}/{{$row->seller->user->id}}">{{$row->seller->user->name}}</a>
                
                      <td>{{ \Carbon\Carbon::parse($row->created_at)->format('jS M Y') }}</td>
                      <td>{{ $row->delivered_date }}</td>
                    </tr>
                  <!-- /.modal -->
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              {!! $orders->links() !!}
        </div>
        <!-- /.card -->
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
<script>
  $( function() {
    $( "#txtFromDate" ).datepicker();
    $( "#txtToDate" ).datepicker();
  } );
  </script>
@endsection