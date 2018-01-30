<?php
	session_start();
	if(!isset($_SESSION['username'])) {
	  header('location: index.php');
	}
	include("conexion.proc.php");

	// POSAR EN VARIABLES ELS VALOR ENVIATS PER URL

	$nomContacte = $_REQUEST['nomContacte'];
	$cognomsContacte = $_REQUEST['cognomsContacte'];
	$telefonContacte = $_REQUEST['telefonContacte'];
	$emailContacte = $_REQUEST['emailContacte'];
	$tipusUbicacio1 = $_REQUEST['tipusubicacio1'];
	$ubicacio1Contacte = $_REQUEST['ubicacio1Contacte'];
	$tipusUbicacio2 = $_REQUEST['tipusubicacio2'];
	$ubicacio2Contacte = $_REQUEST['ubicacio2Contacte'];
	$imatgeContacte = $_REQUEST['imatgeContacte'];
	$direccioContacte = $_REQUEST['direccioContacte'];
	$poblacioContacte = $_REQUEST['poblacioContacte'];
	$provinciaContacte = $_REQUEST['provinciaContacte'];
	$cpContacte = $_REQUEST['cpContacte'];
	$paisContacte = $_REQUEST['paisContacte'];

	$queryusuario="SELECT * FROM tbl_usuari WHERE usernameUsuari = '". $_SESSION['username']. "'";
	$result=mysqli_query($conexion, $queryusuario);
	//Condicional que si no hay resultados llevara a index.php, si hay resultados hara las sesiones y nos llevara a principal.php
	if (mysqli_num_rows($result)>0) {
		while ($resultatusuari=mysqli_fetch_array($result)) {
			$idUsuari = $resultatusuari['idUsuari'];
		}
	}

	if($_FILES["imatgeContacte"]['name'] != "") {
		if(($_FILES["imatgeContacte"]["type"] == "image/png") || ($_FILES["imatgeContacte"]["type"] == "image/jpg") || ($_FILES["imatgeContacte"]["type"] == "image/jpeg")) {
			$imatgeContacte = uniqid("")."-".$_FILES["imatgeContacte"]["name"];
			$move = "img/";
			if(move_uploaded_file($_FILES["imatgeContacte"]["tmp_name"], $move.$imatgeContacte)) {
				$sql = "INSERT INTO tbl_contactes (idUsuariContacte,nomContacte,cognomsContacte,emailContacte,telefonContacte,tipusUbicacio1,ubicacio1Contacte,tipusUbicacio2,ubicacio2Contacte,imatgeContacte,direccioContacte,poblacioContacte,provinciaContacte,cpContacte,paisContacte) VALUES ('$idUsuari','$nomContacte','$cognomsContacte','$emailContacte','$telefonContacte','$tipusUbicacio1','$ubicacio1Contacte','$tipusUbicacio2','$ubicacio2Contacte','$imatgeContacte','$direccioContacte','$poblacioContacte','$provinciaContacte','$cpContacte','$paisContacte')";
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
		$sql = "INSERT INTO tbl_contactes (idUsuariContacte,nomContacte,cognomsContacte,emailContacte,telefonContacte,tipusUbicacio1,ubicacio1Contacte,tipusUbicacio2,ubicacio2Contacte,direccioContacte,poblacioContacte,provinciaContacte,cpContacte,paisContacte) VALUES ('$idUsuari','$nomContacte','$cognomsContacte','$emailContacte','$telefonContacte','$tipusUbicacio1','$ubicacio1Contacte','$tipusUbicacio2','$ubicacio2Contacte','$direccioContacte','$poblacioContacte','$provinciaContacte','$cpContacte','$paisContacte')";
	}

	// CONSULTA SQL INSERTAR DADES CONTACTES
	$sqlInsertar = mysqli_query($conexion, $sql);
	// echo $sql;
	header("location: principal.php");		
	