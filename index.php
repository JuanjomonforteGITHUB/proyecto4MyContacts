<?php
  session_start();
  if(isset($_SESSION['username'])){
    header("location: principal.php");
  } else if(isset($_SESSION['error-saltologin'])){
    $errorsaltologin = $_SESSION['error-saltologin'];
    session_destroy();
  }
  if(isset($_SESSION['erroruser'])){
    $erroruser = $_SESSION['erroruser'];
    session_destroy();
  } elseif(isset($_SESSION['errorLogin'])) {
    $errorLogin = $_SESSION['errorLogin'];
    session_destroy();
  }
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700,900,900i">
</head>

<body>

<div class="wrapper-login">
        <div class='start'></div>
        <div class='start2'></div>
        <div class='start3'></div>
        <div class="container">
            <div class="viewport-login">
                <header class="tabs">
                    <div class="btn-login active"><span>LOGIN</span></div>
                    <div class="btn-sign"><span>REGISTRE</span></div>
                </header>
                <div class="forms">
                    <!-- Start Form Login  -->
                    <form class="form-login" method="POST" action="login.proc.php">
                        <div class="form-group">
                            <div class="error">
                            <?php
                            if(isset($errorsaltologin)){
                            echo "<b>".$errorsaltologin ."</b><br/>";
                            }
                            if(isset($erroruser)){
                            echo "<b>".$erroruser ."</b><br/>";
                            }
                            ?>
                            </div>
                            <span class="place">Usuari</span>
                            <input type="text" class="input-lg" name="usuari" autocomplete="off">
                            <span class="icon"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="form-group">
                            <div class="error">
                                <?php
                                    if(isset($errorLogin)){
                                        echo "<b>". $errorLogin ."</b><br/>";
                                    }
                                ?>
                            </div>
                            <span class="place">Contrasenya</span>
                            <input type="password" class="input-lg" name="contrasenya" autocomplete="new-password">
                            <span class="icon"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="submit" class="btn btn-block  btn-lg" value="Login">
                    </form>

                    <!-- Start Form Signup  -->
                    <form class="form-signup" method="post" action="registreUsuari.proc.php">
                    	<div class="form-group">
                            <span class="place">Nom usuari</span>
                            <input type="text" class="input-lg" name="usernameUsuari" autocomplete="off">
                            <span class="icon"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">Nom</span>
                            <input type="text" class="input-lg" name="nomUsuari" autocomplete="off">
                            <span class="icon"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">Cognom</span>
                            <input type="text" class="input-lg eye-pass" name="cognomsUsuari" autocomplete="new-password">
                            <span class="icon eye-btn"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">Direcció de correu</span>
                            <input type="text" class="input-lg" name="emailUsuari" autocomplete="off">
                            <span class="icon"><i class="fa fa-envelope"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">Contrasenya</span>
                            <input type="password" class="input-lg eye-pass" name="contraUsuari" autocomplete="new-password">
                            <span class="icon eye-btn"><i class="fa fa-key"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">Repetir contrasenya</span>
                            <input type="password" class="input-lg eye-pass" name="contraUsuari2" autocomplete="new-password">
                            <span class="icon eye-btn"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="submit" class="btn btn-block  btn-lg" value="Registrar">	
                    </form>
                    <?php
						if(isset($_POST['submit'])){
							require("registro.php");
						}
					?> 
                </div>	
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js'></script>
    <script  src="js/funciones.js"></script>
</body>
</html>
