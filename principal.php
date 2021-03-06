<?php
	session_start();
	include("conexion.proc.php");
    if(isset($_SESSION['username'])){
      // echo "Bienvenido " . $_SESSION['id'] . "<br/>";
      // echo "Nivel de usuario: " . $_SESSION['nivel'] . "<br/>";
    } else {
      $_SESSION['error-saltologin']= "No te saltes el login!!";
      header("location: index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>PRINCIPAL</title>
	<meta charset="utf-8">
	<script src="js/funciones.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
	<link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" href="https://developers.google.com/maps/documentation/javascript/demos/demos.css">
</head>
<!-- ENCABEZADO -->


<header>
  <div class="container">
    <a href="principal.php"><img src="img/LOGO2.png" class="logo"></a>

      <nav class="nav-collapse">

        <ul>
          <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
          <nav class="menu">

            <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open"/>

            <label class="menu-open-button" for="menu-open">
              <span class="hamburger hamburger-1"></span>
              <span class="hamburger hamburger-2"></span>
              <span class="hamburger hamburger-3"></span>
            </label>

            <a href="updateUsuari.php" class="menu-item"> <i class="fa fa-user"></i> </a>
            <a href="tancarsessio.proc.php" class="menu-item"> <i class="fa fa-power-off"></i> </a>
            <a href="insertContacte.php" class="menu-item"> <i class="fa fa-heart"></i> </a>
            <a href="#" class="menu-item">				
            	<?php
											$mostrarimagen = "SELECT imatgeUsuari FROM tbl_usuari WHERE usernameUsuari = '" . $_SESSION['username'] . "'";
											$query = mysqli_query($conexion, $mostrarimagen);
												if (mysqli_num_rows($query)>0) {
												while ($fotosSubidas=mysqli_fetch_array($query)) {
													echo "<img class='img-perfil' src='img/$fotosSubidas[imatgeUsuari]'/>";
												}
											}
											?></i> </a>

          </nav>

          <!-- filters -->
          <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
              <defs>
                <filter id="shadowed-goo">

                    <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                    <feGaussianBlur in="goo" stdDeviation="3" result="shadow" />
                    <feColorMatrix in="shadow" mode="matrix" values="0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 1 -0.2" result="shadow" />
                    <feOffset in="shadow" dx="1" dy="1" result="shadow" />
                    <feComposite in2="shadow" in="goo" result="goo" />
                    <feComposite in2="goo" in="SourceGraphic" result="mix" />
                </filter>
                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                    <feComposite in2="goo" in="SourceGraphic" result="mix" />
                </filter>
              </defs>
          </svg>
        </ul>
      </nav>
    </div>

</header>

<!-- CUERPO  -->

<div id="map"></div>



<!-- filtro  -->
<body>
	<div class="wrapper">
	<div class="container">
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					Nom:  <input type="text" name="nombre" class="form-control" >
					Cognom:  <input type="text" name="apellido" class="form-control" >
				</div>
				<button type="submit" class="btn btn-default">BUSCAR</button>
			</form>
			<div id="profileCardGrid" class="row row--flex"></div>
				<?php
					$saberidusuario = "SELECT * FROM tbl_usuari WHERE usernameUsuari = '" . $_SESSION['username'] . "'";
					$querysaberidusuario = mysqli_query($conexion, $saberidusuario);
					if (mysqli_num_rows($querysaberidusuario)>0) {
						while ($contactosubido=mysqli_fetch_array($querysaberidusuario)) {
							$idusuario = $contactosubido['idUsuari'];
						}
					}
					echo "<br />";
					$mostrarcontacto = "SELECT * FROM tbl_contactes WHERE idUsuariContacte = '$idusuario'";
					$querymostrarcontacto = mysqli_query($conexion, $mostrarcontacto);
					if (mysqli_num_rows($querymostrarcontacto)>0) {
						while ($contactosubido=mysqli_fetch_array($querymostrarcontacto)) {
							echo "<div class='col-md-3'>";
								echo "<div class='card card--profile card--grid'>";
									echo "<div class='card__content'>";
											echo "<div class='card__media'>";
													echo "<img class='card__img'  src='img/$contactosubido[imatgeContacte]'/>";
											echo "</div>";
												echo "<p class='card__name'>" . $contactosubido['nomContacte'] . "</p>";
												echo "<address class='card__contact'>";
														echo " <p class='card__contact-item'>";
															echo " <strong>Email: </strong>". $contactosubido['emailContacte'];
														echo "</p>";
														echo " <p class='card__contact-item'>";
															echo " <strong>Telefon: </strong>". $contactosubido['telefonContacte'];
														echo "</p>";
												echo "</address>";
												echo "</div>";
												echo "<div class='card__cta'>";
													echo "<a href='updateContacte.php?idContacte=" . $contactosubido['idContacte'] ."' class='card__cta-item btn btn-primary'>";
													echo "<i class='fa fa-pencil card__cta-icon'></i>";
													echo "</a>";
												echo "<a onclick='return funeliminarcontacte();' href='eliminarContacte.proc.php?idContacte=" . $contactosubido['idContacte'] ."' class='card__cta-item btn btn-danger'>";
													echo "<i class='fa fa-trash card__cta-icon'></i>";
												echo "</a>";
												echo "</div>";
											echo "</div>";
										echo "</div>";

						}
					}
				?>

	</div>
</div>




	</script>
	  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	  <script src='https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js'></script>
	  <script  src="js/principal.js"></script>
	  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUzkXGzz6VCBaYBUPXD3uTI8efCkFSX2k&callback=initMap"
	  async defer></script>







	<!-- mapa -->
  <script>
    function initMap() {
      // Create a map object and specify the DOM element for display.
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 41.360429, lng: 2.16246},
        scrollwheel: false,
        zoom: 16
      });
      var geocoder = new google.maps.Geocoder();
      geocodeAddress(geocoder, map);
    }
    function geocodeAddress(geocoder, resultsMap) {
      var address = "Rambla Marina 241, hospitalet, barcelona,es";
      geocoder.geocode({'address': address}, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
          resultsMap.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
            map: resultsMap,
            position: results[0].geometry.location
          });
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
      });
    }
  </script>


</body>
</html>
