<!DOCTYPE html>
<html>
  <head>
  
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100%; margin:auto;}
    </style>
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAJvd84J5lN8G8Idmw7gygIYuUGruvsrMg&sensor=true">
    </script>
    <script type="text/javascript">
      function initialize() {
		
		var lat = document.getElementById('lat1').value;
		var lng = document.getElementById('lng1').value;
		var myLatlng=new google.maps.LatLng(lat, lng)
        var mapOptions = {
          center: myLatlng,
          zoom: 15,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
			
		var marker = new google.maps.Marker({
			position: myLatlng,
			draggable:true,
			title:"Aqui es!!"
		});


		marker.setMap(map);
		
		google.maps.event.addListener(marker, "click", function(evento) {
		//Obtengo las coordenadas separadas
		var latitud = evento.latLng.lat();
		var longitud = evento.latLng.lng();
			
		//Puedo unirlas en una unica variable si asi lo prefiero
		var coordenadas = evento.latLng.lat() + ", " + evento.latLng.lng();
			
		//Las muestro con un popup
		//alert(coordenadas);
		document.getElementById('lat').value=latitud;
		document.getElementById('lng').value=longitud;
		
		//document.getElementById('lat1').value=latitud;
		//document.getElementById('lng1').value=longitud;
		});
		
      }
	
    </script>
  </head>
  <body onload="initialize()">

  
	
 