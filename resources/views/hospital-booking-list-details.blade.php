@extends('layouts.app')

@section('content')


      <section>
         <div class="v3-list-ql">
            <div class="container">
               <div class="row">
                  <div class="v3-list-ql-inn">
                     <ul>
                        <li class="active"><a href="#ld-abour"><i class="fa fa-user"></i> About</a>
                        </li>
                        <li><a href="#ld-ser"><i class="fa fa-cog"></i> Facilities </a>
                        </li>
                        <li><a href="#ld-gal"><i class="fa fa-photo"></i> Gallery</a>
                        </li>
                      <!--  <li><a href="#ld-roo"><i class="fa fa-ticket"></i> Other Booking</a>
                        </li> -->
                        <li><a href="#ld-vie"><i class="fa fa-street-view"></i> Location</a>
                        </li>
                        <li><a href="#ld-rew"><i class="fa fa-edit"></i> Write Review</a>
                        </li>
                        <li><a href="#ld-rer"><i class="fa fa-star-half-o"></i> User Review</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--LISTING DETAILS-->
      <section class="pg-list-1">
         <div class="container">
            <div class="row">
               <div class="pg-list-1-left">
                  <a href="#">
                     <h3>Anand Hospital</h3>
                  </a>
                  <div class="list-rat-ch"> <span>5.0</span> 
                     <i class="fa fa-star" aria-hidden="true"></i> 
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i> 
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <h4>Madkeri</h4>
                  <p><b>Address:</b> #123 Sky Building Mahadevapet Madikeri, MADIKERI 571201</p>
                  <div class="list-number pag-p1-phone">
                     <ul>
                        <li><i class="fa fa-phone" aria-hidden="true"></i> +91 9663450888</li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i> support@Star.com</li>
                        <li><i class="fa fa-user" aria-hidden="true"></i> Anand Haridas</li>
                     </ul>
                  </div>
               </div>
               <div class="pg-list-1-right">
                  <div class="list-enqu-btn pg-list-1-right-p1">
                     <ul>
                        <li><a href="#ld-rew"><i class="fa fa-star-o" aria-hidden="true"></i> Write Review</a> </li>
                        <li><a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li>
                        <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> </li>
                        <li><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"><i class="fa fa-inr" aria-hidden="true"></i> Get Quotes</a> </li>
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
                     <!--LISTING DETAILS: LEFT PART 1-->
                     <div class="pglist-p1 pglist-bg pglist-p-com" id="ld-abour">
                        <div class="pglist-p-com-ti">
                           <h3><span>About</span> Anand Hospital </h3>
                        </div>
                        <div class="list-pg-inn-sp">
                           <div class="share-btn">
                              <ul>
                                 <li><a href="#"><i class="fa fa-facebook fb1"></i> Share On Facebook</a> </li>
                                 <li><a href="#"><i class="fa fa-twitter tw1"></i> Share On Twitter</a> </li>
                                 <li><a href="#"><i class="fa fa-google-plus gp1"></i> Share On Google Plus</a> </li>
                              </ul>
                           </div>
                           <p> ANAND Hospitals has emerged as Asia’s foremost integrated healthcare
						   services provider and has a robust presence across the 
						   healthcare ecosystem, including Hospitals, Pharmacies, 
						   Primary Care & Diagnostic Clinics and several retail 
						   health models. The Group also has Telemedicine 
						   facilities across several countries, Health 
						   Insurance Services, Global Projects Consultancy, 
						   Medical Colleges, Medvarsity for E-Learning,
						   Colleges of Nursing and Hospital Management 
						   and a Research Foundation. In addition, ‘ASK Apollo’ 
						   – an online consultation portal and ANAND Home 
						   Health provide the care continuum.
                           </p>
                        
                        </div>
                     </div>
                     <!--END LISTING DETAILS: LEFT PART 1-->
                     <!--LISTING DETAILS: LEFT PART 2-->
                     <div class="pglist-p2 pglist-bg pglist-p-com" id="ld-ser">
                        <div class="pglist-p-com-ti">
                           <h3><span>Homestay</span> Facilities</h3>
                        </div>
                        <div class="list-pg-inn-sp">
                           <p> ANAND Hospitals has emerged as Asia’s foremost integrated healthcare
						   services provider and has a robust presence across the 
						   healthcare ecosystem,
                           </p>
                           <div class="row pg-list-ser">
                              <ul>
                                 <li class="col-md-4">
                                    <div class="pg-list-ser-p1">
                                       <img src="images/hospital/h1.jpeg" alt="" /> 
                                    </div>
                                    <div class="pg-list-ser-p2">
                                       <h4>Facility 1</h4>
                                    </div>
                                 </li>
								 
								     <li class="col-md-4">
                                    <div class="pg-list-ser-p1">
                                       <img src="images/hospital/h1.jpeg" alt="" /> 
                                    </div>
                                    <div class="pg-list-ser-p2">
                                       <h4>Facility 2</h4>
                                    </div>
                                 </li>
								 
								     <li class="col-md-4">
                                    <div class="pg-list-ser-p1">
                                       <img src="images/hospital/h1.jpeg" alt="" /> 
                                    </div>
                                    <div class="pg-list-ser-p2">
                                       <h4>Facility 3</h4>
                                    </div>
                                 </li>
                             
                          
                              </ul>
                           </div>
                        </div>
                     </div>
                     <!--END LISTING DETAILS: LEFT PART 2-->
                     <!--LISTING DETAILS: LEFT PART 3-->
                     <div class="pglist-p3 pglist-bg pglist-p-com" id="ld-gal">
                        <div class="pglist-p-com-ti">
                           <h3><span>Photo</span> Gallery</h3>
                        </div>
                        <div class="list-pg-inn-sp">
                           <div id="myCarousel" class="carousel slide" data-ride="carousel">
                              <!-- Indicators -->
                              <ol class="carousel-indicators">
                                 <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                 <li data-target="#myCarousel" data-slide-to="1"></li>
                                 <li data-target="#myCarousel" data-slide-to="2"></li>
                                 <li data-target="#myCarousel" data-slide-to="3"></li>
                              </ol>
                              <!-- Wrapper for slides -->
                              <div class="carousel-inner">
                                 <div class="item active"> <img src="images/hospital/h1.jpeg" alt="madkeri"> </div>
                                 <div class="item"> <img src="images/hospital/h1.jpeg" alt="madkeri"> </div>
                                 <div class="item"> <img src="images/hospital/h1.jpeg" alt="madkeri"> </div>
                                 <div class="item"> <img src="images/hospital/h1.jpeg" alt="madkeri"> </div>
                              </div>
                              <!-- Left and right controls -->
                              <a class="left carousel-control" href="#myCarousel" data-slide="prev"> <i class="fa fa-angle-left list-slider-nav" aria-hidden="true"></i> </a>
                              <a class="right carousel-control" href="#myCarousel" data-slide="next"> <i class="fa fa-angle-right list-slider-nav list-slider-nav-rp" aria-hidden="true"></i> </a>
                           </div>
                        </div>
                     </div>
                     <!--END LISTING DETAILS: LEFT PART 3-->
                    
				
                     <div class="pglist-p3 pglist-bg pglist-p-com" id="ld-vie">
                        <div class="pglist-p-com-ti">
                           <h3><span>Hospital </span> Location</h3>
                        </div>
                        <div class="list-pg-inn-sp list-360">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1993064.5568319485!2d75.32154048212585!3d12.667388826865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba5007546c508b5%3A0x5f20dceb5534f701!2sCOORG%20DIAL!5e0!3m2!1sen!2sin!4v1621243981749!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                     </div>
                     <!--END 360 DEGREE MAP: LEFT PART 8-->
					 
                     <!--LISTING DETAILS: LEFT PART 6-->
                     <div class="pglist-p3 pglist-bg pglist-p-com" id="ld-rew">
                        <div class="pglist-p-com-ti">
                           <h3><span>Write Your</span> Reviews</h3>
                        </div>
                        <div class="list-pg-inn-sp">
                           <div class="list-pg-write-rev">
                              <form class="col">
                                 <p>Writing great reviews may help others 
								 discover the places that are just apt for them.
								 Here are a few tips to write a good review:</p>
                                 <div class="row">
                                    <div class="col s12">
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
                                 <div class="row">
                                    <div class="input-field col s6">
                                       <input id="re_name" type="text" class="validate">
                                       <label for="re_name">Full Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                       <input id="re_mob" type="number" class="validate">
                                       <label for="re_mob">Mobile</label>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="input-field col s6">
                                       <input id="re_mail" type="email" class="validate">
                                       <label for="re_mail">Email id</label>
                                    </div>
                                    <div class="input-field col s6">
                                       <input id="re_city" type="text" class="validate">
                                       <label for="re_city">City</label>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="input-field col s12">
                                       <textarea id="re_msg" class="materialize-textarea"></textarea>
                                       <label for="re_msg">Write review</label>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="input-field col s12">
									<a class="waves-effect waves-light btn-large full-btn" href="#!">Submit Review</a> </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
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
                                 <p><span>4.5 <i class="fa fa-star" aria-hidden="true"></i></span> based on 242 reviews</p>
                              </div>
                           </div>
                           <div class="lp-ur-all-rat">
                              <h5>Reviews</h5>
                              <ul>
                                 <li>
                                    <div class="lr-user-wr-img"> <img src="images/users/3.png" alt=""> </div>
                                    <div class="lr-user-wr-con">
                                       <h6>Anand <span>4.5 <i class="fa fa-star" aria-hidden="true"></i></span></h6>
                                       <span class="lr-revi-date">17th  May, 2021</span>
                                       <p>Good service... nice and clean rooms... 
									   very good spread of buffet and friendly 
									   staffs. Located in heart of the city and easy 
									   to reach any places in a short distance. </p>
                                       <ul>
                                          <li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><span>Share Now</span>  <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="lr-user-wr-img"> <img src="images/users/3.png" alt=""> </div>
                                    <div class="lr-user-wr-con">
                                       <h6>Haraprasad  <span>5.0 <i class="fa fa-star" aria-hidden="true"></i></span></h6>
                                       <span class="lr-revi-date">17th May, 2021</span>
                                       <p>The hotel is clean, convenient and good value
									   for money. Staff are courteous and helpful.
									   However, they need more training to be efficient.</p>
                                       <ul>
                                          <li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><span>Share Now</span>  <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                       </ul>
                                    </div>
                                 </li>
								 
                                 <li>
                                    <div class="lr-user-wr-img"> <img src="images/users/4.png" alt=""> </div>
                                    <div class="lr-user-wr-con">
                                       <h6>Vijay  <span>4.2 <i class="fa fa-star" aria-hidden="true"></i></span></h6>
                                       <span class="lr-revi-date">17th May, 2021</span>
                                       <p>Too much good experience with hospitality, 
									   cleanliness, facility and privacy and good 
									   value for money... To keep mind relaxing..
									   . Keep it up... </p>
                                       <ul>
                                          <li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><span>Share Now</span>  <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                          <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                       </ul>
                                    </div>
                                 </li>
								 
                                
                      
                              </ul>
                           </div>
                        </div>
                     </div>
                     <!--END LISTING DETAILS: LEFT PART 5-->
                  </div>
                  <div class="list-pg-rt">
				  
				  		              <!--LISTING DETAILS: LEFT PART 9-->
                     <div class="pglist-p3 pglist-bg pglist-p-com">
                        <div class="pglist-p-com-ti pglist-p-com-ti-right">
                           <h3><span>Book  </span> Appointment </h3>
                        </div>
                        <div class="list-pg-inn-sp">
                           <div class="list-pg-oth-info">
                             <form>
							   <div class="form-group">
                                        <input type="text" class="form-control" id=""  placeholder="Enter Name">
								  </div>
								 
								  <div class="form-group">
								   <label>Appointment Date</label>
								      <input type="date" class="form-control" id="name"  placeholder="Enter Date">
								  </div>
								  
								  <div class="form-group">
                                        <input type="text" class="form-control" id=""  placeholder="Enter Age">
								  </div>
								  
								  <div class="form-group">
                                        <input type="email" class="form-control" id=""  placeholder="Enter Email">
								  </div>
								  
								   <div class="form-group">
                                        <input type="text" class="form-control" id=""  placeholder="Enter Mobile">
								  </div>
								  
								     <div class="form-group">
                                        <input type="text" class="form-control" id=""  placeholder="Enter City">
								  </div>
								
							
								  
								</form>
							   <a class="waves-effect waves-light btn-large full-btn list-pg-btn" href="#!">Book Now</a> 
                           </div>
                        </div>
                     </div>
                     <!--END LISTING DETAILS: LEFT PART 9-->
					 
					 
					            <!--LISTING DETAILS: LEFT PART 7-->
                     <div class="pglist-p3 pglist-bg pglist-p-com">
                        <div class="pg-list-user-pro"> <img src="images/users/3.png" alt=""> </div>
                        <div class="list-pg-inn-sp">
                           <div class="list-pg-upro">
                              <h5>Dr Vijay </h5>
                              <p>Anand Hospital Madkeri</p>
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