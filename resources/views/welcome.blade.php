@extends('layouts.app')

@section('content')

    <section id="background1" class="dir1-home-head" style="padding-top:62px;">
        <div class="flexslider">
            <div id="transition-timer-carousel" class="carousel slide transition-timer-carousel" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @php $bannner_var1 = -1 @endphp
                    @foreach($banners as $banner)
                    @php $bannner_var1++ @endphp
                    <li data-target="#transition-timer-carousel" data-slide-to="{{$bannner_var1}}" class="@if($bannner_var1 == 1) active @endif"></li>
                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="slides carousel-inner">
                    @php $bannner_var = 0 @endphp
                    @foreach($banners as $banner)
                    @php $bannner_var++ @endphp
                    <div class="item @if($bannner_var == 1) active @endif">
                        <img src="{{ asset('uploads/images') }}/{{$banner->image}}" width="100%" alt="Welcome To Subbisky"/>
                    </div>
                    @endforeach
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#transition-timer-carousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </section>
    
    
    
    
    
    
    <!--FIND YOUR SERVICE-->
    <section class="com-padd com-padd-redu-bot1 pad-bot-red-40">
        <div class="container">
            <div class="row">
                <div class="com-title">
                    <h2>Find your <span>Services</span></h2>
                    <p>Explore some of the best business from around the world from our partners and friends.</p>
                </div>
                <div class="dir-hli">
                    <ul>
                        <!--=====LISTINGS======-->
                        @foreach($services as $service)
                        <?php $count_seller = \App\Models\Seller::where('service_parent_id',$service->id)->count('id'); ?>
                        <li class="col-md-3 col-sm-3">
                            <a href="{{ url('services',$service->slug) }}">
                                <div class="dir-hli-5">
                                    <div class="dir-hli-1">
                                        <div class="dir-hli-3">
                                        <img src="{{ asset('uploads/images') }}/{{$service->image}}" alt="{{$service->name}}"> </div>
                                        <div class="dir-hli-4"> </div> 
                                        <img src="{{ asset('uploads/images') }}/{{$service->image}}" alt="{{$service->name}}"> </div>
                                    <div class="dir-hli-2">
                                        <h4> {{$service->name}} <span class="dir-ho-cat">Show All ({{$count_seller}})</span></h4> </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                        <!--=====LISTINGS======-->
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    
    
        <section class="com-padd home-dis">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
             <marquee>      <h2><span>Subbisky</span></h2>  </marquee>
                </div>
            </div>
        </div>
    </section>
    
    
    
        <section class="p-about com-padd">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="page-about pad-bot-red-40">
                        <h3>Hi! Welcome to Subbisky</h3>
                       <br>
                        
                        <p> Your number one reliable and
trustworthy source for all your E-commerce and Digital
Marketing needs. We’re dedicated to giving you the very
best of our services. We mainly focus on our client's
needs and provide various marketing strategies.</p>
                        
                        <p>Our company was started as a COORG DIAL in 2009.
