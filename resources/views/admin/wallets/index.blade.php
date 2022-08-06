@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal">
                        Pay to Seller
                      </button>
                <p>Wallet Balance &#8377;{{$amount}}</p>
              </div>
              @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              @if(Session::has('flash_danger'))
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_danger') }}
                  </div>
              @endif
              <div>
                
              </div>
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
                      <td>@if($row->status == "Debit") <span style="color: red; font-size: 20px;">(-)</span> @else <span style="color: blue; font-size: 20px;">(+)</span> @endif<span style="color: green; font-size: 20px;"> </td>                      
                      <td>
                      @if(isset($row->order->order_id))
                        <a href="{{url('admin/sellers/order')}}/?order_id={{@$row->order->order_id}}">{{@$row->order->order_id}}</a>
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
<div class="modal fade" id="modal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pay To Seller</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-sm-12">
            <form method="post" action="{{url('admin/seller/payToSeller')}}">
              @csrf
              <input type="hidden" name="seller_id" value="{{$seller_id}}">
              <div class="form-group">
                <input class="form-control" type="number" min="0" name="amount">
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
@endsection
