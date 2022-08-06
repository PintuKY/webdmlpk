@extends('layouts.auth')

@section('content')
<section class="tz-login">
    <div class="tz-regi-form">
        <h4>{{ __('Reset Password') }}</h4>
        <form class="col s12" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly="">

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
                <div class="input-field col s12"> <i class="waves-effect waves-light btn-large full-btn waves-input-wrapper" style=""><input type="submit" value="submit" class="waves-button-input"></i> </div>
            </div>
        </form>
    </div>
</section>
@endsection
