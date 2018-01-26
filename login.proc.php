<!-- QUERY PARA VALIDAR LOGIN DEL USUARIO -->
<?php
	session_start();
	include("conexion.proc.php");
	if (!$conexion) {
        echo "Error: No se pudo conectar a MySQL. " . PHP_EOL;
        echo "Errno de depuración: " . mysqli_connect_errno () . PHP_EOL;
        echo "Error de depuración: " . mysqli_connect_error () . PHP_EOL;
        exit;
    }
    if($_POST['usuari'] == '') {
	$_SESSION['error'] = 'Te has dejado el usuario en blanco';
	header('location: index.php');
	} else {
		$usuari=$_POST['usuari'];
	}
	if($_POST['contrasenya'] == '') {
		$_SESSION['error'] = 'Te has dejado la contraseña en blanco';
		header('location: index.php');
	} else {
		$password=md5($_POST['contrasenya']);
	}
	//Definimos las variables de usuario y contraseña

	//Variable que contiene la busqueda de usuario
	$queryusuario="SELECT * FROM tbl_usuari WHERE usernameUsuari = '$usuari'";
	//Query en la bbdd
	$result=mysqli_query($conexion, $queryusuario);

	//Condicional que si no hay resultados llevara a index.php, si hay resultados hara las sesiones y nos llevara a principal.php
	if (mysqli_num_rows($result)>0) {
		$queryusrpaswdd = "SELECT usernameUsuari,contraUsuari FROM tbl_usuari WHERE usernameUsuari= '$usuari' AND contraUsuari='$password'";
		$login=mysqli_query($conexion, $queryusrpaswdd);
		//Si la consulta devuelve más de 0 registros, es que el usuario existe, por lo tanto, iremos a la página principal de la intranet
		if(mysqli_num_rows($login)>0){
		//Comprovamos que el usuario haya introducido bien la contraseña, si no es correcta nos lleva a index.php
			//Asignamos las sesiones
			$_SESSION['loggedin']=true;
			//Nombre de usuario
			$_SESSION['username']=$usuari;
			$_SESSION['start']=time();
			//Tiempo que tarda en expirar la sesion
			$_SESSION ['expire']=$_SESSION ['start']+(500*60);
			//echo "Bienvenido ".$_SESSION ['username'];
			header("location: principal.php");
		} else {
			//Si cuando hace la consulta no muestra más de 0 resultados significa que el usuario que a introducido mal la contraseña
			$_SESSION['errorpassword'] = 'Contrasenya incorrecta';
			header("location: index.php");
		}
	} else {
		$_SESSION['erroruser'] = 'El usuari no existeix o esta mal introduit';
		header("location: index.php");
	}
mysqli_close($conexion);





