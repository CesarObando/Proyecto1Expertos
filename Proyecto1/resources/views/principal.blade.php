<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
  <title>SmartTourCR</title>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Hotel Deluxe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

  <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/login.js"></script>
  <script src="js/jquery.easydropdown.js"></script>

  <script src="js/wow.min.js"></script>
  <link href="css/animate.css" rel='stylesheet' type='text/css' />

  <!--Maps-->
  <script type="text/javascript">
  try {
    var pageTracker = _gat._getTracker("UA-10384147-1");
    pageTracker._trackPageview();
  } catch (err) {
  }
  </script>

  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAgFFn99x1e9TrjqmMXsoSLeuibt7L-IMc"></script>

  <script type="text/javascript">

  var map = null;
  var geocoder = null;
  var addresses = null;
  var current_address = 0;
  var geocode_results = new Array();
  var markers = new Array();
  var infowindows = new Array();
  var timeouts = 0;
  var max = 101;
  var geocodeWait = 1000; //wait a second betweeen requests


  function initialize()
  {
    var mapOptions = {
      'zoom': 20,
      'center': new google.maps.LatLng(9.826962, -83.868484),
      'mapTypeId': google.maps.MapTypeId.ROADMAP
    };
    geocoder = new google.maps.Geocoder();
    map = new google.maps.Map(document.getElementById("mapa"), mapOptions);

    var pos = new google.maps.LatLng(9.826962, -83.868484);
    var marker = null;
    marker = new google.maps.Marker({
      position: pos,
      map: map,
      title:"Punto de partida",
      animation: google.maps.Animation.DROP
    });
    marker.setIcon('https://dl.dropboxusercontent.com/u/20056281/Iconos/male-2.png');
    marker.setMap(map);





  }

  function submitForm()
  {
    current_address = 0;
    addresses = new Array();
    var temp_addresses = document.getElementById("addresses").value.split("\n");
    for (var i = 0; i < temp_addresses.length; i++)
    {
      if (temp_addresses[i].length > 1)
      addresses.push(temp_addresses[i]);
    }
    if (addresses.length > 0)
    if (addresses.length < max)
    geocode();
    else
    alert("you have entered too many addresses");
    else
    alert("you have not entered any addresses");
  }

  function geocode() {
    if (current_address < addresses.length && geocoder) {
      document.getElementById("progress").innerHTML = "Geocoding " + (current_address + 1) + " of " + addresses.length;
      geocoder.geocode({'address': addresses[current_address]},
      function (response, status) {
        geocode_results[current_address] = new Array();
        geocode_results[current_address]['status'] = status;
        if (!response || status != google.maps.GeocoderStatus.OK) {
          if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
            geocode_results[current_address]['lat'] = 0;
            geocode_results[current_address]['lng'] = 0;
            current_address++;
          } else {
            timeouts++;
            if (timeouts > 6) {
              alert("You have reached the limit of of requests that you can make to google from this IP address in one day, please wait 24 hours to continue");
            }
          }
        } else {
          timeouts = 0;
          var top_location = response[0];
          var lat = Math.round(top_location.geometry.location.lat() * 1000000) / 1000000;
          var lng = Math.round(top_location.geometry.location.lng() * 1000000) / 1000000;
          geocode_results[current_address]['lat'] = lat;
          geocode_results[current_address]['lng'] = lng;
          geocode_results[current_address]['l_type'] = top_location.geometry.location_type;

          var marker = markers[current_address] = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
            map: map,
            title: "Line " + (current_address + 1)
          });

          var infowindow = infowindows[current_address] = new google.maps.InfoWindow({
            content: addresses[current_address] + "<br/>Latitude:" + lat + "<br/>Longitude:" + lng
          });

          google.maps.event.addListener(markers[current_address], 'click', function () {
            infowindow.open(map, marker);
          });

          current_address++;
        }
        var wait = geocodeWait + (timeouts * geocodeWait); //if it keeps timeing out increase wait time
        setTimeout("geocode()", wait);
      });
    } else {
      document.getElementById("progress").innerHTML = "finished";
      displayResults();
      document.getElementById("progress").innerHTML = "";
      fitAll();
    }
  }

  function displayResults()
  {
    var response = ""
    for (var i = 0; i < addresses.length; i++)
    {
      response += addresses[i] + "\t" + geocode_results[i]['lat'] + "\t" + geocode_results[i]['lng'] + "\n";
    }
    document.getElementById("addresses").value = response;
  }

  function fitAll()
  {
    if (markers.length > 0)
    {
      var bounds = new google.maps.LatLngBounds();
      for (var i = 0; i < markers.length; i++)
      {
        bounds.extend(markers[i].getPosition());
      }
      map.fitBounds(bounds);
    }
  }

  </script>

  <style type="text/css">
  #sidebar {width:200px; height:px; overflow:auto; border:1px solid silver;}
  #map_canvas {width:500px; height:450px; }
  #addresses{overflow:scroll;}
  </style>

  <script>
  new WOW().init();
  </script>
