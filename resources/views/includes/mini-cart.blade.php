	@php
        $carts = \App\Models\Cart::where('session_id',session()->getId())->get();
	@endphp
<div class="sc-head d-flex">
			<div class="cart-count">
				<h1>Cart Details</h1>
			</div>
			<span onclick="cartclose()" class="close-icon"><i class="fa fa-times"></i></span>
		</div>

				<br>
	<div class="list">
		<table class="table">
			<thead>
				<tr class="list-item-head">
					<th class="head-img">Image</th>
					<th>Pname</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
			@foreach($carts as $cart)

			<tr>
				<td class="head-img"><img src="{{ asset('uploads/images') }}/{{$cart->product->image}}" alt="{{$cart->product->name}}"></td>
				<td>{{$cart->product->name}}</td>
				<td><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
			</tr>

			@endforeach

			</tbody>
		</table>

	</div>

	<div class="button-list">
		<ul>
			<li><a href="{{ url('cart')}}" class="btn blue">View Cart</a></li>
			<li><a href="{{ url('checkout') }}" class="btn red">Checkout</a></li>
		</ul>



	</div>
