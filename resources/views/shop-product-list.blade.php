@extends('layouts.app')

@section('content')

  <section class="dir-alp dir-pa-sp-top">
         <div class="container">
            <div class="row">
               <div class="dir-alp-tit">
                  <h1>Shop now in Subbisky</h1> 
                  <ol class="breadcrumb">
                     <li><a href="#">Home</a> </li>
                     <li><a href="#">Listing</a> </li>
                     <li class="active">Shop List</li>
                  </ol>
               </div>
            </div>
            <div class="row">
               <div class="dir-alp-con">
                  <div class="col-md-3 dir-alp-con-left">
                     <div class="dir-alp-con-left-1">
                        <h3>Categories </h3>
                     </div>
                     <div class="dir-hom-pre dir-alp-left-ner-notb">
                        <ul>
                           <!--==========NEARBY LISTINGS============-->
                           <li>
                              <a href="shop-product-list">
                                 <div class="list-left-near lln1"> 
                                    <img src="images/services/s1.jpg" alt="" /> 
                                 </div>
                                 <div class="list-left-near lln2">
                                    <h5>Grocery </h5>
                                    
                                 </div>
                                 <div class="list-left-near lln3"> <span>5</span> </div>
                              </a>
                           </li>
                           <!--==========END NEARBY LISTINGS============-->
                          <!--==========NEARBY LISTINGS============-->
                           <li>
                              <a href="shop-product-list">
                                 <div class="list-left-near lln1"> 
                                    <img src="images/services/s1.jpg" alt="" /> 
                                 </div>
                                 <div class="list-left-near lln2">
                                    <h5> Spices</h5>
                                    
                                 </div>
                                 <div class="list-left-near lln3"> <span>5</span> </div>
                              </a>
                           </li>
                           <!--==========END NEARBY LISTINGS============-->
                                <!--==========NEARBY LISTINGS============-->
                           <li>
                              <a href="shop-product-list">
                                 <div class="list-left-near lln1"> 
                                    <img src="images/services/s1.jpg" alt="" /> 
                                 </div>
                                 <div class="list-left-near lln2">
                                    <h5>Meat</h5>
                                    
                                 </div>
                                 <div class="list-left-near lln3"> <span>5</span> </div>
                              </a>
                           </li>
                           <!--==========END NEARBY LISTINGS============-->
           
           
                        </ul>
                     </div>
                     <!--==========Sub Category Filter============-->
                  <!--   <div class="dir-alp-l3 dir-alp-l-com">
                        <h4>Sub Category Filter</h4>
                        <div class="dir-alp-l-com1 dir-alp-p3">
                           <form action="#">
                              <ul>
                                 <li>
                                    <input type="checkbox" id="scf1" />
                                    <label for="scf1">Vegitables </label>
                                 </li>
                                 <li>
                                    <input type="checkbox" id="scf2" />
                                    <label for="scf2"> Resorts</label>
                                 </li>
                                 <li>
                                    <input type="checkbox" id="scf3" />
                                    <label for="scf3">Homestay</label>
                                 </li>
                              </ul>
                           </form>
                           <a href="#!" class="list-view-more-btn">view more</a> 
                        </div>
                     </div> -->
                     <!--==========End Sub Category Filter============-->
                     <!--==========Sub Category Filter============-->
                     <!--	<div class="dir-alp-l3 dir-alp-l-com">
                        <h4>Distance</h4>
                        <div class="dir-alp-l-com1 dir-alp-p3">
                        	<form>
                        		<ul>
                        			<li>
                        				<input class="with-gap" name="group1" type="radio" id="ldis1" />
                        				<label for="ldis1">00 to 02km</label>
                        			</li>
                        			<li>
                        				<input class="with-gap" name="group1" type="radio" id="ldis2" />
                        				<label for="ldis2">02 to 05km</label>
                        			</li>
                        			<li>
                        				<input class="with-gap" name="group1" type="radio" id="ldis3" />
                        				<label for="ldis3">05 to 10km</label>
                        			</li>
                        			<li>
                        				<input class="with-gap" name="group1" type="radio" id="ldis4" />
                        				<label for="ldis4">10 to 20km</label>
                        			</li>
                        			<li>
                        				<input class="with-gap" name="group1" type="radio" id="ldis5" />
                        				<label for="ldis5">20 to 30km</label>
                        			</li>
                        		</ul>
                        	</form> <a href="#!" class="list-view-more-btn">view more</a> </div>
                        </div> -->
                     <!--==========End Sub Category Filter============-->
                     <!--==========Sub Category Filter============-->
                     <!--	<div class="dir-alp-l3 dir-alp-l-com">
                        <h4>Ratings</h4>
                        <div class="dir-alp-l-com1 dir-alp-p3">
                        	<form>
                        		<ul>
                        			<li>
                        				<input type="checkbox" class="filled-in" id="lr1" />
                        				<label for="lr1"> <span class="list-rat-ch"> <span>5.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </span>
                        				</label>
                        			</li>
                        			<li>
                        				<input type="checkbox" class="filled-in" id="lr2" />
                        				<label for="lr2"> <span class="list-rat-ch"> <span>4.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                        				</label>
                        			</li>
                        			<li>
                        				<input type="checkbox" class="filled-in" id="lr3" />
                        				<label for="lr3"> <span class="list-rat-ch"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                        				</label>
                        			</li>
                        			<li>
                        				<input type="checkbox" class="filled-in" id="lr4" />
                        				<label for="lr4"> <span class="list-rat-ch"> <span>2.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                        				</label>
                        			</li>
                        			<li>
                        				<input type="checkbox" class="filled-in" id="lr5" />
                        				<label for="lr5"> <span class="list-rat-ch"> <span>1.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                        				</label>
                        			</li>
                        		</ul>
                        	</form> <a href="#!" class="list-view-more-btn">view more</a> </div>
                        </div> -->
                     <!--==========End Sub Category Filter============-->
                  </div>
                  <div class="col-md-9 dir-alp-con-right">
                     <div class="dir-alp-con-right-1">
                        <div class="row">
                     
					          <div class="col-md-4">
									<div class="home-list-pop">
										<!--POPULAR LISTINGS IMAGE-->
										<div class="col-lg-12 col-md-6 col-sm-6 col-xs-6"> 
										<img src="images/products/daal.jpg" alt="" /> </div>
										<!--POPULAR LISTINGS: CONTENT-->
										<div class="col-md-12"> 
										<a href="single-product-details"><h3>Daal</h3></a>
											
										<div class="row">
											<div class="col-sm-6">
											<h4>Rs 100</h4>
											</div>
											
											<div class="col-sm-6">
											<p>Rs <del> 200 </del></p>
											</div>
										
										</div>
								
										<!--	<span class="home-list-pop-rat">4.2</span> -->
											<div class="hom-list-share">
												<ul>
												<button type="button" onClick="window.location='cart';" class="btn btn-danger">Add to Cart</button>
												<!--		<button type="button" onClick="window.location='wishlist.html';" class="btn btn-danger">Wishlist</button> -->
												</ul>
											</div>
										</div>
									</div>
							 
							 
							 </div>
							 
							 
							   <div class="col-md-4">
									<div class="home-list-pop">
										<!--POPULAR LISTINGS IMAGE-->
										<div class="col-lg-12 col-md-6 col-sm-6 col-xs-6"> 
										<img src="images/products/rice.jpg" alt="" /> </div>
										<!--POPULAR LISTINGS: CONTENT-->
										<div class="col-md-12"> 
										<a href="single-product-details"><h3>Rice</h3></a>
											
										<div class="row">
											<div class="col-sm-6">
											<h4>Rs 100</h4>
											</div>
											
											<div class="col-sm-6">
											<p>Rs <del> 200 </del></p>
											</div>
										
										</div>
								
										<!--	<span class="home-list-pop-rat">4.2</span> -->
											<div class="hom-list-share">
													<ul>
												<button type="button" onClick="window.location='cart';" class="btn btn-danger">Add to Cart</button>
											<!--		<button type="button" onClick="window.location='wishlist.html';" class="btn btn-danger">Wishlist</button> -->
												</ul>
											</div>
										</div>
									</div>
							 
							 
							 </div>
							 
							 
							   <div class="col-md-4">
									<div class="home-list-pop">
										<!--POPULAR LISTINGS IMAGE-->
										<div class="col-lg-12 col-md-6 col-sm-6 col-xs-6"> 
										<img src="images/products/channa.jpg" alt="" /> </div>
										<!--POPULAR LISTINGS: CONTENT-->
										<div class="col-md-12"> 
										<a href="single-product-details"><h3>Channa</h3></a>
											
										<div class="row">
											<div class="col-sm-6">
											<h4>Rs 100</h4>
											</div>
											
											<div class="col-sm-6">
											<p>Rs <del> 200 </del></p>
											</div>
										
										</div>
								
										<!--	<span class="home-list-pop-rat">4.2</span> -->
											<div class="hom-list-share">
													<ul>
												<button type="button" onClick="window.location='cart';" class="btn btn-danger">Add to Cart</button>
												<!--		<button type="button" onClick="window.location='wishlist.html';" class="btn btn-danger">Wishlist</button> -->
												</ul>
											</div>
										</div>
									</div>
							 
							 
							 </div>
							 
							   <div class="col-md-4">
									<div class="home-list-pop">
										<!--POPULAR LISTINGS IMAGE-->
										<div class="col-lg-12 col-md-6 col-sm-6 col-xs-6"> 
										<img src="images/products/mung.jpg" alt="" /> </div>
										<!--POPULAR LISTINGS: CONTENT-->
										<div class="col-md-12"> 
										<a href="single-product-details"><h3>mung</h3></a>
											
										<div class="row">
											<div class="col-sm-6">
											<h4>Rs 100</h4>
											</div>
											
											<div class="col-sm-6">
											<p>Rs <del> 200 </del></p>
											</div>
										
										</div>
								
										<!--	<span class="home-list-pop-rat">4.2</span> -->
											<div class="hom-list-share">
													<ul>
												<button type="button" onClick="window.location='cart';" class="btn btn-danger">Add to Cart</button>
												<!--		<button type="button" onClick="window.location='wishlist.html';" class="btn btn-danger">Wishlist</button> -->
												</ul>
											</div>
										</div>
									</div>
							 
							 
							 </div>
							 
							   <div class="col-md-4">
									<div class="home-list-pop">
										<!--POPULAR LISTINGS IMAGE-->
										<div class="col-lg-12 col-md-6 col-sm-6 col-xs-6"> 
										<img src="images/products/salt.jpg" alt="" /> </div>
										<!--POPULAR LISTINGS: CONTENT-->
										<div class="col-md-12"> 
										<a href="single-product-details"><h3>salt</h3></a>
											
										<div class="row">
											<div class="col-sm-6">
											<h4>Rs 100</h4>
											</div>
											
											<div class="col-sm-6">
											<p>Rs <del> 200 </del></p>
											</div>
										
										</div>
								
										<!--	<span class="home-list-pop-rat">4.2</span> -->
											<div class="hom-list-share">
													<ul>
												<button type="button" onClick="window.location='cart';" class="btn btn-danger">Add to Cart</button>
											<!--		<button type="button" onClick="window.location='wishlist.html';" class="btn btn-danger">Wishlist</button> -->
												</ul>
											</div>
										</div>
									</div>
							 
							 
							 </div>
							 
							   <div class="col-md-4">
									<div class="home-list-pop">
										<!--POPULAR LISTINGS IMAGE-->
										<div class="col-lg-12 col-md-6 col-sm-6 col-xs-6"> 
										<img src="images/products/ground.jpg" alt="" /> </div>
										<!--POPULAR LISTINGS: CONTENT-->
										<div class="col-md-12"> 
										<a href="single-product-details"><h3>Ground Nut</h3></a>
											
										<div class="row">
											<div class="col-sm-6">
											<h4>Rs 100</h4>
											</div>
											
											<div class="col-sm-6">
											<p>Rs <del> 200 </del></p>
											</div>
										
										</div>
								
										<!--	<span class="home-list-pop-rat">4.2</span> -->
											<div class="hom-list-share">
												<ul>
												<button type="button" onClick="window.location='cart';" class="btn btn-danger">Add to Cart</button>
											<!--		<button type="button" onClick="window.location='wishlist.html';" class="btn btn-danger">Wishlist</button> -->
												</ul>
											</div>
										</div>
									</div>
							 
							 
							 </div>
							 
							   
                         
                        </div>
						
						
						
                        <div class="row">
						
						
                           <ul class="pagination list-pagenat">
                              <li class="disabled"><a href="#!!"><i class="material-icons">chevron_left</i></a> </li>
                              <li class="active"><a href="#!">1</a> </li>
                              <li class="waves-effect"><a href="#!">2</a> </li>
                              <li class="waves-effect"><a href="#!">3</a> </li>
                              <li class="waves-effect"><a href="#!">4</a> </li>
                              <li class="waves-effect"><a href="#!">5</a> </li>
                              <li class="waves-effect"><a href="#!">6</a> </li>
                              <li class="waves-effect"><a href="#!">7</a> </li>
                              <li class="waves-effect"><a href="#!">8</a> </li>
                              <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a> </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

@endsection