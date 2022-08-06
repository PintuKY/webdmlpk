@extends('layouts.app')
@section('content')



<style type="text/css">
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
  height: 100%;
}

/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}

#description {
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
}

#infowindow-content .title {
  font-weight: bold;
}

#infowindow-content {
  display: none;
}

#map #infowindow-content {
  display: inline;
}

.pac-card {
  margin: 10px 10px 0 0;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
  background-color: #fff;
  font-family: Roboto;
}

#pac-container {
  padding-bottom: 12px;
  margin-right: 12px;
}

.pac-controls {
  display: inline-block;
  padding: 5px 11px;
}

.pac-controls label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 400px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

#title {
  color: #fff;
  background-color: #4d90fe;
  font-size: 25px;
  font-weight: 500;
  padding: 6px 12px;
}
    </style>


<script type="text/javascript">
        // This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
function initMap() {
  const map = new google.maps.Map(document.getElementById("map1"), {
   
  });
  const card = document.getElementById("pac-card");
  const input = document.getElementById("drop");
  const inputp = document.getElementById("pickup");
  const options = {
    componentRestrictions: { country: "in" },
    fields: ["formatted_address", "geometry", "name"],
    strictBounds: false,
    types: ["establishment"],
  };
  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
  const autocomplete = new google.maps.places.Autocomplete(input, options);
	 const autocompletep = new google.maps.places.Autocomplete(inputp, options);
  // Bind the map's bounds (viewport) property to the autocomplete object,
  // so that the autocomplete requests use the current map bounds for the
  // bounds option in the request.
  autocomplete.bindTo("bounds", map);
	autocompletep.bindTo("bounds", map);
  const infowindow = new google.maps.InfoWindow();
  const infowindowContent = document.getElementById("infowindow-content");
  infowindow.setContent(infowindowContent);
  const infowindowp = new google.maps.InfoWindow();
  const infowindowContentp = document.getElementById("infowindow-contentp");
  infowindowp.setContent(infowindowContentp);
  autocomplete.addListener("place_changed", () => {
    infowindow.close();
   
    const place = autocomplete.getPlace();

    if (!place.geometry || !place.geometry.location) {
      // User entered the name of a Place that was not suggested and
      // pressed the Enter key, or the Place Details request failed.
      window.alert("No details available for input: '" + place.name + "'");
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);
    infowindowContent.children["place-name"].textContent = place.name;
    infowindowContent.children["place-address"].textContent =
      place.formatted_address;
	  
    infowindow.open(map, marker);
  });
	autocompletep.addListener("place_changed", () => {
    infowindowp.close();
    marker.setVisible(false);
    const placep = autocompletep.getPlace();
	
    if (!placep.geometry || !placep.geometry.location) {
      // User entered the name of a Place that was not suggested and
      // pressed the Enter key, or the Place Details request failed.
      window.alert("No details available for input: '" + placep.name + "'");
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (placep.geometry.viewport) {
      map.fitBounds(placep.geometry.viewport);
    } else {
      map.setCenter(placep.geometry.location);
      map.setZoom(17);
    }
    marker.setPosition(placep.geometry.location);
    marker.setVisible(true);
    infowindowContentp.children["place-name"].textContent = placep.name;
    infowindowContentp.children["place-address"].textContent =
      placep.formatted_address;
    infowindowp.open(map, marker);
  });

  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  
 
  strictBoundsInputElement.addEventListener("change", () => {
    autocomplete.setOptions({
      strictBounds: strictBoundsInputElement.checked,
    });

    if (strictBoundsInputElement.checked) {
      biasInputElement.checked = strictBoundsInputElement.checked;
      autocomplete.bindTo("bounds", map);
    }
    input.value = "";
  });
	
	strictBoundsInputElement.addEventListener("change", () => {
    autocompletep.setOptions({
      strictBounds: strictBoundsInputElement.checked,
    });

    if (strictBoundsInputElement.checked) {
      biasInputElement.checked = strictBoundsInputElement.checked;
      autocompletep.bindTo("bounds", map);
    }
    inputp.value = "";
  });
}
    </script>
    <section class="pg-list-1">
        <div class="container">
            <div class="row">
                <div class="pg-list-1-left">
                    <a href="#">
                        <h3>Booking</h3>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="list-pg-bg">
        <div class="container">
            <div class="row">
                <div class="com-padd">
                    <div class="list-pg-lt list-page-com-p">
                        <!--LISTING DETAILS: LEFT PART 6-->
                        <div class="pglist-p3 pglist-bg pglist-p-com" id="ld-rew">
                            <div class="list-pg-inn-sp">
                                <div class="list-pg-write-rev">
                                    <form class="col" method="post" action="{{route('pickUp.makepayment')}}" name="payuForm">
                                        @csrf
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input value="{{auth::user()->name}}" type="text" class="@error('name') is-invalid @enderror" name="name">
												
												  <input type="hidden" name="seller_id" value="{{$sellerService->seller_id}}">
						  <input type="hidden" id="serviceSeller" name="sellerService" value="{{$sellerService->id}}">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                                @enderror
                                                <label>Full Name</label>
                                            </div>

                                            <div class="input-field col s6">
                                                <input value="{{auth::user()->phone}}" type="number" class="@error('phone') is-invalid @enderror" name="phone">
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                                @enderror
                                                <label>Mobile</label>
                                            </div>
                                        </div>
                                            <div class="row">
                                            <div class="input-field col s6">
                                                <input placeholder="Enter Delivery Contact" type="number" class="@error('deliveryCon') is-invalid @enderror" name="deliveryCon" required>
                                                @error('deliveryCon')
                                                <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                                @enderror
                                                <label>Delivery Contact</label>
                                            </div>
                                                <div class="input-field col s6">
                                                    <input value="{{auth::user()->email}}" type="email" class="@error('email') is-invalid @enderror" name="email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                                    @enderror
                                                    <label>Email id</label>
                                                </div>
                                        </div>
										<br>
										<div class="pac-card1" id="pac-card1">
      
      <div class="form-group">
        <input id="pickup" name="pickUpAdd" type="text" placeholder="Enter Pick Up location" class="form-control"  required/>
      </div>
    </div>
    <div id="map1"></div>
    <div id="infowindow-contentp">
      <span id="place-name" class="title"></span><br />
      <span id="place-address"></span>
		 
    </div>
				
										<script
      src="https://maps.googleapis.com/maps/api/js?

key=AIzaSyATk5VvnPJoy8U5Aw71ArL5vqGIj6fLIHI&callback=initMap&libraries=places&v=weekly"
      async
    

></script>
<div class="pac-card1" id="pac-card1">
      
      <div class="form-group">
        <input id="drop" name="dropAdd" type="text" placeholder="Enter Drop location" class="form-control" required/>
      </div>
    </div>
    <div id="map1"></div>
    <div id="infowindow-content">
      <span id="place-name" class="title"></span><br />
      <span id="place-address"></span>
		 
    </div>
				
								
										 
										<script
      src="https://maps.googleapis.com/maps/api/js?

key=AIzaSyATk5VvnPJoy8U5Aw71ArL5vqGIj6fLIHI&callback=initMap&libraries=places&v=weekly"
      async
    

></script>
		<input type="hidden" name="droppLong" id="address-latitude" value="0" />								
<input type="hidden" name="dropLat" id="address-latitude" value="0" />
                                          
										
        <input type="hidden" name="pickupLat" id="address-latitude" value="0" />
                                            <input type="hidden" name="pickupLong" id="address-longitude" value="0" />
                                        
{{--                                        
                                        <div class="form-group">
                                            
                                            <input type="text" id="address-input" name="dropAdd" class="form-control map-input" placeholder="Choose Drop Address" required>
                                            <input type="hidden" name="dropLat" id="address-latitude" value="0" />
                                            <input type="hidden" name="droppLong" id="address-longitude" value="0" />
                                        </div>
{{--                                        <div id="address-map-container" style="width:100%;height:400px; ">--}}
{{--                                            <div style="width: 100%; height: 100%" id="address-map"></div>--}}
{{--                                        </div>--}}
										
										<br>
                                        <div class="form-group">
                                           
                                            <input type="number" id="address-input" name="quantity" class="form-control map-input" placeholder="Enter Quantity" required>

                                        </div>




                                </div>
                            </div>
                        </div>
                        <!--END LISTING DETAILS: LEFT PART 6-->
                    </div>
                    <div class="list-pg-rt">
                        <!--LISTING DETAILS: LEFT PART 9-->
                        <div class="pglist-p3 pglist-bg pglist-p-com">
                            <div class="pglist-p-com-ti pglist-p-com-ti-right">
                                <h3><span>Payment </span> Details </h3>
                            </div>
                            <div class="list-pg-inn-sp">
                                <div class="list-pg-oth-info">
                                    <ul>

 <li>Distance <span class="green-bg distance"> 0 km </span> </li>
                           <li>Amount Per Km  <span class="green-bg">Rs {{$sellerService->price}}</span> </li>
                                        
                                        <li>Total  <span class="green-bg total">Rs 0 </span> </li>
                                        
                                    </ul> <button type="submit" class="waves-effect waves-light btn-large full-btn list-pg-btn">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="amount" id="total">
                  
                    <input type="hidden" name="distance" id="distance">
						@if(auth::user()->city_id==null)
						 <input type="hidden" name="city_id" value="No">
						@else
                    <input type="hidden" name="city_id" value="{{@auth::user()->city_id}}">
						@endif
                    <input type="hidden" name="pincode" value="{{@auth::user()->pincode}}">
                    <input type="hidden" name="landmark" value="{{@auth::user()->landmark}}">
                    <input type="hidden" name="address" value="{{@auth::user()->address}}">
                    </form>
                </div>
            </div>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

 <script type="text/javascript">
	
	$( "#drop" ).keyup(function() {
	  	var fromLocation = $('#pickup').val();
		var toLocation = $('#drop').val();
		var service= $('#serviceSeller').val();
		if (fromLocation && toLocation != '') {
			$.ajax({
				url: '{{ url('distance') }}',
				method: "POST",
				data: {_token: '{{ csrf_token() }}', from:fromLocation,to:toLocation,seller:service},
				dataType: "json",
				success: function (response) {
					$('.distance').html(response.distance);
				$('#distance').val(response.distance);
				$('.total').html(response.total);
				$('#total').val(response.total);
				}
			});
		}
	});
</script>


@endsection
