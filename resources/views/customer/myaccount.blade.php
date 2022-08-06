@extends('layouts.app') 
@section('content')
<style>
.change_password_warning{
  color: red;
}
.password_warning{
  color: red;
}
.confirm_password_warning{
  color: red;
}
.change_password_done{
  color: blue;
}
  /*  bhoechie tab */
  div.bhoechie-tab-container{
    z-index: 10;
    background-color: #ffffff;
    padding: 0 !important;
    border-radius: 4px;
    -moz-border-radius: 4px;
    border:1px solid #ddd;
    margin-top: 20px;
    margin-left: 50px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
    -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    background-clip: padding-box;
    opacity: 0.97;
    filter: alpha(opacity=97);
  }
  div.bhoechie-tab-menu{
    padding-right: 0;
    padding-left: 0;
    padding-bottom: 0;
  }
  div.bhoechie-tab-menu div.list-group{
    margin-bottom: 0;
  }
  div.bhoechie-tab-menu div.list-group>a{
    margin-bottom: 0;
  }
  div.bhoechie-tab-menu div.list-group>a .glyphicon,
  div.bhoechie-tab-menu div.list-group>a .fa {
    color: #5A55A3;
  }
  div.bhoechie-tab-menu div.list-group>a:first-child{
    border-top-right-radius: 0;
    -moz-border-top-right-radius: 0;
  }
  div.bhoechie-tab-menu div.list-group>a:last-child{
    border-bottom-right-radius: 0;
    -moz-border-bottom-right-radius: 0;
  }
  div.bhoechie-tab-menu div.list-group>a.active,
  div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
  div.bhoechie-tab-menu div.list-group>a.active .fa{
    background-color: #5A55A3;
    background-image: #5A55A3;
    color: #ffffff;
  }
  div.bhoechie-tab-menu div.list-group>a.active:after{
    content: '';
    position: absolute;
    left: 100%;
    top: 50%;
    margin-top: -13px;
    border-left: 0;
    border-bottom: 13px solid transparent;
    border-top: 13px solid transparent;
    border-left: 10px solid #5A55A3;
  }
  
  div.bhoechie-tab-content{
    background-color: #ffffff;
    /* border: 1px solid #eeeeee; */
    padding-left: 20px;
    padding-top: 10px;
  }
  
  div.bhoechie-tab div.bhoechie-tab-content:not(.active){
    display: none;
  }
