@extends('layouts.auth')

@section('content')
    <style>
        .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
        color: #fff;
        cursor: default;
        background-color: #0088ce;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }
    #user_id_form{
        display: none;
    }
    .otp-message{
        color: red;
    }
    </style>
    <section class="tz-login">
        <div class="tz-regi-form">
            @if(Session::has('flash_error'))
              <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
              {{ Session::get('flash_error') }}
              </div>
            @endif
             @if(Session::has('flash_success'))
              <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
              {{ Session::get('flash_success') }}
              </div>
            @endif
                <h4>Verify Your Account</h4>
               
          
            <br><br>
            
            

                     <form class="col s12" method="post" action="{{route('seller.verify.account')}}">
						 @csrf
						
                        <div >
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="user_otp" type="number" class="form-control " name="user_otp" value="" required autocomplete="off" placeholder="Enter OTP" >
                                   
                                    <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12"> <i class="waves-effect waves-light btn-large full-btn waves-input-wrapper" style=""><input type="submit" value="Verify" ></i> 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            
       
    </section>

@endsection