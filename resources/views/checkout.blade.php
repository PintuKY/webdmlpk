@extends('layouts.app') 
@section('content')
<section class="pg-list-1">
   <div class="container">
      <div class="row">
         <div class="pg-list-1-left">
            <a href="#">
               <h3>Checkout</h3>
            </a>
         </div>
      </div>
   </div>
</section>

<section class="list-pg-bg">
   <div class="container">
      <div class="row">
         <div class="com-padd">
            <div class="list-pg-lt list-page-com-p">
               <!--LISTING DETAILS: LEFT PART 6-->
               <div class="pglist-p3 pglist-bg pglist-p-com" id="ld-rew">
                  <div class="list-pg-inn-sp">
                     <div class="list-pg-write-rev">
                        <form class="col" method="post" action="{{route('ecom.makepayment')}}" name="payuForm" id="ecompayuForm">
                           @csrf
                           <div class="row">
                              <div class="input-field col s6">
                                 <input value="{{auth::user()->name}}" type="text" class="@error('name') is-invalid @enderror" name="name">
                                 @error('name')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                                 <label>Full Name</label>
                              </div>
                              <div class="input-field col s6">
                                 <input value="{{auth::user()->phone}}" type="number" class="@error('phone') is-invalid @enderror" name="phone"> 
                                 @error('phone')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                                 <label>Mobile</label>
                              </div>
                           </div>
                           <div class="row">
                              <div class="input-field col s6">
                                 <input value="{{auth::user()->email}}" type="email" class="@error('email') is-invalid @enderror" name="email">
                                  @error('email')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                                 <label>Email id</label>
                              </div>
                              <div class="input-field col s6">
                                  <input  type="text" placeholder="Enter City" class="@error('city_id') is-invalid @enderror" name="city_id" required>
								  @error('city_id')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="row">
                              <div class="input-field col s6">
                                 <input value="{{@auth::user()->pincode}}" type="number" min="0" class="@error('pincode') is-invalid @enderror" placeholder="Enter Pincode" name="pincode">
                                 @error('pincode')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                              </div>
							   
                              <div class="input-field col s6">
                                 <input value="{{@auth::user()->landmark}}" type="text" class="@error('landmark') is-invalid @enderror" placeholder="Enter Lanmark" name="landmark"> 
                                 @error('landmark')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                              </div>
                           </div>
							<br>
							<div class="row">
								<select class="col s12" id="takeAway" name="takeAway">
                        
                        <option value="No">Delivery</option>
									  <option value="Yes">Take Away</option>
                       
                    </select>
                              
                           </div>
							<br>
                           <div class="row">
                              <div class="input-field col s12">
                                 <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Enter Full Address">{{@auth::user()->address}}</textarea>
                                 @error('address')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                              </div>
                           </div>
							
                        
                     </div>
                  </div>
               </div>
               <!--END LISTING DETAILS: LEFT PART 6-->
            </div>
            <div class="list-pg-rt">
               <!--LISTING DETAILS: LEFT PART 9-->
               <div class="pglist-p3 pglist-bg pglist-p-com">
                  <div class="pglist-p-com-ti pglist-p-com-ti-right">
                     <h3><span>Payment </span> Details </h3>
                  </div>
                  <div class="list-pg-inn-sp">
                     <div class="list-pg-oth-info">
                        <ul>
                           @foreach($carts as $cart)
                           @php $total_cart_price[] = $cart->product->selling_price * $cart->quantity @endphp
                           <li>{{$cart->product->name}} ({{$cart->quantity}})<span class="green-bg">Rs {{$cart->product->selling_price}}</span> 
                           </li>
                           @endforeach
							<?php
							$sellerr=App\Models\Seller::find($get_cart->seller_id);
							
							?>
                           <div class="row">
                              <input id="online" name="payment_mode" type="radio" value="Online" checked="checked" />
                              <label for="online">Pay Online</label>
							   @if($sellerr->cod=="Active")
                              <input id="cod" name="payment_mode" type="radio" value="Cod" />
                              <label for="cod">Cash on Delivery</label>
							   @endif
                           </div>
							<br><br>
							
							<?php
							$seller=App\Models\Seller::find($get_cart->seller_id);
							
							?>
							@if($seller->deliveryStatus=="Inactive")
                           <h4>Total  <span> <h1>Rs {{array_sum($total_cart_price)}} </h1></span> </h4>
							@else
							 <li>  Total<span class="green-bg">Rs {{array_sum($total_cart_price)}}</span> </li>
							 
							 <li> Delivery  <span class="green-bg"> Rs {{$seller->deliveryCharge}} </span> </li>
							 <h4>Payable  <span> <h1>Rs {{array_sum($total_cart_price)+$seller->deliveryCharge}} </h1></span> </h4>
							@endif
                        </ul> <button type="button" class="waves-effect waves-light btn-large full-btn list-pg-btn ecompayment_btn">Pay Now</button>
                     </div>
                  </div>
               </div>
            </div>
				@if($seller->deliveryStatus=="Inactive")
            <input type="hidden" name="total_cart_price" value="{{array_sum($total_cart_price)}}">
				@else
				<input type="hidden" name="total_cart_price" value="{{array_sum($total_cart_price)+$seller->deliveryCharge}}">
											@endif
            <input type="hidden" name="seller_id" value="{{$get_cart->seller_id}}">
            </form>
         </div>
      </div>
   </div>
</section>

@endsection