@extends('layouts.app')

@section('content')
      <!--LISTING DETAILS-->
      <section class="pg-list-1">
         <div class="container">
            <div class="row">
               <div class="pg-list-1-left">
                  <a href="#">
                     <h3>{{$shop->shop_name}}</h3>
                  </a>
                  <div class="list-rat-ch">  	<span>{{number_format($shop->ratingAverage,1)}}</span>
                        @if($shop->ratingAverage <= 1 && $shop->ratingAverage >0)
                        <i class="fa fa-star" style="color: #ec4445;"></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                            @elseif($shop->ratingAverage <=2 && $shop->ratingAverage >1)
                            <i class="fa fa-star" style="color: #ec4445;"></i>
                            <i class="fa fa-star"  style="color: #ec4445;"></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                        @elseif($shop->ratingAverage <=3 && $shop->ratingAverage >2)
                            <i class="fa fa-star" style="color: #ec4445;"></i>
                            <i class="fa fa-star"  style="color: #ec4445;"></i>
                            <i class="fa fa-star"  style="color: #ec4445;"></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                        @elseif($shop->ratingAverage <=4 && $shop->ratingAverage >3)
                            <i class="fa fa-star" style="color: #ec4445;"></i>
                            <i class="fa fa-star"  style="color: #ec4445;"></i>
                            <i class="fa fa-star"  style="color: #ec4445;"></i>
                            <i class="fa fa-star"  style="color: #ec4445;"></i>
                            <i class="fa fa-star" ></i>
                        @elseif($shop->ratingAverage <=5 && $shop->ratingAverage >4)
                            <i class="fa fa-star" style="color: #ec4445;"></i>
                            <i class="fa fa-star" style="color: #ec4445;"></i>
                            <i class="fa fa-star"  style="color: #ec4445;"></i>
                            <i class="fa fa-star" style="color: #ec4445;"></i>
                            <i class="fa fa-star"  style="color: #ec4445;"></i>
                            @else
                            <i class="fa fa-star" aria-hidden="false"></i>
                            <i class="fa fa-star" aria-hidden="false"></i>
                            <i class="fa fa-star" aria-hidden="false"></i>
                            <i class="fa fa-star" aria-hidden="false"></i>
                            <i class="fa fa-star" ></i>
                            @endif
                    </div>
                  <h4>{{($shop->user->city)?$shop->user->city->name:'-'}}</h4>
                  <p><b>Address:</b> {{$shop->shop_address}}</p>
                  @if($shop->show_mobile_email == "Yes")
                  <div class="list-number pag-p1-phone">
                     <ul>
					 {{-- <li><i class="fa fa-phone" aria-hidden="true"></i>{{ $shop->user->phone}}</li>
					 <li><i class="fa fa-envelope" aria-hidden="true"></i>{{$shop->user->email}}</li>--}}
                            <li><i class="fa fa-user" aria-hidden="true"></i> {{$shop->user->name}}</li>
                        </ul>
                  </div>
                  @endif
               </div>
               <div class="pg-list-1-right">
                  <div class="list-enqu-btn pg-list-1-right-p1">
                     <ul>
                        <li><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#list-quo-reviews{{$shop->id}}"><i class="fa fa-star-o" aria-hidden="true"></i> Write Review</a> </li>
                        <li><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#list-quo{{$shop->id}}"><i class="fa fa-inr" aria-hidden="true"></i> Get Quotes</a> </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="list-pg-bg">
         <div class="container">
            <div class="row">
               <div class="com-padd">
                  <div class="list-pg-lt list-page-com-p">
                    @if(Session::has('flash_success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        {{ Session::get('flash_success') }}
                                    </div>

                                @endif
                                @if(Session::has('flash_failure'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        {{ Session::get('flash_failure') }}
                                    </div>
                                @endif
					<!--LISTING DETAILS: LEFT PART 4-->
                     <div class="pglist-p3 pglist-bg pglist-p-com" id="ld-roo">
                        <div class="pglist-p-com-ti">
                           <h3><span>Homestay</span> Booking</h3>
                        </div>
                        @foreach($hotels as $hotel)
                        <div class="list-pg-inn-sp" style="padding:2%">
                           <div class="home-list-pop list-spac list-spac-1 list-room-mar-o" style="padding:5px 0px;">
                              <!--LISTINGS IMAGE-->

                              <div class="col-md-7">
                                            <div class="list-pg-inn-sp" style="padding:0px;">
                                                <div id="myCarousel1" class="carousel slide" data-ride="carousel" style="height:300px;">
                                                    <!-- Indicators -->
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                                                        <li data-target="#myCarousel1" data-slide-to="1"></li>
                                                        <li data-target="#myCarousel1" data-slide-to="2"></li>
                                                        <li data-target="#myCarousel1" data-slide-to="3"></li>
														<li data-target="#myCarousel1" data-slide-to="4"></li>
                                                    </ol>
                                                    <!-- Wrapper for slides -->
                                                    <div class="carousel-inner">
                                                        <div class="item active"> <img src="{{ url('/uploads/images') }}/{{$hotel->image}}" alt="{{$hotel->name}}"> </div>
                                                        <div class="item"> <img src="{{ url('/uploads/images') }}/{{$hotel->imageTwo}}" alt="{{$hotel->name}}"> </div>
                                                        <div class="item"> <img src="{{ url('/uploads/images') }}/{{$hotel->imageThree}}" alt="{{$hotel->name}}"> </div>
                                                        <div class="item"> <img src="{{ url('/uploads/images') }}/{{$hotel->imageFour}}" alt="{{$hotel->name}}"> </div>
														 <div class="item"> <img src="{{ url('/uploads/images') }}/{{$hotel->imageFive}}" alt="{{$hotel->name}}"> </div>
                                                    </div>
                                                    <!-- Left and right controls -->
                                                    <a class="left carousel-control" href="#myCarousel1" data-slide="prev"> <i class="fa fa-angle-left list-slider-nav" aria-hidden="true"></i> </a>
                                                    <a class="right carousel-control" href="#myCarousel1" data-slide="next"> <i class="fa fa-angle-right list-slider-nav list-slider-nav-rp" aria-hidden="true"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                              <!--LISTINGS: CONTENT-->
                              <div class="col-md-5 home-list-pop-desc inn-list-pop-desc list-room-deta">
                                 <a href="#!">
                                    <h3>{{$hotel->name}}</h3>
                                 </a>
                                 <div class="list-room-type list-rom-ami">
                                    <ul>
                                       @php
                                          @$amenity_id = explode(',', $hotel->amenities);
                                       @endphp
                                       <li>
                                          <p><b>Amenities:</b> </p>
                                       </li>
                                       @if(count($amenity_id))
                                       @foreach($amenity_id as $amenity_one)
                                          @php $amenity = \App\Models\Amenity::where('id',$amenity_one)->first() @endphp
                                       @if($amenity)
                                       <li style="font-size:10px;"><img src="{{ url('/images/icon') }}/{{$amenity->image}}" alt=""> {{$amenity->name}}</li>
                                      @endif
                                       @endforeach
                                       @endif
                                    </ul>
                                 </div>
                                 <div class="list-room-type list-rom-ami">
                                    <h3 style="font-size:15px;">Two Adults / Night: {{$hotel->price}} Rs</h3>

                                    <h3 style="font-size:15px;"> King size bed - {{$hotel->room_square_feet}} sqft </h3>
									  <h3 style="font-size:14px;">Price Description: {{$hotel->priceDescription}}</h3>
                                 </div><br><br>

                                 <ul>
                                    <li>
                                       <div class="c-1f4p2wj"><div>
                                       <div class="c-1upilqn">Check-in</div>
                                       <div class="c-79elbk">
                                       <div class="c-1xnmrhy"></div>
                                       <div class="c-1lmmwwo"style="font-size:.9em;"> {{ \Carbon\Carbon::parse($data['from_date'])->format('j M Y') }}, {{$hotel->checkin_time}}</div></div></div>
                                       <div class="c-1s1axp"></div>
                                       <div><div class="c-1upilqn">Check-out</div>
                                       <div class="c-79elbk">
                                       <div class="c-1xnmrhy"></div>
                                       <div class="c-1lmmwwo"style="font-size:.9em;"> {{ \Carbon\Carbon::parse($data['to_date'])->format('j M Y') }}, {{$hotel->checkout_time}}</div></div></div></div>
                                    </li>
                                 </ul>
                                 <div class="list-enqu-btn">
                                    <ul>
                                      <?php

                                                    $orders = \App\Models\Order::where('hotel_id', $hotel->id)->whereDate('created_at', Carbon\Carbon::today())->get();
                                                    $count = count($orders);
                                                    ?>
                                                    <li style="width:100%">
                                                        @if($count==$hotel->available_rooms)
                                                            <a href="#"><i
                                                                    class="fa fa-phone" aria-hidden="true"></i> No Rooms Available</a>
                                                        @else
                                                            <a href="{{url('/staybooking-checkout?from_date='.$data['from_date'].'&to_date='.$data['to_date'].'&adult='.$data['adult'].'&hotel='.$hotel->id.'&rooms='.$totalRoom.'&children='.$totalChildren.'&adults='.$totalAdult.'&adultExtra='.$adultExtra.'&childrenExtra='.$childrenExtra.'')}}"><i
                                                                    class="fa fa-phone" aria-hidden="true"></i> Book Now</a>
                                                        @endif
                                                    </li>
                                       <!--  <li style="width:100%"><a target="_blank" href="{{$hotel->google_location}}"><i class="fa fa-map-marker" aria-hidden="true"></i> Get Direction</a> </li> -->
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>

					<div class="pglist-p3 pglist-bg pglist-p-com" id="ld-rer">
                            <div class="pglist-p-com-ti">
                                <h3><span>User</span> Reviews</h3>
                            </div>
                            <div class="list-pg-inn-sp">
                                <div class="lp-ur-all">
                                    <div class="lp-ur-all-left">
                                        <div class="lp-ur-all-left-1">
                                            <div class="lp-ur-all-left-11">Excellent</div>
                                            <div class="lp-ur-all-left-12">
                                                <div class="lp-ur-all-left-13"></div>
                                            </div>
                                        </div>
                                        <div class="lp-ur-all-left-1">
                                            <div class="lp-ur-all-left-11">Good</div>
                                            <div class="lp-ur-all-left-12">
                                                <div class="lp-ur-all-left-13 lp-ur-all-left-Good"></div>
                                            </div>
                                        </div>
                                        <div class="lp-ur-all-left-1">
                                            <div class="lp-ur-all-left-11">Satisfactory</div>
                                            <div class="lp-ur-all-left-12">
                                                <div class="lp-ur-all-left-13 lp-ur-all-left-satis"></div>
                                            </div>
                                        </div>
                                        <div class="lp-ur-all-left-1">
                                            <div class="lp-ur-all-left-11">Below Average</div>
                                            <div class="lp-ur-all-left-12">
                                                <div class="lp-ur-all-left-13 lp-ur-all-left-below"></div>
                                            </div>
                                        </div>
                                        <div class="lp-ur-all-left-1">
                                            <div class="lp-ur-all-left-11">Below Average</div>
                                            <div class="lp-ur-all-left-12">
                                                <div class="lp-ur-all-left-13 lp-ur-all-left-poor"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lp-ur-all-right">
                                        <h5>Overall Ratings</h5>
                                        <p><span>{{number_format($shop->ratingAverage,1)}}  <i class="fa fa-star" aria-hidden="true"></i></span> based on {{$shop->ratingCount}}
                                            reviews</p>
                                    </div>
                                </div>
                                <div class="lp-ur-all-rat">
                                    <h5>Reviews</h5>
                                    <ul>
                                        @foreach($reviews as $review)
                                            <li>
                                                <div class="lr-user-wr-img"><img src="images/users/3.png" alt=""></div>
                                                <div class="lr-user-wr-con">
                                                    <h6>{{$review->user->name}} <span>{{$review->rating}} <i class="fa fa-star"
                                                                                             aria-hidden="true"></i></span>
                                                    </h6>
                                                    <span class="lr-revi-date">{{$review->created_at}}</span>
                                                    <p>{{$review->review}} </p>

                                                </div>
                                            </li>


                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class="list-pg-rt">


					            <!--LISTING DETAILS: LEFT PART 7-->
                     <div class="pglist-p3 pglist-bg pglist-p-com">
                        <div class="pg-list-user-pro"> <img src="images/users/3.png" alt=""> </div>
                        <div class="list-pg-inn-sp">
                           <div class="list-pg-upro">
                              <h5>{{$shop->user->name}}</h5>
                              <p>Owner of {{$shop->shop_name}}</p>
                              <a class="waves-effect waves-light btn-large full-btn list-pg-btn" href="#!">Contact Owner</a>
                           </div>
                        </div>
                     </div>
                     <!--END LISTING DETAILS: LEFT PART 7-->

                     <!--LISTING DETAILS: LEFT PART 8-->



					   @if($shop->iframe==null)
@else
                     <div class="pglist-p3 pglist-bg pglist-p-com">
                        <div class="pglist-p-com-ti pglist-p-com-ti-right">
                           <h3><span>Our</span> Location</h3>
                        </div>
                        <div class="list-pg-inn-sp">
                           <div class="list-pg-map">
                  <iframe src="{{$shop->iframe}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                           </div>
                        </div>
                     </div>
					    @endif
                     <!--END LISTING DETAILS: LEFT PART 8-->


                  </div>
               </div>
            </div>
         </div>
      </section>


<!-- GET QUOTES POPUP -->
<div class="modal fade dir-pop-com" id="list-quo{{$shop->id}}" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header dir-pop-head">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Get a Quotes</h4>
            <!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
         </div>
         <div class="modal-body dir-pop-body">
            <form method="post" action="{{route('saveQuote')}}" class="form-horizontal">
               <input type="hidden" name="seller_id" value="{{$shop->id}}">@csrf
               <!--LISTING INFORMATION-->
               <div class="form-group has-feedback ak-field">
                  <label class="col-md-4 control-label">Full Name *</label>
                  <div class="col-md-8">
                     <input type="text" class="form-control" name="name" placeholder="" required>
                  </div>
               </div>
               <!--LISTING INFORMATION-->
               <div class="form-group has-feedback ak-field">
                  <label class="col-md-4 control-label">Phone *</label>
                  <div class="col-md-8">
                     <input type="number" min="0" class="form-control" name="phone" placeholder="">
                  </div>
               </div>
               <!--LISTING INFORMATION-->
               <div class="form-group has-feedback ak-field">
                  <label class="col-md-4 control-label">Email *</label>
                  <div class="col-md-8">
                     <input type="email" class="form-control" name="email" required="" placeholder="">
                  </div>
               </div>
               <!--LISTING INFORMATION-->
               <div class="form-group has-feedback ak-field">
                  <label class="col-md-4 control-label">Message *</label>
                  <div class="col-md-8 get-quo">
                     <textarea name="message" required="" class="form-control"></textarea>
                  </div>
               </div>
               <!--LISTING INFORMATION-->
               <div class="form-group has-feedback ak-field">
                  <div class="col-md-6 col-md-offset-4">
                     <input type="submit" value="SUBMIT" class="pop-btn">
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>


<!-- Reviews POPUP -->
<div class="modal fade dir-pop-com" id="list-quo-reviews{{$shop->id}}" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header dir-pop-head">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Ratings</h4>
            <!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
         </div>
         <div class="modal-body dir-pop-body">
            <form method="post" action="{{route('saveReview')}}" class="form-horizontal">
               <input type="hidden" name="seller_id" value="{{$shop->id}}">
               <input type="hidden" name="user_id" value="{{Auth::id()}}">
               @csrf
               <!--LISTING INFORMATION-->
               <div class="form-group has-feedback ak-field">
                  <label class="col-md-4 control-label">Rating *</label>
                  <div class="col-md-8">
                     <fieldset class="rating">
                                          <input type="radio" id="star5" name="rating" value="5" />
                                          <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                          <input type="radio" id="star4half" name="rating" value="4 and a half" />
                                          <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                          <input type="radio" id="star4" name="rating" value="4" />
                                          <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                          <input type="radio" id="star3half" name="rating" value="3 and a half" />
                                          <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                          <input type="radio" id="star3" name="rating" value="3" />
                                          <label class="full" for="star3" title="Meh - 3 stars"></label>
                                          <input type="radio" id="star2half" name="rating" value="2 and a half" />
                                          <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                          <input type="radio" id="star2" name="rating" value="2" />
                                          <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                          <input type="radio" id="star1half" name="rating" value="1 and a half" />
                                          <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                          <input type="radio" id="star1" name="rating" value="1" />
                                          <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                          <input type="radio" id="starhalf" name="rating" value="half" />
                                          <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                       </fieldset>
                  </div>
               </div>
               <!--LISTING INFORMATION-->
               <div class="form-group has-feedback ak-field">
                  <label class="col-md-4 control-label">Review</label>
                  <div class="col-md-8 get-quo">
                     <textarea name="review" class="form-control"></textarea>
                  </div>
               </div>
               <!--LISTING INFORMATION-->
               <div class="form-group has-feedback ak-field">
                  <div class="col-md-6 col-md-offset-4">
                     <input type="submit" value="SUBMIT" class="pop-btn">
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Reviews POPUP -->
@endsection
