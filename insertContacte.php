<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="insertContacte.proc.php" method="POST">
		<label style="color: grey">/*Camps obligatoris*/</label><br>
		<input type="text" name="nomContacte" placeholder="nomContacte" required="required"><br>
		<input type="text" name="cognomsContacte" placeholder="cognomContacte" required="required"><br>
		<input type="text" name="telefonContacte" placeholder="telefoContacte" required="required"><br><br><br>
		<label style="color: grey">/*Camps opcionals*/</label><br>
		<!-- <input type="text" name="adreContacte" placeholder="adreContacte"><br> -->
		<input type="text" name="tipusUbicacio1" placeholder="tipusUbicacio1"><br>
		<input type="text" name="ubicacio1Contacte" placeholder="ubicacio1Contacte"><br>
		<input type="text" name="emailContacte" placeholder="emailContacte"><br>
		<input type="text" name="tipusUbicacio2" placeholder="tipusUbicacio2"><br>
		<input type="text" name="ubicacio2Contacte" placeholder="ubicacio2Contacte"><br>
		<input type="text" name="imatgeContacte" placeholder="imatgeContacte"><br>
		<input type="text" name="direccioContacte" placeholder="direccioContacte"><br>
		<input type="text" name="poblacioContacte" placeholder="poblacioContacte"><br>
		<input type="text" name="provinciaContacte" placeholder="provinciaContacte"><br>
		<input type="text" name="cpContacte" placeholder="cpContacte"><br>
		<input type="text" name="paisContacte" placeholder="paisContacte"><br><br>
		<input type="submit" name="Enviar">
	</form>

</body>
</html>