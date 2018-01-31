<?php
	session_start();
	if(!isset($_SESSION['username'])) {
	  header('location: index.php');
	}
	include("conexion.proc.php");

	// POSAR EN VARIABLES ELS VALOR ENVIATS PER URL

	$idContacte = $_REQUEST['idContacte'];

	$nomContactenew = $_REQUEST['nomContactenew'];
	$nomContacteold = $_REQUEST['nomContacteold'];

	$cognomsContactenew = $_REQUEST['cognomsContactenew'];
	$cognomsContacteold = $_REQUEST['cognomsContacteold'];

	$telefonContactenew = $_REQUEST['telefonContactenew'];
	$telefonContacteold = $_REQUEST['telefonContacteold'];

	$emailContactenew = $_REQUEST['emailContactenew'];
	$emailContacteold = $_REQUEST['emailContacteold'];

	$direccioContacte1new = $_REQUEST['direccioContacte1new'];
	$direccioContacte1old = $_REQUEST['direccioContacte1old'];

	$poblacioContacte1new = $_REQUEST['poblacioContacte1new'];
	$poblacioContacte1old = $_REQUEST['poblacioContacte1old'];

	$provinciaContacte1new = $_REQUEST['provinciaContacte1new'];
	$provinciaContacte1old = $_REQUEST['provinciaContacte1old'];

	$cpContacte1new = $_REQUEST['cpContacte1new'];
	$cpContacte1old = $_REQUEST['cpContacte1old'];

	$paisContacte1new = $_REQUEST['paisContacte1new'];
	$paisContacte1old = $_REQUEST['paisContacte1old'];

	
	$tipusUbicacio2new = $_REQUEST['tipusUbicacio2new'];
	$tipusUbicacio2old = $_REQUEST['tipusUbicacio2old'];
	
	$direccioContacte2new = $_REQUEST['direccioContacte2new'];
	$direccioContacte2old = $_REQUEST['direccioContacte2old'];

	$poblacioContacte2new = $_REQUEST['poblacioContacte2new'];
	$poblacioContacte2old = $_REQUEST['poblacioContacte2old'];

	$provinciaContacte2new = $_REQUEST['provinciaContacte2new'];
	$provinciaContacte2old = $_REQUEST['provinciaContacte2old'];

	$cpContacte2new = $_REQUEST['cpContacte2new'];
	$cpContacte2old = $_REQUEST['cpContacte2old'];

	$paisContacte2new = $_REQUEST['paisContacte2new'];
	$paisContacte2old = $_REQUEST['paisContacte2old'];

	/**************************************************************************/
	$updatecontacte = "UPDATE tbl_contactes SET idContacte='$idContacte'";

	if($nomContactenew != $nomContacteold) {
        $nomContactefinal = $nomContactenew;
        $updatecontacte .= ",nomContacte='$nomContactefinal'";
	} 
	if($cognomsContactenew != $cognomsContacteold) {
        $cognomsContactefinal = $cognomsContactenew;
        $updatecontacte .= ",cognomsContacte='$cognomsContactefinal'";
	}

	if($emailContactenew != $emailContacteold) {
        $emailContactefinal = $emailContactenew;
        $updatecontacte .= ",emailContacte='$emailContactefinal'";
	} 

	if($telefonContactenew != $telefonContacteold) {
        $telefonContactefinal = $telefonContactenew;
        $updatecontacte .= ",telefonContacte='$telefonContactefinal'";
	}

	if($_FILES["imatgeContacte"]['name'] != "") {
		if(($_FILES["imatgeContacte"]["type"] == "image/png") || ($_FILES["imatgeContacte"]["type"] == "image/jpg") || ($_FILES["imatgeContacte"]["type"] == "image/jpeg")) {
			$nombrefinal = uniqid("")."-".$_FILES["imatgeContacte"]["name"];
			$move = "img/";
			if(move_uploaded_file($_FILES["imatgeContacte"]["tmp_name"], $move.$nombrefinal)) {
				$updatecontacte .= ",imatgeContacte='$nombrefinal'";
			} else {
				$_SESSION['errorsubidafichero'] = 'ERROR!!! EL FICHERO NO SE HA PODIDO SUBIR';
				header("location: updateContacte.php");
				die("");
			}
		} else {
			$_SESSION['errortipofichero'] = 'NO PUEDES SUBIR ESTE TIPO DE FICHERO. SOLO .jpg, .jpeg o .png';
			header("location: updateContacte.php");
			die("");
		}
	}

	if($direccioContacte1new != $direccioContacte1old) {
        $direccioContacte1final = $direccioContacte1new;
        $updatecontacte .= ",direccioContacte1='$direccioContacte1final'";
	} 		

	if($poblacioContacte1new != $poblacioContacte1old) {
        $poblacioContacte1final = $poblacioContacte1new;
        $updatecontacte .= ",poblacioContacte1='$poblacioContacte1final'";
	}

	if($provinciaContacte1new != $provinciaContacte1old) {
        $provinciaContacte1final = $provinciaContacte1new;
        $updatecontacte .= ",provinciaContacte1='$provinciaContacte1final'";
	} 
 
	if($cpContacte1new != $cpContacte1old) {
        $cpContacte1final = $cpContacte1new;
        $updatecontacte .= ",cpContacte1='$cpContacte1final'";
	} 

	if($paisContacte1new != $paisContacte1old) {
        $paisContacte1final = $paisContacte1new;
        $updatecontacte .= ",paisContacte1='$paisContacte1final'";
	} 

	if($tipusUbicacio2new != $tipusUbicacio2old) {
        $tipusUbicacio2final = $tipusUbicacio2new;
        $updatecontacte .= ",tipusUbicacio2='$tipusUbicacio2final'";
	}

	if($direccioContacte2new != $direccioContacte2old) {
        $direccioContacte2final = $direccioContacte2new;
        $updatecontacte .= ",direccioContacte2='$direccioContacte2final'";
	}

	if($provinciaContacte2new != $provinciaContacte2old) {
        $provinciaContacte2final = $provinciaContacte2new;
        $updatecontacte .= ",provinciaContacte2='$provinciaContacte2final'";
	}

	if($poblacioContacte2new != $poblacioContacte2old) {
        $poblacioContacte2final = $poblacioContacte2new;
        $updatecontacte .= ",poblacioContacte2='$poblacioContacte2final'";
	}

	if($cpContacte2new != $cpContacte2old) {
        $cpContacte2final = $cpContacte2new;
        $updatecontacte .= ",cpContacte2='$cpContacte2final'";
	}

	if($paisContacte2new != $paisContacte2old) {
        $paisContacte2final = $paisContacte2new;
        $updatecontacte .= ",paisContacte2='$paisContacte2final'";
	}
	$_SESSION['canvisok'] = "Els canvis s'han realitzat correctament";

	$updatecontacte .= " WHERE idContacte = '$idContacte'";
	
	mysqli_query($conexion, $updatecontacte);
	header("location: updateContacte.php?idContacte=3");
	