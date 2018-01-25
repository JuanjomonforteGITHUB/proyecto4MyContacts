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
                    <form class="form-login" method="post" action="login.proc.php">
                        <div class="form-group">
                            <span class="place">Usuari</span>
                            <input type="text" class="input-lg" name="usuari" autocomplete="off">
                            <span class="icon"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">Contrasenya</span>
                            <input type="password" class="input-lg" name="contrasenya" autocomplete="new-password">
                            <span class="icon"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="submit" class="btn btn-block  btn-lg" value="Login">
                    </form>


                    <!-- Start Form Signup  -->
                    <form class="form-signup" method="post" action="registre.proc.php">
                    	<div class="form-group">
                            <span class="place">Nom usuari</span>
                            <input type="text" class="input-lg" name="realname" autocomplete="off">
                            <span class="icon"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">Nom</span>
                            <input type="text" class="input-lg" name="realname" autocomplete="off">
                            <span class="icon"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">Cognom</span>
                            <input type="password" class="input-lg eye-pass" name="rpass" autocomplete="new-password">
                            <span class="icon eye-btn"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">Direcció de correu</span>
                            <input type="text" class="input-lg" name="nick" autocomplete="off">
                            <span class="icon"><i class="fa fa-envelope"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">Contrasenya</span>
                            <input type="password" class="input-lg eye-pass" name="pass" autocomplete="new-password">
                            <span class="icon eye-btn"><i class="fa fa-key"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">Repetir contrasenya</span>
                            <input type="password" class="input-lg eye-pass" name="rpass" autocomplete="new-password">
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
