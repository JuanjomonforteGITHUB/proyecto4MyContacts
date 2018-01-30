<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	if(isset($_SESSION['errorsubidafichero'])){
		
		echo "<script>			
			alert('error " . $_SESSION['errorsubidafichero'] . "')
		</script>";
		unset($_SESSION['errorsubidafichero']);
	}
	if(isset($_SESSION['errortipofichero'])){
		
		echo "<script>			
			alert('error " . $_SESSION['errortipofichero'] . "')
		</script>";
		unset($_SESSION['errortipofichero']);
	}
	?>
	<form action="insertContacte.proc.php" method="POST">
		<label style="color: grey">/*Camps obligatoris*/</label><br>
		<input type="text" name="nomContacte" placeholder="nomContacte" required="required"><br>
		<input type="text" name="cognomsContacte" placeholder="cognomContacte" required="required"><br>
		<input type="text" name="telefonContacte" placeholder="telefoContacte" required="required"><br><br><br>
		<label style="color: grey">/*Camps opcionals*/</label><br>
		<!-- <input type="text" name="adreContacte" placeholder="adreContacte"><br> -->
		Tipus Ubicacio 1 : <select name="tipusubicacio1">
			<option value="casa">Casa</option>
		</select><br>
		<input type="text" name="ubicacio1Contacte" placeholder="ubicacio1Contacte"><br>
		<input type="text" name="emailContacte" placeholder="emailContacte"><br>
		Tipus Ubicacio 2 : <select name="tipusubicacio2">
			<option value="feina">Feina</option>
			<option value="escola">Escola</option>
			<option value="altres">Altres</option>
		</select><br>
		<input type="text" name="ubicacio2Contacte" placeholder="ubicacio2Contacte"><br>
		Imatge de perfil: <input type="file" name="imatgeContacte"><br>
		<input type="text" name="direccioContacte" placeholder="direccioContacte"><br>
		<input type="text" name="poblacioContacte" placeholder="poblacioContacte"><br>
		<input type="text" name="provinciaContacte" placeholder="provinciaContacte"><br>
		<input type="text" name="cpContacte" placeholder="cpContacte"><br>
		<input type="text" name="paisContacte" placeholder="paisContacte"><br><br>
		<input type="submit" name="Enviar">
	</form>

</body>
</html>