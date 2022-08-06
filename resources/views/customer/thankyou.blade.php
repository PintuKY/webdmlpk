@extends('layouts.app')
@section('content')


@if($order->hotel_id != null)

<section class="p-about com-padd">
	<section class="p-about" style="padding-top:5px;">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
                       <h1 style="color:orange;"> Thank you</h1>
					<div class="page-about">
						<img src="{{asset('images/thanku.jpg')}}" width="50%" alt="" />
					</div>

				</div>
				<div class="col-md-7" style="background:#0088ce;color:white;padding:20px;border-radius:60px">
					<div class="page-about pad-bot-red-40">
                        <h1>Booking Details </h1>

                        <h4>Booking ID : <span style="color:white;">{{$order->order_id}}</span></h4>
						<h4> Hotel  : <span style="color:white;">{{$order->hotel->name}}</span></h4>
                        <h4>Phone:<i class="fa fa-phone" aria-hidden="true"></i><span style="color:white;">{{ $order->seller->user->phone}}</span></h4>
					    <h4>Email:<i class="fa fa-envelope" aria-hidden="true"></i><span style="color:white;">{{$order->seller->user->email}}</span></h4>
                        <h4> Checkin Time  : <span style="color:white;">{{ \Carbon\Carbon::parse($order->hotel_from_date)->format('j M Y') }}, {{$order->hotel->checkin_time}}</span></h4>
						<h4> Checkout Time  : <span style="color:white;">{{ \Carbon\Carbon::parse($order->hotel_to_date)->format('j M Y') }}, {{$order->hotel->checkout_time}}</span></h4>
						<h4> Nos of Adult  : <span style="color:white;">{{$order->hotel_adult_no}}</span></h4>
						<h4> Nos of Children  : <span style="color:white;">{{$order->hotel_children_no}}</span></h4>
						<h4> Nos of Room  : <span style="color:white;">{{$order->hotel_room_no}}</span></h4>
						<h4> Children Extra Charge  : <span style="color:white;">Rs {{$order->childrenExtraCharge}}</span></h4>
						<h4> Adult Extra Charge  : <span style="color:white;">Rs {{$order->adultExtraCharge}}</span></h4>
						<h4>Amount Paid  : <span style="color:white;">Rs {{$order->payable_price}}</span></h4>
						<h4>Address  : <span style="color:white;">{{$order->seller->shop_address}}</span></h4>
						<a target="_blank" href="{{$order->hotel->google_location}}"><span style="color:white;"><i class="fa fa-map-marker" aria-hidden="true"></i> Get Direction</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>

@else
<section class="p-about com-padd">
	<section class="p-about" style="padding-top:5px;">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					 @if($order->sellerService_id==null)
                            <h1 style="color:orange;"> Thank you For Your Order </h1>
                        @else
                            <h1 style="color:orange;"> Thank you</h1>
                        @endif
					<div class="page-about">
						<img src="{{asset('public/images/thanku.jpg')}}" width="50%" alt="" />
					</div>
				</div>
				<div class="col-md-7" style="background:#0088ce;color:white;padding:20px;border-radius:60px">
					<div class="page-about pad-bot-red-40">
						  @if($order->sellerService_id==null)

                                <h1>Order Details </h1>
                                <h4>Order ID : <span style="color:white;">{{$order->order_id}}</span></h4>
                            @else
                                <h1>Service Details </h1>
                                <h4>Service ID : <span style="color:white;">{{$order->order_id}}</span></h4>
                            @endif

						<h4> Name  : <span style="color:white;">{{$order->seller->shop_name}}</span></h4>
						<h4>Payable Amount  : <span style="color:white;">Rs {{$order->payable_price}}</span></h4>
						<h4>Payment Mode  : <span style="color:white;">{{$order->payment_mode}}</span></h4>
						@if($order->appointment_time!=null)
						<h4>Appointment Date  : <span style="color:white;">{{$order->appointment_date}}</span></h4>
						<h4>Appointment Time  : <span style="color:white;">{{$order->appointment_time}}</span></h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
</section>
<section class="p-about1">
	 @if($order->sellerService_id==null)
        <h1 align="center">Order Details </h1>
        @else
            <h1 align="center">Service Details </h1>
            @endif
	<div class="container">
		<table class="table table-bordered">
			<thead>
				<tr>
					 @if($order->sellerService_id==null)
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                        @else
                        <th scope="col">Service Name</th>
                        <th scope="col">Service Image</th>
                        <th scope="col">Price</th>

                    @endif
				</tr>
			</thead>
			<tbody>
				@if($order->sellerService_id==null)
				@foreach($order->order_lists as $order_list)
				<tr>
					<th scope="row">{{$order_list->product->name}}</th>
					<td>
						<img src="{{ asset('public/uploads/images') }}/{{$order_list->product->image}}" alt="{{$order_list->product->name}}" width="120px;" />
					</td>
					<td>{{$order_list->unit}}</td>
					<td>Rs {{$order_list->selling_price}}</td>
					<td>{{$order_list->quantity}}</td>
					<td>Rs {{$order_list->selling_price * $order_list->quantity}}</td>
				</tr>
				@endforeach
				@else
				<tr>
					<th scope="row">{{$order->service->name}}</th>
					<td>
						<img src="{{ asset('public/uploads/images') }}/{{$order->service->image}}" alt="{{$order->service->name}}" width="120px;" />
					</td>

					<td>Rs {{$order->payable_price}}</td>

				</tr>
				@endif
			</tbody>
		</table>
	</div>
</section>
<!--MOBILE APP-->
<section class="web-app">
	<div class="container">
		<div class="row">
			<div class="col-md-12 web-app-con">
				 @if($order->sellerService_id==null)
                    <h1>Shipping Address </h1>
				<br>
				<h4>Name : <span>{{$order->name}}</span></h4>
				<h4>Email : <span>{{$order->email}}</span></h4>
				<h4>Phone : <span>{{$order->phone}}</span></h4>
				<h4>Pincode : <span>{{$order->pincode}}</span></h4>
				<h4>Address : <span>{{$order->address}}</span></h4>
				<h4>Take Away : <span>{{$order->takeAway}}</span></h4>
				<h4>City : <span>{{$order->city_id}}</span></h4>
				<h4>Lankmark : <span>{{$order->landmark}}</span></h4>
                        @else
				 <?php
                $pickUp=\App\Models\PickUpDrop::where('order_id',$order->id)->first();
                ?>
				 @if($pickUp)
				<h1> Details </h1>
				<br>
				<h4>Delivery Contact : <span>{{$pickUp->deliveryContact}}</span></h4>
				<h4>Pick Up : <span>{{$pickUp->pickUpAddress}}</span></h4>
				<h4>Drop : <span>{{$pickUp->dropAddress}}</span></h4>
				<h4>Distance : <span>{{$pickUp->distance}}</span></h4>
				<h4>Quantity : <span>{{$pickUp->quantity}}</span></h4>

				@else
                        <h1> Address </h1>
				<br>
				<h4>Name : <span>{{$order->name}}</span></h4>
				<h4>Email : <span>{{$order->email}}</span></h4>
				<h4>Phone : <span>{{$order->phone}}</span></h4>
				<h4>Pincode : <span>{{$order->pincode}}</span></h4>
				<h4>Address : <span>{{$order->address}}</span></h4>
				<h4>City : <span>{{$order->city_id}}</span></h4>
				<h4>Lankmark : <span>{{$order->landmark}}</span></h4>
                @endif
				@endif

			</div>
		</div>
	</div>
</section>
@endif
@endsection
