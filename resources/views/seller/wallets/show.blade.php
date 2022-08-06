@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$user->name}}'s Wallet History</h3>
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
                      <th>Description</th>
                      <th>Transaction Time</th>
                    </tr> 
                  </thead>
                  <tbody>
                    @foreach($data as $row)
                    <tr>
                      <td>@if($row->debit_credit_type == "MINUS") <span style="color: red; font-size: 20px;">(-)</span> @else <span style="color: blue; font-size: 20px;">(+)</span> @endif<span style="color: green; font-size: 20px;">&#8377; {{$row->amount}}</td>                      
                      <td>
                      @if($row->payment_id != "")
                        Added through online payment gateway
                      @else
                        
                      @endif
                      </td>
                      <td>{{$row->created_at}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
              </div>
              <!-- /.card-body -->
              
        </div>
        <!-- /.card -->
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
