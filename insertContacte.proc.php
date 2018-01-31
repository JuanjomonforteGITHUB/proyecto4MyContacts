<?php
	session_start();
	if(!isset($_SESSION['username'])) {
	  header('location: index.php');
	}
	include("conexion.proc.php");

	// POSAR EN VARIABLES ELS VALOR ENVIATS PER URL
	$idUsuari = $_SESSION['idUsuari'];
	$nomContacte = $_REQUEST['nomContacte'];
	$cognomsContacte = $_REQUEST['cognomsContacte'];
	$emailContacte = $_REQUEST['emailContacte'];
	$telefonContacte = $_REQUEST['telefonContacte'];

	$tipusUbicacio1 = $_REQUEST['tipusubicacio1'];
	$direccioContacte1 = $_REQUEST['direccioContacte1'];
	$poblacioContacte1 = $_REQUEST['poblacioContacte1'];
	$provinciaContacte1 = $_REQUEST['provinciaContacte1'];
	$cpContacte1 = $_REQUEST['cpContacte1'];
	$paisContacte1 = $_REQUEST['paisContacte1'];

	$tipusUbicacio2 = $_REQUEST['tipusUbicacio2'];
	$direccioContacte2 = $_REQUEST['direccioContacte2'];
	$poblacioContacte2 = $_REQUEST['poblacioContacte2'];
	$provinciaContacte2 = $_REQUEST['provinciaContacte2'];
	$cpContacte2 = $_REQUEST['cpContacte2'];
	$paisContacte2 = $_REQUEST['paisContacte2'];	
	



	$queryusuario="SELECT * FROM tbl_usuari WHERE usernameUsuari = '". $_SESSION['username']. "'";
	$result=mysqli_query($conexion, $queryusuario);
	//Condicional que si no hay resultados llevara a index.php, si hay resultados hara las sesiones y nos llevara a principal.php
	if (mysqli_num_rows($result)>0) {
		while ($resultatusuari=mysqli_fetch_array($result)) {
			$idUsuari = $resultatusuari['idUsuari'];
		}
	}
	echo "<pre>";
	var_dump($_FILES);
	echo "</pre>";
	if($_FILES["imatgeContacte"]['name'] != "") {
		if(($_FILES["imatgeContacte"]["type"] == "image/png") || ($_FILES["imatgeContacte"]["type"] == "image/jpg") || ($_FILES["imatgeContacte"]["type"] == "image/jpeg")) {
			$imatgeContacte = uniqid("")."-".$_FILES["imatgeContacte"]["name"];
			$move = "img/";
			if(move_uploaded_file($_FILES["imatgeContacte"]["tmp_name"], $move.$imatgeContacte)) {
				$sql = "INSERT INTO `tbl_contactes`(`idUsuariContacte`, `nomContacte`, `cognomsContacte`, `emailContacte`, `telefonContacte`, `imatgeContacte`, `tipusUbicacio1`, `direccioContacte1`, `poblacioContacte1`, `provinciaContacte1`, `cpContacte1`, `paisContacte1`, `tipusUbicacio2`, `direccioContacte2`, `provinciaContacte2`, `poblacioContacte2`, `cpContacte2`, `paisContacte2`) VALUES ('$idUsuari', '$nomContacte', '$cognomsContacte', '$emailContacte', '$telefonContacte', '$imatgeContacte', '$tipusUbicacio1', '$direccioContacte1', '$poblacioContacte1', '$provinciaContacte1', '$cpContacte1', '$paisContacte1', '$tipusUbicacio2', '$direccioContacte2', '$provinciaContacte2', '$poblacioContacte2', '$cpContacte2', '$paisContacte2')";
			} else {
				$_SESSION['errorsubidafichero'] = 'ERROR!!! EL FICHERO NO SE HA PODIDO SUBIR';
				header("location: updateUsuari.php");
				die("");
			}
		} else {
			$_SESSION['errortipofichero'] = 'NO PUEDES SUBIR ESTE TIPO DE FICHERO. SOLO .jpg, .jpeg o .png';
			header("location: updateUsuari.php");
			die("");
		}
	} else {
		$sql = "INSERT INTO tbl_contactes (INSERT INTO `tbl_contactes`(`idUsuariContacte`, `nomContacte`, `cognomsContacte`, `emailContacte`, `telefonContacte`, `tipusUbicacio1`, `direccioContacte1`, `poblacioContacte1`, `provinciaContacte1`, `cpContacte1`, `paisContacte1`, `tipusUbicacio2`, `direccioContacte2`, `provinciaContacte2`, `poblacioContacte2`, `cpContacte2`, `paisContacte2`) VALUES ('$idUsuari', '$nomContacte', '$cognomsContacte', '$emailContacte', '$telefonContacte', '$tipusUbicacio1', '$direccioContacte1', '$poblacioContacte1', '$provinciaContacte1', '$cpContacte1', '$paisContacte1', '$tipusUbicacio2', '$direccioContacte2', '$provinciaContacte2', '$poblacioContacte2', '$cpContacte2', '$paisContacte2')";
	}
	// echo $sql;
	// die("");
	// CONSULTA SQL INSERTAR DADES CONTACTES
	mysqli_query($conexion, $sql);
	
	header("location: principal.php");		
	