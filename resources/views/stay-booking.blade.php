@extends('layouts.app')

@section('content')
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
							<h2>Stay Booking</h2>
							<p>Search Your Fav Home stay</p>
						</div>
						<div class="tz2-form-pay tz2-form-com">
							<form class="col s12">
								<div class="row">
									<div class="input-field col s12">
									<input type="text" placeholder="Search Here" name="search">
  
									</div>
								</div><br>
								<div class="row">
									<div class="col s12 m6">
									  <label>From Date</label>
										<input type="date" class="validateq">
										
									</div>
									<div class="col s12 m6">
									    <label>To Date</label>  
										<input type="date" class="validate">
										
									</div>
								</div>
								
								<div class="row">
									<div class="input-field col s12 m6">
										<input type="text" class="validate">
										<label>No Of Rooms</label>
									</div>
									<div class="input-field col s12 m6">
										<input type="text" class="validate">
										<label>No Of Nights</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m6">
										<input type="text" class="validate">
										<label>No Of Adults</label>
									</div>
									<div class="input-field col s12 m6">
										<input type="text" class="validate">
										<label>No Of Childrens</label>
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
			<!--RIGHT SECTION-->

		</div>
	</section>
	<!--END DASHBOARD-->
	@endsection