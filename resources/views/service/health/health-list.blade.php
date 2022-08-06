@extends('layouts.app')

@section('content')

    <section class="pg-list-1">
        <div class="container">
            <div class="row">
                <div class="pg-list-1-left">
                    <a href="#">
                        <h3>{{$shop->shop_name}}</h3>
                    </a>
                    <div class="list-rat-ch">
                       	<span>{{number_format($shop->ratingAverage,1)}}</span>
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
                    <br>
                    <h4>{{$shop->user->city->name}}</h4>
                    <p><b>Address:</b> {{$shop->shop_address}}</p>
						@if($shop->show_mobile_email == "Yes")
                    <div class="list-number pag-p1-phone">
                        <ul>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>{{ $shop->user->phone}}</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i>{{$shop->user->email}}</li>
                            <li><i class="fa fa-user" aria-hidden="true"></i> {{$shop->user->name}}</li>
                        </ul>
                    </div>
						@endif
                </div>
                <div class="pg-list-1-right">
                    <div class="list-enqu-btn pg-list-1-right-p1">
                        <ul>
                            <li><a href="#!" data-dismiss="modal"
                                   data-toggle="modal"
                                   data-target="#list-quo-reviews{{$shop->id}}"><i
                                        class="fa fa-commenting-o" aria-hidden="true"></i>Rate Us</a></li>
                            <div class="modal fade dir-pop-com" id="list-quo-reviews{{$shop->id}}"
                                 role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header dir-pop-head">
                                            <button type="button" class="close" data-dismiss="modal">×
                                            </button>
                                            <h4 class="modal-title">Ratings</h4>
                                            <!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
                                        </div>
                                        <div class="modal-body dir-pop-body">
                                            <form method="post" action="{{route('saveReview')}}"
                                                  class="form-horizontal">

                                                <input type="hidden" name="seller_id"
                                                       value="{{$shop->id}}">
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
                                            {{--                                             <div class="form-group has-feedback ak-field">--}}
                                            {{--                                                <label class="col-md-4 control-label">Phone *</label>--}}
                                            {{--                                                <div class="col-md-8">--}}
                                            {{--                                                   <input type="number" min="0" class="form-control" name="phone" placeholder=""> </div>--}}
                                            {{--                                             </div>--}}
                                            <!--LISTING INFORMATION-->
                                            {{--                                             <div class="form-group has-feedback ak-field">--}}
                                            {{--                                                <label class="col-md-4 control-label">Email *</label>--}}
                                            {{--                                                <div class="col-md-8">--}}
                                            {{--                                                   <input type="email" class="form-control" name="email" required="" placeholder=""> </div>--}}
                                            {{--                                             </div>--}}
                                            <!--LISTING INFORMATION-->
                                                <div class="form-group has-feedback ak-field">
                                                    <label class="col-md-4 control-label">Review </label>
                                                    <div class="col-md-8 get-quo">
                                                                    <textarea name="review"
                                                                              class="form-control"></textarea>
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
                          

                            <li><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#list-quo{{$shop->id}}"><i
                                        class="fa fa-inr" aria-hidden="true"></i> Get Quotes</a></li>
                            <!-- GET QUOTES POPUP -->
                            <div class="modal fade dir-pop-com" id="list-quo{{$shop->id}}" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header dir-pop-head">
                                            <button type="button" class="close" data-dismiss="modal">×
                                            </button>
                                            <h4 class="modal-title">Get a Quotes</h4>
                                            <!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
                                        </div>
                                        <div class="modal-body dir-pop-body">
                                            <form method="post" action="{{route('saveQuote')}}"
                                                  class="form-horizontal">
                                                <input type="hidden" name="seller_id"
                                                       value="{{$shop->id}}">
                                            @csrf
                                            <!--LISTING INFORMATION-->
                                                <div class="form-group has-feedback ak-field">
                                                    <label class="col-md-4 control-label">Full Name
                                                        *</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="name"
                                                               placeholder="" required></div>
                                                </div>
                                                <!--LISTING INFORMATION-->
                                                <div class="form-group has-feedback ak-field">
                                                    <label class="col-md-4 control-label">Phone *</label>
                                                    <div class="col-md-8">
                                                        <input type="number" min="0" class="form-control"
                                                               name="phone" placeholder=""></div>
                                                </div>
                                                <!--LISTING INFORMATION-->
                                                <div class="form-group has-feedback ak-field">
                                                    <label class="col-md-4 control-label">Email *</label>
                                                    <div class="col-md-8">
                                                        <input type="email" class="form-control"
                                                               name="email" required="" placeholder="">
                                                    </div>
                                                </div>
                                                <!--LISTING INFORMATION-->
                                                <div class="form-group has-feedback ak-field">
                                                    <label class="col-md-4 control-label">Message *</label>
                                                    <div class="col-md-8 get-quo">
                                                                    <textarea name="message" required=""
                                                                              class="form-control"></textarea>
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
                        <!--LISTING DETAILS: LEFT PART 1-->
                        <div class="pglist-p1 pglist-bg pglist-p-com" id="ld-abour">
                            <div class="pglist-p-com-ti">
                                <h3><span>About</span> {{$shop->name}} </h3>
                            </div>
                            <div class="list-pg-inn-sp">
                                <div class="share-btn">
                                   
                                </div>
                                 <p>{{$shop->description}}</p>
                            </div>
                        </div>
                        <!--END LISTING DETAILS: LEFT PART 1-->
                        <!--LISTING DETAILS: LEFT PART 2-->
                        <div class="pglist-p2 pglist-bg pglist-p-com" id="ld-ser">
                            <div class="pglist-p-com-ti">
                                <h3><span>{{$shop->shop_name}}</span> Facilities</h3>
                            </div>
                            <div class="list-pg-inn-sp">

                                <div class="row pg-list-ser">
                                    <ul>
                                        <!--==========NEARBY LISTINGS============-->
                                        @foreach($services as $category)

                                            <li class="col-md-4">
                                                <div class="pg-list-ser-p1">
                                                    <a href="{{url('sellerServices/'.$shop->id.'/service',$category->id)}}}}">
                                                        <!--                                  <div class="list-left-near lln1">
                                                                                            <img src="images/services/s1.jpg" alt="" />
                                                                                         </div> -->
                                                        <img
                                                            src="{{asset('uploads/images')}}/{{$category->image}}"
                                                            alt="{{$category->name}}"/>
                                                    </a>
                                                </div>
                                                <div class="pg-list-ser-p2">
                                                    <h4>{{$category->name}}</h4>
                                                </div>


                                            </li>
                                    @endforeach
                                    <!--==========END NEARBY LISTINGS============-->
                                    </ul>


                                </div>
                            </div>
                        </div>
                        <!--END LISTING DETAILS: LEFT PART 2-->
                        <!--LISTING DETAILS: LEFT PART 3-->
                        <!--  <div class="pglist-p3 pglist-bg pglist-p-com" id="ld-gal">
                             <div class="pglist-p-com-ti">
                                <h3><span>Photo</span> Gallery</h3>
                             </div>
                             <div class="list-pg-inn-sp">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                                   <ol class="carousel-indicators">
                                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                      <li data-target="#myCarousel" data-slide-to="1"></li>
                                      <li data-target="#myCarousel" data-slide-to="2"></li>
                                      <li data-target="#myCarousel" data-slide-to="3"></li>
                                   </ol>

                                   <div class="carousel-inner">
                                      <div class="item active"> <img src="images/hospital/h1.jpeg" alt="madkeri"> </div>
                                      <div class="item"> <img src="images/hospital/h1.jpeg" alt="madkeri"> </div>
                                      <div class="item"> <img src="images/hospital/h1.jpeg" alt="madkeri"> </div>
                                      <div class="item"> <img src="images/hospital/h1.jpeg" alt="madkeri"> </div>
                                   </div>

                                   <a class="left carousel-control" href="#myCarousel" data-slide="prev"> <i class="fa fa-angle-left list-slider-nav" aria-hidden="true"></i> </a>
                                   <a class="right carousel-control" href="#myCarousel" data-slide="next"> <i class="fa fa-angle-right list-slider-nav list-slider-nav-rp" aria-hidden="true"></i> </a>
                                </div>
                             </div>
                          </div> -->
                        <!--END LISTING DETAILS: LEFT PART 3-->
                        <!--END LISTING DETAILS: LEFT PART 2-->
                        <!--LISTING DETAILS: LEFT PART 3-->
                       
                        <!--END LISTING DETAILS: LEFT PART 3-->


                        @if($shop->iframe==null)
