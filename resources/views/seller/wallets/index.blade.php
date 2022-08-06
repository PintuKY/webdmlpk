@extends('seller.layouts.app')
@section('content')
<div class="content-wrapper"><br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Wallet Balance - &#8377;{{$amount}}</h3>
              </div>
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
                      <th>Wallet Amount</th>
                      <th>Status</th>
                      <th>Order Id</th>
                    </tr> 
                  </thead>
                  <tbody>
                    @foreach($data as $row)
                    <tr>
                      <td>&#8377;{{$row->amount}}</td>
                      <td>{{$row->status}}</td>

                      <td>
                        @if(isset($row->order->order_id))
                        <a href="{{url('seller/order')}}/?order_id={{@$row->order->order_id}}">{{@$row->order->order_id}}</a>
                      @else
                      Paid By Admin
                      @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table> 
                <br>
                {!! $data->links() !!}
              </div>
              <!-- /.card-body -->
              
        </div>
        <!-- /.card -->
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
@endsection
