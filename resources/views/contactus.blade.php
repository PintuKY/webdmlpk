@extends('layouts.app')

@section('content')




    <section class="inn-page-bg">
        <div class="container">
            <div class="row">
                <div class="inn-pag-ban">
                    <h2>Contact Us</h2>
                    <h5>Grow your business by getting relevant and verified leads</h5> </div>
            </div>
        </div>
    </section>


    <section class="dir-pa-sp-top-bg">
        <div class="container">
            <div class="row com-padd">
                <div class="col-md-6">
                    <div class="how-border how-com-mob-bot-space">
                        <div class="hom-cre-acc-left">
                            <h3><span>Contact Details</span></h3>
                            <p>Local directory is the smartest way to find the <b>best services</b>
                                <br>for all your works</p>
                        </div>
                        <div class="how-com">
                            <ul>
                                <li>
                                    <i class="fa fa-map-marker fa-3x" aria-hidden="true"></i>
                                    <p>

                                    Subbisky Mahadevpet, Madikeri, Karnataka 571201
                                    </p>
                                </li>
                                <li>
                                    <i class="fa fa-phone fa-3x" aria-hidden="true"></i>
                                    <p><a href="tel:082722 22224">082722 22224 </a></p>
                                </li>
                                <li>
                                    <i class="fa fa-envelope fa-3x" aria-hidden="true"></i>
                                    <p><a href="mailto:info@subbisky.in">info@subbisky.in </a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="how-border">
                        <div class="hom-cre-acc-left">
                            <h3><span>Contact us</span></h3>
                            <p>Please fill the form</b>
                                </p>
                        </div>
                    </div><!-- /.form-contact-header -->
                    @if(Session::has('flash_success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('flash_success') }}
                        </div>
                    @endif
                    @if(Session::has('flash_error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('flash_error') }}
                        </div>
                    @endif
                        <div class="how-com">
                            <form action="{{url('/saveContact')}}" method="post" id="form-contact" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"  required>
                                    @if ($errors->has('name'))
                                        <span class="required">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                    @if ($errors->has('email'))
                                        <span class="required">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Number</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Number" required>
                                    @if ($errors->has('phone'))
                                        <span class="required">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <label for="exampleInputEmail1">Subject</label>
                                <div class="form-group">
                                    <textarea class="form-control" id="subject" name="subject" rows="1" placeholder="Enter Subject" required></textarea>
                         @if ($errors->has('subject'))
                             <span class="required">
                                                <strong>{{ $errors->first('subject') }}</strong>
                                            </span>
                                    @endif
                                </div>


                                <label for="exampleInputEmail1">Message</label>
                                <div class="form-group">
                     <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter Message" required></textarea>
                         @if ($errors->has('message'))
                             <span class="required">
                                                <strong>{{ $errors->first('message') }}</strong>
                                            </span>
                                    @endif
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


        <section class="p-about com-padd">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1993148.329103874!2d75.52478755243834!3d12.656669685982756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba5007546c508b5%3A0x5f20dceb5534f701!2sCOORG%20DIAL!5e0!3m2!1sen!2sin!4v1621841486092!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>



@endsection
