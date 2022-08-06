@extends('layouts.app')
@section('content')
    <section class="pg-list-1">
        <div class="container">
            <div class="row">
                <div class="pg-list-1-left">
                    <a href="#">
                        <h3>Booking</h3>
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
                                    <form class="col" method="post" action="{{route('service.makepayment')}}" name="payuForm">
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
										@if($service->type=="health")
										      <div class="row">
                                            <div class="input-field col s6">
                                                <input  type="date"  class="@error('appointment_date') is-invalid @enderror" placeholder="Enter Appointment Date" name="appointment_date" required>
                                                @error('appointment_date')
                                                <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                                @enderror
                                            </div>
                                            <div class="input-field col s6">
                                                <input  type="time" class="@error('appointment_time') is-invalid @enderror" placeholder="Enter Appointment Time" name="appointment_time" required>
                                                @error('appointment_time')
                                                <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                                @enderror
                                            </div>
                                        </div>
										@endif
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

                                        <h4>Amount  <span> <h1>Rs {{$sellerService->price}} </h1></span> </h4>
                                    </ul> <button type="submit" class="waves-effect waves-light btn-large full-btn list-pg-btn">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="amount" value="{{$sellerService->price}}">
                    <input type="hidden" name="seller_id" value="{{$sellerService->seller_id}}">
						  <input type="hidden" name="sellerService_id" value="{{$sellerService->id}}">
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