@else
                        <div class="pglist-p3 pglist-bg pglist-p-com" id="ld-vie">
                            <div class="pglist-p-com-ti">
                                <h3><span>{{$shop->shop_name}} </span> Location</h3>
                            </div>
                            <div class="list-pg-inn-sp list-360">
                                <iframe
                                    src="{{$shop->iframe}}"
                                    width="100%" height="450" style="border:0;" allowfullscreen=""
                                    loading="lazy"></iframe>
                            </div>
                        </div>
     @endif
                        <!--END 360 DEGREE MAP: LEFT PART 8-->

                        <!--LISTING DETAILS: LEFT PART 6-->
                        
                        <!--END LISTING DETAILS: LEFT PART 6-->


                        <!--LISTING DETAILS: LEFT PART 5-->
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
                        <!--END LISTING DETAILS: LEFT PART 5-->
                    </div>
                    <div class="list-pg-rt">


                        <!--LISTING DETAILS: LEFT PART 9-->
{{--                        <div class="pglist-p3 pglist-bg pglist-p-com">--}}
{{--                            <div class="pglist-p-com-ti pglist-p-com-ti-right">--}}
{{--                                <h3><span> {{$shop->shop_name}} </span>Fees Details</h3>--}}
{{--                            </div>--}}
{{--                            <div class="list-pg-inn-sp">--}}
{{--                                <div class="list-pg-oth-info">--}}
{{--                                    <ul>--}}
{{--                                        @foreach($services as $service)--}}

