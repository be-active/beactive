@extends('layouts.master')
	<!-- head section for this page : -->
	@section('head')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script>
            if (navigator.geolocation)
            {
                navigator.geolocation.getCurrentPosition(showCurrentLocation);
            }
            else
            {
               alert("Geolocation API not supported.");
            }

            function showCurrentLocation(position)
            {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var coords = new google.maps.LatLng(latitude, longitude);

                var mapOptions = {
                zoom: 15,
                center: coords,
                mapTypeControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            //create the map, and place it in the HTML map div
            map = new google.maps.Map(
            document.getElementById("mapPlaceholder"), mapOptions
            );

            //place the initial marker
            var marker = new google.maps.Marker({
            position: coords,
            map: map,
            title: "Current location!"
            });
            }
        </script>
@stop

@section('content')

    <h1>Distance measuring</h1>
    <hr/>
	<div class="row">
	<div class="col-sm-6 col-md-6">
	<div id="mapPlaceholder"></div>
	</div>
	<div class="col-sm-6 col-md-6">
		

	<dl id="geo_info">
		<dt class="text-warning">Start Location</dt>
		<dd><span class="start_lat"></span> , <span class="start_long"></span></dd>
	
		<dt class="text-warning">Current Location</dt>
		<dd><span class="cur_lat"></span> , <span class="cur_long"></span></dd>
	
		<dt class="text-warning">Distance Travelled</dt>
		<dd><span class="distance"></span></dd>
	</dl>
		<div id="warning">
			<strong>Notice:</strong> In order to start using this feature please allow BeActive to access your Geolocation Data.
		</div>

	</div>
</div>

<script>
(function() {

	// today we're going to learn about the Geolocation API
	// using the geolocation api, you can know as well as track
	// the user's device's location!
	
	// if you are interested in knowing about the browser
	// support, check out this link:
	// http://caniuse.com/#search=geolocation
	// pretty good support!
	
	// let's dive into the code straightaway to learn :)
	
	// just a utility function we're gonna use later.
	$$ = function(selector) {
		return document.querySelectorAll(selector);
	};
	
	// so the first thing you need to do, is check whether
	// the client's browser supports the geolocation api or not
	// which is quite simple!
	
	function calculateDistance(lat1, lon1, lat2, lon2) {
		var R = 6371; // km
		var dLat = (lat2 - lat1).toRad();
		var dLon = (lon2 - lon1).toRad(); 
		var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
				Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) * 
				Math.sin(dLon / 2) * Math.sin(dLon / 2); 
		var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a)); 
		var d = R * c;
		return d;
	}
	Number.prototype.toRad = function() {
		return this * Math.PI / 180;
	};

	if (navigator.geolocation) {
		// Supported!
		
		var start_pos;
		
		// the first method you need to know about is
		// navigator.geolocation.getCurrentPosition()
		// which is going to be called once, on page load!
		// It'll initiate an asynchronous request to detect
		// the user's position and call a success/error callback.
		
		// Note, if it's the first time an app is trying
		// to get the position of the user, then the browser
		// is going to seek for permission to whether allow/deny.
		
		navigator.geolocation.getCurrentPosition( function(pos) {
			// we'll also store the start position to track
			// the distance travelled
			start_pos = pos;
			
			console.log(pos); // Go ahead an inspect the dumped "Geoposition" object in your console.
			
			// ob.timestamp is the time at which the data was read.
			// ob.coords contains the location data.
			// ob.coords.latitude and ob.coords.longitude are
			// the geographic coordinates in decimal degree.
			
			// Let's show the position lat, long in the HTML
			$$('.start_lat')[0].innerHTML = pos.coords.latitude;
			$$('.start_long')[0].innerHTML = pos.coords.longitude;
		}, function(error) {
		
			switch (error.code) {
				case 1:
					// 1 === error.PERMISSION_DENIED
					alert('User does not want to share Geolocation data.');
					break;
					
				case 2:
					// 2 === error.POSITION_UNAVAILABLE
					alert('Position of the device could not be determined.');
					break;
					
				case 3:
					// 3 === error.TIMEOUT
					alert('Position Retrieval TIMEOUT.');
					break;
					
				default:
					// 0 means UNKNOWN_ERROR
					alert('Unknown Error');
					break;		}
		
		});
		
		
		// Great! Now we're the Geolocation API Masters :D
		
		// Finally, we need to learn about error handling too!
		// getCurrentPosition or watchPosition, both accepts
		// a second argument which can be a callback fired
		// if any error occurred. Let's see how.
		
		
		// Time to learn about how we can watch/track position, now.
		
		// If the position data changes or more accurate data arrives
		// then we can setup a callback to fire with the
		// watchPosition() function
		// it accepts arguments similarly to getCurrentPosition()
		
		// THe function returns an ID number that uniquely identifies
		// the watcher!
		
		var watch_id = navigator.geolocation.watchPosition(function(pos) {
			// lat, long
			$$('.cur_lat')[0].innerHTML = pos.coords.latitude;
			$$('.cur_long')[0].innerHTML = pos.coords.longitude;
			
			
			// So, how about calculating the distance travelled
			// by the user from the start position to some 'x' position ?
			
			// Quite easy, we're going to use a function to calculate
			// the distance based on the start/end lat/long borrowed from:
			// http://www.html5rocks.com/en/tutorials/geolocation/trip_meter/
			
			$$('.distance')[0].innerHTML = calculateDistance(start_pos.coords.latitude, start_pos.coords.longitude, pos.coords.latitude, pos.coords.longitude);

			// Nice! If you got a handheld device, just move around
			// and you'll see the Distance change in the output box!
		});
		
		
		// you can use the watch_id to stop tracking the user's
		// position further by passing to clearWatch()
		// similar to settimeout/cleartimeout or setInterval/clearInterval
		// navigator.geolocation.clearWatch(watch_id);
		

		
		
	} else {
		// Not supported :(
		$$('body')[0].textContent = 'Your browser does not support the Geolocation API.';
	}
	
}());




function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}

</script>


@endsection

@section('scripts')

@stop