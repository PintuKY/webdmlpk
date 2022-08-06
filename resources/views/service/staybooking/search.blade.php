@extends('layouts.app')

@section('content')
<script src="{{ asset('js/jquery.min.js')}}"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
		$(function () {
		     $('#txtFromDate').datetimepicker({
		         minDate:new Date()
		      });
		 });
	</script>
<!--DASHBOARD-->
<section>
		<div class="tz">
			<!--LEFT SECTION-->

			<!--CENTER SECTION-->
			<div class="tz-2">
				<div class="tz-2-com tz-2-main">
					<h4>Stay Booking</h4>
					<div class="db-list-com tz-db-table">
						<div class="ds-boar-title">
							<p>Search Stay</p>
							  @if(Session::has('failure'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ Session::get('failure') }}
                                </div>
                            @endif
						</div>
						<div class="tz2-form-pay tz2-form-com">
							<form class="col s12" method="post" action="{{ route('search-stay',$service->slug) }}">
                               @csrf
								
                               @if($service->slug=='stay-booking')
								
                                <div class="row">
									<div class="input-field col s12">
                                        <select name="stay_type" >
                                            <option value="">--Select Stay Type--</option>
                                            @foreach($service->sub_services as $sub_service)
                                            <option value="{{$sub_service->id}}">{{$sub_service->name}}</option>
                                        @endforeach
                                        </select>
									{{-- <input type="text" placeholder="Search Here" name="search"> --}}

									</div>
								</div>
                                @endif
                                <br>
								<div class="row">
									<div class="col s12 m6">
									  <label>From Date</label>
										<input id="txtFromDate" name="from_date" type="date"required value="{{@$_REQUEST['from_date']}}">

									</div>
									<div class="col s12 m6">
									    <label>To Date</label>
										<input id="txtToDate" name="to_date" type="date"required value="{{@$_REQUEST['to_date']}}">

									</div>
								</div>
								<br>
<div class="row tz2-form-com">
	<?php
	$key=0;
	?>




									 <div class="dynamicRadio">
                                                <div class="row product_info">

													<div class="col s12 m4">
                                                      <input name = "rooms[]" type="hidden" value="1" class="form-control" />
                                                      <label>Adults</label>
                                                        <input name = "adults[]" type="number" min="0" max="6" class="form-control" Placeholder="Adults"  required/>
                                                    </div>

                                                    <div class="col s12 m4">
                                                        <label>Childrens</label>

                                                        <input name = "children[]" type="number" min="0" max="6" class="form-control" Placeholder="Children(6-17Years)"  required/>
                                                    </div>

                                                    <div class="col s12 m4">
                                                        <label>Add Rooms</label>
<br/>
                                                        <button id="btnCakePrice" style="margin-top: 15px;border: none;" class="waves-effect waves-light full-btn" type="button" >Add Rooms   </button>
                                                    </div>
                                                    <div>
                                                    </div>
                                                </div>
                                                <div id="ProductContainer"></div>
                                                <br>


								</div>
	                   
	
                                 <!-- <input name = "adult" type="hidden" value="1" class="form-control" /> -->
	                             @if(@$_REQUEST['city'])
								 <input name = "adult" type="hidden" value="{{@$_REQUEST['city']}}" class="form-control" />
	                             @else
	                             <input name = "adult" type="hidden" value="1" class="form-control" />
	                             @endif

								<div class="row">
									<div class="input-field col s12">
										<button type="submit" value="Search" class="waves-effect waves-light full-btn">Search </button>	</div>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
			<!--RIGHT SECTION-->

		</div>
	</section>
	<!--END DASHBOARD-->
 <script type="text/javascript">

        $("#btnCakePrice").bind("click", function () {
            var div = $("<div />");
            div.html(GetDynamicProductPriceWeight(""));
            $("#ProductContainer").append(div);
        });
        $("body").on("click", ".removeRadio", function () {
            $(this).closest(".dynamicRadio").remove();
        });
        function GetDynamicProductPriceWeight(value) {
            return ' <div class="dynamicRadio"> <div class="row product_info">  <div class="col s12 m4">  <input name = "rooms[]" type="hidden" value="1" class="form-control" /> <label>Adults</label><input name="adults[]" type="number" min="0" max="6" class="form-control" placeholder="Adults" required></div> <div class="col s12 m4"> <label>Childers</label> <input name="children[]" type="number" min="0" max="6" class="form-control" placeholder="Children" required></div> <div class="col s12 m4"> <label>Remove Room</label><br/> <button type="button" class="removeRadio waves-effect waves-light full-btn" style="font-size: 2em;border: none;margin-top: 15px;">Remove</button></div></div></div> '
        }

        $("#similarProduct").bind("click", function () {
            var div = $("<div />");
            div.html(GetDynamicProductName(""));
            $("#similarProductContainer").append(div);
        });
        $("body").on("click", ".removeRadio-product-name", function () {
            $(this).closest(".dynamicRadio-product-name").remove();
        });
        function GetDynamicProductName(value) {
            return '<div class="dynamicRadio-product-name"><div class="row"><div class="col-md-6"> <br> <input name="product_name[]" type="text" class="form-control" Placeholder="Enter Simiilar Product Name" /></div><div class="col-md-2"> <br> <input type="button" value="Remove" class="removeRadio-product-name btn btn-danger"></div></div></div>'
        }
    </script>
@endsection
