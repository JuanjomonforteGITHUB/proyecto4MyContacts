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

	// CONSULTA SQL INSERTAR DADES CONTACTES
	$sql = "INSERT INTO tbl_contactes (nomContacte,cognomsContacte,emailContacte,telefonContacte,tipusUbicacio1,ubicacio1Contacte,tipusUbicacio2,ubicacio2Contacte,imatgeContacte,direccioContacte,poblacioContacte,provinciaContacte,cpContacte,paisContacte) VALUES ('$nomContacte','$cognomsContacte','$emailContacte','$telefonContacte','$tipusUbicacio1','$ubicacio1Contacte','$tipusUbicacio2','$ubicacio2Contacte','$imatgeContacte','$direccioContacte','$poblacioContacte','$provinciaContacte','$cpContacte','$paisContacte')";

	$sqlInsertar = mysqli_query($conexion, $sql);
	// echo $sql;
	header("location: principal.php");