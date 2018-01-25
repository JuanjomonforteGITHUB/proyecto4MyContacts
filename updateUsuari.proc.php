<?php
	include("conexion.proc.php");

	// POSAR EN VARIABLES ELS VALOR ENVIATS PER URL
	$idContacte = $_REQUEST['idContacte'];
	$usernameUsuari = $_REQUEST['usernameUsuari']; 
	$nomUsuari = $_REQUEST['nomUsuari']; 
	$cognomsUsuari = $_REQUEST['cognomsUsuari']; 
	$emailUsuari = $_REQUEST['emailUsuari']; 
	$contraUsuari = $_REQUEST['contraUsuari'];
	$contraUsuari2 = $_REQUEST['contraUsuari2'];

	// CONSULTA SQL VERIFICAR EXISTENCIA USERNAME
	$sqlUsernameUsuari = "SELECT tbl_usuari FROM usernameUsuari WHERE usernameUsuari=$usernameUsuari";
	$usernameSql = mysqli_query($conexion, $sqlUsername);

	// SI EL USERNAME EXISTEIX...
	if(mysqli_num_rows($usernameSql)>0){
		$_SESSION['errorUsername'] = "El nom d'usuari ja existeix!";
		header("location: updateUsuari.php");
	}else{
		// COMPROBAR QUE LES CONTRASENYES COINCIDEIXIN
		if (isset($contraUsuari == $contraUsuari2)) {
			// CONSULTA SQL UPDATE DADES USUARI
			$sql = "UPDATE tbl_usuari SET usernameUsuari=$usernameUsuari, nomUsuari=$nomUsuari, cognomsUsuari=$cognomsUsuari, emailUsuari=$emailUsuari, contraUsuari=$contraUsuari WHERE idUsuari=$idUsuari";
		}
	}

	// FALTA VERIFICAR ERRORES (HAY)

		
	