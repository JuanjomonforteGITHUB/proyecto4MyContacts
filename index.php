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
                    <div class="btn-login active"><span>Login</span></div>
                    <div class="btn-sign"><span>Signup</span></div>
                </header>
                <div class="forms">
                    <!-- Start Form Login  -->
                    <form class="form-login" method="post" action="validar.php">
                        <div class="form-group">
                            <span class="place">Username</span>
                            <input type="text" class="input-lg" name="mail" autocomplete="off">
                            <span class="icon"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">Password</span>
                            <input type="password" class="input-lg" name="pass" autocomplete="new-password">
                            <span class="icon"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="submit" class="btn btn-block  btn-lg" value="Login">
                    </form>


                    <!-- Start Form Signup  -->
                    <form class="form-signup" method="post" action="registro.php">
                    	<div class="form-group">
                            <span class="place">nombre</span>
                            <input type="text" class="input-lg" name="realname" autocomplete="off">
                            <span class="icon"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">Email Address</span>
                            <input type="text" class="input-lg" name="nick" autocomplete="off">
                            <span class="icon"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">Password</span>
                            <input type="password" class="input-lg eye-pass" name="pass" autocomplete="new-password">
                            <span class="icon eye-btn"><i class="fa fa-eye"></i></span>
                        </div>
                        <div class="form-group">
                            <span class="place">repitePassword</span>
                            <input type="password" class="input-lg eye-pass" name="rpass" autocomplete="new-password">
                            <span class="icon eye-btn"><i class="fa fa-eye"></i></span>
                        </div>
                        <input type="submit" class="btn btn-block  btn-lg" value="Signup">	
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
