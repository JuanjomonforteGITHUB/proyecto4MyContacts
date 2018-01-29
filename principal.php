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
</head>
<body>
	<?php echo $_SESSION['username'];
		$mostrarimagen = "SELECT imatgeUsuari FROM tbl_usuari WHERE usernameUsuari = '" . $_SESSION['username'] . "'";
		echo $mostrarimagen;
		$query = mysqli_query($conexion, $mostrarimagen);
	    if (mysqli_num_rows($query)>0) {
			while ($fotosSubidas=mysqli_fetch_array($query)) {
				echo "<img src='img/$fotosSubidas[imatgeUsuari]'/>";
			}
		}
	?>
	<br />
	<a href="eliminarContacte.proc.php">Eliminar contacte</a><br>
	<a href="eliminarUsuari.proc.php" onclick="funeliminarusuari()">Eliminar usuari</a><br>
	<a href="updateUsuari.php">Modificar usuari</a><br>
	<a href="updateContacte.php">Modificar contacte</a><br>
	<a href="insertContacte.php">Insertar contacte</a><br>
	<a href="tancarsessio.proc.php">Tancar sessio</a>

</body>
</html>