</head>
<body onload="initialize()">
  <div class="header">
    <div class="col-sm-8">
      <div class="logo">
        <a href="index.html"><img src="images/logo.png" alt=""/></a>
      </div>
    </div>
  </div>
  <div class="banner">
    <div class="container_wrap">
      <h1>Mi ubicación</h1>
      <div class="dropdown-buttons">
        <div class="dropdown-button">
          <select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
            <option value="0">San José</option>
            <option value="1">Alajuela</option>
            <option value="2">Cartago</option>
            <option value="3">Guanacaste</option>
            <option value="4">Paraíso</option>
          </select>
        </div>

        <form>
          <br>
          <label class="btn1 btn-2 btn-2g"><input name="submit" type="submit" id="submit" value="Buscar"></label>
        </div>
      </form>
      <div class="clearfix"></div>
    </div>
  </div>

  <br>
  <br>
  <div class="container">
    <div id="mapa" style="width: 1100px; height: 500px;"> </div>
  </div>
  <hr>
  <div class="container">
  <form name="filtros" action="" method="post" class="form-group">
    <div class="form-inline">
      <label class="h4" for="opciones">Buscar por:</label>
      <select name="opciones" value="Todos" class="form-control">
        <option value="Precio">Precio</option>
        <option value="Distancia">Distancia</option>
        <option value="Clima">Clima</option>
        <option value="Duración">Duración</option>
      </select>
      <input type="text" name="filtro" class="form-control">
    </div>
  </form>
</div>

  <script type="text/javascript">
  //   function initMap() {
  var liberia = {lat:  10.633928, lng: -85.440718};
  //var africasafari = {lat:10.564218, lng: -85.399298};



  // var indianapolis2 = {lat: 10.593901, lng: -85.542952};
  //var puraaventura = {lat: 10.226087, lng: -85.747371};
  //var garden={lat:  10.580624, lng:-85.573038};
  //var hola = {lat: 10.720107, lng: -85.410517};
  var paraiso = {lat:  9.836263, lng:  -83.871594};
  var map = new google.maps.Map(document.getElementById('mapa'), {
    center: paraiso,
    scrollwheel: false,
    zoom: 8
  });
  //marker
  markerUno={
    position: paraiso ,
    map: map,
    title: "Paraíso"
  }
  /*
  var gMarker = new google.maps.Marker(markerUno);
  var objHTML={
  content: '<div id="mensaje" style="width: 300px; height: 150px;"><h2>Prueba</h2> </div>'
}

var gIW= new google.maps.InfoWindow(objHTML);
google.maps.event.addListener(gMarker, 'click', function(){
gIW.open(map, gMarker);
});

var directionsDisplay = new google.maps.DirectionsRenderer({
map: map
});
var waypts = [];
waypts.push({
location: africasafari,
stopover: true
});
waypts.push({
location: garden,
stopover: true
});


// Set destination, origin and travel mode.
var request = {
destination:  puraaventura,
origin: liberia,
waypoints: waypts,
optimizeWaypoints: true,
travelMode: google.maps.TravelMode.DRIVING
};

/* var request2 = {
destination: chicago2,
origin: indianapolis,
waypoints: waypts,
travelMode: google.maps.TravelMode.DRIVING
};*/

/*
// Pass the directions request to the directions service.
var directionsService = new google.maps.DirectionsService();
directionsService.route(request, function(response, status) {
if (status == google.maps.DirectionsStatus.OK) {
// Display the route on the map.
directionsDisplay.setDirections(response);
}
});
/*  directionsService.route(request2, function(response, status) {
if (status == google.maps.DirectionsStatus.OK) {
// Display the route on the map.
directionsDisplay.setDirections(response);
}
});*/
//}

</script>
<script>
$('#buscar').addClass('activate');
</script>
<br>
<br>
<div class="footer">
  <div class="container">
    <div class="footer_grids">
      <div class="footer-grid last_grid">
        <div class="copy wow fadeInRight" data-wow-delay="0.4s">
          <p> &copy; 2016 Smart Tour CR. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
