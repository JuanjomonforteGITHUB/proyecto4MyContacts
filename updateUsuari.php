<?php
	session_start();
	if(!isset($_SESSION['username'])) {
	  header('location: index.php');
	}
	$nomUsuari = $_SESSION['username'];
	include("conexion.proc.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Perfil de Utilizador</title>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel='stylesheet prefetch' href='http://cdn.muicss.com/mui-0.9.17/css/mui.min.css'>
  <link rel="stylesheet" href="css/style2.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js'></script>
	<link rel="stylesheet" href="https://developers.google.com/maps/documentation/javascript/demos/demos.css">

</head>
<script src='http://cdn.muicss.com/mui-0.9.17/js/mui.min.js'></script>
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
            <a href="insertContacte.php" class="menu-item"> <i class="fa fa-plus" aria-hidden="true"></i> </a>
            <a href="#" class="menu-item"> <i class="fa fa-envelope"></i> </a>
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

<!-- CUERPO  --



<!-- filtro  -->
<body>
	<?php
	if(isset($_SESSION['errorsubidafichero'])){

		echo "<script>
			alert('error " . $_SESSION['errorsubidafichero'] . "')
		</script>";
		unset($_SESSION['errorsubidafichero']);
	}
	if(isset($_SESSION['errortipofichero'])){

		echo "<script>
			alert('error " . $_SESSION['errortipofichero'] . "')
		</script>";
		unset($_SESSION['errortipofichero']);
	}
	if(isset($_SESSION['ErrorUserRepe'])){
		echo "<script>
			alert('error " . $_SESSION['ErrorUserRepe'] . "')
		</script>";
		unset($_SESSION['ErrorUserRepe']);
    }
    if(isset($_SESSION['errorContra'])){
		echo "<script>
			alert('error " . $_SESSION['errorContra'] . "')
		</script>";
		unset($_SESSION['errorContra']);
    }
	?>

		<?php
		echo "<div class='header'>";
		echo "</div>";
		$queryusuari = "SELECT * FROM `tbl_usuari` WHERE `usernameUsuari`='$nomUsuari'";
		$modificarusuari=mysqli_query($conexion, $queryusuari);
		if (mysqli_num_rows($modificarusuari)>0) {
			while ($resultadouser=mysqli_fetch_array($modificarusuari)) { ?>
				<?php echo "<img class='avatar' src='img/$resultadouser[imatgeUsuari]'/>"; ?>
				<div class="opperfil">
					<center>

						<button class="mui-btn mui-btn--primary" onclick="chooseFile();">
							<div class="text">Canviar Foto <i class="fa fa-picture-o" aria-hidden="true"></i></div>
						</button>

						<button class="mui-btn mui-btn--primary">
							<a href="principal.php"<div class="text">Tornar <i class="fa fa-arrow-left" aria-hidden="true"></i></div></a>
						</button>
						<script>
						   function chooseFile() {
						      $("#fileInput").click();
						   }
						</script>
					</center>
				</div>
				<div class="infocandidato">
				<form id="editar" class="mui-form" action="updateUsuari.proc.php" method="POST" enctype="multipart/form-data">
				<h1 class="tituloperfil"><?php echo $resultadouser['nomUsuari'];?></h1>

				<div class="mui-textfield mui-textfield--float-label">
				<input type="text" name="usernameUsuarinew" required="" value="<?php echo $resultadouser['usernameUsuari']; ?>" /><label>Nom usuari</label></div>
				<input type="hidden" name="usernameUsuariold" value="<?php echo $resultadouser['usernameUsuari']; ?>" />

				<div class="mui-textfield mui-textfield--float-label">
				<input type="text" name="nomUsuarinew" value="<?php echo $resultadouser['nomUsuari'];?>" /><label>Nom</label></div>
				<input type="hidden" name="nomUsuariold" value="<?php echo $resultadouser['nomUsuari'];?>">

				<div class="mui-textfield mui-textfield--float-label">
				<input type="text" name="cognomsUsuarinew" value="<?php echo $resultadouser['cognomsUsuari'];?>"/><label>Cognom:</label></div>
				<input type="hidden" name="cognomsUsuariold" value="<?php echo $resultadouser['cognomsUsuari'];?>"/>

				<div class="mui-textfield mui-textfield--float-label">
				<input type="text" name="emailUsuarinew" value="<?php echo $resultadouser['emailUsuari'];?>"/><label>Email:</label></div>
				<input type="hidden" name="emailUsuariold" value="<?php echo $resultadouser['emailUsuari'];?>"/>

				<div class="mui-textfield mui-textfield--float-label">
				<input type="password" name="contraUsuarinew"><label>Contrasenya:</label></div>
				<div class="mui-textfield mui-textfield--float-label">
				<input type="password" name="contraUsuarinew2"><label>Repeteix contrasenya:</label></div>
				<input type="hidden" name="contraUsuariold" value="<?php echo $resultadouser['contraUsuari']; ?>" />

				<div class="mui-textfield mui-textfield--float-label">
					<div style="height:0px;overflow:hidden">
					<input type="file" id="fileInput" name="imatgeUsuari" onchange="editar.submit()">
				</div></div>
				<input  class="btn btn-default" type="submit" class="fa fa-floppy-o" value="Desar canvis"/>
			<?php }
		} ?>
	</form>
	<br><br>
</body>

</html>
