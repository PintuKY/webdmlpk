<!DOCTYPE html>
<html lang="en">



<head>
	<title>Subbisky</title>
	<!-- META TAGS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- FAV ICON(BROWSER TAB ICON) -->
	<link rel="shortcut icon" href="{{ asset('images/fav.ico')}}" type="image/x-icon">
	<!-- GOOGLE FONT -->
	<link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
	<!-- FONTAWESOME ICONS -->
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
	<!-- ALL CSS FILES -->
	<link href="{{ asset('css/materialize.css')}}" rel="stylesheet">
	<link href="{{ asset('css/style.css')}}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
	<link href="{{ asset('css/responsive.css')}}" rel="stylesheet">
	 <style type="text/css">
        .invalid-feedback{
            color: red;
        }
    </style>
</head>

<body>
	<!--PRE LOADING-->
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	@php
		                            $cart_counter = \App\Models\Cart::where('session_id',session()->getId())->count('id'); 
		                            //$wishlist_counter = \App\Wishlist::where('session_id',Session::getId())->count('id');
	@endphp
								
	<div id="sitebar-cart" class="sitebar-cart">
		@include('includes.mini-cart')
	</div>
	<!--BANNER AND SERACH BOX-->
	<section>
		<div class="v3-top-menu">
			<div class="container">
				<div class="row">
					<div class="v3-menu">
						<div class="v3-m-1">
							<a href="{{ url('')}}"><img src="{{ asset('images/logo/slogo.png')}}" style="background:white;" alt=""> </a>
						</div>
						<div class="v3-m-2">
							<ul>
								<li><a class='dropdown-button' href='{{ url("/")}}' data-activates='drop-menu-home'>Home</a>
								</li>
								
							   <li><a class='dropdown-button' href='{{ url("about-us")}}' data-activates='drop-menu-home'>About us</a>
								</li>
								
								<li><a class='dropdown-button ed-sub-menu' href='#' data-activates='drop-mega-menu'>Services</a>
								</li>
								
								<li><a class='dropdown-button' href='{{ url("contactus")}}' data-activates='drop-mega-dash'>Contact us</a>
								</li>
								
								
								{{--<a href="{{ url('cart')}}" class="v3-menu-sign"><i class="fa fa-shopping-cart"></i> Cart (<span class="cart_counter">{{$cart_counter}}</span>) </a> </li>--}}
								@guest
								<li><a href="{{ route('login')}}" class="btn btn-danger">Login</a>
								</li>
								<li style="padding-left:5px;"><a href="{{ route('seller.login')}}" class="btn btn-danger">Seller  login</a>
								</li>
								@else
							   <li><a class='dropdown-button ed-sub-menu' href='{{ url("myaccount")}}' data-activates='drop-menu-admin'>{{ auth::user()->name }}</a>
								</li>
								@endif
								<li class="cart-option">
										<a onclick="cartopen()" href="#">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart(<span class="cart_counter">{{$cart_counter}}</span>)
										</a>
										
									</li>
								
								
						
							</ul>
						</div>
						<div class="v3-m-1">


									<div class="search">
      						<input type="text" id="searchTerm" class="searchTerm" placeholder="What are you looking for?">
      						<div id="searchLists" style="top:50px;">
                           	</div>
      							<button type="submit" class="searchButton">
        					<i class="fa fa-search"></i>
     					</button>
   					</div>

						</div>
						@guest
						
						@else
						<div class="v3-m-3">
							<div class="v3-top-ri v32-top-ri">
								
								<ul id='drop-menu-admin' class='dropdown-content'>
									<li><a href="{{ url('myaccount')}}"><i class="fa fa-user"></i> My Account </a> </li>
									<li>
										<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-user"></i> Logout
										</a> 
										 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
		                                        @csrf
		                                    </form>
									</li>
								</ul>
							</div>
						</div>
						@endguest
					</div>
					<div class="all-drop-down-menu">
						<!--DROP DOWN MENU: HOME-->
					
			
						<!--END DROP DOWN MENU-->
						<ul id='drop-mega-menu' class='dropdown-content'>
							<?php $services = \App\Models\Service::whereNull('parent_id')->where('status','Active')->get(); ?>
							@foreach($services as $service)
							<li><a href="{{ url('services',$service->slug)}}"><i class="fa fa-home"></i>{{$service->name}}</a>
							</li>
							@endforeach
						</ul>
						
						<!--END DROP DOWN MENU-->						
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="v3-mob-top-menu">
			<div class="container">
				<div class="row">
					<div class="v3-mob-menu">
						<div class="v3-mob-m-1">
							<a href="{{ url('')}}"><img src="{{ asset('images/logo/slogo.png')}}" alt=""> </a>
						</div>
						<div class="v3-mob-m-2">
							<div class="v3-top-ri">
								<ul>
									<li><a href="{{ url('login')}}" class="v3-menu-sign"><i class="fa fa-sign-in"></i> Sign In</a> </li>
									<li><a href="{{ url('price')}}" class="v3-add-bus"><i class="fa fa-plus" aria-hidden="true"></i> Add Listing</a> </li>
									<li><a href="#" class="ts-menu-5" id="v3-mob-menu-btn"><i class="fa fa-bars" aria-hidden="true"></i>Menu</a> </li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		<div class="mob-right-nav" data-wow-duration="0.5s">
			<div class="mob-right-nav-close"><i class="fa fa-times" aria-hidden="true"></i> </div>
			
				<h5>Menus</h5>
			<ul class="mob-menu-icon">
					<li><a href='{{ url("")}}'>Home</a></li>
					<li><a href='{{ url("about-us")}}'>About us</a></li>
					<li><a href='{{ url("contactus")}}'>Contact us</a></li>
		
			</ul>
			
	
			<h5>All Services</h5>
			<ul>
				@foreach($services as $service)
				<li><a href="{{ url('services',$service->slug)}}"><i class="fa fa-angle-right" aria-hidden="true"></i>{{$service->name}} </a></li>	
				@endforeach
			</ul>
			
			
		   <h5>My Account Details</h5>
			<ul class="mob-menu-icon">
				@guest
				<li><a href="{{ route('login')}}">Login</a> </li>
				<li><a href="{{ route('seller.login')}}">Seller Login</a> </li>
				@else
				<li><a href="{{ url('myaccount')}}">My Account</a> </li>
				<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-user"></i> Logout
										</a> </li>
										 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
		                                        @csrf
		                                    </form>
				@endguest
	        </ul>
			
			   <h5>Cart Details</h5>
			<ul class="mob-menu-icon">
				<li><a href="{{ url('cart')}}">Cart ({{$cart_counter}})</a> </li>
				
	        </ul>
			
			
		</div>
	</section>
		<div class="mobile-cart">
				<!--Cart popup in mobile view start-->
		<a class="position-absolute" href="javascript:void(0)" onclick="cartopen()">
			<div id="sitebar-drawar" class="sitebar-drawar">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="mobile-style">Cart</span>
			</div>
		</a>
		<!--Cart popup in mobile view end-->
		</div>		

