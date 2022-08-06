@extends('mail.layout')
@section('content')

    <div class="b-panel-title">{{__('Verify Your Account')}}</div>
    <div class="b-table-wrap">
        <div class="b-container">


            <div class="order_header">Hey <b>{{ $user['name'] }}</b></div>
            <div class="col_sm_12">
                <p>You are receiving this email for the Account Verification in <b>SubbiSky</b>.<br>Your OTP for verification is {{$user['verifyOtp']}}</p>
            </div>


        </div>
    </div>
    </div>



@endsection
