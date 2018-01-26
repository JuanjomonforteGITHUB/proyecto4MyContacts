<?php
session_start();
//Desasigna la sesion
unset($_SESSION['username']);
//Destruye la sesion
session_destroy();
//Nos lleva a index.php
header("Location: index.php");