@extends('layouts.app')

@section('content')

<section id="background1" class="dir1-home-head" style="padding-top:62px;">
                  <div class="flexslider">
                    <!--    <div class="row">   --->
                                <!-- The carousel -->
                                <div id="transition-timer-carousel" class="carousel slide transition-timer-carousel" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#transition-timer-carousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#transition-timer-carousel" data-slide-to="1"></li>
                                        <li data-target="#transition-timer-carousel" data-slide-to="2"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="slides carousel-inner">
                                        <div class="item active">
                                            <img src="images/banner/ban1.jpg" width="100%" alt="Welcome To Subbisky"/>
                                    
                                        </div>
                                        
                                        <div class="item">
                                            <img src="images/banner/ban2.jpg" width="100%" alt="Welcome To Subbisky"/>
                                    
                                        </div>
                                        
                                        <div class="item">
                                            <img src="images/banner/ban3.jpg" width="100%" alt="Welcome To Subbisky"/>
                                
                                        </div>
                                    </div>

                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                    </a>
                                    <a class="right carousel-control" href="#transition-timer-carousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                    </a>
                                    
                                    <!-- Timer "progress bar" -->
                        <!--            <hr class="transition-timer-carousel-progress-bar animate" /> -->
                                </div>
                    <!--        </div>  --->
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
                        <li class="col-md-3 col-sm-3">
                            <a href="stay-booking">
                                <div class="dir-hli-5">
                                    <div class="dir-hli-1">
                                        <div class="dir-hli-3">
                                        <img src="images/hci1.png" alt=""> </div>
                                        <div class="dir-hli-4"> </div> 
                                        <img src="images/s-services/stay.jpg" alt=""> </div>
                                    <div class="dir-hli-2">
                                        <h4> STAY BOOKING <span class="dir-ho-cat">Show All (50)</span></h4> </div>
                                </div>
                            </a>
                        </li>
                        <!--=====LISTINGS======-->
                        <li class="col-md-3 col-sm-3">
                            <a href="food-categories">
                                <div class="dir-hli-5">
                                    <div class="dir-hli-1">
                                        <div class="dir-hli-3">
                                        <img src="images/hci1.png" alt=""> </div>
                                        <div class="dir-hli-4"> </div> 
                                        <img src="images/s-services/food.jpg" alt=""> </div>
                                    <div class="dir-hli-2">
                                        <h4> FOOD <span class="dir-ho-cat">Show All (100)</span></h4> </div>
                                </div>
                            </a>
                        </li>
                        <!--=====LISTINGS======-->
                        <li class="col-md-3 col-sm-3">
                            <a href="health-categories">
                                <div class="dir-hli-5">
                                    <div class="dir-hli-1">
                                        <div class="dir-hli-3">
                                        <img src="images/hci1.png" alt=""> </div>
                                        <div class="dir-hli-4"> </div> 
                                        <img src="images/s-services/health.jpg" alt=""> </div>
                                    <div class="dir-hli-2">
                                        <h4>HEALTH <span class="dir-ho-cat">Show All (102)</span></h4> </div>
                                </div>
                            </a>
                        </li>
                        <!--=====LISTINGS======-->
                        <li class="col-md-3 col-sm-3">
                            <a href="education-categories">
                                <div class="dir-hli-5">
                                    <div class="dir-hli-1">
                                        <div class="dir-hli-3">
                                        <img src="images/hci1.png" alt=""> </div>
                                        <div class="dir-hli-4"> </div> 
                                        <img src="images/s-services/edu.jpg" alt=""> </div>
                                    <div class="dir-hli-2">
                                        <h4>EDUCATION <span class="dir-ho-cat">Show All (200)</span></h4> </div>
                                </div>
                            </a>
                        </li>
                        <!--=====LISTINGS======-->
                        <li class="col-md-3 col-sm-3">
                            <a href="service-categories">
                                <div class="dir-hli-5">
                                    <div class="dir-hli-1">
                                        <div class="dir-hli-3">
                                        <img src="images/hci1.png" alt=""> </div>
                                        <div class="dir-hli-4"> </div>
                                        <img src="images/s-services/service.jpg" alt=""> </div>
                                    <div class="dir-hli-2">
                                    <h4>SERVICE  <span class="dir-ho-cat">Show All (444)</span></h4> </div>
                                </div>
                            </a>
                        </li>
                        <!--=====LISTINGS======-->
                        <li class="col-md-3 col-sm-3">
                            <a href="professional-categories">
                                <div class="dir-hli-5">
                                    <div class="dir-hli-1">
                                        <div class="dir-hli-3">
                                        <img src="images/hci1.png" alt=""> </div>
                                        <div class="dir-hli-4"> </div> 
                                        <img src="images/s-services/adv.jpg" alt=""> </div>
                                    <div class="dir-hli-2">
                                        <h4>PROFESSIONAL <span class="dir-ho-cat">Show All (444)</span></h4> </div>
                                </div>
                            </a>
                        </li>
                        <!--=====LISTINGS======-->
                        <li class="col-md-3 col-sm-3">
                            <a href="shop-categories">
                                <div class="dir-hli-5">
                                    <div class="dir-hli-1">
                                        <div class="dir-hli-3">
                                        <img src="images/hci1.png" alt=""> </div>
                                        <div class="dir-hli-4"> </div>
                                        <img src="images/s-services/buy.jpg" alt=""> </div>
                                    <div class="dir-hli-2">
                                        <h4>BUY & SELL <span class="dir-ho-cat">Show All (66)</span></h4> </div>
                                </div>
                            </a>
                        </li>
                        <!--=====LISTINGS======-->
                        <li class="col-md-3 col-sm-3">
                            <a href="pick-drop-categories">
                                <div class="dir-hli-5">
                                    <div class="dir-hli-1">
                                        <div class="dir-hli-3">
                                        <img src="images/hci1.png" alt=""> </div>
                                        <div class="dir-hli-4"> </div>
                                        <img src="images/s-services/pic.jpg" alt=""> </div>
                                    <div class="dir-hli-2">
                                        <h4>PIC & DROP <span class="dir-ho-cat">Show All (100)</span></h4> </div>
                                </div>
                            </a>
                        </li>
                        
                        <li class="col-md-3 col-sm-3">
                            <a href="shop-categories">
                                <div class="dir-hli-5">
                                    <div class="dir-hli-1">
                                        <div class="dir-hli-3">
                                        <img src="images/hci1.png" alt=""> </div>
                                        <div class="dir-hli-4"> </div>
                                        <img src="images/s-services/daily.jpg" alt=""> </div>
                                    <div class="dir-hli-2">
                                        <h4>DAILY NEEDS <span class="dir-ho-cat">Show All (200)</span></h4> </div>
                                </div>
                            </a>
                        </li>
                        
                            <li class="col-md-3 col-sm-3">
                            <a href="govt-categories">
                                <div class="dir-hli-5">
                                    <div class="dir-hli-1">
                                        <div class="dir-hli-3">
                                        <img src="images/hci1.png" alt=""> </div>
                                        <div class="dir-hli-4"> </div>
                                        <img src="images/s-services/govt.jpg" alt=""> </div>
                                    <div class="dir-hli-2">
                                        <h4>Govt Department <span class="dir-ho-cat">Show All (5)</span></h4> </div>
                                </div>
                            </a>
                        </li>
                        
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
                        <span>Local directory is the smartest way
                        to find the best services for all your works</span>
                        
                        <p>It is a long established fact that a reader
                        will be distracted by the readable content of 
                        a page when looking at its layout. The point of
                        using Lorem Ipsum is that it has a more-or-less
                        normal distribution of letters, as opposed to
                        using 'Content here, content here', making it 
                        look like readable English.</p>
                        
                        <p>There are many variations of passages of Lorem 
                        Ipsum available, but the majority have suffered 
                        alteration in some form, by injected humour. </p>
                        <p>If you are going to use a passage of Lorem 
                        Ipsum, you need to be sure there isn't anything
                        embarrassing hidden in the middle of text.</p> 
                        <a class="waves-effect waves-light btn-large full-btn" href="about-us">Know More</a> </div>
                </div>
                <div class="col-md-6">
                    <div class="page-about"> <img src="images/home/about1.jpg" alt="" /> </div>
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
                    <p>Famous Places Near Madikeri</p>
                </div>
                <div class="col-md-6">
                    <a href="#">
                        <div class="list-mig-like-com">
                            <div class="list-mig-lc-img"> 
                            <img src="images/home/madkeri.jpg" alt="" /> </div>
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
                    <a href="#">
                        <div class="list-mig-like-com">
                            <div class="list-mig-lc-img"> 
                            <img src="images/home/viraj.jpg" alt="" /> </div>
                            <div class="list-mig-lc-con list-mig-lc-con2">
                                <h5>VIRAJPET</h5>
                                <p>18 Areas . 144 Listings</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#">
                        <div class="list-mig-like-com">
                            <div class="list-mig-lc-img"> 
                            <img src="images/home/som.jpg" alt="" /> </div>
                            <div class="list-mig-lc-con list-mig-lc-con2">
                                <h5>SOMWARPET</h5>
                                <p>14 Cities . 1895 Listings</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#">
                        <div class="list-mig-like-com">
                            <div class="list-mig-lc-img"> 
                            <img src="images/home/pon.jpg" alt="" /> </div>
                            <div class="list-mig-lc-con list-mig-lc-con2">
                                <h5>Ponnampet</h5>
                                <p>14 Cities . 1895 Listings</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#">
                        <div class="list-mig-like-com">
                            <div class="list-mig-lc-img"> 
                            <img src="images/home/kus.jpg" alt="" /> </div>
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
                        <div class="home-list-pop">
                            <!--POPULAR LISTINGS IMAGE-->
                            <div class="col-md-3"> 
                            <img src="images/home/main.jpg" alt="" /> </div>
                            <!--POPULAR LISTINGS: CONTENT-->
                            <div class="col-md-9 home-list-pop-desc"> 
                            <a href="stay-booking"><h3>Hotels</h3></a>
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
                        
                      <div class="home-list-pop">
                            <!--POPULAR LISTINGS IMAGE-->
                            <div class="col-md-3"> 
                            <img src="images/home/main.jpg" alt="" /> </div>
                            <!--POPULAR LISTINGS: CONTENT-->
                            <div class="col-md-9 home-list-pop-desc"> 
                            <a href="stay-booking"><h3>Homestay</h3></a>
                                <h4>Madkeri</h4>
                                <p>Subbisky</p>
                                <span class="home-list-pop-rat">4.2</span>
                                <div class="hom-list-share">
                            
                                </div>
                            </div>
                        </div>
                        
                      <div class="home-list-pop">
                            <!--POPULAR LISTINGS IMAGE-->
                            <div class="col-md-3"> 
                            <img src="images/home/main.jpg" alt="" /> </div>
                            <!--POPULAR LISTINGS: CONTENT-->
                            <div class="col-md-9 home-list-pop-desc"> 
                            <a href="food-categories"><h3>Resturants</h3></a>
                                <h4>Madkeri</h4>
                                <p>Subbisky</p>
                                <span class="home-list-pop-rat">4.2</span>
                                <div class="hom-list-share">
                                
                                </div>
                            </div>
                        </div>
                        
                        
        
            
                    
                    </div>
                </div>
                
                
                
                
                <div class="col-md-6">
                    <div>
                        <!--POPULAR LISTINGS-->
                
                
                
                     <div class="home-list-pop">
                            <!--POPULAR LISTINGS IMAGE-->
                            <div class="col-md-3"> 
                            <img src="images/home/main.jpg" alt="" /> </div>
                            <!--POPULAR LISTINGS: CONTENT-->
                            <div class="col-md-9 home-list-pop-desc"> 
                            <a href="health-categories"><h3>Hospitals</h3></a>
                                <h4>Madkeri</h4>
                                <p>Subbisky</p>
                                <span class="home-list-pop-rat">4.2</span>
                                <div class="hom-list-share">
                                
                                </div>
                            </div>
                        </div>
                
                
                
                          <div class="home-list-pop">
                            <!--POPULAR LISTINGS IMAGE-->
                            <div class="col-md-3"> 
                            <img src="images/home/main.jpg" alt="" /> </div>
                            <!--POPULAR LISTINGS: CONTENT-->
                            <div class="col-md-9 home-list-pop-desc"> 
                            <a href="pick-drop-categories"><h3>Travel</h3></a>
                                <h4>Madkeri</h4>
                                <p>Subbisky</p>
                                <span class="home-list-pop-rat">4.2</span>
                                <div class="hom-list-share">
                                
                                </div>
                            </div>
                        </div>
                
                
                          <div class="home-list-pop">
                            <!--POPULAR LISTINGS IMAGE-->
                            <div class="col-md-3"> 
                            <img src="images/home/main.jpg" alt="" /> </div>
                            <!--POPULAR LISTINGS: CONTENT-->
                            <div class="col-md-9 home-list-pop-desc"> 
                            <a href="service-categorie"><h3>Services</h3></a>
                                <h4>Madkeri</h4>
                                <p>Subbisky</p>
                                <span class="home-list-pop-rat">4.2</span>
                                <div class="hom-list-share">
                                
                                </div>
                            </div>
                        </div>
                
                
                
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
                    <h2>Create a free <span>Account</span></h2>
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
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="hom-cre-acc-left hom-cre-acc-right">
                        <form>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="acc-name" type="text" class="validate">
                                    <label for="acc-name">Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="acc-mob" type="number" class="validate">
                                    <label for="acc-mob">Mobile</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="acc-mail" type="email" class="validate">
                                    <label for="acc-mail">Email</label>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col s12 hom-cr-acc-check">
                                    <input type="checkbox" id="test5" />
                                    <label for="test5">By Submitting Form, you
                                    agree to the Terms and Conditions and 
                                    Privacy Policy. You also agree to 
                                    receive product-related emails.</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                <a class="waves-effect waves-light btn-large full-btn" href="#!">Submit Now</a> </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection