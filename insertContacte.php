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
	<form action="insertContacte.proc.php" method="POST" enctype="multipart/form-data">
		<label style="color: grey">/*Camps obligatoris*/</label><br>
		<input type="text" name="nomContacte" placeholder="nomContacte" required="required"><br>
		<input type="text" name="cognomsContacte" placeholder="cognomContacte" required="required"><br>
		<input type="text" name="telefonContacte" placeholder="telefoContacte" required="required"><br><br><br>
		<label style="color: grey">/*Camps opcionals*/</label><br>
		<input type="text" name="emailContacte" placeholder="emailContacte"><br>

		Imatge de perfil: <input type="file" name="imatgeContacte"><br>
		Tipus Ubicacio 1 : <select name="tipusubicacio1">
			<option value="casa">Casa</option>
		</select><br>
		<input type="text" name="direccioContacte1" placeholder="direccioContacte"><br>
		<input type="text" name="poblacioContacte1" placeholder="poblacioContacte"><br>
		<input type="text" name="provinciaContacte1" placeholder="provinciaContacte"><br>
		<input type="text" name="cpContacte1" placeholder="cpContacte"><br>
		<input type="text" name="paisContacte1" placeholder="paisContacte"><br><br>
		


		Tipus Ubicacio 2 : <select name="tipusUbicacio2">
			<option value="feina">Feina</option>
			<option value="escola">Escola</option>
			<option value="altres">Altres</option>
		</select><br>
		<input type="text" name="direccioContacte2" placeholder="direccioContacte2"><br>
		<input type="text" name="poblacioContacte2" placeholder="poblacioContacte2"><br>
		<input type="text" name="provinciaContacte2" placeholder="provinciaContacte2"><br>
		<input type="text" name="cpContacte2" placeholder="cpContacte2"><br>
		<input type="text" name="paisContacte2" placeholder="paisContacte2"><br><br>
		<input type="submit" name="Enviar">
	</form>

</body>
</html>