@yield('content')

	<!--FOOTER SECTION-->
	<footer id="colophon" class="site-footer clearfix">
		<div id="quaternary" class="sidebar-container " role="complementary">
			<div class="sidebar-inner">
				<div class="widget-area clearfix">
					<div id="azh_widget-2" class="widget widget_azh_widget">
						<div data-section="section">
							<div class="container">
								<div class="row">
									<div class="col-sm-4 col-md-3 foot-logo"> <img src="{{ asset('images/logo/flogo.jpg')}}" style="width:120px;" alt="logo">
										<p class="hasimg">Kodagu's No. 1 Local Business Listing Website.</p>
										<p class="hasimg">It is a long established fact that a reader
										will be distracted by the readable content of a page 
										when looking at its layout. </p>
									</div>
									
									<div class="col-sm-4 col-md-3">
										<h4>Quick Links</h4>
										<ul class="two-columns">
											<li> <a href="{{ url('')}}">Home</a> </li>
											<li> <a href="{{ url('about-us')}}">About us</a> </li>
											<li> <a href="{{ url('contactus')}}">Contact us</a> </li>
										    <li> <a href="{{ url('privacy-policy')}}">Privacy Policy</a> </li>
										    <li> <a href="{{ url('terms-and-conditions')}}">Terms and Conditions</a> </li>
							
										</ul>
									</div>
									
									<div class="col-sm-4 col-md-3">
										<h4>Popular Services</h4>
										<ul class="two-columns">
											@foreach($services as $service)
											<li> <a href="{{ url('services',$service->slug)}}">{{$service->name}} </a> </li>
											
										@endforeach
										</ul>
									</div>
									
									<div class="col-sm-4 col-md-3">
										<h4>Address</h4>
										<p>         Coorg DIAL 
													Sri complex 
													Mahadevpet 
													Madikeri 571201
													KODAGU </p>
										<p> <span class="strong">Land line : </span> <span class="highlighted">08272 222 224</span> </p>
										<p> <span class="strong">Phone: </span> <span class="highlighted"> 8762282244</span> </p>
									
									
									 <h4>Follow with us</h4>
								
								     <ul class="social-links clearfix">
									 <a href="https://www.facebook.com/SubbiSky-107463681499788">
									 <img src="https://convertkit.com/images/social-icons/facebook.png" alt="Facebook"  style="text-decoration: none; width: 38px;"></a>
									<a href="https://twitter.com/subbisky">
									<img src="https://convertkit.com/images/social-icons/twitter.png" alt="Twitter"  style="text-decoration: none; width: 38px;"></a>
									<a href="https://www.instagram.com/subbisky_/">
									<img src="https://convertkit.com/images/social-icons/instagram.png" alt="Instagram" style="text-decoration: none; width: 38px;"></a>
									<a href="https://www.youtube.com/channel/UCir-1pmugipvScTKSUvFZPw">
									<img src="https://convertkit.com/images/social-icons/youtube_alt.png" alt="YouTube"  style="text-decoration: none; width: 38px;"></a>

									<a href="https://www.pinterest.com/subbisky/">
									<img src="https://convertkit.com/images/social-icons/pinterest.png" alt="pinterest"  style="text-decoration: none; width: 38px;">
									</a>

									</ul>
									</div>
								</div>
							</div>
						</div>
			
					</div>
				</div>
				<!-- .widget-area -->
			</div>
			<!-- .sidebar-inner -->
		</div>
		<!-- #quaternary -->
	</footer>
	<!--COPY RIGHTS-->
	<section class="copy">
		<div class="container">
			<p>copyrights © <span id="cryear">2021</span> Subbisky.com &nbsp;&nbsp;All rights reserved. </p>
			<p>Design by <a href="https://www.webdigitalmantra.in/"> Web Digital Mantra </a></p>
		</div>
	</section>
	<!--QUOTS POPUP-->
	
	<!--SCRIPT FILES-->
	<script src="{{ asset('js/jquery.min.js')}}"></script>
	<script src="{{ asset('js/bootstrap.js')}}" type="text/javascript"></script>
	<script src="{{ asset('js/materialize.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('js/custom.js')}}"></script>
	<script src="{{ asset('js/product-counter.js')}}"></script>
	<script src="{{ asset('js/function.js')}}"></script>
	<script type="text/javascript">
		$('.ecompayment_btn').click(function(){
			var payment_mode = $("input[name='payment_mode']:checked").val();
			if (payment_mode == "Cod") {
				$("#ecompayuForm")
				.attr("action", "{{route('ecom.makepaymentCashonDelivery')}}");
				//alert(1);
				$("#ecompayuForm").submit();
			}
			else if(payment_mode == "Online"){
				$("#ecompayuForm")
				.attr("action", "{{route('ecom.makepayment')}}");
				//alert(2);
				$("#ecompayuForm").submit();
			}

		});
		
		$('#searchTerm').keyup(function(){ 
             var query = $(this).val();
             if(query != '')
             {
              var _token = "{{@csrf_token()}}";
              $.ajax({
               url:"{{ url('searchTerm') }}",
               method:"POST",
               data:{query:query, _token:_token},
               success:function(data){
                 $('#searchLists').show();
                 $('#searchLists').html(data);
                 $("#searchLists").css("position","absolute");
                 $("#searchLists").css("height","300px");
                 $("#searchLists").css("overflow","scroll");
                 $("#searchLists").css("z-index","99999");
                 $("#searchLists").css("background","#fff");
                 $("#searchLists").css("min-width","196px");
                 $("#searchTerm").css("background","#FFF");
               }
              });
             }
             else{
                 $('#searchLists').hide();
             }
         });
	</script>
</body>



</html>