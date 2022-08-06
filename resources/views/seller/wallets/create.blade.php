@extends('seller.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add to Wallet</h3>
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
              <form enctype="multipart/form-data" role="form" id="myform" method="post" action="{{ route('wallets.store') }}">
                @csrf
                <div class="container">
                 <div class="row">
                    <div class="col-sm-12">
                          <div class="form-group">
                            <label for="user_id">Select Users <span class="required">*</span></label>
                            <select name="user_id" class="form-control">
                              @foreach($users as $user)
                              <option value="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="price">Wallet Amount <span class="required">*</span></label>
                            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Wallet Amount" min="0" />
                            @if ($errors->has('amount'))
                                <span class="required">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label for="price">Expiry Days <span class="required">*</span></label>
                            <input type="number" name="expiry" id="expiry" class="form-control" placeholder="Enter Expiry Days" min="0" />
                            @if ($errors->has('expiry'))
                                <span class="required">
                                    <strong>{{ $errors->first('expiry') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <label for="chkYes">
                              <input type="radio" class="status" value="Active" name="status" checked />
                              @if ($errors->has('status'))
                                <span class="required">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif  
                              Active
                          </label>
                          <label for="chkNo">
                              <input type="radio" class="status" value="InActive" name="status" />
                              @if ($errors->has('status'))
                                <span class="required">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif  
                              Inactive
                          </label>
                           <div class="form-group">
                            <button id="submit" type="submit" class="btn btn-primary">Add to Wallet</button>
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
