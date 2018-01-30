<?php
	session_start();
	if(!isset($_SESSION['username'])) {
	  header('location: index.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include("conexion.proc.php");
		$idContacte = $_REQUEST['idContacte'];
		$sql = "SELECT * FROM tbl_contactes WHERE idContacte = $idContacte";
		echo $sql;
		$sqlUpdate = mysqli_query($conexion, $sql);
		// echo $sql;
		// die();

		echo "<form action='updateContacte.proc.php' method='POST' enctype='multipart/form-data'>";
		if(mysqli_num_rows($sqlUpdate)>0){	
			while($row = mysqli_fetch_array($sqlUpdate)){ ?>
				<label>Nom contacte</label>
				<input type='text' name='nomContactenew' value='<?php echo $row['nomContacte'];?>'><br>
				<input type="hidden" name="nomContacteold" value="<?php echo $row['nomContacte']; ?>" />

				<label>Cognoms contacte</label>
				<input type='text' name='cognomsContactenew' value='<?php echo $row['cognomsContacte'];?>'><br>
				<input type="hidden" name="cognomsContacteold" value="<?php echo $row['nomContacte']; ?>" />

				<label>Telefon contacte</label>
				<input type='text' name='telefonContactenew' value='<?php echo $row['telefonContacte'];?>'><br>
				<input type="hidden" name="telefonContacteold" value="<?php echo $row['telefonContacte']; ?>" />

				<label>Email contacte</label>
				<input type='text' name='emailContacte' value='<?php echo $row['emailContacte'];?>'><br>

				<label>Imatge contacte</label>
				<input type="file" name="imatgeContacte">

				Tipus Ubicacio 1 : 
				<select name="tipusubicacio1">
					<option value="casa">Casa</option>
				</select><br>

				<label>Direccio contacte 1</label>
				<input type='text' name='direccioContacte1' value='<?php echo $row['direccioContacte1'];?>'><br>

				<label>Poblacio contacte 1</label>
				<input type='text' name='poblacioContacte1' value='<?php echo $row['poblacioContacte1'];?>'><br>

				<label>Provincia contacte 1</label>
				<input type='text' name='provinciaContacte1' value='<?php echo $row['provinciaContacte1'];?>'><br>

				<label>Codi Postal contacte 1</label>
				<input type='text' name='cpContacte1' value='<?php echo $row['cpContacte1'];?>'><br>

				<label>Pais contacte 1</label>
				<input type='text' name='paisContacte1' value='<?php echo $row['paisContacte1'];?>'><br>

				

				Tipus Ubicacio 2 : <select name="tipusubicacio2"> 
					<?php 
					if ($row['tipusUbicacio2'] == 'feina') { ?>
						<option value="feina" selected>Feina</option>
					<?php } else { ?>
						<option value="feina">Feina</option>	
					<?php }
					if ($row['tipusUbicacio2'] == 'escola') { ?>
						<option value="escola" selected>Escola</option>
					<?php } else { ?>
						<option value="escola">Escola</option>
					<?php }
					if ($row['tipusUbicacio2'] == 'altres') { ?>
						<option value="altres" selected>Altres</option>
					<?php } else { ?>
						<option value="altres">Altres</option>	
					<?php } ?>
				</select><br>
				
				<label>Direccio contacte 2</label>
				<input type='text' name='direccioContacte2' value='<?php echo $row['direccioContacte2'];?>'><br>

				<label>Poblacio contacte 2</label>
				<input type='text' name='poblacioContacte2' value='<?php echo $row['poblacioContacte2'];?>'><br>

				<label>Provincia contacte 2</label>
				<input type='text' name='provinciaContacte2' value='<?php echo $row['provinciaContacte2'];?>'><br>

				<label>Codi Postal contacte 2</label>
				<input type='text' name='cpContacte2' value='<?php echo $row['cpContacte2'];?>'><br>

				<label>Pais contacte 2</label>
				<input type='text' name='paisContacte2' value='<?php echo $row['paisContacte2'];?>'><br>


				

				<input type='hidden' value='".$idContacte."' name='idContacte'>

				<input type='submit' name='Acceptar'>
			<?php }
		}
		echo "</form>";
	?>
	
	

	
	<input type="text" name="ubicacio2Contacte" placeholder="ubicacio2Contacte"><br>
	Imatge de perfil: <input type="file" name="imatgeContacte"><br>
	<input type="text" name="poblacioContacte" placeholder="poblacioContacte"><br>
	<input type="text" name="provinciaContacte" placeholder="provinciaContacte"><br>
	<input type="text" name="cpContacte" placeholder="cpContacte"><br>
	<input type="text" name="paisContacte" placeholder="paisContacte"><br><br>
	<input type="submit" name="Enviar">





	<a href="principal.php"><input type="button" value="Tornar"></a>	
</body>
</html>