@extends('layouts.app')

@section('content')

<section class="p-about com-padd">
		<div class="container">
			<div class="row blog-single con-com-mar-bot-o">
				<div class="col-md-4">
					<div class="blog-img">
					<img src="images/products/daal.jpg" alt="" /> </div>
				</div>
				<div class="col-md-8">
					<div class="page-blog">
						<h3>Daal</h3> 
						<span>May 19, 2021</span>
						
				
							<div class="share-btn share-pad-bot">
							<ul>
								<li><a href="#"><i class="fa fa-shopping-cart fb1"></i> In Stock</a> </li>
						
							</ul>
						</div>
						
								     <div class="row">
											<div class="col-sm-6">
											<h4>Rs 100</h4>
											</div>
											
											<div class="col-sm-6">
											<p>Rs <del> 200 </del></p>
											</div>
										
										</div>
										
										
							<div class="">			
						    <div class="quantity buttons_added">
								<input type="button" value="-" class="minus">
								<input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
								<input type="button" value="+" class="plus">
							</div><br><br>
                           </div>
                       
					   
					   <div class="col-lg-10">
					          
						<input type="hidden" value="13" class="product_id13" />
							<select class="custom-select"> 
															<option value="1 Kg">1 Kg</option>
															<option value="2 Kg">2 Kg</option>
															<option value="3 Kg">3 Kg</option>
															<option value="4 Kg">4 Kg</option>
														</select>
									
					   </div>
							
										
						  <div class="col-md-12" style="padding-top:15px;">
						<h4>Product Description </h4>
						<p>Daal is a term originating in the Indian subcontinent 
						for dried, split pulses that do not require ... 
						The raw spices (more commonly cumin seeds, mustard 
						seeds</p>
						 </div>
				
				    	  <div class="col-md-12">
						   <button type="button" onClick="window.location='cart';"  class="btn btn-danger">Add to Cart</button>
					     </div>
						 
						 
				
						<div class="share-btn share-pad-bot" style="padding-top:30%;">
							<ul>
								<li><a href="#"><i class="fa fa-facebook fb1"></i> Share On Facebook</a> </li>
								<li><a href="#"><i class="fa fa-twitter tw1"></i> Share On Twitter</a> </li>
								<li><a href="#"><i class="fa fa-google-plus gp1"></i> Share On Google Plus</a> </li>
							</ul>
						</div>
						
					
						
						
						<div class="pglist-p3 pglist-bg pglist-p-com">
							<div class="pglist-p-com-ti blog-comment">
								<h3><span>Write Your</span> Comments</h3> </div>
							<div class="list-pg-inn-sp">
								<div class="list-pg-write-rev">
									<form class="col">
										<p>Writing great reviews may help others discover the places that are just apt for them. Here are a few tips to write a good review:</p>
										<div class="row">
											<div class="col s12">
												<fieldset class="rating">
													<input type="radio" id="star5" name="rating" value="5">
													<label class="full" for="star5" title="Awesome - 5 stars"></label>
													<input type="radio" id="star4half" name="rating" value="4 and a half">
													<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
													<input type="radio" id="star4" name="rating" value="4">
													<label class="full" for="star4" title="Pretty good - 4 stars"></label>
													<input type="radio" id="star3half" name="rating" value="3 and a half">
													<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
													<input type="radio" id="star3" name="rating" value="3">
													<label class="full" for="star3" title="Meh - 3 stars"></label>
													<input type="radio" id="star2half" name="rating" value="2 and a half">
													<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
													<input type="radio" id="star2" name="rating" value="2">
													<label class="full" for="star2" title="Kinda bad - 2 stars"></label>
													<input type="radio" id="star1half" name="rating" value="1 and a half">
													<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
													<input type="radio" id="star1" name="rating" value="1">
													<label class="full" for="star1" title="Sucks big time - 1 star"></label>
													<input type="radio" id="starhalf" name="rating" value="half">
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
											<div class="input-field col s12"> <a class="waves-effect waves-light btn-large full-btn" href="#!">Submit Review</a> </div>
										</div>
									</form>
								</div>
							</div>
						</div>
						
						
						
						
						
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
				</div>
			</div>
		</div>
	</section>

@endsection