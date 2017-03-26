@extends('layouts.master')
@section('title')
   GMap
@endsection()

@section('styles')
  <style>
  	#mymap {
  		border:1px solid red;
  		width: 800px;
  		height: 500px;
  	}
  </style>
@endsection()

@section('content')
  <h1>Map multiple maker use gmaps.js</h1>
  <div class="row">
  	<div id="mymap"></div>
  </div>
@endsection()

@section('scripts')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfKqVTP84Fz9OVU7ZfJ3-C310XT04xFC4&callback=initMap"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js"></script>
  <script>
  	var locations = <?php print_r(json_encode($location)) ?>;

  	/*var map = new google.maps.Map(document.getElementById('mymap'), {
          center: {lat: 21.168609, lng: 105.950540},
          scrollwheel: false,
          zoom: 8
        });*/


  	var mymap = new GMaps({
  		el: '#mymap',
  		lat: 21.168609,
  		lng: 105.950540,
  		zoom: 15
  	});

  	$.each(locations, function(index, value) {
  		mymap.addMarker({
  			lat: value.lat,
  			lng: value.lng,
  			title: value.city,
  			click: function(e) {
  				alert('This is '+ value.city +'');
  			}
  		});
  	});
  </script>
@endsection()

