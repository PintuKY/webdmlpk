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
            @if(@$_REQUEST['return'] == "checkout")
                <h3>Login to proceed for checkout</h3>
            @else
                <h4>Sign In</h4>
                <p>It's free and always will be.</p>
            @endif
            <br><br>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Login With Password </a>
                </li>
                <li><a data-toggle="tab" href="#menu1"> Login With OTP</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <form class="col s12" method="post" action="{{ route('seller.login') }}">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" value="{{ old('name') }}" class="validate @error('name') is-invalid @enderror" id="email" name="email">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label>Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="password" class="validate @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label>Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12"> <i class="waves-effect waves-light btn-large full-btn waves-input-wrapper" style=""><input type="submit" value="submit" class="waves-button-input"></i> </div>
                        </div>
                    </form>
                    <p><a href="{{ route('password.request') }}">forgot password</a> 
                | Are you a new user ? <a href="{{ route('seller.register') }}">Register</a> </p>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <form class="col s12" id="otp-form">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="otp_email" type="text" class="form-control " name="otp_email" value="" autocomplete="off" placeholder="Email or Phone" autofocus>
								<input type="hidden" id="role_id"  value="2" name="role_id">
                                <span style="color: red;" class="login-message"></span>
                                <label>Email or Phone *</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12"> <i class="waves-effect waves-light btn-large full-btn waves-input-wrapper" style=""><input type="submit" value="submit" class="waves-button-input otp-login"></i> 
                            </div>
                        </div>
                    </form>

                     <form class="col s12" id="otp-Verify">
                        <div id="user_id_form">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="user_otp" type="number" class="form-control " name="user_otp" value="" required autocomplete="off" placeholder="Enter OTP" autofocus>
                                    <span class="otp-message"></span>
                                    <input type="hidden" id="user_id" name="user_id">
									<input type="hidden" id="role_id"  value="2" name="role_id">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12"> <i class="waves-effect waves-light btn-large full-btn waves-input-wrapper" style=""><input type="submit" value="Verify" class="waves-button-input otp-Verify"></i> 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection