<!-- QUERY CREAR REGISTRO USUARIO -->
<?php
	session_start();
	include('conexion.proc.php');

	// POSAR EN VARIABLES ELS VALOR ENVIATS PER URL
	$usernameUsuari = $_REQUEST['usernameUsuari']; 
	$nomUsuari = $_REQUEST['nomUsuari']; 
	$cognomsUsuari = $_REQUEST['cognomsUsuari']; 
	$emailUsuari = $_REQUEST['emailUsuari']; 
	$contraUsuari = $_REQUEST['contraUsuari'];
	$contraUsuari2 = $_REQUEST['contraUsuari2'];
	
	// COMPROBAR USERNAME A LA BBDD
	$sqlUsername = "SELECT usernameUsuari FROM tbl_usuari WHERE usernameUsuari='$usernameUsuari'";
	$usernameSql = mysqli_query($conexion, $sqlUsername);

	if(mysqli_num_rows($usernameSql)>0){
		$_SESSION['errorUsername'] = "El nom d'usuari ja existeix!";
		// echo $_SESSION['errorUsername'];
		header("location: index.php");
	} else {
		// COMPROBAR CAMPS CONTRASENYES
		if ($contraUsuari == $contraUsuari2) {
			$password = md5($contraUsuari);
			$sql = "INSERT INTO tbl_usuari (usernameUsuari, nomUsuari, cognomsUsuari, emailUsuari, contraUsuari) VALUES ('$usernameUsuari', '$nomUsuari', '$cognomsUsuari', '$emailUsuari', '$password')";
			mysqli_query($conexion, $sql);
			//echo $sql;
			$_SESSION['username'] = $usernameUsuari;

			$sql = "SELECT idUsuari FROM tbl_usuari WHERE usernameUsuari='$usernameUsuari'";
			$queryidusuario = mysqli_query($conexion, $sql);
			if(mysqli_num_rows($queryidusuario)>0){
				while ($contactosubido=mysqli_fetch_array($queryidusuario)) {
					$_SESSION['idUsuari'] = $contactosubido['idUsuari'];
				}	
			}
			header("location: principal.php");
		} else {
			$_SESSION['errorContra'] = "Les contrasenyes no coincideixen!";
			// echo $_SESSION['errorContra'];
			header("location: index.php");
		}
	}


