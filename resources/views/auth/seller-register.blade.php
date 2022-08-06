@extends('layouts.auth')
@section('content')
    <section class="tz-login">
        <div class="tz-regi-form">
            @if(Session::has('flash_success'))
              <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
              {{ Session::get('flash_success') }}
              </div>
            @endif
            <h4>Sign Up as Seller</h4>
            <p>It's free and always will be.</p>
            <form class="col s12" method="post" action="{{ route('seller.register') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Name">
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
                    <select class="col s12" id="city_id" name="city_id">
                        @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email">
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
                <!-- <hr>
                <p class="text-center">Business Details</p>
                <hr> -->
                <p>Select Service</p>
                <div class="row">
                    <select class="col s12" id="service_id" name="service_id" onchange="get_subservice()">
                        @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>

                @include('auth.sub-services')

                <div class="row">
                    <div class="input-field col s12"> 
                        <i class="waves-effect waves-light btn-large full-btn waves-input-wrapper" style="">
                        <input type="submit" value="submit" class="waves-button-input"></i> 
                    </div>
                </div>
            </form>
            <p><a href="{{ route('password.request') }}">forgot password</a> 
            | Are you a old user ? <a href="{{ route('seller.login') }}">Login</a> </p>
        </div>
    </section>
@endsection