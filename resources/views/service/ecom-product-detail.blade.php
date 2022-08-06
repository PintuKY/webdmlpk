@extends('layouts.app') 
@section('content')
 <head>
 <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> </head>
<section class="p-about com-padd">
	<div class="container">
		<div class="row blog-single con-com-mar-bot-o">
			<div class="col-md-4">
				<div class="blog-img">
					<img src="{{asset('uploads/images')}}/{{$product->image}}" alt="{{$product->name}}" />
				</div>
			</div>
			<div class="col-md-8">
				<div class="page-blog">
					<h3>{{$product->name}}</h3>
					
					<div class="row">
						<div class="col-sm-2">
							<h4>Rs {{$product->selling_price}}</h4>
						</div>
						<div class="col-sm-2">
							<p>Rs <del> {{$product->mrp_price}} </del>
							</p>
						</div>
					</div>
					<div class="">
						<div class="quantity buttons_added">
							<input type="button" value="-" class="minus">
							<input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
							<input type="button" value="+" class="plus">
						</div>
						<br>
						<br>
					</div>
					<div class="col-md-12" style="padding-top:15px;">
						<h4>Seller </h4>
						<p>{{$product->seller->shop_name}}</p>
						<h4>Unit </h4>
						<p>{{$product->unit}}</p>
						<h4>Product Description </h4>
						<p>{{$product->description}}</p>
					</div>
					<div class="col-md-12">
						@if($product->stock > 0)
						<button type="button" onClick="addToCart(<?php echo $product->id; ?>)" class="btn btn-danger">Add to Cart</button>
						@else
						<button type="button" class="btn btn-danger">Out of Stock</button>
						@endif
					</div>
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
<script type="text/javascript">
   function addToCart(product_id)
   {
   	  var quantity = $('.quantity').val();
      $.ajax({
         url: '{{ url('add-to-cart') }}',
         method: "POST",
         data: {_token: '{{ csrf_token() }}', "product_id":product_id,"quantity":quantity},
         dataType: "json",
            success: function (response) {
            $('.cart_counter').html(response.cart_counter);
            $('.sitebar-cart').html(response.carts);

		   Swal.fire({
                         position: 'top-end',
                        
                         title: 'Products of Different Vendors will be removed',
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