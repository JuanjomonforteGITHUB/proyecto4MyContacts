<?php
	session_start();
	 if(isset($_SESSION['username'])){
      // echo "Bienvenido " . $_SESSION['id'] . "<br/>";
      // echo "Nivel de usuario: " . $_SESSION['nivel'] . "<br/>";
    } else {
      $_SESSION['error-saltologin']= "No te saltes el login!!";
      header("location: index.php");
    }
	include("conexion.proc.php");

	// POSAR EN VARIABLES ELS VALOR ENVIATS PER URL
	$usernameUsuarinew = $_REQUEST['usernameUsuarinew'];
	$usernameUsuariold = $_REQUEST['usernameUsuariold'];
	$nomUsuarinew = $_REQUEST['nomUsuarinew'];
	$nomUsuariold = $_REQUEST['nomUsuariold'];
	$cognomsUsuarinew = $_REQUEST['cognomsUsuarinew'];
	$cognomsUsuariold = $_REQUEST['cognomsUsuariold'];
	$emailUsuarinew = $_REQUEST['emailUsuarinew'];
	$emailUsuariold = $_REQUEST['emailUsuariold'];
	$contraUsuarinew = $_REQUEST['contraUsuarinew'];
	$contraUsuariold = $_REQUEST['contraUsuariold'];
	
	// FALTA VERIFICAR ERRORES (HAY)
	$comprovarusr = "SELECT usernameUsuari FROM tbl_usuari WHERE usernameUsuari='$_REQUEST[usernameUsuarinew]'";
	// echo $comprovarusr;
	// die(" ");
	$queryuser=mysqli_query($conexion, $comprovarusr);
    $datos_usuario = mysqli_fetch_array($queryuser);

	if (mysqli_num_rows($queryuser) == 0 || $datos_usuario['usernameUsuari'] == $_REQUEST['usernameUsuariold']) {
		if($_REQUEST['usernameUsuarinew'] != $_REQUEST['usernameUsuariold']) {
			$user = $_REQUEST['usernameUsuarinew'];
			$_SESSION['username'] = $user;
		} else {
			$user = $_REQUEST['usernameUsuariold'];
			
		}

		$updateuser = "UPDATE tbl_usuari SET usernameUsuari='$user'";

		if($_REQUEST['nomUsuarinew'] != $_REQUEST['nomUsuariold']) {
			$nombre = $_REQUEST['nomUsuarinew'];
            $updateuser .= ",nomUsuari='$nombre'";
		}

		if($_REQUEST['cognomsUsuarinew'] != $_REQUEST['cognomsUsuariold']) {
			$apellido = $_REQUEST['cognomsUsuarinew'];
            $updateuser .= ",cognomsUsuari='$apellido'";
		}

		if($_REQUEST['emailUsuarinew'] != $_REQUEST['emailUsuariold']) {
			$mail = $_REQUEST['emailUsuarinew'];
            $updateuser .= ",emailUsuari='$mail'";
		}

		if($_REQUEST['contraUsuarinew'] != '') {
			$password_encriptado = md5($_REQUEST['contraUsuarinew']);
			$updateuser .= ",contraUsuari='$password_encriptado'";
		}


		if(($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) {
		$nombrefinal = uniqid("")."-".$_FILES["file"]["name"];
		$move = "imgsubidas/";
		if(move_uploaded_file($_FILES["file"]["tmp_name"], $move.$nombrefinal)) {
			$timezone= +1;
			$fecha_subida_objeto = gmdate("Y/m/j H:i:s",time() + 3600 * ($timezone+date("")));
			$insert = 'INSERT INTO `imagen`(`nombre_imagen`, `Fecha_subida`) VALUES ("'.$nombrefinal.'","'.$fecha_subida_objeto.'")';
			$query=mysqli_query($conexion, $insert);
			header('location: index.php');

		} else {
			$_SESSION['errorsubidafichero'] = 'ERROR!!! EL FICHERO NO SE HA PODIDO SUBIR';
		}
	    /*
	    
          echo $_FILES["file"]['name']."<br>";
          echo $_FILES["file"]['tmp_name']."<br>";
          echo $_FILES["file"]['size']."<br>";
          echo $_FILES['file']['error']."<br>";
          ;

		*/
		} else {
			$_SESSION['errortipofichero'] = 'NO PUEDES SUBIR ESTE TIPO DE FICHERO. SOLO .jpg, .jpeg o .png';
		}
	}





		

		$usrantiguo = $_REQUEST['usernameUsuariold'];
		$updateuser .= " WHERE usernameUsuari = '$usrantiguo'";
		
		// echo $updateuser;
		// die("");
		mysqli_query($conexion, $updateuser);
		header("location: principal.php");
	} else {
		$_SESSION['ErrorUserRepe']="Ya existe un usuario con este nombre, porfavor introduce otro nombre de usuario";
		header("location: alta-mod_usuario.php?userop=modificar");
	}	

		
	










/******************************************

	// CONSULTA SQL VERIFICAR EXISTENCIA USERNAME
	$sqlUsernameUsuari = "SELECT usernameUsuari FROM tbl_usuari WHERE usernameUsuari=$usernameUsuari";
	$usernameSql = mysqli_query($conexion, $sqlUsername);

	// SI EL USERNAME EXISTEIX...
	if(mysqli_num_rows($usernameSql)>0){
		$_SESSION['errorUsername'] = "El nom d'usuari ja existeix!";
		header("location: updateUsuari.php");
	}else{
		// COMPROBAR QUE LES CONTRASENYES COINCIDEIXIN
		if (isset($contraUsuari == $contraUsuari2)) {
			// CONSULTA SQL UPDATE DADES USUARI
			$sql = "UPDATE tbl_usuari SET usernameUsuari=$usernameUsuari, nomUsuari=$nomUsuari, cognomsUsuari=$cognomsUsuari, emailUsuari=$emailUsuari, contraUsuari=$contraUsuari WHERE idUsuari=$idUsuari";
		}
	}

**/