From the first month itself, our company gained huge
success and was able to double its sales in a month. We
have come across so many years, yet our company is still
leading in every Digital Marketing aspect.</p>
                        
                        <a class="waves-effect waves-light btn-large full-btn" href="about-us">Know More</a> </div>
                </div>
                <div class="col-md-6">
                    <div class="page-about"> <img src="images/home/about1 2.jpg" alt="" /> </div>
                </div>
            </div>
        </div>
    </section>
    
    
        <section class="p-about-count">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 page-about-count">
                    <div> <span>100</span>
                        <h4>Happy Clients</h4>
                        
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 page-about-count">
                    <div> <span>200</span>
                        <h4>Areas Covered</h4>
                        
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 page-about-count">
                    <div> <span>5000</span>
                        <h4>Listing</h4>
                        
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 page-about-count">
                    <div> <span>600</span>
                        <h4>Users</h4>
                        
                    </div>
                </div>
        
        
            </div>
        </div>
    </section>
    
    
    
    <!--EXPLORE CITY LISTING-->
    <section class="com-padd com-padd-redu-top">
        <div class="container">
            <div class="row">
                <div class="com-title">
                    <h2>Explore your <span>City Listings</span></h2>
                    <p>Places In Coorg </p>
                </div>
                <div class="col-md-6">
                    <a href="{{url('/')}}?city=Madikeri">
                        <div class="list-mig-like-com">
                            <div class="list-mig-lc-img"> 
                            <img src="images/home/madkerih.jpg" alt="" /> </div>
                            <div class="list-mig-lc-con">
                                <div class="list-rat-ch list-room-rati">
                                <span>4.0</span>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i> 
                                </div>
                                <h5>Madikeri</h5>
                                <p>325 Areas . 100 Listings . 1000 Users</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('/')}}?city=VIRAJPET">
                        <div class="list-mig-like-com">
                            <div class="list-mig-lc-img"> 
                            <img src="images/home/virajh.jpg" alt="" /> </div>
                            <div class="list-mig-lc-con list-mig-lc-con2">
                                <h5>VIRAJPET</h5>
                                <p>18 Areas . 144 Listings</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('/')}}?city=SOMWARPET">
                        <div class="list-mig-like-com">
                            <div class="list-mig-lc-img"> 
                            <img src="images/home/somh.jpg" alt="" /> </div>
                            <div class="list-mig-lc-con list-mig-lc-con2">
                                <h5>SOMWARPET</h5>
                                <p>14 Cities . 1895 Listings</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('/')}}?city=Ponnampet">
                        <div class="list-mig-like-com">
                            <div class="list-mig-lc-img"> 
                            <img src="images/home/ponh.jpg" alt="" /> </div>
                            <div class="list-mig-lc-con list-mig-lc-con2">
                                <h5>Ponnampet</h5>
                                <p>14 Cities . 1895 Listings</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('/')}}?city=Kushal Nagar">
                        <div class="list-mig-like-com">
                            <div class="list-mig-lc-img"> 
                            <img src="images/home/kush.jpg" alt="" /> </div>
                            <div class="list-mig-lc-con list-mig-lc-con2">
                                <h5>Kushal Nagar</h5>
                                <p>14 Cities . 1895 Listings</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--ADD BUSINESS-->
    <section class="com-padd home-dis">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><span>30% Off</span> Promote Your Business with us <a href="contactus">Add My Business</a></h2> </div>
            </div>
        </div>
    </section>
    <!--BEST THINGS-->
    <section class="com-padd com-padd-redu-bot1">
        <div class="container dir-hom-pre-tit">
            <div class="row">
                <div class="com-title">
                    <h2>Top Trendings for <span>your City</span></h2>
                    <p>Subbisky Kodagu</p>
                </div>
                <div class="col-md-6">
                    <div>
                        <!--POPULAR LISTINGS-->
						<a href="{{url('services/buy-sell?city=Madikeri')}}">
                        <div class="home-list-pop">
                            <!--POPULAR LISTINGS IMAGE-->
                            <div class="col-md-3"> 
                            <img src="images/home/Shopping.png" alt="" /> </div>
                            <!--POPULAR LISTINGS: CONTENT-->
                            <div class="col-md-9 home-list-pop-desc"> 
                            <h3>Shopping</h3>
                                <h4>Madkeri</h4>
                                <p>Subbisky</p>
                                <span class="home-list-pop-rat">4.2</span>
                                <div class="hom-list-share">
                                <!--    <ul>
                                        <li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 52</a> </li>
                                        <li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 32</a> </li>
                                        <li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> 420</a> </li>
                                        <li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a> </li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>
						</a>
                        
						<a href="{{url('services/stay-booking?city=Madikeri')}}">
                      <div class="home-list-pop">
                            <!--POPULAR LISTINGS IMAGE-->
                            <div class="col-md-3"> 
                            <img src="images/home/Homestay.png" alt="" /> </div>
                            <!--POPULAR LISTINGS: CONTENT-->
                            <div class="col-md-9 home-list-pop-desc"> 
                            <h3>Homestay</h3>
                                <h4>Madkeri</h4>
                                <p>Subbisky</p>
                                <span class="home-list-pop-rat">4.2</span>
                                <div class="hom-list-share">
                            
                                </div>
                            </div>
                        </div>
						</a>
                        
						<a href="{{url('service/restaurant?city=Madikeri')}}">
                      <div class="home-list-pop">
                            <!--POPULAR LISTINGS IMAGE-->
                            <div class="col-md-3"> 
                            <img src="images/home/Resturants.png" alt="" /> </div>
                            <!--POPULAR LISTINGS: CONTENT-->
                            <div class="col-md-9 home-list-pop-desc"> 
                            <h3>Resturants</h3>
                                <h4>Madkeri</h4>
                                <p>Subbisky</p>
                                <span class="home-list-pop-rat">4.2</span>
                                <div class="hom-list-share">
                                
                                </div>
                            </div>
                        </div>
						</a>
                        
                        
        
            
                    
                    </div>
                </div>
                
                
                
                
                <div class="col-md-6">
                    <div>
                        <!--POPULAR LISTINGS-->
                
                
                <a href="{{url('services/health?city=Madikeri')}}">
                     <div class="home-list-pop">
                            <!--POPULAR LISTINGS IMAGE-->
                            <div class="col-md-3"> 
                            <img src="images/home/Hospitals.png" alt="" /> </div>
                            <!--POPULAR LISTINGS: CONTENT-->
                            <div class="col-md-9 home-list-pop-desc"> 
                            <h3>Hospitals</h3>
                                <h4>Madkeri</h4>
                                <p>Subbisky</p>
                                <span class="home-list-pop-rat">4.2</span>
                                <div class="hom-list-share">
                                
                                </div>
                            </div>
                        </div>
						</a>
                
                
                <a href="{{url('services/pick-and-drop?city=Madikeri')}}">
                          <div class="home-list-pop">
                            <!--POPULAR LISTINGS IMAGE-->
                            <div class="col-md-3">
                            <img src="images/home/Travel.png" alt="" /> </div>
                            <!--POPULAR LISTINGS: CONTENT-->
                            <div class="col-md-9 home-list-pop-desc"> 
                            <h3>Travel</h3>
                                <h4>Madkeri</h4>
                                <p>Subbisky</p>
                                <span class="home-list-pop-rat">4.2</span>
                                <div class="hom-list-share">
                                
                                </div>
                            </div>
                        </div>
						</a>
                
                <a href="{{url('services/services?city=Madikeri')}}">
                          <div class="home-list-pop">
                            <!--POPULAR LISTINGS IMAGE-->
                            <div class="col-md-3"> 
                            <img src="images/home/Services.png" alt="" /> </div>
                            <!--POPULAR LISTINGS: CONTENT-->
                            <div class="col-md-9 home-list-pop-desc"> 
                            <h3>Services</h3>
                                <h4>Madkeri</h4>
                                <p>Subbisky</p>
                                <span class="home-list-pop-rat">4.2</span>
                                <div class="hom-list-share">
                                
                                </div>
                            </div>
                        </div>
						</a>
                
                
                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--CREATE FREE ACCOUNT-->
    <section class="com-padd sec-bg-white com-padd-redu-top">
        <div class="container">
            <div class="row">
                <div class="com-title">
                    @guest<h2>Create a free <span>Account</span></h2>@endguest
                    <p>Subbisky</p>
                </div>
                <div class="col-md-6">
                    <div class="hom-cre-acc-left">
                        <h3>A few reasons you’ll love Online <span> Business Listing</span></h3>
                        <p>5 Benefits of Listing Your Business to Subbisky </p>
                        <ul>
                            <li> <img src="images/icon/7.png" alt="">
                                <div>
                                    <h5>Enhancing Your Business</h5>
                                    <p>Imagine you have made your presence online
                                    through a local online directory, but your 
                                    competitors have..</p>
                                </div>
                            </li>
                            <li> <img src="images/icon/5.png" alt="">
                                <div>
                                    <h5>Advertising Your Business</h5>
                                    <p>Advertising your business to area 
                                    has many advantages. For local businessmen,
                                    it is an opportunity..</p>
                                </div>
                            </li>
                            <li> <img src="images/icon/6.png" alt="">
                                <div>
                                    <h5>Develop Brand Image</h5>
                                    <p>Your local business too needs brand 
                                    management and image making. As you know
                                    the local market..</p>
                                </div>
                            </li>
							<li> <img src="images/icon/User-Friendly.png" alt="">
                                <div>
                                    <h5>User-Friendly</h5>
                                    <p>Easy search engine and friendly customer support..</p>
                                </div>
                            </li>
							<li> <img src="images/icon/Reach.png" alt="">
                                <div>
                                    <h5>Reach</h5>
                                    <p>World wide users can look into your business ..</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                
				@guest
                <div class="col-md-6">
                    <div class="hom-cre-acc-left hom-cre-acc-right">
						@if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              @if(Session::has('flash_error'))
						<script>
							alert("{{ Session::get('flash_error') }}");
						</script>
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_error') }}
                  </div>
              @endif 
                        <form action="{{ route('customer.register') }}" method="post">
							@csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="acc-name" name="name" type="text" class="validate" value="{{ old('name') }}" required>
									 @if ($errors->has('name'))
                                <span class="required">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span> 
                            @endif 
                                    <label for="acc-name">Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="acc-mob" name="phone" type="number" class="validate" value="{{ old('phone') }}" required>
									 @if ($errors->has('phone'))
                                <span class="required">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif 
                                    <label for="acc-mob">Mobile</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="acc-mail" name="email" type="email" class="validate" value="{{ old('email') }}" required>
									 @if ($errors->has('email'))
                                <span class="required">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif 
                                    <label for="acc-mail">Email</label>
                                </div>
                            </div>
							
							<div class="row">
                                <div class="input-field col s12">
                                    <input id="acc-name" name="password" type="text" class="validate" required>
									 @if ($errors->has('password'))
                                <span class="required">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span> 
                            @endif 
                                    <label for="acc-name">Password</label>
                                </div>
                            </div>
							
							<div class="row">
                                <div class="input-field col s12">
                                    <input id="acc-name" name="password_confirmation" type="text" class="validate" required>
								
                                    <label for="acc-name">Confirm Password</label>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col s12 hom-cr-acc-check">
                                    <input type="checkbox" id="test5" required />
                                    <label for="test5">By Submitting Form, you
                                    agree to the Terms and Conditions and 
                                    Privacy Policy. You also agree to 
                                    receive product-related emails.</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn-large full-btn">Submit Now</button> </div>
                            </div>
                        </form>
                    </div>
                </div>
				@endguest
				
				
            </div>
        </div>
    </section>

@endsection