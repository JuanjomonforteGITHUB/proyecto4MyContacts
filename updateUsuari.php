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
	<title>Modificar Usuari</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if(isset($_SESSION['ErrorUserRepe'])){
    	echo "<b>".$_SESSION['ErrorUserRepe'] ."</b><br/>";
    }
	?>
	<h1>Modificar usuario</h1>
	<form action="updateUsuari.proc.php" method="POST">
		<?php
		$queryusuari = "SELECT * FROM `tbl_usuari` WHERE `usernameUsuari`='$nomUsuari'";
		$modificarusuari=mysqli_query($conexion, $queryusuari);
		if (mysqli_num_rows($modificarusuari)>0) {
			while ($resultadouser=mysqli_fetch_array($modificarusuari)) { ?>
				Nom Usuari*: <input type="text" name="usernameUsuarinew" required="" value="<?php echo $resultadouser['usernameUsuari']; ?>" /><br/><br/>
				<input type="hidden" name="usernameUsuariold" value="<?php echo $resultadouser['usernameUsuari']; ?>" />
				
				Nom: <input type="text" name="nomUsuarinew" required="" value="<?php echo $resultadouser['nomUsuari'];?>" /><br/><br/>
				<input type="hidden" name="nomUsuariold" value="<?php echo $resultadouser['nomUsuari'];?>">
				
				Cognoms: <input type="text" name="cognomsUsuarinew" value="<?php echo $resultadouser['cognomsUsuari'];?>"/><br/><br/>
				<input type="hidden" name="cognomsUsuariold" value="<?php echo $resultadouser['cognomsUsuari'];?>"/>

				Email: <input type="text" name="emailUsuarinew" value="<?php echo $resultadouser['emailUsuari'];?>"/><br/><br/>
				<input type="hidden" name="emailUsuariold" value="<?php echo $resultadouser['emailUsuari'];?>"/>

				Contraseña*: <input type="password" name="contraUsuarinew" placeholder="***********" ;?><br/><br/>
				<input type="hidden" name="contraUsuariold" value="<?php echo $resultadouser['contraUsuari']; ?>" />
				
				<input type="submit" value="Desar canvis"/>
				<a href="principal.php"><input type="button" value="Tornar"></a>
			<?php }
		} ?>
	</form>
</body>
</html>