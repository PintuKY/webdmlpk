

@extends('layouts.app')

@section('content')




    <Style>
        :root {
            --blue: #1e90ff;
            --gray: #ddd;
            --whitish: #eee;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
            Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        }

        #tab-contents {
            width: 70vw;
            margin: 0 auto;
        }

        .tabs {
            padding: 0;
        }



        .tabs li {
            display: inline-block;
            background-color: var(--gray);
            padding: 10px 15px;
            border-radius: 5px;
            margin-right: 10px;
            cursor: pointer;
        }

        .tabs li.active {
            background-color: var(--blue);
            color: var(--whitish);
        }

        .panel {
            display: none;
            border: 1px solid var(--gray);
            padding: 0 15px;
            border-radius: 5px;
        }

        .panel.active {
            display: block;
        }

    </style>




<!--DASHBOARD-->
<section>
    <div class="tz">
        <!--LEFT SECTION-->

        <!--CENTER SECTION-->
        <div class="tz-2">
            <div class="tz-2-com tz-2-main">
                <h4>Pick and Drop Categories List</h4>
                <div class="db-list-com tz-db-table">
                    <div class="ds-boar-title">
                        <h2>Pick and Drop Categories </h2>

                    </div>



                        <div class="panel active" id="Passenger">
                            <p><strong>Passenger Categories </strong></p>


                            <form class="col-lg-6 col-sm-6">
                                <br>
                                <div class="row">
                                    <div class="col s12 m6">
                                        <label>Pick Up</label>
                                        <input type="date" class="validateq">

                                    </div>
                                    <div class="col s12 m6">
                                        <label>Drop</label>
                                        <input type="date" class="validate">

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input type="text" class="validate">
                                        <label>No.</label>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="submit" value="Search" class="waves-effect waves-light full-btn"> </div>
                                </div>
                            </form>
                        </div>



                    </div>


                </div>
            </div>
        </div>
        <!--RIGHT SECTION-->

    </div>
</section>
<!--END DASHBOARD-->


<footer id="colophon" class="site-footer clearfix">
    <div id="quaternary" class="sidebar-container " role="complementary">
        <div class="sidebar-inner">
            <div class="widget-area clearfix">
                <div id="azh_widget-2" class="widget widget_azh_widget">
                    <div data-section="section">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4 col-md-3 foot-logo"> <img src="images/logo/flogo.jpg" style="width:120px;" alt="logo">
                                    <p class="hasimg">Kodagu's No. 1 Local Business Listing Website.</p>
                                    <p class="hasimg">It is a long established fact that a reader
                                        will be distracted by the readable content of a page
                                        when looking at its layout. </p>
                                </div>

                                <div class="col-sm-4 col-md-3">
                                    <h4>Quick Links</h4>
                                    <ul class="two-columns">
                                        <li> <a href="index.html">Home</a> </li>
                                        <li> <a href="about-us.html">About us</a> </li>
                                        <li> <a href="contactus.html">Contact us</a> </li>
                                        <li> <a href="privacy-policy.html">Privacy Policy</a> </li>
                                        <li> <a href="terms-and-conditions.html">Terms and Conditions</a> </li>

                                    </ul>
                                </div>

                                <div class="col-sm-4 col-md-3">
                                    <h4>Popular Services</h4>
                                    <ul class="two-columns">
                                        <li> <a href="stay-booking.html">Stay Booking </a> </li>
                                        <li> <a href="shop-categories.html">Shop </a> </li>
                                        <li> <a href="health-categories.html">Health</a> </li>
                                        <li> <a href="education-categories.html">Education  </a> </li>
                                        <li> <a href="professional-categories.html">Professional</a> </li>
                                        <li> <a href="food-categories.html">Food </a> </li>
                                        <li> <a href="PicDrop-categories.html">Pick and Drop </a> </li>
                                        <li> <a href="Services-categories.html">Service Providers </a> </li>
                                        <li> <a href="shop-categories.html">Daily Needs </a> </li>

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
<section>
    <!-- GET QUOTES POPUP -->
    <div class="modal fade dir-pop-com" id="list-quo" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header dir-pop-head">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Get a Quotes</h4>
                    <!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
                </div>
                <div class="modal-body dir-pop-body">
                    <form method="post" class="form-horizontal">
                        <!--LISTING INFORMATION-->
                        <div class="form-group has-feedback ak-field">
                            <label class="col-md-4 control-label">Full Name *</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="fname" placeholder="" required>
                            </div>
                        </div>
                        <!--LISTING INFORMATION-->
                        <div class="form-group has-feedback ak-field">
                            <label class="col-md-4 control-label">Mobile</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="mobile" placeholder="">
                            </div>
                        </div>
                        <!--LISTING INFORMATION-->
                        <div class="form-group has-feedback ak-field">
                            <label class="col-md-4 control-label">Email</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email" placeholder="">
                            </div>
                        </div>
                        <!--LISTING INFORMATION-->
                        <div class="form-group has-feedback ak-field">
                            <label class="col-md-4 control-label">Message</label>
                            <div class="col-md-8 get-quo">
                                <textarea class="form-control"></textarea>
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
    <!-- GET QUOTES Popup END -->
</section>
<!--SCRIPT FILES-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/materialize.min.js" type="text/javascript"></script>
<script src="js/custom.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const tabs = document.querySelector(".tabs");
        const lis = document.querySelectorAll(".tabs li");
        const panels = document.querySelectorAll(".panel");

        tabs.addEventListener("click", (e) => {
            if (e.target.tagName == "LI") {
                // tıklanan menüye active class'ı ekleniyor
                Array.from(lis).forEach((li) => {
                    if (li == e.target) {
                        li.classList.add("active");
                    } else {
                        li.classList.remove("active");
                    }
                });

                // tıklanan menünün hedefindeki dive active class'ı ekleniyor.
                const targetPanel = document.querySelector(e.target.dataset.target);

                Array.from(panels).forEach((panel) => {
                    if (panel == targetPanel) {
                        panel.classList.add("active");
                    } else {
                        panel.classList.remove("active");
                    }
                });
            }
        });
    });

</script>

</body>


    </section>

@endsection
