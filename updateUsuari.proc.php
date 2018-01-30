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
	$contraUsuarinew2 = $_REQUEST['contraUsuarinew2'];
	$contraUsuariold = $_REQUEST['contraUsuariold'];
	
	if ($contraUsuarinew == $contraUsuarinew2) {
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

			if($_FILES["imatgeUsuari"]['name'] != "") {
				if(($_FILES["imatgeUsuari"]["type"] == "image/png") || ($_FILES["imatgeUsuari"]["type"] == "image/jpg") || ($_FILES["imatgeUsuari"]["type"] == "image/jpeg")) {
					$nombrefinal = uniqid("")."-".$_FILES["imatgeUsuari"]["name"];
					$move = "img/";
					if(move_uploaded_file($_FILES["imatgeUsuari"]["tmp_name"], $move.$nombrefinal)) {
						$updateuser .= ",imatgeUsuari='$nombrefinal'";
					} else {
						$_SESSION['errorsubidafichero'] = 'ERROR!!! EL FICHERO NO SE HA PODIDO SUBIR';
						header("location: updateUsuari.php");
						die("");
					}
				} else {
					$_SESSION['errortipofichero'] = 'NO PUEDES SUBIR ESTE TIPO DE FICHERO. SOLO .jpg, .jpeg o .png';
					header("location: updateUsuari.php");
					die("");
				}
			}		

			$usrantiguo = $_REQUEST['usernameUsuariold'];
			$updateuser .= " WHERE usernameUsuari = '$usrantiguo'";
			
			mysqli_query($conexion, $updateuser);
			header("location: principal.php");
		} else {
			$_SESSION['ErrorUserRepe']="Ya existe un usuario con este nombre, porfavor introduce otro nombre de usuario";
			header("location: updateUsuari.php");
			die("");
		}	

	} else {
		$_SESSION['errorContra'] = "Les contrasenyes no coincideixen!";
		// echo $_SESSION['errorContra'];
		header("location: updateUsuari.php");
		die("");
	}