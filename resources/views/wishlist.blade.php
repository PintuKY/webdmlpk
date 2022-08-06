@extends('layouts.app')

@section('content')

<section class="p-about com-padd">
	<h1 align="center">Wishlist Details </h1>
		<div class="container">
                      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Product Image</th>
      <th scope="col">Units</th>
      <th scope="col">Quantity</th>
	  <th scope="col">Price</th>
	  <th scope="col">Total</th>
	  <th scope="col">Action</th>
	  <th scope="col">Add to Cart</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Daal</th>
      <td><img src="images/products/daal.jpg" alt="" width="120px;" /> </td>
      <td>2 KG</td>
                          <td>	
								<div class="">			
								<div class="quantity buttons_added">
									<input type="button" value="-" class="minus">
									<input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
									<input type="button" value="+" class="plus">
								</div><br><br>
							   </div>
						   </td>
	  <td>Rs 100</td>
	  <td>Rs 100</td>
	  <td><i class="fa fa-trash" aria-hidden="true"></i></td>
	  <td><button type="button" onClick="window.location='cart';"  class="btn btn-danger">Add to Cart</button></td>
    </tr>

 
  </tbody>
</table>
		</div>
	</section>
	
	

@endsection