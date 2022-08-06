@extends('layouts.app') 
@section('content')
@if(count($carts))
<section class="p-about com-padd">
	<h1 align="center">Cart Details </h1>
	<div class="container">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">Product Name</th>
					<th scope="col">Product Image</th>
					<th scope="col">Units</th>
					<th scope="col">Price</th>
					<th scope="col">Quantity</th>
					<th scope="col">Total</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($carts as $cart)
				@php 
					$total_cart_price[] = $cart->product->selling_price * $cart->quantity
				@endphp
				<tr>
					<th scope="row">{{$cart->product->name}}</th>
					<td>
						<img src="{{ asset('uploads/images') }}/{{$cart->product->image}}" alt="{{$cart->product->name}}" width="120px;" />
					</td>
					<td>{{$cart->product->unit}}</td>
					
					<td>Rs {{$cart->product->selling_price}}</td>
					<td>
						<div class="quantity buttons_added">
							<input type="button" value="-" class="minus" onclick="minusProductCounter(<?php echo $cart->id; ?>)">
							<input type="number" name="quantity" value="{{$cart->quantity}}" title="Quantity" class="input-text qty text">
							<input type="button" value="+" class="plus" onclick="plusProductCounter(<?php echo $cart->id; ?>)">
						</div>
					</td>
					<td>Rs {{$cart->product->selling_price * $cart->quantity}}</td>
					<td><i onclick="deleteCart(<?php echo $cart->id; ?>)" class="fa fa-trash" aria-hidden="true"></i>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</section>
<!--MOBILE APP-->
<section class="web-app">
	<div class="container">
		<div class="row">
			<div class="col-md-6 web-app-img">
				<img src="images/logo/flogo.jpg" style="width:120px;" alt="" />
			</div>
			<div class="col-md-6 web-app-con">
				<h2>Total  <span>Rs {{array_sum($total_cart_price)}}</span></h2>
				<button type="button" onClick="window.location='checkout';" class="btn btn-danger">Proceed to Checkout</button>
			</div>
		</div>
	</div>
</section>
@else
 <div class="text-center">
   <img src="https://cdn.dribbble.com/users/844846/screenshots/2981974/empty_cart_800x600_dribbble.png">
 </div>
 @endif
<script type="text/javascript">
function plusProductCounter(cart_id){
  $.ajax({
    url: '{{ url('increment-cart') }}',
    method: "POST",
    data: {_token: '{{ csrf_token() }}', "cart_id":cart_id},
    dataType: "json",
     success: function (response) {
        location.reload();
      }
  });
 }
 function minusProductCounter(cart_id){
  $.ajax({
    url: '{{ url('decrement-cart') }}',
    method: "POST",
    data: {_token: '{{ csrf_token() }}', "cart_id":cart_id},
    dataType: "json",
     success: function (response) {
     	location.reload();
      }
  });
 }
 function deleteCart(cart_id)
 {
 	$.ajax({
	    url: '{{ url('delete-cart') }}',
	    method: "POST",
	    data: {_token: '{{ csrf_token() }}', "cart_id":cart_id},
	    dataType: "json",
	     success: function (response) {
	     	location.reload();
	    }
	 });
 }
</script>
@endsection