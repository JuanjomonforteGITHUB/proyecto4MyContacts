<!-- QUERY CREAR REGISTRO USUARIO -->
<?php
	include("conexion.php");

	$nomUsuari = $_REQUEST['nomUsuari']; 
	$cognomsUsuari = $_REQUEST['nomUsuari']; 
	$emailUsuari = $_REQUEST['nomUsuari']; 
	$contraUsuari = $_REQUEST['nomUsuari']; 
	 
	$sql = 'INSERT INTO tbl_usuari (nomUsuari, cognomsUsuari, emailUsuari, contraUsuari) VALUES ($nomUsuari, $cognomsUsuari, $emailUsuari, $contraUsuari)';
	$registroSql = mysqli_query($conexion, $sql);
	echo $sql;

	header("location: index.php");
