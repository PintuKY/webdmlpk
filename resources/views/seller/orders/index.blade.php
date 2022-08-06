@extends('seller.layouts.app')
@section('content')
<div class="content-wrapper"><br>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
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
						
                      @if($service->type=="ecom")
                      <th>Order id</th>
                      <th>Customer Payable Price</th>
                      <th>Admin Comission</th>
                      <th>Your Amount</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Order Status</th>
                      <th>Ordered Date</th>
                      <th>Delivered Date</th>
    @else
                            <th>Booking id</th>
                            <th>Customer Payable Price</th>
                            <th>Admin Comission</th>
                            <th>Your Amount</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Booking Status</th>
                            <th>Booking Date</th>
                            
    @endif
						
						
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $row)
                    <tr>
                      <td><a href="{{url('seller/order')}}/?order_id={{$row->order_id}}">{{$row->order_id}}</a></td>
                      <td>&#8377;{{ @$row->payable_price}}</td>
                      <td>&#8377;{{ @$row->commision_amount}}</td>
                      <td>&#8377;{{ @$row->payable_price - @$row->commision_amount}}</td>
                      <td>{{ @$row->name}}</td>
                      <td>{{ @$row->email}}</td>
                      <td>{{ @$row->phone}}</td>
                      <td>{{@$row->status}}
                         @if($row->status != "OrderDelivered")
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal">
                        Change Status
                      </button>@endif</td>
                      <td>{{ \Carbon\Carbon::parse($row->created_at)->format('jS M Y') }}</td>
                      @if($row->sellerService_id==null)
                      <td>{{ $row->delivered_date }}</td>
                            @endif
                    </tr>
                    <div class="modal fade" id="modal">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Change Status</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="col-sm-12">
                                <form method="post" action="{{url('/seller/changeOrderStatus')}}">
                                  @csrf
                                  <div class="form-group">
                                    <label>Select Status</label>
                                    <select class="form-control" name="order_status">
                                      @if($row->sellerService_id==null && $row->hotel_id==null)
                                      <option @if($row->status == "OrderPlaced") selected @endif value="OrderPlaced">OrderPlaced</option>
                                      <option @if($row->status == "OrderShipped") selected @endif value="OrderShipped">OrderShipped</option>
                                      <option @if($row->status == "OrderDelivered") selected @endif value="OrderDelivered">OrderDelivered</option>
                                    @elseif($row->hotel_id!=null)
										<option @if($row->status == "Booked") selected @endif value="Booked">Booked</option>
                                            <option @if($row->status == "Completed") selected @endif value="Completed">Completed</option>
										@else
                                            <option @if($row->status == "InProcess") selected @endif value="InProcess">InProcess</option>
                                            <option @if($row->status == "Completed") selected @endif value="Completed">Completed</option>
                                        @endif
                                    </select>
                                    <input type="hidden" name="order_id" value="{{ @$row->order_id}}">
                                  </div>
                                  <div class="text-center"> 
                                   <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                    </div>
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
  </div>
<script>
  $( function() {
    $( "#txtFromDate" ).datepicker();
    $( "#txtToDate" ).datepicker();
  } );
  </script>
@endsection
