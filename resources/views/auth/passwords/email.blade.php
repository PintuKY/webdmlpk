@extends('layouts.auth')

@section('content')
    <section class="tz-login">
        <div class="tz-regi-form">
            <h4>Forgot Password</h4>
            <p>It's free and always will be.</p>
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <form class="col s12" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Id">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12"> <i class="waves-effect waves-light btn-large full-btn waves-input-wrapper" style=""><input type="submit" value="submit" class="waves-button-input"></i> </div>
                </div>
            </form>
        </div>
    </section>
@endsection