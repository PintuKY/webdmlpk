@extends('layouts.app')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap');
        .order-head
        {
            font-size:30px;
            font-family: 'Playfair Display', serif;
            margin:10px 0px;
            font-weight:bold;
            color:#5A55A3;

        }
        .table thead th
        {
            font-size: 17px;
            color: #000;
            font-weight:500;
            font-family:"Nunito", sans-serif;
            width: 275px;

        }
        .table td, .table th
        {

        }
        .table td
        {
            font-family:"Nunito", sans-serif;
            color: #000;
            font-weight: 400;
            font-size: 16px;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #ccc;
        }
        .table thead th
        {
            border-bottom: 1px solid #d05b06;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #cd5905!important;
        }


    </style>
@if($order->hotel_id != null)
    <div class="container" style="padding-bottom: 100px;">
        <h3 class="head-title pb-3 text-center order-head" style="padding-top: 40px; padding-bottom: 100px;"></h3><br>
            <h1 class=" text-center order-head">Booking Details</h1>
        <br>
        <table class="table table-striped" style="width:80%; margin:auto; border:solid 1px #ddd;">
            <thead>
            <tr>
                <th style="text-align:right; border-bottom:none;">Booking Id :</th>
                <th style="border-bottom:none;">{{$order->order_id}}</th>
            </tr>
            </thead>
            <tbody> 
            <tr>
                <td style="text-align:right;">Hotel : </td>
                <td>{{$order->hotel->name}}</td>
            </tr>
            <tr>
                <td style="text-align:right;">Checkin Time : </td>
                <td>{{ \Carbon\Carbon::parse($order->hotel_from_date)->format('j M Y') }}, {{$order->hotel->checkin_time}}</td>
            </tr>
            <tr>
                <td style="text-align:right;">Checkout Time : </td>
                <td>{{ \Carbon\Carbon::parse($order->hotel_to_date)->format('j M Y') }}, {{$order->hotel->checkout_time}}</td>
            </tr>
            <tr>
                <td style="text-align:right;">Nos of Adult : </td>
                <td>{{$order->hotel_adult_no}}</td>
            </tr>
				<tr>
                <td style="text-align:right;">Nos of Children : </td>
                <td>{{$order->hotel_children_no}}</td>
            </tr>
				<tr>
                <td style="text-align:right;">Nos of Rooms : </td>
                <td>{{$order->hotel_room_no}}</td>
            </tr>
				<tr>
                <td style="text-align:right;">Extra Children Charge : </td>
                <td>&#8377; {{$order->childrenExtraCharge}}</td>
            </tr>
				<tr>
                <td style="text-align:right;">Extra Adult Charge : </td>
                <td>&#8377; {{$order->adultExtraCharge}}</td>
            </tr>
            <tr>
                <td style="text-align:right;">Amount Paid : </td>
                <td>&#8377; {{$order->payable_price}}</td>
            </tr>
            <tr>
                <td style="text-align:right;">Status : </td>
                <td>{{$order->status}}</td>
            </tr>
				<tr>
					<td style="text-align:right;">Locate : </td>
                <td><a target="_blank" href="{{$order->hotel->google_location}}"><i class="fa fa-map-marker" aria-hidden="true"></i> Get Direction</a> </td>
               
            </tr>
				
            </tbody>
        </table>
    </div>
