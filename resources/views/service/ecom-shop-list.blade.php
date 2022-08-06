@extends('layouts.app') 
@section('content')
<?php
					  date_default_timezone_set("asia/kolkata");
?>
<section class="dir-alp dir-pa-sp-top">
   <div class="container">
      <div class="row">
         <div class="dir-alp-tit">
            @if($main->type=="ecom")
            <h1>Shops in {{$main->name}}</h1>
            @elseif($main->type=="education")
            <h1>Education Institutions</h1>
            @elseif($main->type=="health")
            <h1>Hospitals</h1>
            @elseif($main->type=="professional")
            <h1>Professionals</h1>
            @elseif($main->type=="service")
            <h1>Service Providers</h1>
            @elseif($main->type=="staybooking")
            <h1>Stay Booking</h1>
			  @elseif($main->type=="pd")
            <h1>Transport Booking</h1>
            @endif
            <br><br>
         </div>
      </div>
      <div class="row">
         <div class="dir-alp-con">
            <div class="col-md-3 dir-alp-con-left">
               <div class="dir-alp-con-left-1">
                  @if($main->type=="ecom")
                  <h3>Nearby Shops ({{count($nearby_shop->sellers->where('status','Active'))}})</h3>
                  @elseif($main->type=="education")
                  <h3>Nearby Educational Institutions ({{count($nearby_shop->sellers->where('status','Active'))}})</h3>
                  @elseif($main->type=="health")
                  <h3>Nearby Hospitals ({{count($nearby_shop->sellers->where('status','Active'))}})</h3>
                  @elseif($main->type=="professional")
                  <h3>Nearby Professionals ({{count($nearby_shop->sellers->where('status','Active'))}})</h3>
                  @elseif($main->type=="service")
                  <h3>Nearby Service Providers ({{count($nearby_shop->sellers->where('status','Active'))}})</h3>
                  @elseif($main->type=="staybooking")
                  <h3>Nearby Hotels ({{count($nearby_shop->sellers->where('status','Active'))}})</h3>
				   @elseif($main->type=="pd")
                  <h3>Nearby Transports ({{count($nearby_shop->sellers->where('status','Active'))}})</h3>
                  @else
                  <h3>Nearby Shops ({{count($nearby_shop->sellers->where('status','Active'))}})</h3>
                  @endif</div>
               <div class="dir-hom-pre dir-alp-left-ner-notb">
                  <ul>
                     <!--==========NEARBY LISTINGS============-->
                     @foreach($nearby_shop->sellers->where('status','Active') as $seller1)
					  <?php
					  $now = date("H:i");
					  $close = 0;
					  if(@$seller1->open_time && ($now < @$seller1->open_time || $now > @$seller1->close_time))
						 $close = 1;
					  ?>
                        <li>
                           @if($main->type=="ecom") 
                              <a @if($close == 1) href="#" @else href="{{url('shop',$seller1->id)}}" @endif>
                           @elseif($main->type=="service")
                              <a @if($close == 1) href="#" @else href="{{url('sellerAllServices',$seller1->id)}}" @endif>
                           @elseif($main->type=="education")
                              <a @if($close == 1) href="#" @else href="{{url('educationList',$seller1->id)}}" @endif>
                           @elseif($main->type=="health")
                              <a @if($close == 1) href="#" @else href="{{url('hospitalList',$seller1->id)}}" @endif>
                           @elseif($main->type=="staybooking")
                              <a @if($close == 1) href="#" @else href="{{url('stay-booking',$seller1->id)}}" @endif>
                           @else
                              <a @if($close == 1) href="#" @else href="{{url('sellerAllServices',$seller1->id)}}" @endif>
                           @endif
                           <div class="list-left-near lln1"> 
                              <img src="{{asset('uploads/shops')}}/{{$seller1->shop_image}}" alt="" /> 
                           </div>
                           <div class="list-left-near lln2">
                              <h5>{{$seller1->shop_name}}</h5>
                              <span>City: {{@$seller1->user->city->name}} </span> 
                           </div>
								  </a> 
								   <?php
                                                                                $reviewss=App\Models\Review::whereNotNull('review')->where('seller_id',$seller1->id)->get();
                                                                                $reviewCounts=App\Models\Review::where('seller_id',$seller1->id)->get();
                                                                                foreach ($reviewCounts as $res) {
                                                                                    $totalReviewss[] = $res->rating;
                                                                                }
                                                                                $counts=count($reviewCounts);
                                                                                if($counts==0){
                                                                                    $dataa = 0;
                                                                                }else{
                                                                                    $dataa = round(array_sum($totalReviewss) / $counts);

                                                                                }

                                                                                ?>
                           <div class="list-left-near lln3"> <span>{{number_format($dataa,1)}}</span> </div>
                        </li>
                     @endforeach
                  </ul>
               </div>
            </div>
            <div class="col-md-9 dir-alp-con-right">
               <div class="dir-alp-con-right-1">
                  <div class="row">@if(Session::has('flash_success'))
                     <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>{{ Session::get('flash_success') }}</div>@endif @if(Session::has('flash_failure'))
                     <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>{{ Session::get('flash_failure') }}</div>@endif
                     <!--LISTINGS-->
					  @foreach($sellers as $seller)
					  <?php
					  $now = date("H:i");
					  $close = 0;
					  if(@$seller->open_time && ($now < @$seller->open_time || $now > @$seller->close_time))
						 $close = 1;
					  ?>
                     <div class="home-list-pop list-spac">
                        <!--LISTINGS IMAGE-->
                        <div class="col-md-3 list-ser-img">
                           <img src="{{asset('uploads/shops')}}/{{$seller->shop_image}}" alt="{{$seller->shop_name}}" />
                        </div>
                        <!--LISTINGS: CONTENT-->
                        <div class="col-md-9 home-list-pop-desc inn-list-pop-desc">
                           @if($main->type=="ecom") 
                              <a @if($close == 1) href="#" @else href="{{url('shop',$seller->id)}}" @endif>
                           @elseif($main->type=="service")
                              <a @if($close == 1) href="#" @else href="{{url('sellerAllServices',$seller->id)}}" @endif>
                           @elseif($main->type=="education")
                              <a @if($close == 1) href="#" @else href="{{url('educationList',$seller->id)}}" @endif>
                           @elseif($main->type=="health")
                              <a @if($close == 1) href="#" @else href="{{url('hospitalList',$seller->id)}}" @endif>
                           @elseif($main->type=="staybooking")
                              <a @if($close == 1) href="#" @else href="{{url('stay-booking',$seller->id)}}" @endif>
                           @else
                           <a @if($close == 1) href="#" @else href="{{url('sellerAllServices',$seller->id)}}" @endif>
                           @endif
                           <h3>{{$seller->shop_name}}</h3>
							   </a>
                           <h4>{{@$seller->user->city->name}}</h4>
								  
								  @if($main->type!="staybooking")
								  <p><b>Opening-Closing Time:</b> @if(@$seller->open_time) {{date("h:i A",strtotime(@$seller->open_time))}} - {{date("h:i A",strtotime(@$seller->close_time))}} @endif</p><br>
								  @endif
								  
								  @if($main->type=="staybooking")
								  <?php
								  $hotels=App\Models\Hotel::where('seller_id',$seller->id)->sum('available_rooms');
								  ?>
								    <p><b>Maximum Room Capacity:</b> {{$seller->room_capacity}}</p><br>
								   <p><b>Available Rooms:</b> {{$hotels}}</p><br>
								  @endif
								    <p><b>About Us:</b> {{$seller->description}}</p><br>
                           <p><b>Address:</b> {{$seller->shop_address}}</p>
								
								  @if($seller->show_mobile_email == "Yes")
                           <div class="list-number">
                              <ul>
                                 <li>
                                    <img src="{{asset('images/icon/phone.png')}}" alt="{{$seller->user->phone}}">{{$seller->user->phone}}</li>
                                 <li>
                                    <img src="{{asset('images/icon/phone.png')}}" alt="{{$seller->user->email}}">{{$seller->user->email}}</li>
                              </ul>
                           </div>@endif  <?php
                                                                                $reviews=App\Models\Review::whereNotNull('review')->where('seller_id',$seller->id)->get();
                                                                                $reviewCount=App\Models\Review::where('seller_id',$seller->id)->get();
                                                                                foreach ($reviewCount as $re) {
                                                                                    $totalReviews[] = $re->rating;
                                                                                }
                                                                                $count=count($reviewCount);
                                                                                if($count==0){
                                                                                    $data = 0;
                                                                                }else{
                                                                                    $data = round(array_sum($totalReviews) / $count);
                                                                                }



                                                                                ?><span class="home-list-pop-rat">{{number_format($data,1)}}</span>
                           <div class="list-enqu-btn">
                              <ul>
                                 <li><a href="#!" data-dismiss="modal" data-toggle="modal" data-target="#list-quo-reviews{{$seller->id}}"><i class="fa fa-star-o" aria-hidden="true"></i> Rate Us</a> 
                                 </li>
                                 <li>
									 @if($close == 1) 
									 <a href="#">Closed</a>
									 @else
									 <a href="#!" data-dismiss="modal" data-toggle="modal" data-target="#list-quo{{$seller->id}}"><i class="fa fa-inr" aria-hidden="true"></i> Order Now</a>
									 @endif
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
								  
								  
                     <section>
						 
						 @if($close == 0)
                        <!-- GET QUOTES POPUP -->
                        <div class="modal fade dir-pop-com" id="list-quo{{$seller->id}}" role="dialog">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header dir-pop-head">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Book Now</h4>
                                    <!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
                                 </div>
                                 <div class="modal-body dir-pop-body">
                                    <form method="post" action="{{route('saveQuote')}}" class="form-horizontal">
                                       <input type="hidden" name="seller_id" value="{{$seller->id}}">@csrf
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
                        <!-- GET QUOTES POPUP -->
						 
						 @endif
						 
                        <!-- Reviews POPUP -->
                        <div class="modal fade dir-pop-com" id="list-quo-reviews{{$seller->id}}" role="dialog">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header dir-pop-head">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Ratings</h4>
                                    <!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
                                 </div>
                                 <div class="modal-body dir-pop-body">
                                    <form method="post" action="{{route('saveReview')}}" class="form-horizontal">
                                       <input type="hidden" name="seller_id" value="{{$seller->id}}">
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
                     </section>@endforeach
                     <!--LISTINGS END-->
                  </div>
                   {!! $sellers->links() !!}
               </div>
            </div>
         </div>
      </div>
   </div>
</section>@endsection