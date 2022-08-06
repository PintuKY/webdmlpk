@extends('layouts.auth')

@section('content')
   

<section class="tz-login">
        <div class="tz-regi-form">
            <h4>Sign Up</h4>
			
			@if(Session::has('flash_success'))
  <div class="alert alert-success"> {{ Session::get('flash_success') }} </div>
@elseif(Session::has('flash_error'))
  <div class="alert alert-danger"> {{ Session::get('flash_error') }} </div>
@endif
			
			
            <p>It's free and always will be.</p>
            <form class="col s12" method="post" action="{{ route('customer.register') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="@error('name') is-invalid @enderror" placeholder="Enter Name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="number" min="0" class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Enter Mobile" name="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" name="password" placeholder="Enter Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" name="password_confirmation" placeholder="Enter Confirm Password">
                     </div>
                </div>
                <div class="row">
                    <div class="input-field col s12"> <i class="waves-effect waves-light btn-large full-btn waves-input-wrapper" style=""><input type="submit" value="Submit" ></i> </div>
                </div>
            </form>
			 
            <p><a href="{{ route('password.request') }}">forgot password</a> 
            | Are you a old user ? <a href="{{ route('login') }}">Login</a> </p>
        </div>
    </section>
@endsection