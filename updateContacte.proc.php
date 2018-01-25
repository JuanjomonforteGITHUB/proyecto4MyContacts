<?php
	include("conexion.proc.php");

	// POSAR EN VARIABLES ELS VALOR ENVIATS PER URL
	$nomContacte = $_REQUEST['nomContacte'];
	$cognomsContacte = $_REQUEST['cognomsContacte'];
	$emailContacte = $_REQUEST['emailContacte'];
	$telefonContacte = $_REQUEST['telefonContacte'];
	$adreContacte = $_REQUEST['adreContacte'];
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

	// CONSULTA SQL UDATE DADES CONTACTES
	