<?php
	session_start();
	if(!isset($_SESSION['username'])) {
	  header('location: index.php');
	}
	include("conexion.proc.php");
	// POSAR EN VARIABLES ELS VALOR ENVIATS PER URL
	$nomUsuari = $_SESSION['username'];

	// CONSULTA SQL ELIMINAR CONTACTE
	$queryborraruser = "DELETE FROM tbl_usuari WHERE usernameUsuari='$nomUsuari'";
	$deleteContacte = mysqli_query($conexion, $queryborraruser);
	session_destroy();
	header("location: index.php");