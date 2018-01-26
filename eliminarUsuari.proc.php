<?php
	include("conexion.proc.php");

	// POSAR EN VARIABLES ELS VALOR ENVIATS PER URL
	$idContacte = $_REQUEST['idContacte'];

	// CONSULTA SQL ELIMINAR CONTACTE
	$sql = "DELETE FROM tbl_contactes WHERE idContacte='$idContacte'";
	$deleteContacte = mysql_query($conexion, $sql);

	header("location: principal.php");