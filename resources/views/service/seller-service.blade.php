@extends('layouts.app')
@section('content')
    <section class="p-about com-padd">
        <div class="container">
            <div class="row blog-single con-com-mar-bot-o">
                <div class="col-md-4">
                    <div class="blog-img">
                        <img src="{{asset('uploads/images')}}/{{$sellerServices->image}}" alt="{{$sellerServices->name}}" />
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="page-blog">
                        <h3>{{$sellerServices->name}}</h3>
<br>
                       

                        <div class="col-md-12" style="padding-top:15px;">
							  @if($service->type=="pd")
                                    <h4>Price </h4>
							 <p>Per Km Rs {{$sellerServices->price}}</p>

                                    @else
                                <h4>Price</h4>
							<p>Rs {{$sellerServices->price}}</p>
                                    @endif
                            <h4>Location </h4>
                            <p>{{$sellerServices->seller->shop_name}}</p>

                            <h4> Description </h4>
                            <p>{{$sellerServices->description}}</p>
							
                        </div>
						 @if($service->type=="pd")
						<button type="button"  class="btn btn-danger"> <a href="{{url('PickUpcheckout/'.$sellerServices->id)}}}}">
							@else
 <button type="button"  class="btn btn-danger"> <a href="{{url('serviceCheckout/'.$sellerServices->id)}}}}">
@endif
                                Pay Now

                            </a></button>
                        <div class="share-btn share-pad-bot" style="padding-top:40%;">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook fb1"></i> Share On Facebook</a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter tw1"></i> Share On Twitter</a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus gp1"></i> Share On Google Plus</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
