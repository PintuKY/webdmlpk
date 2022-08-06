@extends('mail.layout')
@section('content')

    <div class="b-panel-title">{{__('Registered Successfully')}}</div>
    <div class="b-table-wrap">
        <div class="b-container">


            <div class="order_header">Hey <b>{{ $user['name'] }}</b></div>
            <div class="col_sm_12">
                <p>You are receiving this email confirmation for the successful registration in <b>SubbiSky</b>.</p>
            </div>


        </div>
    </div>
    </div>



@endsection
