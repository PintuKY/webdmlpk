@extends('mail.layout')
@section('content')

    <div class="b-panel-title">{{__('Account Activated')}}</div>
    <div class="b-table-wrap">
        <div class="b-container">


            <div class="order_header">Hey <b>{{ $user['name'] }}</b></div>
            <div class="col_sm_12">
                <p><b>Congratulations!</b>Your account is activated. We are happy to join you with us. Enjoy your needs and let us know about us from your valuable feedback. Thank you </p>
            </div>


        </div>
    </div>
    </div>



@endsection
