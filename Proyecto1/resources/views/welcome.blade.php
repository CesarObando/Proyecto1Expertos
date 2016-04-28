<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <script src="http://maps.googleapis.com/maps/api/js?v3"></script>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">

            <div id="mapa" style="width: 1000px; height: 500px;"> </div>
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
    </body>
</html>