</style>
<section class="p-about com-padd">
  <h1 align="center"> My Account Details</h1>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-8 col-xs-9 bhoechie-tab-container">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
          <div class="list-group">
            <a href="#" class="list-group-item active text-center">
              <h4 class="fa fa-user"></h4>
              <br/>My Profile</a>
            <a href="#" class="list-group-item text-center">
              <h4 class="fa fa-list"></h4>
              <br/>My Order</a>
        <a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-list"></h4>
                  <br/>My Service</a>
            <a href="#" class="list-group-item text-center">
              <h4 class="fa fa-list"></h4>
              <br/>My Bookings</a>

            <a href="#" class="list-group-item text-center">
              <h4 class="fa fa-user"></h4>
              <br/>Edit Profile</a>
            <a href="#" class="list-group-item text-center">
              <h4 class="fa fa-key"></h4>
              <br/>Change Password</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item text-center">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              <h4 class="fa fa-sign-out"></h4>
              <br/>Logout</a>
          </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
          <!-- profile section -->
          <div class="bhoechie-tab-content active">
            <center>
               @if(Session::has('flash_success'))
              <h3 class="alert alert-success">
              {{ Session::get('flash_success') }}
              </h3>
            @endif
              <h1 class="fa fa-user" style="font-size:5em;color:#55518a"></h1>
              <h3 style="margin-top: 5px;color:#55518a"> {{auth::user()->name}} </h3>
              <h5 style="margin-top: 10px;color:#55518a"> Email : <span> {{auth::user()->email}}</span></h5>
              <h5 style="margin-top: 10px;color:#55518a"> Phone : <span> {{auth::user()->phone}}</span></h5>
				@if(auth::user()->city_id!=null)
              <h5 style="margin-top: 10px;color:#55518a"> City : <span>  {{auth::user()->city_id}}</span></h5>
				@endif
				
              <h5 style="margin-top: 10px;color:#55518a"> Landmark : <span>  {{auth::user()->landmark}}</span></h5>
              <h5 style="margin-top: 10px;color:#55518a"> Pincode : <span>  {{auth::user()->pincode}}</span></h5>
              <h5 style="margin-top: 10px;color:#55518a"> Address : <span>  {{auth::user()->address}}</span></h5>
            </center>
          </div>
         <!-- Order section -->
          <div class="bhoechie-tab-content">
            <center>
              <h2 style="margin-top: 0;color:#55518a">Order Details</h2>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Buy Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payment Mode</th>
                    <th scope="col">Total</th>
                    <th scope="col">View Order Details</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(auth::user()->orders as $order)
           @if($order->sellerService_id==null && $order->hotel==null)
                  <tr>
                      <td>{{$order->order_id}}</td>
                      <td>{{$order->created_at}}</td>
                      <td>{{$order->status}}</td>
                      <td>{{$order->payment_mode}}</td>
                      <td>&#8377; {{$order->payable_price}}</td>
                      <td><a href="{{url('customer/orderDetail/'.$order->order_id)}}">View</a></td>
                  </tr>
          @endif
                  @endforeach
                </tbody>
              </table>
            </center>
          </div>
            <div class="bhoechie-tab-content">
                <center>
                    <h2 style="margin-top: 0;color:#55518a">Service Details</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Service Id</th>
                            <th scope="col">Booking Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                            <th scope="col">View Service Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(auth::user()->orders as $order)
               @if($order->sellerService_id!=null)
                            <tr>
                                <td>{{$order->order_id}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->status}}</td>
                                <td>&#8377; {{$order->payable_price}}</td>
                                <td><a href="{{url('customer/orderDetail/'.$order->order_id)}}">View</a></td>
                            </tr>
              @endif
                        @endforeach
                        </tbody>
                    </table>
                </center>
            </div>

            <div class="bhoechie-tab-content">
                <center>
                    <h2 style="margin-top: 0;color:#55518a">Booking Details</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Booking Id</th>
                            <th scope="col">Booking Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                            <th scope="col">View Booking Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(auth::user()->orders as $order)
               @if($order->hotel!=null)
                            <tr>
                                <td>{{$order->order_id}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->status}}</td>
                                <td>&#8377; {{$order->payable_price}}</td>
                                <td><a href="{{url('customer/orderDetail/'.$order->order_id)}}">View</a></td>
                            </tr>
              @endif
                        @endforeach
                        </tbody>
                    </table>
                </center>
            </div>


          <!-- Wallet section -->
          <div class="bhoechie-tab-content">
            <center>
              <h2 style="margin-top: 0;color:#55518a">Edit Profile</h2>
              <div class="col-sm-2">
              </div>
              <div class="col-sm-8">
                <form method="POST" action="{{url('customer/updateProfile')}}">
                  @csrf
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{auth::user()->name}}" required>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{auth::user()->email}}" required>
                  </div>
                  <div class="form-group">
                    <input type="number" min="0" class="form-control" name="phone" placeholder="Enter Mobile" value="{{auth::user()->phone}}" required>
                  </div>
                  <div class="form-group">
                   <input  type="text" placeholder="Enter City"  name="city_id">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="pincode" placeholder="Enter pincode" value="{{auth::user()->pincode}}" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="landmark" placeholder="Enter landmark" value="{{auth::user()->landmark}}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address</label>
                    <textarea class="form-control" name="address" rows="3" required>{{auth::user()->address}}</textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <br><br>
              </div>
              <div class="col-sm-2">
              </div>
            </center>
          </div>
          <!-- Edit Profile section -->
          <div class="bhoechie-tab-content">
            <center>
              <h2 style="margin-top: 0;color:#55518a">Change Password</h2>
              <div class="col-sm-2">
              </div>
              <div class="col-sm-8">
                <div class="form-group">
                    <input type="password" class="form-control" id="password" placeholder="Enter New password" name="password">
                    <span class="password_warning"></span>
                </div>
                <div class="form-group form-check">
                      <input type="password" class="form-control" id="new_password" placeholder="Confirm Password">
                      <span class="confirm_password_warning"></span>
                      <span class="change_password_warning"></span>
                      <span class="change_password_done"></span>
                </div>
                
                <button onclick="changepassword()" type="button" class="btn btn-primary">Update</button>
              </div>
              <div class="col-sm-2">
              </div>
            </center>
          </div>
          <!-- Change section -->
          <div class="bhoechie-tab-content">
            <center>
              <h2 style="margin-top: 0;color:#55518a">logout</h2>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="{{ asset('js/jquery.min.js')}}"></script>
<script>
  function changepassword()
  {
    $('.change_password_warning').html('');
    $('.password_warning').html('');
    $('.confirm_password_warning').html('');
    $('.change_password_done').html('');
    var password = $('#password').val();
    var new_password = $('#new_password').val();
    if (password == '') {
      $('.password_warning').html('Password should not be blanked')
    }
    if (new_password == '') {
      $('.confirm_password_warning').html('Conirm password should not be blanked')
    }
    if (password && new_password != '') {
      if (password.length < 8) {
        $('.password_warning').html('Password should be 8 characters long')
      }
      if (new_password.length < 8) {
        $('.confirm_password_warning').html('Conirm password should be 8 characters long')
      }
      if (password.length >= 8 && new_password.length >= 8) {
        if (password === new_password) {
          $.ajax({
            url: '{{ url('change-password') }}',
            method: "POST",
            data: {_token: '{{ csrf_token() }}', "password":password},
            dataType: "json",
             success: function (response) {
                $('.change_password_done').html('Password changed');
              }
          });
        }
        else{
          $('.change_password_warning').html('Password and Confirm password should be same');
        }
      }
      
    }
    
  }
  $(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
  </script>
@endsection