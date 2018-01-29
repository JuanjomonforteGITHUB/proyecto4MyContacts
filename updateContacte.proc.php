<?php
	session_start();
	if(!isset($_SESSION['username'])) {
	  header('location: index.php');
	}
	include("conexion.proc.php");

	// POSAR EN VARIABLES ELS VALOR ENVIATS PER URL
	$idContacte = $_REQUEST['idContacte'];
	$nomContacte = $_REQUEST['nomContacte'];
	$cognomsContacte = $_REQUEST['cognomsContacte'];
	$emailContacte = $_REQUEST['emailContacte'];
	$telefonContacte = $_REQUEST['telefonContacte'];
	// $adreContacte = $_REQUEST['adreContacte'];
	$tipusUbicacio1 = $_REQUEST['tipusUbicacio1'];
	$ubicacio1Contacte = $_REQUEST['ubicacio1Contacte'];
	$tipusUbicacio2 = $_REQUEST['tipusUbicacio2'];
	$ubicacio2Contacte = $_REQUEST['ubicacio2Contacte'];
	$imatgeContacte = $_REQUEST['imatgeContacte'];
	$direccioContacte = $_REQUEST['direccioContacte'];
	$poblacioContacte = $_REQUEST['poblacioContacte'];
	$provinciaContacte = $_REQUEST['provinciaContacte'];
	$cpContacte = $_REQUEST['cpContacte'];
	$paisContacte = $_REQUEST['paisContacte'];

	// CONSULTA SQL MODIFICAR CONTACTE
	$sql = "UPDATE tbl_contactes SET nomContacte='$nomContacte', cognomsContacte='$cognomsContacte', emailContacte='$emailContacte', telefonContacte='$telefonContacte', tipusUbicacio1='$tipusUbicacio1', ubicacio1Contacte='$ubicacio1Contacte', tipusUbicacio2='$tipusUbicacio2', ubicacio2Contacte='$ubicacio2Contacte', imatgeContacte='$imatgeContacte', direccioContacte='$direccioContacte', poblacioContacte='$poblacioContacte', provinciaContacte='$provinciaContacte', cpContacte='$cpContacte', paisContacte='$paisContacte' WHERE idContacte=$idContacte";

	// echo $sql;
	$sqlUpdate= mysqli_query($conexion, $sql);

	header('location: principal.php');

		
	