@else
    <div class="container" style="padding-bottom: 100px;">
        <h3 class="head-title pb-3 text-center order-head" style="padding-top: 40px; padding-bottom: 100px;"></h3><br>
         @if($order->sellerService_id==null)
        <h1 class=" text-center order-head">Order Details</h1>
        @else
            <h1 class=" text-center order-head">Service Details</h1>
            @endif
        <br>
        <table class="table table-striped" style="width:80%; margin:auto; border:solid 1px #ddd;">
            <thead>
            <tr>
               @if($order->sellerService_id==null)
                <th style="text-align:right; border-bottom:none;">Order Id :</th>
                @else
                    <th style="text-align:right; border-bottom:none;">Service Id :</th>
                    @endif
                <th style="border-bottom:none;">{{$order->order_id}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align:right;">Amount Paid : </td>
                <td>&#8377; {{$order->payable_price}}</td>
            </tr>
             <tr>
                <td style="text-align:right;">Payment Mode : </td>
                <td>{{$order->payment_mode}}</td>
            </tr>
            <tr>
                <td style="text-align:right;">Status : </td>
                <td>{{$order->status}}</td>
            </tr>
@if($order->appointment_time!=null)
						<tr>
                <td style="text-align:right;">Appointment Date : </td>
                <td>{{$order->appointment_date}}</td>
            </tr>
				<tr>
                <td style="text-align:right;">Appointment Time : </td>
                <td>{{$order->appointment_time}}</td>
            </tr>
						@endif


            </tbody>
        </table>


        <div style="margin-top:50px;">
            <!-- /.card-header -->
            <div class="">
                <table class="table table-bordered" style="width:80%; margin:auto; border:solid 1px   ">
                    <thead>
                   @if($order->sellerService_id==null)
                    <tr>
                        <th style="text-align:center; ">Product image</th>
                        <th style="text-align:center;">Product Name</th>
                        <th style="text-align:center;">Price</th>
                        <th style="text-align:center;">Quantity</th>
                        <th style="text-align:center;">Total</th>
                    </tr>
                        @else
                        <tr>
                            <th style="text-align:center; ">Service image</th>
                            <th style="text-align:center;">Service Name</th>
                            <th style="text-align:center;">Price</th>

                        </tr>
                        @endif
                    </thead>
                    <tbody>
                          @if($order->sellerService_id==null)
                    @foreach($list as $row)
                        <tr>
                            <td style="text-align:center;">
                                <img style="width:150px;" src="{{ asset('uploads/images/'.@$row->product->image)}}">
                            </td>
                            <td style="text-align:center;">{{ @$row->product_id }}</td>
                            <td style="text-align:center;">&#8377;  {{ @$row->selling_price }}</td>
                            <td style="text-align:center;">{{ @$row->quantity }}</td>
                            <td style="text-align:center;">&#8377; {{ @$row->selling_price * $row->quantity }}</td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td style="text-align:center;">
                                <img style="width:150px;" src="{{ asset('uploads/images/'.$service->image)}}">
                            </td>
                            <td style="text-align:center;">{{ $service->name }}</td>
                            <td style="text-align:center;">&#8377;  {{ $order->payable_price }}</td>

                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
      @if($order->sellerService_id==null)
                <h3 class="head-title pb-3 text-center order-head" style="padding-top: 40px;">Shipping Address</h3>
                <table class="table table-striped " style="width:50%; margin:auto; border:solid 1px #969696; margin-bottom:50px!important;">
                    <thead>
						<tr>
                        <th style="text-align:right; font-weight:normal; border-bottom:none;">Take Away :</th>
                        <th style="font-weight:normal; border-bottom:none;">{{$order->takeAway}}</th>
                    </tr>
                    <tr>
                        <th style="text-align:right; font-weight:normal; border-bottom:none;">Name :</th>
                        <th style="font-weight:normal; border-bottom:none;">{{$order->name}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="text-align:right;">Email :</td>
                        <td>{{$order->email}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:right;">Phone :</td>
                        <td>{{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:right;">Address :</td>
                        <td>{{$order->address}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:right;">State :</td>
                        <td>{{$order->landmark}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:right;">City :</td>
                        <td>{{$order->city_id}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:right;">Pincode :</td>
                        <td>{{$order->pincode}}</td>
                    </tr>
                    </tbody>
                </table>
            @else
                <?php
                $pickUp=\App\Models\PickUpDrop::where('order_id',$order->id)->first();
                ?>
            @if($pickUp)
                        <h3 class="head-title pb-3 text-center order-head" style="padding-top: 40px;">Details</h3>
                        <table class="table table-striped " style="width:50%; margin:auto; border:solid 1px #969696; margin-bottom:50px!important;">
                            <thead>
                            <tr>
                                <th style="text-align:right; font-weight:normal; border-bottom:none;">Delivery Contact :</th>
                                <th style="font-weight:normal; border-bottom:none;">{{$pickUp->deliveryContact}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="text-align:right;">Pick UP :</td>
                                <td>{{$pickUp->pickUpAddress}}</td>
                            </tr>
                            <tr>
                                <td style="text-align:right;">Drop :</td>
                                <td>{{$pickUp->dropAddress}}</td>
                            </tr>
                            <tr>
                                <td style="text-align:right;">Distance :</td>
                                <td>{{$pickUp->distance}}</td>
                            </tr>
                            <tr>
                                <td style="text-align:right;">No. :</td>
                                <td>{{$pickUp->quantity}}</td>
                            </tr>

                            </tbody>
                        </table>
                @else
                <h3 class="head-title pb-3 text-center order-head" style="padding-top: 40px;">Address</h3>
                        <table class="table table-striped " style="width:50%; margin:auto; border:solid 1px #969696; margin-bottom:50px!important;">
                            <thead>
                            <tr>
                                <th style="text-align:right; font-weight:normal; border-bottom:none;">Name :</th>
                                <th style="font-weight:normal; border-bottom:none;">{{$order->name}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="text-align:right;">Email :</td>
                                <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <td style="text-align:right;">Phone :</td>
                                <td>{{$order->phone}}</td>
                            </tr>
                            <tr>
                                <td style="text-align:right;">Address :</td>
                                <td>{{$order->address}}</td>
                            </tr>
                            <tr>
                                <td style="text-align:right;">State :</td>
                                <td>{{$order->landmark}}</td>
                            </tr>
                            <tr>
                                <td style="text-align:right;">City :</td>
                                <td>{{$order->city_id}}</td>
                            </tr>
                            <tr>
                                <td style="text-align:right;">Pincode :</td>
                                <td>{{$order->pincode}}</td>
                            </tr>
                            </tbody>
                        </table>
            @endif
            @endif
    </div>
@endif
@endsection
