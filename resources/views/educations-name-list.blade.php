@extends('layouts.app')

@section('content')

  <section class="dir-alp dir-pa-sp-top">
         <div class="container">
            <div class="row">
               <div class="dir-alp-tit">
                  <h1>Education Institutions in Coorg</h1>
                  <ol class="breadcrumb">
                     <li><a href="#">Home</a> </li>
                     <li><a href="#">Listing</a> </li>
                     <li class="active">Education Institutions List</li>
                  </ol>
               </div>
            </div>
            <div class="row">
               <div class="dir-alp-con">
                  <div class="col-md-3 dir-alp-con-left">
                     <div class="dir-alp-con-left-1">
                        <h3>Nearby Education Institutions (07)</h3>
                     </div>
                     <div class="dir-hom-pre dir-alp-left-ner-notb">
                        <ul>
                           <!--==========NEARBY LISTINGS============-->
                           <li>
                              <a href="educations-list-details">
                                 <div class="list-left-near lln1"> 
                                    <img src="images/services/s1.jpg" alt="" /> 
                                 </div>
                                 <div class="list-left-near lln2">
                                    <h5>School 1</h5>
                                    <span>City: Madkeri </span> 
                                 </div>
                                 <div class="list-left-near lln3"> <span>5.0</span> </div>
                              </a>
                           </li>
                           <!--==========END NEARBY LISTINGS============-->
                           <!--==========NEARBY LISTINGS============-->
                           <li>
                              <a href="educations-list-details">
                                 <div class="list-left-near lln1">
                                    <img src="images/services/s2.jpg" alt="" /> 
                                 </div>
                                 <div class="list-left-near lln2">
                                    <h5>School 2</h5>
                                    <span>City: Madkeri</span> 
                                 </div>
                                 <div class="list-left-near lln3"> <span>4.0</span> </div>
                              </a>
                           </li>
                           <!--==========END NEARBY LISTINGS============-->
                           <!--==========NEARBY LISTINGS============-->
                           <li>
                              <a href="educations-list-details">
                                 <div class="list-left-near lln1"> 
                                    <img src="images/services/s3.jpg" alt="" /> 
                                 </div>
                                 <div class="list-left-near lln2">
                                    <h5>School 3</h5>
                                    <span>City: Madkeri</span> 
                                 </div>
                                 <div class="list-left-near lln3"> <span>4.4</span> </div>
                              </a>
                           </li>
                           <!--==========END NEARBY LISTINGS============-->
                           <!--==========NEARBY LISTINGS============-->
                           <li>
                              <a href="educations-list-details">
                                 <div class="list-left-near lln1">
                                    <img src="images/services/s4.jpg" alt="" /> 
                                 </div>
                                 <div class="list-left-near lln2">
                                    <h5>School 4</h5>
                                    <span>City: Madkeri</span> 
                                 </div>
                                 <div class="list-left-near lln3"> <span>3.8</span> </div>
                              </a>
                           </li>
                           <!--==========END NEARBY LISTINGS============-->
                           <!--==========NEARBY LISTINGS============-->
                           <li>
                              <a href="educations-list-details">
                                 <div class="list-left-near lln1">
                                    <img src="images/services/s5.jpg" alt="" /> 
                                 </div>
                                 <div class="list-left-near lln2">
                                    <h5>School 5</h5>
                                    <span>City: Madkeri</span> 
                                 </div>
                                 <div class="list-left-near lln3"> <span>4.8</span> </div>
                              </a>
                           </li>
                           <!--==========END NEARBY LISTINGS============-->
                           <!--==========NEARBY LISTINGS============-->
                           <li>
                              <a href="educations-list-details">
                                 <div class="list-left-near lln1"> <img src="images/services/s6.jpg" alt="" /> </div>
                                 <div class="list-left-near lln2">
                                    <h5>School 6</h5>
                                    <span>City: Madkeri</span> 
                                 </div>
                                 <div class="list-left-near lln3"> <span>5.0</span> </div>
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
                                    <label for="scf1">Hotels </label>
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
                           <!--LISTINGS-->
                           <div class="home-list-pop list-spac">
                              <!--LISTINGS IMAGE-->
                              <div class="col-md-3 list-ser-img"> <img src="images/school/s1.jpg" alt="" /> </div>
                              <!--LISTINGS: CONTENT-->
                              <div class="col-md-9 home-list-pop-desc inn-list-pop-desc">
                                 <a href="educations-list-details">
                                    <h3>Best School</h3>
                                 </a>
                                 <h4>Madkeri</h4>
                                 <p><b>Address:</b> #123 Sky Building Mahadevapet Madikeri, MADIKERI 571201</p>
                                 <div class="list-number">
                                    <ul>
                                       <li><img src="images/icon/phone.png" alt=""> +91 9663450888</li>
                                       <li><img src="images/icon/mail.png" alt=""> support@Star.com</li>
                                    </ul>
                                 </div>
                                 <span class="home-list-pop-rat">4.2</span>
                                 <div class="list-enqu-btn">
                                    <ul>
                                       <li><a href="#!"><i class="fa fa-star-o" aria-hidden="true"></i> Write Review</a> </li>
                                       <li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li>
                                       <li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> </li>
                                       <li><a href="#!" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"><i class="fa fa-inr" aria-hidden="true"></i> Get Quote</a> </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!--LISTINGS END-->
						   
						   
						              <!--LISTINGS-->
                           <div class="home-list-pop list-spac">
                              <!--LISTINGS IMAGE-->
                              <div class="col-md-3 list-ser-img"> <img src="images/school/s1.jpg" alt="" /> </div>
                              <!--LISTINGS: CONTENT-->
                              <div class="col-md-9 home-list-pop-desc inn-list-pop-desc">
                                 <a href="educations-list-details">
                                    <h3>Chetana School</h3>
                                 </a>
                                 <h4>Madkeri</h4>
                                 <p><b>Address:</b> #123 Sky Building Mahadevapet Madikeri, MADIKERI 571201</p>
                                 <div class="list-number">
                                    <ul>
                                       <li><img src="images/icon/phone.png" alt=""> +91 9663450888</li>
                                       <li><img src="images/icon/mail.png" alt=""> support@Star.com</li>
                                    </ul>
                                 </div>
                                 <span class="home-list-pop-rat">4.2</span>
                                 <div class="list-enqu-btn">
                                    <ul>
                                       <li><a href="#!"><i class="fa fa-star-o" aria-hidden="true"></i> Write Review</a> </li>
                                       <li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li>
                                       <li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> </li>
                                       <li><a href="#!" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"><i class="fa fa-inr" aria-hidden="true"></i> Get Quote</a> </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!--LISTINGS END-->
						   
						   	              <!--LISTINGS-->
                           <div class="home-list-pop list-spac">
                              <!--LISTINGS IMAGE-->
                              <div class="col-md-3 list-ser-img"> <img src="images/school/s1.jpg" alt="" /> </div>
                              <!--LISTINGS: CONTENT-->
                              <div class="col-md-9 home-list-pop-desc inn-list-pop-desc">
                                 <a href="educations-list-details">
                                    <h3>Narayana School</h3>
                                 </a>
                                 <h4>Madkeri</h4>
                                 <p><b>Address:</b> #123 Sky Building Mahadevapet Madikeri, MADIKERI 571201</p>
                                 <div class="list-number">
                                    <ul>
                                       <li><img src="images/icon/phone.png" alt=""> +91 9663450888</li>
                                       <li><img src="images/icon/mail.png" alt=""> support@Star.com</li>
                                    </ul>
                                 </div>
                                 <span class="home-list-pop-rat">4.2</span>
                                 <div class="list-enqu-btn">
                                    <ul>
                                       <li><a href="#!"><i class="fa fa-star-o" aria-hidden="true"></i> Write Review</a> </li>
                                       <li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li>
                                       <li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> </li>
                                       <li><a href="#!" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"><i class="fa fa-inr" aria-hidden="true"></i> Get Quote</a> </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!--LISTINGS END-->
						   
						   
						   	   	              <!--LISTINGS-->
                           <div class="home-list-pop list-spac">
                              <!--LISTINGS IMAGE-->
                              <div class="col-md-3 list-ser-img"> <img src="images/school/s1.jpg" alt="" /> </div>
                              <!--LISTINGS: CONTENT-->
                              <div class="col-md-9 home-list-pop-desc inn-list-pop-desc">
                                 <a href="educations-list-details">
                                    <h3>Shree School</h3>
                                 </a>
                                 <h4>Madkeri</h4>
                                 <p><b>Address:</b> #123 Sky Building Mahadevapet Madikeri, MADIKERI 571201</p>
                                 <div class="list-number">
                                    <ul>
                                       <li><img src="images/icon/phone.png" alt=""> +91 9663450888</li>
                                       <li><img src="images/icon/mail.png" alt=""> support@Star.com</li>
                                    </ul>
                                 </div>
                                 <span class="home-list-pop-rat">4.2</span>
                                 <div class="list-enqu-btn">
                                    <ul>
                                       <li><a href="#!"><i class="fa fa-star-o" aria-hidden="true"></i> Write Review</a> </li>
                                       <li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li>
                                       <li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> </li>
                                       <li><a href="#!" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"><i class="fa fa-inr" aria-hidden="true"></i> Get Quote</a> </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!--LISTINGS END-->
						   
					
                     
                         
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