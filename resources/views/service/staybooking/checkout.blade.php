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
                        <form class="col" method="post" action="{{route('staybooking.makepayment')}}" name="payuForm">
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
                                  <input  type="text" placeholder="Enter City" class="@error('city_id') is-invalid @enderror"  name="city_id" required>
								   @error('city_id')
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
                           <li>From Date <span class="green-bg">{{$_REQUEST['from_date']}}</span> </li>
                           <li>To Date <span class="green-bg">{{$_REQUEST['to_date']}}</span> </li>
                           <li>Adults<span class="green-bg">{{$_REQUEST['adults']}}</span> </li>
							<li>Children<span class="green-bg">{{$_REQUEST['children']}}</span> </li>
							<li>Rooms<span class="green-bg">{{$_REQUEST['rooms']}}</span> </li>
                           <li>Nos of Night<span class="green-bg">{{$nosofdays}} * {{$_REQUEST['rooms']}} * Rs {{$hotel->price}}</span> </li>
						<li>Children Extra Charge<span class="green-bg">{{$nosofdays}} *{{$_REQUEST['childrenExtra']}}  * Rs {{$hotel->childrenExtra}}</span> </li>
							<li>Adult Extra Charge<span class="green-bg">{{$nosofdays}} *{{$_REQUEST['adultExtra']}}  * Rs {{$hotel->adultExtra }}</span> </li>
                           <h4>Total  <span> <h1>Rs {{ $nosofdays * $hotel->price * $_REQUEST['rooms'] + $nosofdays * $hotel->adultExtra*$_REQUEST['adultExtra'] + $nosofdays * $_REQUEST['childrenExtra']* $hotel->childrenExtra }} </h1></span> </h4>
                        </ul>
                        <button type="submit" class="waves-effect waves-light btn-large full-btn list-pg-btn">Pay Now</button>
                     </div>
                  </div>
               </div>
               <!--END LISTING DETAILS: LEFT PART 9-->
            </div>
            <input type="hidden" name="hotel_id" value="{{$_REQUEST['hotel']}}">
            <input type="hidden" name="nosofdays" value="{{ $nosofdays }}">
            <input type="hidden" name="adult" value="{{$_REQUEST['adult']}}">
				 <input type="hidden" name="adults" value="{{$_REQUEST['adults']}}">
				  <input type="hidden" name="children" value="{{$_REQUEST['children']}}">
				 <input type="hidden" name="childrenExtra" value="{{$_REQUEST['childrenExtra']}}">
				 <input type="hidden" name="adultExtra" value="{{$_REQUEST['adultExtra']}}">
				  <input type="hidden" name="rooms" value="{{$_REQUEST['rooms']}}">
            <input type="hidden" name="from_date" value="{{$_REQUEST['from_date']}}">
            <input type="hidden" name="to_date" value="{{$_REQUEST['to_date']}}">
            </form>
         </div>
      </div>
   </div>
</section>

@endsection