{{--                                            <li>{{$service->name}}<span class="green-bg">{{$service->price}}</span></li>--}}

{{--                                        @endforeach--}}

{{--                                    </ul>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!--END LISTING DETAILS: LEFT PART 9-->

                        <!--LISTING DETAILS: LEFT PART 9-->
                    {{--                        <div class="pglist-p3 pglist-bg pglist-p-com">--}}
                    {{--                            <div class="pglist-p-com-ti pglist-p-com-ti-right">--}}
                    {{--                                <h3><span>Payment </span> Details </h3>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="list-pg-inn-sp">--}}
                    {{--                                <div class="list-pg-oth-info">--}}

                    {{--                                    @foreach($services as $ser)--}}
                    {{--                                        <div class="form-check">--}}
                    {{--                                            <input--}}
                    {{--                                                class="form-check-input"--}}
                    {{--                                                type="checkbox"--}}
                    {{--                                                value=""--}}
                    {{--                                                id="flexCheckDefault"--}}
                    {{--                                            />--}}
                    {{--                                            <label class="form-check-label" for="flexCheckDefault">--}}
                    {{--                                                {{$ser->name}}--}}
                    {{--                                            </label>--}}
                    {{--                                        </div>--}}
                    {{--                                    @endforeach--}}



                    {{--                                    <h4>Total <span> <h1>Rs 10,000 </h1></span></h4>--}}

                    {{--                                    <a class="waves-effect waves-light btn-large full-btn list-pg-btn" href="#!">Pay--}}
                    {{--                                        Now</a>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    <!--END LISTING DETAILS: LEFT PART 9-->


                        <!--LISTING DETAILS: LEFT PART 9-->
                        <div class="pglist-p3 pglist-bg pglist-p-com">
                            <div class="pglist-p-com-ti pglist-p-com-ti-right">
                                <h3><span>{{$shop->shop_name}}  </span> Book Appoinment </h3>
                            </div>
                               <div class="list-pg-inn-sp">
                                <div class="list-pg-oth-info">
                                    <ul>
                                        @foreach($services as $service)
  <a href="{{url('sellerServices/'.$shop->id.'/service',$service->id)}}}}">
                                            <li>{{$service->name}}<span class="green-bg">{{$service->price}}</span></li>
</a>
                                        @endforeach

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <!--END LISTING DETAILS: LEFT PART 9-->
                        <!--LISTING DETAILS: LEFT PART 7-->
                        <div class="pglist-p3 pglist-bg pglist-p-com">
                            <div class="pg-list-user-pro"> <img src="images/users/3.png" alt=""> </div>
                            <div class="list-pg-inn-sp">
                                <div class="list-pg-upro">
                                      <h5>Dr {{$shop->user->name}} </h5>
                                    <p>{{$shop->shop_name}} {{$shop->user->city->name}}</p>
                                    <a class="waves-effect waves-light btn-large full-btn list-pg-btn" href="#!">Contact Doctor</a>
                                </div>
                            </div>
                        </div>
                        <!--END LISTING DETAILS: LEFT PART 7-->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
