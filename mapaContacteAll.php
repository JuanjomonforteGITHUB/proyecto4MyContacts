<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Hola Mundo con AJAX</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #mapa {
        height: 50%;
      }
    </style>

<script type="text/javascript">
  var address,map;

function descargaArchivo() {
  // Obtener la instancia del objeto XMLHttpRequest
  if(window.XMLHttpRequest) {
    peticion_http = new XMLHttpRequest();
  }
  else if(window.ActiveXObject) {
    peticion_http = new ActiveXObject("Microsoft.XMLHTTP");
  }

  // Preparar la funcion de respuesta
  peticion_http.onreadystatechange = muestraContenido;

  // Realizar peticion HTTP
  peticion_http.open('GET', 'contacteAll.php', true);
  peticion_http.send(null);

  function muestraContenido() {
    if(peticion_http.readyState == 4) {
      if(peticion_http.status == 200) {
         initMap();
        var usuarios=JSON.parse(peticion_http.responseText);
        var direccio = "";
        for (var i in usuarios) {
          address = usuarios[i].direccioContacte+', '+usuarios[i].poblacioContacte+', '+usuarios[i].provinciaContacte+', '+usuarios[i].cpContacte+', '+usuarios[i].paisContacte;
        
          //mostrarDireccio(direccio);
          var nomCognoms = usuarios[i].nomContacte+' '+usuarios[i].cognomsContacte
          var geocoder = new google.maps.Geocoder();

           geocodeAddress(geocoder, map, nomCognoms);

        }
        // initMap();
      }
    }
  }
}

//window.onload = descargaArchivo;
  </script>
</head>
<body>
	  
  <div id="mapa">
  </div>


    <script>

      function mostrarDireccio(direccio){
        address = direccio;
        initMap();
        // geocodeAddress(geocoder, map);

      } 
      function initMap() {
        map = new google.maps.Map(document.getElementById('mapa'), {
          zoom: 12,
          center: {lat: -50.397, lng: 150.644}
        });
        
      }

      function geocodeAddress(geocoder, resultsMap, nomCognoms) {
        //address = "Rambla Marina 241, hospitalet, barcelona,es";
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            
            var image = 'img/icono.png';
            var marker = new google.maps.Marker({
              position: results[0].geometry.location,
              map: resultsMap,
              title: nomCognoms,
              // content: nomCognoms,
              icon: image
              
            });
            var info = new google.maps.InfoWindow({
              content: nomCognoms
            });
            info.open(resultsMap, marker);
          } else {
            //alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }

      //
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBa49s_YWo-2xwvQEjLIEIkUH7mSOu9zFM&callback=descargaArchivo"
    async defer></script>
</body>
</html>
