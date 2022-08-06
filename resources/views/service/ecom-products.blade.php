@extends('layouts.app')

@section('content')
   <head>
 <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> </head>
  <section class="dir-alp dir-pa-sp-top">
         <div class="container">
            <div class="row">
               <div class="dir-alp-tit">
                  <h1>Shop now in {{$shop->shop_name}}</h1>
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
                           @foreach($shop->categories as $category)
                           <?php $get_total_product = \App\Models\Product::where('category_id',$category->id)->count('id'); ?>
                           <li>
                              <a href="{{url('shop/'.$shop->id.'/category',$category->id)}}">
<!--                                  <div class="list-left-near lln1">
                                    <img src="images/services/s1.jpg" alt="" />
                                 </div> -->
                                 <div class="list-left-near lln2">
                                    <h5>{{$category->name}} </h5>
                                 </div>
                                 <div class="list-left-near lln3"> <span>{{$get_total_product}}</span> </div>
                              </a>
                           </li>
                           @endforeach
                           <!--==========END NEARBY LISTINGS============-->
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-9 dir-alp-con-right">
                     <div class="dir-alp-con-right-1">
                        <div class="row">
                        	@foreach($products as $product)
						         <div class="col-md-4">
										<div class="home-list-pop">
											<!--POPULAR LISTINGS IMAGE-->
											<div class="col-lg-12 col-md-6 col-sm-6 col-xs-6">
											<img src="{{asset('uploads/images')}}/{{$product->image}}" alt="{{$product->name}}" /> </div>
											<!--POPULAR LISTINGS: CONTENT-->
											<div class="col-md-12">
											<a href="{{url('shop/'.$shop->id.'/product',$product->id)}}"><h5>{{$product->name}}</h5></a>

											<div class="row">
												<div class="col-sm-6">
												<h4>Rs {{$product->selling_price}}</h4>
												</div>

												<div class="col-sm-6">
												<p>Rs <del> {{$product->mrp_price}} </del></p>
												</div>
											</div>

											<!--	<span class="home-list-pop-rat">4.2</span> -->
												<div class="hom-list-share">
													<ul>
                                       @if($product->stock > 0)
													<button type="button" onclick="addToCart(<?php echo $product->id; ?>)" class="btn btn-danger">Add to Cart</button>
                                       @else
                                       <button type="button" class="btn btn-danger">Out of Stock</button>
                                       @endif
													</ul>
												</div>
											</div>
										</div>
									</div>
									@endforeach
                        </div>
                        <div class="row">

                            {{ $products->appends(Request()->all())->links('includes.pagination') }}
                            </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
<script type="text/javascript">
   function addToCart(product_id)
   {
      $.ajax({
         url: '{{ url('add-to-cart') }}',
         method: "POST",
         data: {_token: '{{ csrf_token() }}', "product_id":product_id},
         dataType: "json",
            success: function (response) {
            $('.cart_counter').html(response.cart_counter);
		    $('.sitebar-cart').html(response.carts);

		   Swal.fire({
                         position: 'top-end',

                         title: 'Product Added Successfully',
                         showConfirmButton: false,
                         timer: 1000
                     }).then((result) => {
                         // Reload the Page
                        // location.reload();
                     });
         }
      });
   }
</script>
@endsection
